{{-- dashboard.blade.php --}}
<x-filament-panels::page>

    @php
        /* Resolve labels from getViewData() passed vars */
        $levelLabel = $profile?->level
            ? \App\Models\StudentProfile::LEVEL_LABELS[$profile->level] ?? $profile->level
            : null;
        $scheduleLabel = $profile?->class_schedule
            ? \App\Models\StudentProfile::SCHEDULE_LABELS[$profile->class_schedule] ?? $profile->class_schedule
            : null;
        $activeCount = $user->enrollments->where('status', 'active')->count();
        $totalCount = $user->enrollments->count();

        /* ---------- reusable inline style helpers ---------- */
        $card =
            'background:#fff;border-radius:16px;border:1px solid rgba(124,58,237,0.09);box-shadow:0 2px 12px rgba(124,58,237,0.07);overflow:hidden;';
        $sectionHead =
            'display:flex;align-items:center;gap:0.5rem;padding:0.875rem 1.25rem;border-bottom:1px solid rgba(124,58,237,0.08);background:linear-gradient(135deg,#F9F7FF,#F3F0FF);';
        $sectionLabel =
            'font-size:0.75rem;font-weight:700;text-transform:uppercase;letter-spacing:0.07em;color:#5B21B6;';
    @endphp

    {{-- ═══════════════════════════════════════════
     HERO BANNER
═══════════════════════════════════════════ --}}
    <div
        style="
    background:linear-gradient(135deg,#3B0764 0%,#6D28D9 55%,#A855F7 100%);
    border-radius:20px;
    padding:1.75rem 2rem;
    position:relative;overflow:hidden;
    box-shadow:0 12px 36px rgba(109,40,217,0.32);
">
        {{-- Dekorasi --}}
        <div
            style="position:absolute;top:-60px;right:-60px;width:220px;height:220px;background:rgba(255,255,255,0.05);border-radius:50%;pointer-events:none;">
        </div>
        <div
            style="position:absolute;bottom:-40px;right:80px;width:130px;height:130px;background:rgba(255,255,255,0.04);border-radius:50%;pointer-events:none;">
        </div>

        <div
            style="position:relative;z-index:1;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;">
            <div>
                <span
                    style="display:inline-block;background:rgba(255,255,255,0.12);color:#FDE047;font-size:0.65rem;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;padding:0.2rem 0.75rem;border-radius:9999px;border:1px solid rgba(253,224,71,0.25);margin-bottom:0.6rem;">
                    🇩🇪 Student Portal - DlmF
                </span>
                <h1
                    style="font-family:'Poppins',sans-serif;font-size:clamp(1.25rem,3vw,1.65rem);font-weight:800;color:#fff;margin:0 0 0.3rem;line-height:1.25;">
                    Hallo, <span style="color:#FDE047;">{{ $user->name }}</span>! 👋
                </h1>
                <p style="font-size:0.875rem;color:rgba(255,255,255,0.78);margin:0;font-weight:400;line-height:1.5;">
                    Selamat datang di portal belajarmu. Semangat belajar Bahasa Jerman!
                </p>
            </div>

            <div style="display:flex;gap:0.65rem;flex-wrap:wrap;align-items:center;">
                <a href="{{ \App\Filament\Student\Pages\MyClasses::getUrl() }}"
                    style="display:inline-flex;align-items:center;gap:0.4rem;background:rgba(255,255,255,0.13);color:#fff;border:1.5px solid rgba(255,255,255,0.28);padding:0.55rem 1.1rem;border-radius:10px;font-size:0.82rem;font-weight:600;text-decoration:none;transition:background 0.2s;"
                    onmouseover="this.style.background='rgba(255,255,255,0.22)'"
                    onmouseout="this.style.background='rgba(255,255,255,0.13)'">
                    📚 Kelas Saya
                </a>
                <a href="{{ \App\Filament\Student\Pages\EditProfile::getUrl() }}"
                    style="display:inline-flex;align-items:center;gap:0.4rem;background:#FDE047;color:#4C1D95;border:none;padding:0.55rem 1.1rem;border-radius:10px;font-size:0.82rem;font-weight:700;text-decoration:none;transition:all 0.2s;"
                    onmouseover="this.style.transform='translateY(-1px)';this.style.boxShadow='0 5px 15px rgba(253,224,71,0.5)'"
                    onmouseout="this.style.transform='';this.style.boxShadow=''">
                    ✏️ Edit Profil
                </a>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════
     ALERT: PROFIL BELUM LENGKAP
═══════════════════════════════════════════ --}}
    @if (!$isProfileComplete)
        <div
            style="display:flex;align-items:flex-start;gap:0.875rem;background:#FFFBEB;border:1.5px solid #F59E0B;border-left-width:4px;border-radius:14px;padding:1rem 1.25rem;box-shadow:0 2px 12px rgba(245,158,11,0.1);">
            <div
                style="width:34px;height:34px;min-width:34px;border-radius:50%;background:#F59E0B;display:flex;align-items:center;justify-content:center;font-size:0.9rem;">
                ⚠️</div>
            <div>
                <p style="font-weight:700;font-size:0.875rem;color:#92400E;margin:0 0 0.2rem;line-height:1.4;">
                    Profil kamu belum lengkap
                </p>
                <p style="font-size:0.8rem;color:#78350F;margin:0 0 0.5rem;line-height:1.5;">
                    Isi <strong>Level, Jadwal</strong>, dan <strong>Kota</strong> agar admin dapat memproses kelasmu
                    lebih cepat.
                </p>
                <a href="{{ \App\Filament\Student\Pages\EditProfile::getUrl() }}"
                    style="display:inline-flex;align-items:center;gap:0.3rem;font-size:0.8rem;font-weight:700;color:#7C3AED;text-decoration:none;background:rgba(124,58,237,0.07);padding:0.3rem 0.75rem;border-radius:8px;border:1px solid rgba(124,58,237,0.18);transition:background 0.2s;"
                    onmouseover="this.style.background='rgba(124,58,237,0.14)'"
                    onmouseout="this.style.background='rgba(124,58,237,0.07)'">
                    Lengkapi Sekarang &rarr;
                </a>
            </div>
        </div>
    @endif

    {{-- ═══════════════════════════════════════════
     STAT CARDS — 4 kolom (responsive)
═══════════════════════════════════════════ --}}
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:1rem;">

        {{-- Level --}}
        <div style="{{ $card }} transition:transform 0.2s,box-shadow 0.2s;"
            onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 10px 28px rgba(124,58,237,0.14)'"
            onmouseout="this.style.transform='';this.style.boxShadow='0 2px 12px rgba(124,58,237,0.07)'">
            <div style="width:100%;height:3px;background:linear-gradient(90deg,#7C3AED,#A855F7);"></div>
            <div style="padding:1rem 1.1rem;">
                <div style="font-size:1.5rem;line-height:1;margin-bottom:0.5rem;">🎓</div>
                <div
                    style="font-size:0.65rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:#64748B;margin-bottom:0.2rem;">
                    Level Saya</div>
                <div style="font-size:1.25rem;font-weight:800;color:#5B21B6;line-height:1.25;">
                    {{ $levelLabel ?? '—' }}
                </div>
                <div style="font-size:0.72rem;color:#94A3B8;margin-top:0.15rem;">Level bahasa Jerman</div>
            </div>
        </div>

        {{-- Jadwal --}}
        <div style="{{ $card }} transition:transform 0.2s,box-shadow 0.2s;"
            onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 10px 28px rgba(16,185,129,0.14)'"
            onmouseout="this.style.transform='';this.style.boxShadow='0 2px 12px rgba(124,58,237,0.07)'">
            <div style="width:100%;height:3px;background:linear-gradient(90deg,#10B981,#34D399);"></div>
            <div style="padding:1rem 1.1rem;">
                <div style="font-size:1.5rem;line-height:1;margin-bottom:0.5rem;">🕐</div>
                <div
                    style="font-size:0.65rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:#64748B;margin-bottom:0.2rem;">
                    Jadwal Kelas</div>
                <div style="font-size:1rem;font-weight:800;color:#065F46;line-height:1.35;">
                    {{ $scheduleLabel ?? '—' }}
                </div>
                <div style="font-size:0.72rem;color:#94A3B8;margin-top:0.15rem;">Jadwal sesi kelas</div>
            </div>
        </div>

        {{-- Kelas Aktif --}}
        <div style="{{ $card }} transition:transform 0.2s,box-shadow 0.2s;"
            onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 10px 28px rgba(245,158,11,0.14)'"
            onmouseout="this.style.transform='';this.style.boxShadow='0 2px 12px rgba(124,58,237,0.07)'">
            <div style="width:100%;height:3px;background:linear-gradient(90deg,#F59E0B,#FBBF24);"></div>
            <div style="padding:1rem 1.1rem;">
                <div style="font-size:1.5rem;line-height:1;margin-bottom:0.5rem;">📖</div>
                <div
                    style="font-size:0.65rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:#64748B;margin-bottom:0.2rem;">
                    Kelas Aktif</div>
                <div style="font-size:1.25rem;font-weight:800;color:#B45309;line-height:1.25;">
                    {{ $activeCount }} <span style="font-size:0.8rem;font-weight:500;">kelas</span>
                </div>
                <div style="font-size:0.72rem;color:#94A3B8;margin-top:0.15rem;">dari {{ $totalCount }} terdaftar
                </div>
            </div>
        </div>

        {{-- Status Profil --}}
        <div style="{{ $card }} transition:transform 0.2s,box-shadow 0.2s;"
            onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 10px 28px rgba(6,182,212,0.14)'"
            onmouseout="this.style.transform='';this.style.boxShadow='0 2px 12px rgba(124,58,237,0.07)'">
            <div style="width:100%;height:3px;background:linear-gradient(90deg,#06B6D4,#22D3EE);"></div>
            <div style="padding:1rem 1.1rem;">
                <div style="font-size:1.5rem;line-height:1;margin-bottom:0.5rem;">👤</div>
                <div
                    style="font-size:0.65rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:#64748B;margin-bottom:0.2rem;">
                    Status Profil</div>
                @if ($isProfileComplete)
                    <div style="font-size:0.9rem;font-weight:800;color:#065F46;line-height:1.35;">✅ Lengkap</div>
                    <div style="font-size:0.72rem;color:#94A3B8;margin-top:0.15rem;">Profil sudah terisi</div>
                @else
                    <div style="font-size:0.9rem;font-weight:800;color:#DC2626;line-height:1.35;">⚠️ Belum Lengkap</div>
                    <a href="{{ \App\Filament\Student\Pages\EditProfile::getUrl() }}"
                        style="font-size:0.72rem;color:#7C3AED;text-decoration:none;font-weight:600;display:inline-block;margin-top:0.15rem;">
                        Lengkapi &rarr;
                    </a>
                @endif
            </div>
        </div>

    </div>

    {{-- ═══════════════════════════════════════════
     KELAS TERBARU — preview ringkas
═══════════════════════════════════════════ --}}
    @php
        $recentEnrollments = $user->enrollments->load('product')->sortByDesc('created_at')->take(3);
    @endphp

    <div
        style="background:#fff;border-radius:16px;border:1px solid rgba(124,58,237,0.09);box-shadow:0 2px 12px rgba(124,58,237,0.07);overflow:hidden;">

        {{-- Header --}}
        <div
            style="display:flex;align-items:center;justify-content:space-between;padding:0.875rem 1.25rem;border-bottom:1px solid rgba(124,58,237,0.08);background:linear-gradient(135deg,#F9F7FF,#F3F0FF);">
            <div style="display:flex;align-items:center;gap:0.5rem;">
                <span>📚</span>
                <span
                    style="font-size:0.75rem;font-weight:700;text-transform:uppercase;letter-spacing:0.07em;color:#5B21B6;">Kelas
                    Terbaru</span>
                @if ($totalCount > 0)
                    <span
                        style="background:#7C3AED;color:#fff;font-size:0.65rem;font-weight:700;padding:0.1rem 0.5rem;border-radius:9999px;">{{ $totalCount }}</span>
                @endif
            </div>
            <a href="{{ \App\Filament\Student\Pages\MyClasses::getUrl() }}"
                style="font-size:0.78rem;color:#7C3AED;text-decoration:none;font-weight:600;white-space:nowrap;">
                Lihat Semua &rarr;
            </a>
        </div>

        {{-- List --}}
        @if ($recentEnrollments->isEmpty())
            <div style="padding:2.5rem;text-align:center;">
                <div style="font-size:2rem;margin-bottom:0.5rem;">📭</div>
                <p style="font-size:0.875rem;color:#64748B;margin:0 0 1rem;font-weight:500;">Belum ada kelas terdaftar.
                </p>
                <a href="{{ \App\Filament\Student\Pages\KatalogKursus::getUrl() }}"
                    style="display:inline-flex;align-items:center;gap:0.4rem;background:linear-gradient(135deg,#7C3AED,#A855F7);color:#fff;text-decoration:none;padding:0.5rem 1.1rem;border-radius:10px;font-size:0.82rem;font-weight:600;">
                    🛒 Lihat Katalog Kursus
                </a>
            </div>
        @else
            <div style="padding:0.875rem 1.1rem;display:flex;flex-direction:column;gap:0.625rem;">
                @foreach ($recentEnrollments as $enr)
                    @php
                        $sc = match ($enr->status) {
                            'active' => ['#ECFDF5', '#065F46', '#10B981', '✅ Aktif'],
                            'expired' => ['#FEF2F2', '#991B1B', '#EF4444', '⛔ Berakhir'],
                            'cancelled' => ['#FFFBEB', '#92400E', '#F59E0B', '⚠️ Dibatalkan'],
                            default => ['#F9FAFB', '#374151', '#D1D5DB', ucfirst($enr->status)],
                        };
                    @endphp
                    <div style="display:flex;align-items:center;justify-content:space-between;gap:0.75rem;background:#F9FAFB;border:1px solid rgba(124,58,237,0.07);border-radius:12px;padding:0.75rem 1rem;transition:background 0.15s;"
                        onmouseover="this.style.background='#F5F3FF'" onmouseout="this.style.background='#F9FAFB'">
                        <div style="display:flex;align-items:center;gap:0.75rem;min-width:0;flex:1;">
                            <div
                                style="width:36px;height:36px;min-width:36px;background:linear-gradient(135deg,#7C3AED,#A855F7);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:0.9rem;">
                                📖</div>
                            <div style="min-width:0;">
                                <div
                                    style="font-size:0.875rem;font-weight:700;color:#111827;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                    {{ $enr->product?->name ?? '—' }}
                                </div>
                                <div style="font-size:0.72rem;color:#94A3B8;margin-top:0.1rem;">
                                    {{ $enr->started_at ? $enr->started_at->format('d M Y') : 'Belum mulai' }}
                                </div>
                            </div>
                        </div>
                        <span
                            style="font-size:0.7rem;font-weight:700;background:{{ $sc[0] }};color:{{ $sc[1] }};border:1px solid {{ $sc[2] }};padding:0.2rem 0.6rem;border-radius:9999px;white-space:nowrap;flex-shrink:0;">
                            {{ $sc[3] }}
                        </span>
                    </div>
                @endforeach

                @if ($totalCount > 3)
                    <a href="{{ \App\Filament\Student\Pages\MyClasses::getUrl() }}"
                        style="display:flex;align-items:center;justify-content:center;gap:0.4rem;padding:0.6rem;border-radius:10px;border:1.5px dashed rgba(124,58,237,0.25);color:#7C3AED;font-size:0.8rem;font-weight:600;text-decoration:none;transition:all 0.2s;"
                        onmouseover="this.style.background='#F5F3FF';this.style.borderColor='rgba(124,58,237,0.45)'"
                        onmouseout="this.style.background='';this.style.borderColor='rgba(124,58,237,0.25)'">
                        + {{ $totalCount - 3 }} kelas lainnya — Lihat Semua
                    </a>
                @endif
            </div>
        @endif

    </div>

</x-filament-panels::page>
