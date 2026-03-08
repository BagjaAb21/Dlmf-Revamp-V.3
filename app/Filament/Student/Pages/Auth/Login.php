<?php

namespace App\Filament\Student\Pages\Auth;

use App\Mail\OtpVerificationMail;
use App\Models\User;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class Login extends BaseLogin
{
    /**
     * After Filament authenticates successfully, check if email is verified.
     * If not → logout, resend OTP, redirect to verify page.
     */
    public function authenticate(): LoginResponse
    {
        $response = parent::authenticate();

        /** @var User|null $user */
        $user = auth()->user();

        if ($user && is_null($user->email_verified_at)) {
            // Logout immediately
            auth()->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();

            // Resend OTP
            $otp = (string) random_int(100000, 999999);
            $user->update([
                'otp_code'       => $otp,
                'otp_expires_at' => now()->addMinutes(10),
            ]);

            Mail::to($user->email)->send(new OtpVerificationMail($otp, $user->name));

            Notification::make()
                ->warning()
                ->title('Email belum diverifikasi.')
                ->body('Kode OTP baru telah dikirim ke ' . $user->email)
                ->send();

            $this->redirect(
                route('filament.student.pages.verify-otp', ['email' => $user->email])
            );
        }

        return $response;
    }
}
