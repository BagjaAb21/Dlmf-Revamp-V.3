<x-filament-panels::page.simple>

    {{-- Header --}}
    <div style="text-align:center;margin-bottom:1.5rem;">
        <div style="
            display:inline-flex;align-items:center;justify-content:center;
            width:60px;height:60px;border-radius:16px;margin-bottom:1rem;
            background:linear-gradient(135deg,#7C3AED,#A855F7);
            box-shadow:0 6px 20px rgba(124,58,237,0.35);
        ">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.64A2 2 0 012 .18h3c.52 0 .97.36 1.05.87.12.82.36 1.63.68 2.4a2 2 0 01-.45 2.11L5.09 6.8A16 16 0 0017.2 18.91l1.24-1.2a2 2 0 012.11-.45c.77.32 1.58.56 2.4.68.52.09.88.54.88 1.06v-.08z"/>
            </svg>
        </div>
        <h2 style="margin:0 0 0.35rem;font-size:1.3rem;font-weight:800;color:#5B21B6;">Verifikasi Email</h2>
        <p style="margin:0;font-size:0.82rem;color:#6B7280;line-height:1.5;">
            Kode OTP 6 digit telah dikirim ke<br>
            <strong style="color:#7C3AED;">{{ $email }}</strong>
        </p>
    </div>

    {{-- Form --}}
    <x-filament-panels::form wire:submit="verify">
        {{ $this->form }}

        <x-filament::button
            type="submit"
            size="lg"
            style="width:100%;background:linear-gradient(135deg,#7C3AED,#A855F7);font-size:0.95rem;font-weight:700;letter-spacing:0.01em;"
        >
            ✅ Verifikasi Sekarang
        </x-filament::button>
    </x-filament-panels::form>

    {{-- Resend + back to login --}}
    <div style="margin-top:1.25rem;text-align:center;display:flex;flex-direction:column;gap:0.6rem;">
        <button
            wire:click="resend"
            type="button"
            style="background:none;border:none;font-size:0.82rem;color:#7C3AED;font-weight:600;cursor:pointer;text-decoration:underline;padding:0;"
        >
            📨 Kirim Ulang Kode OTP
        </button>

        <a href="{{ filament()->getLoginUrl() }}"
           style="font-size:0.78rem;color:#9CA3AF;text-decoration:none;">
            ← Kembali ke Login
        </a>
    </div>

    {{-- Info box --}}
    <div style="margin-top:1.25rem;background:#FFF7ED;border:1px solid #FED7AA;border-left:3px solid #F97316;border-radius:10px;padding:0.75rem 1rem;">
        <p style="margin:0;font-size:0.78rem;color:#92400E;line-height:1.55;">
            ⏱ Kode berlaku <strong>10 menit</strong>. Cek folder <strong>Spam</strong> jika email tidak masuk.
        </p>
    </div>

</x-filament-panels::page.simple>
