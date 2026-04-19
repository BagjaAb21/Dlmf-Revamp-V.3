{{-- edit-profile.blade.php --}}
<x-filament-panels::page>

    @php
        $user = Auth::user()->load(['studentProfile', 'enrollments.product']);
        $profile = $user->studentProfile;
        $enrollments = $user->enrollments->sortByDesc('created_at');

        $levelLabel = $profile?->level
            ? \App\Models\StudentProfile::LEVEL_LABELS[$profile->level] ?? $profile->level
            : null;
        $scheduleLabel = $profile?->class_schedule
            ? \App\Models\StudentProfile::SCHEDULE_LABELS[$profile->class_schedule] ?? $profile->class_schedule
            : null;

        /* ── Shared style helpers ── */
        $card =
            'background:#fff;border-radius:16px;border:1px solid rgba(124,58,237,0.09);box-shadow:0 2px 12px rgba(124,58,237,0.07);overflow:hidden;';
        $sh =
            'display:flex;align-items:center;gap:0.5rem;padding:0.875rem 1.25rem;border-bottom:1px solid rgba(124,58,237,0.08);background:linear-gradient(135deg,#F9F7FF,#F3F0FF);';
        $slabel = 'font-size:0.72rem;font-weight:700;text-transform:uppercase;letter-spacing:0.07em;color:#5B21B6;';
        $infoRow = 'display:flex;align-items:flex-start;gap:0.75rem;';
        $icon =
            'width:36px;height:36px;min-width:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0;';
        $pLabel =
            'font-size:0.65rem;font-weight:700;text-transform:uppercase;letter-spacing:0.07em;color:#94A3B8;margin-bottom:0.1rem;';
        $pValue = 'font-size:0.875rem;font-weight:600;color:#111827;line-height:1.4;';
    @endphp

    {{-- ═══════════════════════════════════════════
     HEADER BANNER
═══════════════════════════════════════════ --}}
    <div
        style="
    background:linear-gradient(135deg,#3B0764 0%,#6D28D9 60%,#8B5CF6 100%);
    border-radius:18px;padding:1.6rem 2rem;
    display:flex;align-items:center;gap:1.1rem;
    box-shadow:0 10px 30px rgba(109,40,217,0.3);
    position:relative;overflow:hidden;
">
        <div
            style="position:absolute;top:-30px;right:-30px;width:150px;height:150px;background:rgba(255,255,255,0.04);border-radius:50%;pointer-events:none;">
        </div>
        <div
            style="width:50px;height:50px;min-width:50px;background:rgba(255,255,255,0.13);border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;border:1.5px solid rgba(255,255,255,0.2);position:relative;z-index:1;">
            👤</div>
        <div style="position:relative;z-index:1;">
            <h1
                style="font-family:'Poppins',sans-serif;font-size:clamp(1.1rem,3vw,1.35rem);font-weight:800;color:#fff;margin:0 0 0.2rem;line-height:1.25;">
                Edit Profil — {{ $user->name }}
            </h1>
            <p style="font-size:0.82rem;color:rgba(255,255,255,0.72);margin:0;font-weight:400;line-height:1.5;">
                Lengkapi data profilmu agar admin dapat memproses kelas dengan tepat.
            </p>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════
     PROFIL SUMMARY CARD
═══════════════════════════════════════════ --}}
    <div style="{{ $card }}">
        <div style="{{ $sh }}">
            <span>📋</span>
            <span style="{{ $slabel }}">Data Profil Saat Ini</span>
        </div>
        <div style="padding:1.25rem;display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;">

            <div style="{{ $infoRow }}">
                <div style="{{ $icon }} background:linear-gradient(135deg,#7C3AED,#A855F7);">👤</div>
                <div>
                    <div style="{{ $pLabel }}">Nama Lengkap</div>
                    <div style="{{ $pValue }}">{{ $user->name }}</div>
                </div>
            </div>

            <div style="{{ $infoRow }}">
                <div style="{{ $icon }} background:linear-gradient(135deg,#06B6D4,#22D3EE);">✉️</div>
                <div>
                    <div style="{{ $pLabel }}">Email</div>
                    <div style="{{ $pValue }} word-break:break-all;">{{ $user->email }}</div>
                </div>
            </div>

            <div style="{{ $infoRow }}">
                <div style="{{ $icon }} background:linear-gradient(135deg,#10B981,#34D399);">📱</div>
                <div>
                    <div style="{{ $pLabel }}">Nomor HP</div>
                    <div style="{{ $pValue }}">{{ $user->phone ?: '—' }}</div>
                </div>
            </div>

            <div style="{{ $infoRow }}">
                <div style="{{ $icon }} background:linear-gradient(135deg,#7C3AED,#C084FC);">🎓</div>
                <div>
                    <div style="{{ $pLabel }}">Level Bahasa Jerman</div>
                    <div style="{{ $pValue }}">{{ $levelLabel ?: '—' }}</div>
                </div>
            </div>

            <div style="{{ $infoRow }}">
                <div style="{{ $icon }} background:linear-gradient(135deg,#F59E0B,#FBBF24);">🕐</div>
                <div>
                    <div style="{{ $pLabel }}">Jadwal Kelas</div>
                    <div style="{{ $pValue }}">{{ $scheduleLabel ?: '—' }}</div>
                </div>
            </div>

            <div style="{{ $infoRow }}">
                <div style="{{ $icon }} background:linear-gradient(135deg,#EF4444,#FB7185);">📍</div>
                <div>
                    <div style="{{ $pLabel }}">Kota / Domisili</div>
                    <div style="{{ $pValue }}">
                        @if ($profile?->city)
                            {{ $profile->city }}{{ $profile->province ? ', ' . $profile->province : '' }}
                        @else
                            —
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- ═══════════════════════════════════════════
     KELAS YANG DIMILIKI
