<?php

namespace App\Filament\Student\Pages\Auth;

use App\Mail\OtpVerificationMail;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Support\Facades\Mail;

class Login extends BaseLogin
{
    public function mount(): void
    {
        parent::mount();

        // Simpan ?product= ke session jika ada, supaya survive redirect ke OTP
        $productSlug = request()->query('product');
        if ($productSlug) {
            session(['checkout_product_slug' => $productSlug]);
        }
    }

    /**
     * Override authenticate to provide specific error messages for email and password.
     * After login, if pending checkout product exists, redirect to buy-course page.
     */
    public function authenticate(): \Filament\Http\Responses\Auth\Contracts\LoginResponse
    {
        try {
            $response = parent::authenticate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $data = $this->form->getState();
            $user = User::where('email', $data['email'])->first();

            if (! $user) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'data.email' => __('Email tidak cocok'),
                ]);
            }

            throw \Illuminate\Validation\ValidationException::withMessages([
                'data.password' => __('Password yang Anda masukkan tidak cocok.'),
            ]);
        }

        /** @var \App\Models\User|null $user */
        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user && is_null($user->email_verified_at)) {
            // Logout immediately
            \Illuminate\Support\Facades\Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();

            // Resend OTP
            $otp = (string) random_int(100000, 999999);
            $user->update([
                'otp_code'       => $otp,
                'otp_expires_at' => now()->addMinutes(10),
            ]);

            try {
                Mail::to($user->email)->queue(new OtpVerificationMail($otp, $user->name));
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Login OTP Resend Error: '.$e->getMessage());
            }

            Notification::make()
                ->warning()
                ->title('Email belum diverifikasi.')
                ->body('Kode OTP baru telah dikirim ke '.$user->email)
                ->send();

            $this->redirect(
                route('filament.student.pages.verify-otp', ['email' => $user->email])
            );
        }

        // ── Jika ada pending checkout product, redirect ke buy-course ────
        $productSlug = session()->pull('checkout_product_slug')
            ?? request()->query('product');

        if ($productSlug) {
            $this->redirect(
                route('filament.student.pages.buy-course') . '?product=' . $productSlug
            );
        }

        return $response;
    }
}
