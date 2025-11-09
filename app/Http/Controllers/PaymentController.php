<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Configuration;
use Illuminate\Support\Str;
use Xendit\Invoice\InvoiceApi;
use App\Models\Payment;

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
                    'external_id' => $externalId
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

    // Callback handler untuk Xendit
    public function callback(Request $request)
    {
        // Verifikasi callback token
        $xenditCallbackToken = $request->header('x-callback-token');

        if ($xenditCallbackToken !== env('XENDIT_CALLBACK_TOKEN')) {
            return response()->json(['message' => 'Invalid callback token'], 401);
        }

        $externalId = $request->external_id;
        $status = $request->status;

        // Update payment status
        $payment = Payment::where('external_id', $externalId)->first();

        if ($payment) {
            $payment->status = strtolower($status);
            $payment->paid_at = $status === 'PAID' ? now() : null;
            $payment->save();

            return response()->json(['message' => 'Callback processed successfully']);
        }

        return response()->json(['message' => 'Payment not found'], 404);
    }
}