═══════════════════════════════════════════ --}}
    <div style="{{ $card }}">
        <div style="{{ $sh }} justify-content:space-between;">
            <div style="display:flex;align-items:center;gap:0.5rem;">
                <span>📚</span>
                <span style="{{ $slabel }}">Kelas yang Dimiliki</span>
                <span
                    style="background:#7C3AED;color:#fff;font-size:0.65rem;font-weight:700;padding:0.1rem 0.5rem;border-radius:9999px;">
                    {{ $enrollments->count() }}
                </span>
            </div>
            <a href="{{ \App\Filament\Student\Pages\MyClasses::getUrl() }}"
                style="font-size:0.78rem;color:#7C3AED;text-decoration:none;font-weight:600;white-space:nowrap;">
                Lihat semua &rarr;
            </a>
        </div>

        @if ($enrollments->isEmpty())
            <div style="padding:2.5rem;text-align:center;">
                <div style="font-size:2.25rem;margin-bottom:0.5rem;">📭</div>
                <p style="font-size:0.875rem;color:#64748B;margin:0 0 1rem;font-weight:500;">Belum ada kelas terdaftar.
                </p>
                <a href="/harga"
                    style="display:inline-flex;align-items:center;gap:0.4rem;background:linear-gradient(135deg,#7C3AED,#A855F7);color:#fff;text-decoration:none;padding:0.55rem 1.25rem;border-radius:10px;font-size:0.82rem;font-weight:600;">
                    🛒 Lihat Paket Kursus
                </a>
            </div>
        @else
            <div style="padding:0.875rem 1.1rem;display:flex;flex-direction:column;gap:0.625rem;">
                @foreach ($enrollments as $enr)
                    @php
                        $sc = match ($enr->status) {
                            'active' => ['#ECFDF5', '#065F46', '#10B981', '✅ Aktif'],
                            'expired' => ['#FEF2F2', '#991B1B', '#EF4444', '⛔ Berakhir'],
                            'cancelled' => ['#FFFBEB', '#92400E', '#F59E0B', '⚠️ Dibatalkan'],
                            default => ['#F9FAFB', '#374151', '#D1D5DB', $enr->status],
                        };
                    @endphp
                    <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:0.75rem;background:#F9FAFB;border:1px solid rgba(124,58,237,0.07);border-radius:12px;padding:0.875rem 1rem;transition:background 0.15s;"
                        onmouseover="this.style.background='#F5F3FF'" onmouseout="this.style.background='#F9FAFB'">
                        <div style="display:flex;align-items:center;gap:0.75rem;flex:1;min-width:0;">
                            <div
                                style="width:38px;height:38px;min-width:38px;background:linear-gradient(135deg,#7C3AED,#A855F7);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1rem;">
                                📖</div>
                            <div style="min-width:0;">
                                <div
                                    style="font-size:0.875rem;font-weight:700;color:#111827;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                                    {{ $enr->product?->name ?? '—' }}
                                </div>
                                <div style="font-size:0.72rem;color:#64748B;margin-top:0.1rem;line-height:1.4;">
                                    {{ $enr->started_at ? 'Mulai: ' . $enr->started_at->format('d M Y') : 'Belum dimulai' }}
                                    &nbsp;·&nbsp;
                                    @if ($enr->expires_at)
                                        Berakhir: {{ $enr->expires_at->format('d M Y') }}
                                    @else
                                        <span style="color:#7C3AED;font-weight:600;">Lifetime</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <span
                            style="font-size:0.7rem;font-weight:700;background:{{ $sc[0] }};color:{{ $sc[1] }};border:1px solid {{ $sc[2] }};padding:0.2rem 0.65rem;border-radius:9999px;white-space:nowrap;">
                            {{ $sc[3] }}
                        </span>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- ═══════════════════════════════════════════
     TIPS BANNER
