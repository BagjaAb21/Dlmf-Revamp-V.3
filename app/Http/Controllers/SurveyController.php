<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\SurveyResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    /**
     * Tampilkan halaman survei.
     */
    public function show(Request $request)
    {
        $externalId = $request->query('external_id');
        $payment = null;

        if ($externalId) {
            $payment = Payment::where('external_id', $externalId)->first();
        }

        // Jika sudah pernah mengisi survei untuk payment ini, langsung ke success
        if ($payment) {
            $alreadyAnswered = SurveyResponse::where('payment_id', $payment->id)->exists();
            if ($alreadyAnswered) {
                return redirect()->route('payment.success', ['external_id' => $externalId]);
            }
        }

        return view('survey', compact('payment'));
    }

    /**
     * Simpan jawaban survei pasca-checkout.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'external_id'      => 'nullable|string',
            'q1_source'        => 'required|string',
            'q2_considerations'=> 'required|array|min:1|max:2',
            'q2_considerations.*' => 'string',
            'q2_other_text'    => 'nullable|string|max:255',
            'q3_interest'      => 'required|string',
            'q4_budget'        => 'required|string',
        ]);

        // Ambil payment jika ada external_id
        $payment = null;
        if (!empty($validated['external_id'])) {
            $payment = Payment::where('external_id', $validated['external_id'])->first();
        }

        // Cek sudah pernah mengisi survei untuk payment ini
        if ($payment) {
            $alreadyAnswered = SurveyResponse::where('payment_id', $payment->id)->exists();
            if ($alreadyAnswered) {
                return redirect()->route('payment.success', ['external_id' => $validated['external_id']])->with('survey_info', 'Survei sudah diisi.');
            }
        }

        SurveyResponse::create([
            'user_id'          => Auth::id() ?? ($payment?->user_id),
            'payment_id'       => $payment?->id,
            'enrollment_id'    => null,
            'q1_source'        => $validated['q1_source'],
            'q2_considerations'=> $validated['q2_considerations'],
            'q2_other_text'    => $validated['q2_other_text'] ?? null,
            'q3_interest'      => $validated['q3_interest'],
            'q4_budget'        => $validated['q4_budget'],
            'respondent_name'  => $payment ? trim($payment->given_names . ' ' . ($payment->surname ?? '')) : null,
            'respondent_email' => $payment?->email,
            'product_name'     => $payment?->product_name,
            'external_id'      => $validated['external_id'] ?? null,
        ]);

        if (!empty($validated['external_id'])) {
            return redirect()->route('payment.success', ['external_id' => $validated['external_id']])->with('survey_success', 'Terima kasih atas jawaban Anda! 🙏');
        }

        return redirect()->back()->with('survey_success', 'Terima kasih atas respon Anda! 🙏');
    }
}
