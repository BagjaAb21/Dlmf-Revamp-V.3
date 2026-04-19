<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;

/**
 * StudentPaymentController
 *
 * Proses checkout yang:
 * 1. Membutuhkan siswa SUDAH login (auth middleware).
 * 2. Mengambil produk dari database (bukan array statis).
 * 3. Menyimpan user_id pada record Payment.
 */
class StudentPaymentController extends Controller
{
    private InvoiceApi $invoiceApi;

    public function __construct()
    {
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
        $this->invoiceApi = new InvoiceApi();
    }

    /**
     * POST /student-checkout/process
     * Dipakai dari blade halaman BuyCourse (student panel).
     */
    public function process(Request $request)
    {
        $validated = $request->validate([
            'product_slug'           => 'required|string',
            'given_names'            => 'required|string|max:255',
            'surname'                => 'nullable|string|max:255',
            'mobile_number'          => 'nullable|string|max:20',
            'quantity'               => 'required|integer|min:1|max:10',
            'payment_method'         => 'required|in:VA,QRIS',
            'grand_total_amount'     => 'required|integer|min:1',
            'convenience_fee_amount' => 'required|integer|min:0',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // ── Ambil produk dari DB ───────────────────────────────────────────
        $product = Product::with(['discount'])
            ->where('slug', $validated['product_slug'])
            ->where('is_active', true)
            ->firstOrFail();

        $externalId = 'DLMF-' . strtoupper(Str::random(8)) . '-' . time();

        try {
            // ── Format nomor telepon ke E164 ───────────────────────────────
            $mobileNumber = null;
            if (!empty($validated['mobile_number'])) {
                $phone = preg_replace('/[^0-9]/', '', $validated['mobile_number']);
                if (str_starts_with($phone, '0')) {
                    $mobileNumber = '+62' . substr($phone, 1);
                } elseif (str_starts_with($phone, '62')) {
                    $mobileNumber = '+' . $phone;
                } else {
                    $mobileNumber = '+62' . $phone;
                }
            }

            $totalAmount = (int) $validated['grand_total_amount'];
            $convFee     = (int) $validated['convenience_fee_amount'];
            $unitPrice   = (int) $product->effective_price;

            // ── Build Xendit invoice data ───────────────────────────────────
            $invoiceData = [
                'external_id'      => $externalId,
                'amount'           => $totalAmount,
                'description'      => $product->short_description ?: $product->name,
                'invoice_duration' => 3600,
                'currency'         => 'IDR',

                'customer' => [
                    'given_names' => $validated['given_names'],
                    'email'       => $user->email,
                ],

                'customer_notification_preference' => [
                    'invoice_created'  => ['whatsapp', 'email'],
                    'invoice_reminder' => ['whatsapp', 'email'],
                    'invoice_paid'     => ['whatsapp', 'email'],
                ],

                'success_redirect_url' => route('survey.show') . '?external_id=' . $externalId,
                'failure_redirect_url' => route('payment.failed') . '?external_id=' . $externalId,

                'payment_methods' => ['QRIS', 'BCA', 'BNI', 'BRI', 'MANDIRI', 'PERMATA', 'BSI'],

                'items' => [
                    [
                        'name'     => $product->name,
                        'quantity' => $validated['quantity'],
                        'price'    => $unitPrice,
                        'category' => 'Education',
                    ],
                ],
            ];

            if (!empty($validated['surname'])) {
                $invoiceData['customer']['surname'] = $validated['surname'];
            }
            if ($mobileNumber) {
                $invoiceData['customer']['mobile_number'] = $mobileNumber;
            }
            if ($convFee > 0) {
                $methodLabel = $validated['payment_method'] === 'QRIS' ? 'QRIS' : 'Virtual Account';
                $invoiceData['items'][] = [
                    'name'     => "Convenience Fee ({$methodLabel})",
                    'quantity' => 1,
                    'price'    => $convFee,
                    'category' => 'Fee',
                ];
            }

            Log::info('[StudentPayment] Creating Xendit Invoice:', $invoiceData);

            $invoice = $this->invoiceApi->createInvoice($invoiceData);

            Log::info('[StudentPayment] Invoice created:', (array) $invoice);

            // ── Simpan ke DB dengan user_id ───────────────────────────────
            Payment::create([
                'user_id'          => $user->id,
                'product_id'       => $product->id,
                'external_id'      => $externalId,
                'xendit_invoice_id'=> $invoice['id'],

                'given_names'      => $validated['given_names'],
                'surname'          => $validated['surname'] ?? null,
                'email'            => $user->email,
                'mobile_number'    => $mobileNumber,

                'product_name'     => $product->name,
                'quantity'         => $validated['quantity'],

                'amount'           => $totalAmount,
                'currency'         => 'IDR',

                'description'      => $product->short_description ?: $product->name,
                'invoice_url'      => $invoice['invoice_url'],
                'status'           => strtolower($invoice['status']),

                'expired_at' => isset($invoice['expiry_date'])
                    ? Carbon::parse($invoice['expiry_date'])->timezone('Asia/Jakarta')
                    : null,
            ]);

            // ── Redirect ke Xendit checkout page ──────────────────────────
            return redirect($invoice['invoice_url']);

        } catch (\Exception $e) {
            Log::error('[StudentPayment] Error: ' . $e->getMessage());
            return back()->with('student_payment_error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
