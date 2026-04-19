<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Configuration;
use Illuminate\Support\Str;
use Xendit\Invoice\InvoiceApi;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private $invoiceApi;

    public function __construct()
    {
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
        $this->invoiceApi = new InvoiceApi();
    }

    private function findProduct(string $slug): ?array
    {
        $product = Product::with('discount')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (!$product) {
            return null;
        }

        return [
            'id'          => $product->id,
            'code'        => $product->slug,
            'name'        => $product->name,
            'price'       => (int) $product->effective_price,
            'description' => $product->short_description ?? $product->name,
        ];
    }

    public function showCheckout(Request $request)
    {
        $productCode = $request->query('product');
        $product = $productCode ? $this->findProduct($productCode) : null;

        if (!$product) {
            return redirect('/harga')->with('error', 'Produk tidak ditemukan');
        }

        return view('checkout', compact('product'));
    }

    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'product_code'           => 'required|string',
            'given_names'            => 'required|string|max:255',
            'surname'                => 'nullable|string|max:255',
            'email'                  => 'required|email|max:255',
            'mobile_number'          => 'nullable|string|max:20',
            'quantity'               => 'required|integer|min:1',
            'payment_method'         => 'required|string|in:VA,QRIS',
            'grand_total_amount'     => 'required|integer|min:1',
            'convenience_fee_amount' => 'required|integer|min:0',
        ]);

        $product = $this->findProduct($validated['product_code']);

        if (!$product) {
            return back()->with('error', 'Produk tidak valid');
        }

        $convenienceFee = $validated['convenience_fee_amount'];
        $totalAmount    = $validated['grand_total_amount'];

        // Generate external_id yang unik
        $externalId = 'DLMF-' . strtoupper(Str::random(8)) . '-' . time();

        try {
            // Format nomor telepon ke E164 jika ada
            $mobileNumber = null;
            if (!empty($validated['mobile_number'])) {
                $phone = preg_replace('/[^0-9]/', '', $validated['mobile_number']);
                // Jika dimulai dengan 0, ganti dengan +62
                if (substr($phone, 0, 1) === '0') {
                    $mobileNumber = '+62' . substr($phone, 1);
                }
                // Jika dimulai dengan 62, tambahkan +
                elseif (substr($phone, 0, 2) === '62') {
                    $mobileNumber = '+' . $phone;
                }
                // Jika tidak ada prefix, anggap 08xx -> +628xx
                else {
                    $mobileNumber = '+62' . $phone;
                }
            }

            // Buat data invoice sesuai dengan dokumentasi Xendit
            $invoiceData = [
                'external_id' => $externalId,
                'amount' => $totalAmount,
                'description' => $product['description'] ?? $product['name'],
                'invoice_duration' => 3600, // 1 jam dalam detik
                'currency' => 'IDR',

                // Customer object sesuai dokumentasi Xendit
                'customer' => [
                    'given_names' => $validated['given_names'],
                    'email' => $validated['email'],
                ],

                // Customer notification preference (PENTING: untuk mengirim email & WhatsApp)
                // Notifikasi akan terkirim ke email dan WhatsApp (jika mobile_number diisi)
                'customer_notification_preference' => [
                    'invoice_created' => ['whatsapp', 'email'], // Notifikasi saat invoice dibuat
                    'invoice_reminder' => ['whatsapp', 'email'], // Notifikasi reminder
                    'invoice_paid' => ['whatsapp', 'email'], // Notifikasi saat invoice dibayar
                ],

                // Redirect URLs
                'success_redirect_url' => route('survey.show') . '?external_id=' . $externalId,
                'failure_redirect_url' => route('payment.failed') . '?external_id=' . $externalId,

                // Payment methods - HANYA QRIS dan Virtual Account
                'payment_methods' => ['QRIS', 'BCA', 'BNI', 'BRI', 'MANDIRI', 'PERMATA', 'BSI'],

                // Items array (untuk detail produk)
                'items' => [
                    [
                        'name' => $product['name'],
                        'quantity' => $validated['quantity'],
                        'price' => $product['price'],
                        'category' => 'Education',
                    ]
                ],
            ];

            // --- TAMBAHKAN ITEM CONVENIENCE FEE JIKA ADA ---
            if ($convenienceFee > 0) {
                $paymentMethodLabel = $validated['payment_method'] === 'QRIS' ? 'QRIS' : 'Virtual Account';
                $invoiceData['items'][] = [
                    'name' => "Convenience Fee ({$paymentMethodLabel})",
                    'quantity' => 1,
                    'price' => $convenienceFee, // Nilai convenience fee sudah termasuk PPN 11%
                    'category' => 'Fee',
                ];
            }

            // Tambahkan surname jika ada
            if (!empty($validated['surname'])) {
                $invoiceData['customer']['surname'] = $validated['surname'];
            }

            // Tambahkan mobile_number jika ada
            if ($mobileNumber) {
                $invoiceData['customer']['mobile_number'] = $mobileNumber;
            }

            Log::info('Creating Xendit Invoice:', $invoiceData);

            // Create invoice di Xendit
            $invoice = $this->invoiceApi->createInvoice($invoiceData);

            Log::info('Xendit Invoice Created:', (array) $invoice);

            // Simpan data payment ke database dengan field yang sesuai
            $payment = Payment::create([
                'external_id' => $externalId,
                'xendit_invoice_id' => $invoice['id'],

                // Customer information
                'given_names' => $validated['given_names'],
                'surname' => $validated['surname'] ?? null,
                'email' => $validated['email'],
                'mobile_number' => $mobileNumber,

                // Product information
                'product_id'   => $product['id'],
                'product_name' => $product['name'],
                'quantity' => $validated['quantity'],

                // Amount information
                'amount' => $totalAmount,
                'currency' => 'IDR',

                // Invoice information
                'description' => $product['description'] ?? $product['name'],
                'invoice_url' => $invoice['invoice_url'],

                // Status
                'status' => strtolower($invoice['status']), // PENDING, PAID, EXPIRED

                // Expiry
                'expired_at' => $invoice['expiry_date'] ? \Carbon\Carbon::parse($invoice['expiry_date'])->timezone('Asia/Jakarta') : null,
            ]);

            Log::info('Payment record created:', $payment->toArray());

            // Redirect ke Xendit checkout page
            return redirect($invoice['invoice_url']);

        } catch (\Exception $e) {
            Log::error('Payment Error: ' . $e->getMessage());
            Log::error('Stack Trace: ' . $e->getTraceAsString());

            return back()->with('error', 'Terjadi kesalahan saat memproses pembayaran: ' . $e->getMessage());
        }
    }

    /**
     * Callback dari Xendit setelah pembayaran
     * Endpoint ini akan dipanggil oleh Xendit saat status invoice berubah
     */
    public function callback(Request $request)
    {
        // Verifikasi callback token dari Xendit
        $callbackToken = $request->header('x-callback-token');
        $xenditCallbackToken = env('XENDIT_CALLBACK_TOKEN');

        if ($callbackToken !== $xenditCallbackToken) {
            Log::warning('Invalid callback token', [
                'received' => $callbackToken,
                'expected' => $xenditCallbackToken
            ]);
            return response()->json(['message' => 'Invalid token'], 401);
        }

        try {
            $data = $request->all();
            Log::info('Xendit Callback Received:', $data);

            // Cari payment berdasarkan external_id
            $payment = \App\Models\Payment::where('external_id', $data['external_id'])->first();

            if (!$payment) {
                Log::error('Payment not found for external_id: ' . $data['external_id']);
                return response()->json(['message' => 'Payment not found'], 404);
            }

            // Update status payment sesuai callback dari Xendit
            $payment->status = strtolower($data['status']); // PAID, EXPIRED, etc

            // Jika status PAID, simpan informasi pembayaran
            if (strtoupper($data['status']) === 'PAID') {
                $payment->paid_at = isset($data['paid_at'])
                    ? \Carbon\Carbon::parse($data['paid_at'])->timezone('Asia/Jakarta')
                    : now()->timezone('Asia/Jakarta');

                // Simpan payment method dan channel jika ada
                if (isset($data['payment_method'])) {
                    $payment->payment_method = $data['payment_method'];
                }
                if (isset($data['payment_channel'])) {
                    $payment->payment_channel = $data['payment_channel'];
                }
                if (isset($data['payment_destination'])) {
                    $payment->payment_destination = $data['payment_destination'];
                }

                $payment->save();

                // ── Buat Enrollment otomatis ────────────────────────────────
                $this->createEnrollmentFromPayment($payment);

            } else {
                $payment->save();
            }

            Log::info('Payment updated successfully:', $payment->toArray());

            return response()->json(['message' => 'Callback processed successfully'], 200);

        } catch (\Exception $e) {
            Log::error('Callback Error: ' . $e->getMessage());
            return response()->json(['message' => 'Error processing callback'], 500);
        }
    }

    /**
     * Buat Enrollment dari Payment yang sudah PAID.
     * Dipanggil dari callback Xendit maupun dari showSuccess (fallback).
     */
    private function createEnrollmentFromPayment(\App\Models\Payment $payment): void
    {
        // Cek sudah ada enrollment untuk payment ini (unique constraint)
        if (\App\Models\Enrollment::where('payment_id', $payment->id)->exists()) {
            Log::info('[Enrollment] Already exists for payment_id=' . $payment->id);
            return;
        }

        // Cari user — dari payment.user_id atau match by email
        $userId = $payment->user_id;
        if (!$userId) {
            $user = \App\Models\User::where('email', $payment->email)->first();
            $userId = $user?->id;
        }

        if (!$userId) {
            Log::warning('[Enrollment] Cannot create: no user found for payment_id=' . $payment->id . ' email=' . $payment->email);
            return;
        }

        // Cari product — dari payment.product_id atau match by product_name
        $productId = $payment->product_id;
        if (!$productId && $payment->product_name) {
            $product = \App\Models\Product::where('name', $payment->product_name)->first();
            $productId = $product?->id;
        }

        if (!$productId) {
            Log::warning('[Enrollment] Cannot create: no product found for payment_id=' . $payment->id . ' product_name=' . $payment->product_name);
            return;
        }

        // Hitung expires_at berdasarkan duration_type produk
        $product = $payment->product_id
            ? \App\Models\Product::find($productId)
            : (\App\Models\Product::find($productId));

        $startedAt  = $payment->paid_at ?? now();
        $expiresAt  = null;

        if ($product) {
            $durationType = $product->duration_type instanceof \App\Enums\DurationTypeEnum
                ? $product->duration_type->value
                : $product->duration_type;

            if ($durationType && $durationType !== 'lifetime' && is_numeric($durationType)) {
                $expiresAt = $startedAt->copy()->addMonths((int)$durationType);
            }
        }

        \App\Models\Enrollment::create([
            'user_id'    => $userId,
            'payment_id' => $payment->id,
            'product_id' => $productId,
            'status'     => 'active',
            'started_at' => $startedAt->toDateString(),
            'expires_at' => $expiresAt?->toDateString(),
        ]);

        Log::info('[Enrollment] Created for user_id=' . $userId . ' product_id=' . $productId . ' payment_id=' . $payment->id);
    }

    /**
     * Cek status payment dari database
     * Cepat, tidak hit Xendit API
     */
    public function checkStatus($external_id)
    {
        $payment = Payment::where('external_id', $external_id)->first();

        if (!$payment) {
            return response()->json([
                'success' => false,
                'message' => 'Payment not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'external_id' => $payment->external_id,
                'given_names' => $payment->given_names,
                'surname' => $payment->surname,
                'email' => $payment->email,
                'mobile_number' => $payment->mobile_number,
                'product_name' => $payment->product_name,
                'quantity' => $payment->quantity,
                'amount' => $payment->amount,
                'currency' => $payment->currency,
                'status' => $payment->status,
                'invoice_url' => $payment->invoice_url,
                'payment_method' => $payment->payment_method,
                'payment_channel' => $payment->payment_channel,
                'paid_at' => $payment->paid_at,
                'created_at' => $payment->created_at,
            ]
        ]);
    }

    /**
     * Sync status dari Xendit (force update)
     * Hit Xendit API untuk mendapatkan status terkini
     */
    public function syncStatus($external_id)
    {
        $payment = Payment::where('external_id', $external_id)->first();

        if (!$payment) {
            return response()->json([
                'success' => false,
                'message' => 'Payment not found'
            ], 404);
        }

        try {
            // Gunakan HTTP Client Laravel untuk hit Xendit API
            $response = \Illuminate\Support\Facades\Http::withHeaders([
                'Authorization' => 'Basic ' . base64_encode(env('XENDIT_SECRET_KEY') . ':'),
            ])->get("https://api.xendit.co/v2/invoices", [
                'external_id' => $external_id
            ]);

            if (!$response->successful()) {
                Log::error('Xendit API Error:', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Failed to connect to Xendit API'
                ], 500);
            }

            $invoices = $response->json();

            if (empty($invoices)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invoice not found in Xendit'
                ], 404);
            }

            $invoice = $invoices[0];

            Log::info('Xendit Invoice Data:', $invoice);

            $oldStatus = $payment->status;
            $newStatus = strtolower($invoice['status']);

            $payment->status = $newStatus;

            // Update payment details jika status PAID
            if (strtoupper($invoice['status']) === 'PAID' && !$payment->paid_at) {
                $payment->paid_at = isset($invoice['paid_at'])
                    ? \Carbon\Carbon::parse($invoice['paid_at'])
                    : now();

                if (isset($invoice['payment_method'])) {
                    $payment->payment_method = $invoice['payment_method'];
                }
                if (isset($invoice['payment_channel'])) {
                    $payment->payment_channel = $invoice['payment_channel'];
                }
                if (isset($invoice['payment_destination'])) {
                    $payment->payment_destination = $invoice['payment_destination'];
                }
            }

            $payment->save();

            return response()->json([
                'success' => true,
                'message' => 'Status synced successfully',
                'data' => [
                    'external_id' => $payment->external_id,
                    'old_status' => $oldStatus,
                    'new_status' => $payment->status,
                    'amount' => $payment->amount,
                    'paid_at' => $payment->paid_at,
                    'payment_method' => $payment->payment_method,
                    'payment_channel' => $payment->payment_channel,
                    'xendit_data' => [
                        'invoice_url' => $invoice['invoice_url'] ?? null,
                        'expiry_date' => $invoice['expiry_date'] ?? null,
                        'status' => $invoice['status'] ?? null,
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Sync Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Menampilkan halaman payment success
     */
    public function showSuccess(Request $request)
    {
        $externalId = $request->query('external_id');

        if (!$externalId) {
            return view('payment-success');
        }

        $payment = Payment::where('external_id', $externalId)->first();

        if (!$payment) {
            return redirect('/')->with('error', 'Data pembayaran tidak ditemukan');
        }

        // ── CEK WAJIB SURVEI ──
        $alreadyAnswered = \App\Models\SurveyResponse::where('payment_id', $payment->id)->exists();
        if (!$alreadyAnswered) {
            return redirect()->route('survey.show', ['external_id' => $externalId])
                ->with('error', 'Mohon lengkapi survei singkat berikut sebelum melihat invoice.');
        }

        // ── Fallback: buat enrollment jika payment sudah PAID tapi enrollment belum ada ──
        if (in_array(strtolower($payment->status), ['paid', 'settled'])) {
            $this->createEnrollmentFromPayment($payment);
        }

        // Generate WhatsApp URL untuk konfirmasi
        $whatsappNumber = '6289647897616';

        // Gabungkan given_names dan surname untuk nama lengkap
        $fullName = trim($payment->given_names . ' ' . ($payment->surname ?? ''));

        $message = "*KONFIRMASI PEMBAYARAN BERHASIL*%0A%0A";
        $message .= "Halo MinFara, saya telah menyelesaikan pembayaran dengan detail sebagai berikut:%0A%0A";
        $message .= "📋 *Detail Pembayaran:*%0A";
        $message .= "━━━━━━━━━━━━━━━━━━━━%0A";
        $message .= "🔖 *No. Invoice:* " . $payment->external_id . "%0A";

        if ($payment->product_name) {
            $message .= "📦 *Produk:* " . urlencode($payment->product_name) . "%0A";
        }

        if ($payment->quantity && $payment->quantity > 1) {
            $message .= "🔢 *Jumlah:* " . $payment->quantity . " item%0A";
        }

        $message .= "👤 *Nama:* " . urlencode($fullName) . "%0A";
        $message .= "📧 *Email:* " . urlencode($payment->email) . "%0A";

        if ($payment->mobile_number) {
            $message .= "📱 *No. Telepon:* " . $payment->mobile_number . "%0A";
        }

        $message .= "💰 *Jumlah Bayar:* Rp " . number_format((float) $payment->amount, 0, ',', '.') . "%0A";
        $message .= "✅ *Status:* Lunas%0A";

        if ($payment->paid_at) {
            $message .= "🗓️ *Tanggal Bayar:* " . $payment->paid_at->format('d/m/Y H:i') . " WIB%0A";
        }

        $message .= "━━━━━━━━━━━━━━━━━━━━%0A%0A";
        $message .= "Mohon informasi lebih lanjut mengenai akses kursus.%0A%0A";
        $message .= "Terima kasih! 🙏";

        $whatsappUrl = "https://api.whatsapp.com/send?phone={$whatsappNumber}&text={$message}";

        return view('payment-success', compact('payment', 'whatsappUrl'));
    }

    /**
     * Menampilkan halaman payment failed
     */
    public function showFailed(Request $request)
    {
        $externalId = $request->query('external_id');

        if (!$externalId) {
            return view('payment-failed');
        }

        $payment = Payment::where('external_id', $externalId)->first();

        if (!$payment) {
            return redirect('/')->with('error', 'Data pembayaran tidak ditemukan');
        }

        return view('payment-failed', compact('payment'));
    }
}
