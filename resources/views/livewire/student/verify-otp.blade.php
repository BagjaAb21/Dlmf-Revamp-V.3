<div class="fi-simple-layout flex min-h-screen flex-col items-center justify-center p-6">

    <div class="fi-simple-main w-full" style="max-width: 360px;">

        {{-- Logo --}}
        <div class="mb-6 flex flex-col items-center gap-4">
            <a href="{{ route('home') }}">
                <img
                    src="{{ asset('asset/img/logo/logo-Transparant2-v2.png') }}"
                    alt="Logo"
                    class="mx-auto"
                    style="height: 4rem; filter: brightness(0) invert(1);"
                />
            </a>
            <div class="text-center">
                <h1 class="fi-simple-header-heading text-xl font-extrabold tracking-tight" style="color: #7C3AED !important;">
                    Verifikasi Email
                </h1>
                <p class="fi-simple-header-subheading mt-2 text-sm">
                    Masukkan kode OTP yang dikirim ke<br>
                    <span class="font-bold" style="color: #7C3AED !important;">{{ $email }}</span>
                </p>
            </div>
        </div>

        {{-- Success flash --}}
        @if(session('success'))
            <div class="mb-4 rounded-xl border border-success-200 bg-success-50 p-4 text-sm font-medium text-success-700 dark:border-success-800 dark:bg-success-900/30 dark:text-success-400">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- Notice (resend confirmation) --}}
        @if($notice)
            <div class="mb-4 rounded-xl border border-primary-200 bg-primary-50 p-4 text-sm font-medium text-primary-700 dark:border-primary-800 dark:bg-primary-900/30 dark:text-primary-400"
                 style="border-color: rgba(124,58,237,0.2); background: rgba(124,58,237,0.05); color: #7C3AED;">
                📨 {{ $notice }}
            </div>
        @endif

        {{-- OTP Form --}}
        <form wire:submit.prevent="verify" class="space-y-6">

            <div class="space-y-2">
                <label for="otp" class="fi-fo-field-wrp-label text-xs font-semibold uppercase tracking-wider text-gray-500">
                    Kode OTP 6 Digit
                </label>
                <input
                    id="otp"
                    type="text"
                    wire:model="otp"
                    inputmode="numeric"
                    pattern="[0-9]*"
                    maxlength="6"
                    autocomplete="one-time-code"
                    placeholder="______"
                    autofocus
                    class="block w-full border-2 border-gray-100 bg-gray-50 text-center font-mono text-3xl font-bold tracking-[0.4em] transition-all focus:border-primary-600 focus:bg-white focus:ring-primary-600 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:focus:border-primary-500"
                    style="padding: 0.75rem; border-radius: 12px;"
                />
                @error('otp')
                    <p class="mt-2 text-xs font-semibold text-danger-600 dark:text-danger-400">
                        ⚠️ {{ $message }}
                    </p>
                @enderror
            </div>

            <button
                type="submit"
                class="fi-btn fi-btn-color-primary w-full py-3 text-base font-bold text-white shadow-lg transition-all hover:-translate-y-0.5"
                style="background: linear-gradient(135deg, #7C3AED, #A855F7); border-radius: 12px; box-shadow: 0 4px 15px rgba(124,58,237,0.3);"
            >
                <span wire:loading.remove>Verifikasi Sekarang</span>
                <span wire:loading>Memverifikasi...</span>
            </button>
        </form>

        {{-- Actions --}}
        <div class="mt-6 flex flex-col items-center gap-3">
            <button
                wire:click="resend"
                type="button"
                class="text-sm font-bold hover:underline"
                style="color: #7C3AED !important;"
            >
                Kirim Ulang Kode OTP
            </button>
            <a
                href="{{ route('filament.student.auth.login') }}"
                class="text-xs font-medium text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-400"
            >
                ← Kembali ke Login
            </a>
        </div>

        {{-- Footer Info --}}
        <div class="mt-8 rounded-xl border p-4 text-[0.7rem] leading-relaxed"
             style="background: rgba(124,58,237,0.03); border-color: rgba(124,58,237,0.1); color: #6D28D9;">
            <p>
                ⏱ Kode berlaku <strong>10 menit</strong>.
                Cek folder <strong>Spam</strong> jika tidak ada di Inbox.
            </p>
        </div>




    </div>
</div>
