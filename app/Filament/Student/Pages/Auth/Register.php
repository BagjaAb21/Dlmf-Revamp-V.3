<?php

namespace App\Filament\Student\Pages\Auth;

use App\Mail\OtpVerificationMail;
use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Register as BaseRegister;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Register extends BaseRegister
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getNameFormComponent(),

                // Email — override unique rule to allow unverified duplicates
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->autocomplete('email')
                    ->autofocus()
                    ->rule(function () {
                        return function (string $attribute, $value, \Closure $fail) {
                            $user = User::where('email', $value)->first();

                            // Email taken by a VERIFIED account → error
                            if ($user && $user->email_verified_at) {
                                $fail('Alamat email ini sudah terdaftar. Silakan login.');
                            }
                            // Email taken by an UNVERIFIED account → allow
                            // (handleRegistration will resend OTP instead of creating new user)
                        };
                    }),

                TextInput::make('phone')
                    ->label('Nomor HP')
                    ->tel()
                    ->maxLength(20)
                    ->placeholder('08xxxxxxxxxx'),

                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ])
            ->statePath('data');
    }

    /**
     * Handle registration:
     * - If email exists but unverified → resend OTP (do not create duplicate)
     * - Otherwise → create new user, generate OTP, send email
     */
    protected function handleRegistration(array $data): Model
    {
        // Check for existing unverified account
        $existing = User::where('email', $data['email'])
            ->whereNull('email_verified_at')
            ->first();

        if ($existing) {
            // Resend OTP to existing unverified user
            $otp = (string) random_int(100000, 999999);
            $existing->update([
                'otp_code'       => $otp,
                'otp_expires_at' => now()->addMinutes(10),
            ]);

            try {
                Mail::to($existing->email)->queue(new OtpVerificationMail($otp, $existing->name));
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error("Registration OTP Mail Error (Existing User): " . $e->getMessage());
            }

            return $existing;
        }

        // Create new user — unverified, with OTP
        $otp = (string) random_int(100000, 999999);

        /** @var User $user */
        $user = User::create([
            'name'              => $data['name'],
            'email'             => $data['email'],
            'phone'             => $data['phone'] ?? null,
            'password'          => $data['password'],
            'role'              => 'siswa',
            'email_verified_at' => null,
            'otp_code'          => $otp,
            'otp_expires_at'    => now()->addMinutes(10),
        ]);

        try {
            Mail::to($user->email)->queue(new OtpVerificationMail($otp, $user->name));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error("Registration OTP Mail Error (New User): " . $e->getMessage());
        }

        return $user;
    }

    /**
     * Override the register method to prevent auto-login
     * and redirect to OTP verification.
     */
    public function register(): ?\Filament\Http\Responses\Auth\Contracts\RegistrationResponse
    {
        try {
            $this->rateLimit(2);
        } catch (\Filament\Exceptions\RateLimitedException $exception) {
            Notification::make()
                ->title($exception->getReason())
                ->danger()
                ->send();

            return null;
        }

        $data = $this->form->getState();

        $user = $this->handleRegistration($data);

        $this->form->model($user)->saveRelationships();

        // Send event but DON'T login
        event(new \Illuminate\Auth\Events\Registered($user));

        $email = $data['email'] ?? '';

        Notification::make()
            ->success()
            ->title('Kode OTP dikirim!')
            ->body('Periksa email ' . $email . ' untuk mendapatkan kode verifikasi.')
            ->send();

        $this->redirect(
            route('filament.student.pages.verify-otp', ['email' => $email]),
            navigate: false,
        );

        return null; // Prevent default registration response
    }
}
