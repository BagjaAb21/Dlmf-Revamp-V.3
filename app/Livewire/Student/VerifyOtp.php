<?php

namespace App\Livewire\Student;

use App\Mail\OtpVerificationMail;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Mail;

/**
 * OTP Verification page — plain Livewire component (no Filament auth middleware).
 * Accessible by any guest via /student/verify-otp?email=xxx
 */
#[Layout('filament-panels::components.layout.simple')]
class VerifyOtp extends Component
{
    public string $email  = '';
    public string $otp    = '';
    public string $notice = '';

    public function mount(): void
    {
        // Already logged in → go home
        if (auth()->check()) {
            $this->redirectRoute('filament.student.pages.dashboard');
            return;
        }

        $this->email = request()->query('email', '');

        if (! $this->email) {
            $this->redirectRoute('filament.student.auth.login');
        }
    }

    public function verify(): void
    {
        $this->validate([
            'otp' => ['required', 'digits:6'],
        ], [
            'otp.required' => 'Kode OTP wajib diisi.',
            'otp.digits'   => 'Kode OTP harus 6 digit angka.',
        ]);

        /** @var User|null $user */
        $user = User::where('email', $this->email)
            ->whereNull('email_verified_at')
            ->first();

        if (! $user) {
            $this->addError('otp', 'Akun tidak ditemukan atau sudah terverifikasi.');
            return;
        }

        if ($user->otp_expires_at && now()->isAfter($user->otp_expires_at)) {
            $this->addError('otp', 'Kode OTP sudah kedaluwarsa. Klik "Kirim Ulang" untuk mendapatkan kode baru.');
            return;
        }

        if ($user->otp_code !== $this->otp) {
            $this->addError('otp', 'Kode OTP tidak valid. Periksa kembali email Anda.');
            return;
        }

        // ✅ Success — mark verified
        $user->update([
            'email_verified_at' => now(),
            'otp_code'          => null,
            'otp_expires_at'    => null,
        ]);

        session()->flash('success', 'Email berhasil diverifikasi! Silakan login.');
        $this->redirect(route('filament.student.auth.login'));
    }

    public function resend(): void
    {
        /** @var User|null $user */
        $user = User::where('email', $this->email)
            ->whereNull('email_verified_at')
            ->first();

        if (! $user) {
            $this->notice = 'Akun tidak ditemukan.';
            return;
        }

        $otp = (string) random_int(100000, 999999);
        $user->update([
            'otp_code'       => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        Mail::to($user->email)->send(new OtpVerificationMail($otp, $user->name));

        $this->notice = 'Kode OTP baru sudah dikirim ke ' . $user->email;
        $this->otp    = '';
    }

    public function render()
    {
        return view('livewire.student.verify-otp')
            ->title('Verifikasi Email — DlmF');
    }
}