═══════════════════════════════════════════ --}}
    <div
        style="display:flex;align-items:flex-start;gap:0.75rem;background:#F5F3FF;border:1px solid rgba(124,58,237,0.15);border-left:4px solid #7C3AED;border-radius:12px;padding:0.875rem 1.1rem;">
        <span style="font-size:1rem;line-height:1.5;flex-shrink:0;">💡</span>
        <p style="margin:0;font-size:0.82rem;font-weight:500;color:#5B21B6;line-height:1.6;">
            <strong>Tips:</strong> Isi <strong>Jadwal, Level</strong>, dan <strong>Kota</strong> — data ini digunakan
            admin untuk mengatur kelasmu.
        </p>
    </div>

    {{-- ═══════════════════════════════════════════
     FORM EDIT PROFIL
═══════════════════════════════════════════ --}}
    <x-filament-panels::form wire:submit="save">

        {{ $this->form }}

        <div
            style="display:flex;justify-content:flex-end;align-items:center;gap:0.75rem;padding-top:0.25rem;flex-wrap:wrap;">

            <a href="{{ url('/student') }}"
                style="display:inline-flex;align-items:center;gap:0.4rem;font-size:0.875rem;font-weight:500;color:#64748B;text-decoration:none;background:#fff;padding:0.6rem 1.1rem;border-radius:10px;border:1.5px solid #E5E7EB;transition:all 0.2s;"
                onmouseover="this.style.borderColor='#C4B5FD';this.style.color='#7C3AED'"
                onmouseout="this.style.borderColor='#E5E7EB';this.style.color='#64748B'">
                ← Kembali
            </a>

            <button type="submit"
                style="display:inline-flex;align-items:center;gap:0.5rem;background:linear-gradient(135deg,#7C3AED,#A855F7);color:#fff;border:none;cursor:pointer;padding:0.65rem 1.75rem;border-radius:10px;font-family:'Poppins',sans-serif;font-size:0.875rem;font-weight:600;box-shadow:0 4px 12px rgba(124,58,237,0.32);transition:all 0.2s;"
                onmouseover="this.style.transform='translateY(-1px)';this.style.boxShadow='0 8px 20px rgba(124,58,237,0.44)'"
                onmouseout="this.style.transform='';this.style.boxShadow='0 4px 12px rgba(124,58,237,0.32)'">
                💾 Simpan Perubahan
            </button>

        </div>

    </x-filament-panels::form>

</x-filament-panels::page>
