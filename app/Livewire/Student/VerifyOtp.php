<?php

namespace App\Livewire\Student;

use App\Mail\OtpVerificationMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Component;

/**
 * OTP Verification page — plain Livewire component (no Filament auth middleware).
 * Accessible by any guest via /student/verify-otp?email=xxx
 */
#[Layout('filament-panels::components.layout.simple')]
class VerifyOtp extends Component
{
    public string $email = '';

    public string $otp = '';

    public string $notice = '';

    public function mount(): void
    {
        // Already logged in → go home
        if (\Illuminate\Support\Facades\Auth::check()) {
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
            'otp.digits' => 'Kode OTP harus 6 digit angka.',
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

        // ✅ Success — mark verified + auto-login
        $user->update([
            'email_verified_at' => now(),
            'otp_code'          => null,
            'otp_expires_at'    => null,
        ]);

        // Auto-login the user
        \Illuminate\Support\Facades\Auth::login($user);

        // ── Redirect: ke checkout jika ada pending product, else dashboard ─
        $productSlug = session()->pull('checkout_product_slug');

        if ($productSlug) {
            $this->redirect(
                route('filament.student.pages.buy-course') . '?product=' . $productSlug
            );
        } else {
            session()->flash('success', 'Email berhasil diverifikasi! Selamat datang! 🎉');
            $this->redirectRoute('filament.student.pages.dashboard');
        }
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
            'otp_code' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        try {
            Mail::to($user->email)->queue(new OtpVerificationMail($otp, $user->name));
            $this->notice = 'Kode OTP baru sudah dikirim ke '.$user->email;
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('OTP Resend Error: '.$e->getMessage());
            $this->notice = 'Gagal mengirim email. Silakan hubungi admin untuk dilakukan pengecekan sistem';
        }

        $this->otp = '';
    }

    public function render()
    {
        /** @var \Livewire\Features\SupportPageComponents\ContentRenderer $view */
        $view = view('livewire.student.verify-otp');

        return $view->title('Verifikasi Email — DlmF');
    }
}
