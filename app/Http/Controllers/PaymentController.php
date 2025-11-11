<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Configuration;
use Illuminate\Support\Str;
use Xendit\Invoice\InvoiceApi;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private $invoiceApi;

    public function __construct()
    {
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
        $this->invoiceApi = new InvoiceApi();
    }

    public function create(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'payer_name' => 'required|string',
            'payer_email' => 'required|email',
            'payer_phone' => 'nullable|string',
            'description' => 'required|string',
            'amount' => 'required|numeric|min:10000',
        ]);

        $externalId = (string) Str::uuid();

        $params = [
            'external_id' => $externalId,
            'payer_name' => $validated['payer_name'],
            'payer_email' => $validated['payer_email'],
            'payer_phone' => $validated['payer_phone'],
            'description' => $validated['description'],
            'amount' => $validated['amount'],
            'success_redirect_url' => url('/payment-success'),
            'failure_redirect_url' => url('/payment-failed'),
        ];

        try {
            $createInvoice = $this->invoiceApi->createInvoice($params);

            // Save to DB
            $payment = new Payment;
            $payment->status = 'pending';
            $payment->checkout_link = $createInvoice['invoice_url'];
            $payment->external_id = $externalId;
            $payment->payer_name = $validated['payer_name'];
            $payment->payer_email = $validated['payer_email'];
            $payment->payer_phone = $validated['payer_phone'];
            $payment->amount = $validated['amount'];
            $payment->save();

            return response()->json([
                'success' => true,
                'data' => [
                    'checkout_link' => $createInvoice['invoice_url'],
                    'external_id' => $externalId,
                    'pembeli' => $validated['payer_name'],
                    'email' => $validated['payer_email'],
                    'phone' => $validated['payer_phone'],
                    'status' => 'pending',
                    'amount' => $validated['amount'],
                    'description' => $validated['description'],
                    'message' => 'Invoice created successfully',
                ]
            ]);

        } catch (\Xendit\XenditSdkException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create invoice: ' . $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    public function callback(Request $request)
    {
        // Log untuk debugging
        Log::info('Xendit Callback Received:', $request->all());

        // Verifikasi callback token
        $xenditCallbackToken = $request->header('x-callback-token');

        if ($xenditCallbackToken !== env('XENDIT_CALLBACK_TOKEN')) {
            Log::error('Invalid callback token');
            return response()->json(['message' => 'Invalid callback token'], 401);
        }

        $externalId = $request->input('external_id');
        $status = $request->input('status');

        Log::info("Processing payment: {$externalId} with status: {$status}");

        // Update payment status
        $payment = Payment::where('external_id', $externalId)->first();

        if ($payment) {
            $payment->status = strtolower($status);
            $payment->paid_at = $status === 'PAID' ? now() : null;
            $payment->save();

            Log::info("Payment updated successfully: {$externalId}");
            return response()->json(['message' => 'Callback processed successfully']);
        }

        Log::error("Payment not found: {$externalId}");
        return response()->json(['message' => 'Payment not found'], 404);
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
                'payer_name' => $payment->payer_name,
                'payer_email' => $payment->payer_email,
                'payer_phone' => $payment->payer_phone,
                'amount' => $payment->amount,
                'status' => $payment->status,
                'checkout_link' => $payment->checkout_link,
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
            // Gunakan HTTP Client Laravel
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

            if (strtoupper($invoice['status']) === 'PAID' && !$payment->paid_at) {
                $payment->paid_at = isset($invoice['paid_at'])
                    ? \Carbon\Carbon::parse($invoice['paid_at'])
                    : now();
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
}
