<div>
    <x-filament-panels::page>
        <div>
            @php
                /* $categories, $ownedProductIds passed from KatalogKursus::getViewData() */
                $user = auth()->user();
            @endphp

            {{-- ── HEADER HERO ──────────────────────────────────────────────────── --}}
            <div
                style="background:linear-gradient(135deg,#1E0A3C 0%,#4C1D95 50%,#7C3AED 100%);border-radius:20px;padding:2rem 2.25rem;color:#fff;position:relative;overflow:hidden;margin-bottom:1.75rem;box-shadow:0 12px 36px rgba(124,58,237,0.3);">
                <div
                    style="position:absolute;top:-50px;right:-50px;width:220px;height:220px;background:rgba(255,255,255,0.04);border-radius:50%;">
                </div>
                <div
                    style="position:absolute;bottom:-30px;left:20%;width:140px;height:140px;background:rgba(253,224,71,0.06);border-radius:50%;">
                </div>
                <div style="position:relative;z-index:1;">
                    <div
                        style="font-size:0.68rem;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:#FDE047;margin-bottom:0.5rem;">
                        🛍️ Katalog Program</div>
                    <h1 style="font-size:clamp(1.3rem,3vw,1.8rem);font-weight:900;margin:0 0 0.5rem;line-height:1.2;">
                        Temukan Kursus Bahasa Jerman<br>
                        <span
                            style="background:linear-gradient(90deg,#FDE047,#FCD34D);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Impianmu
                            di Sini</span>
                    </h1>
                    <p style="font-size:0.875rem;opacity:0.82;margin:0;max-width:480px;">
                        Pilih program yang sesuai dengan level & tujuanmu. Beli langsung tanpa keluar dari panel ini!
                    </p>
                </div>
            </div>

            @if ($categories->isEmpty())
                <div
                    style="text-align:center;padding:3rem;background:#fff;border-radius:18px;box-shadow:0 2px 15px rgba(124,58,237,0.07);">
                    <div style="font-size:2.5rem;margin-bottom:0.75rem;">📭</div>
                    <p style="color:#64748B;font-size:0.9rem;">Belum ada program yang tersedia saat ini.</p>
                </div>
            @else
                {{-- ── CATEGORY TABS ────────────────────────────────────────────────── --}}
                <div style="display:flex;gap:0.75rem;flex-wrap:wrap;margin-bottom:1.5rem;" id="katalogTabs">
                    @foreach ($categories as $idx => $cat)
                        <button onclick="switchKatalogTab('{{ $cat->slug }}')" id="tab-{{ $cat->slug }}"
                            style="padding:0.55rem 1.25rem;border-radius:9999px;border:2px solid {{ $idx === 0 ? '#7C3AED' : '#e8e8f0' }};background:{{ $idx === 0 ? 'linear-gradient(135deg,#7C3AED,#A855F7)' : '#fff' }};color:{{ $idx === 0 ? '#fff' : '#374151' }};font-size:0.82rem;font-weight:700;cursor:pointer;transition:all 0.2s;display:flex;align-items:center;gap:0.4rem;">
                            <span>{{ $cat->icon ? '📂' : '📚' }}</span> {{ $cat->name }}
                        </button>
                    @endforeach
                </div>

                {{-- ── PRODUCT GRIDS (one per category) ───────────────────────────── --}}
                @foreach ($categories as $idx => $cat)
                    <div id="grid-{{ $cat->slug }}"
                        style="display:{{ $idx === 0 ? 'grid' : 'none' }};grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:1.25rem;">

                        @forelse($cat->products as $product)
                            @php
                                $hasDiscount = $product->discount?->is_active;
                                $fromOk =
                                    !$product->discount?->valid_from || $product->discount?->valid_from?->lte(now());
                                $untilOk =
                                    !$product->discount?->valid_until || $product->discount?->valid_until?->gte(now());
                                $showDiscount = $hasDiscount && $fromOk && $untilOk;
                                $isOwned = in_array($product->id, $ownedProductIds);
                                $isPopular = $product->metaAd?->is_popular;
                            @endphp

                            <div style="background:#fff;border-radius:18px;border:2px solid {{ $isOwned ? '#10B981' : ($isPopular ? '#7C3AED' : 'rgba(124,58,237,0.1)') }};padding:1.5rem;display:flex;flex-direction:column;gap:0.9rem;position:relative;box-shadow:0 4px 16px rgba(124,58,237,{{ $isPopular ? '0.18' : '0.06' }});transition:all 0.25s;"
                                onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 12px 32px rgba(124,58,237,0.18)'"
                                onmouseout="this.style.transform='';this.style.boxShadow='0 4px 16px rgba(124,58,237,{{ $isPopular ? '0.18' : '0.06' }})'">

                                {{-- Badge "Paling Populer" --}}
                                @if ($isPopular)
                                    <div
                                        style="position:absolute;top:-12px;left:50%;transform:translateX(-50%);background:linear-gradient(135deg,#7C3AED,#A855F7);color:#fff;font-size:0.65rem;font-weight:800;letter-spacing:0.1em;padding:0.2rem 0.9rem;border-radius:9999px;white-space:nowrap;text-transform:uppercase;">
                                        ⭐ Paling Populer
                                    </div>
                                @endif

                                {{-- Badge "Dimiliki" --}}
                                @if ($isOwned)
                                    <div
                                        style="position:absolute;top:0.75rem;right:0.75rem;background:#ECFDF5;color:#065F46;font-size:0.65rem;font-weight:800;padding:0.2rem 0.65rem;border-radius:9999px;border:1.5px solid #10B981;">
                                        ✅ Dimiliki
                                    </div>
                                @endif

                                {{-- Nama & Harga --}}
                                <div>
                                    <div
                                        style="font-size:1rem;font-weight:800;color:#1a1a2e;margin-bottom:0.5rem;padding-top:{{ $isPopular ? '0.5rem' : '0' }};">
                                        {{ $product->name }}
                                    </div>

                                    <div style="display:flex;align-items:baseline;gap:0.6rem;flex-wrap:wrap;">
                                        @if ($showDiscount)
                                            <span
                                                style="font-size:0.85rem;color:#94A3B8;text-decoration:line-through;">{{ $product->formatted_base_price }}</span>
                                        @endif
                                        <span
                                            style="font-size:1.4rem;font-weight:900;color:#7C3AED;">{{ $product->formatted_price }}</span>
                                    </div>

                                    @if ($product->formatted_duration !== 'Lifetime')
                                        <div style="font-size:0.75rem;color:#94A3B8;margin-top:0.2rem;">⏳
                                            {{ $product->formatted_duration }}</div>
                                    @else
                                        <div style="font-size:0.75rem;color:#059669;margin-top:0.2rem;">♾️ Akses Seumur
                                            Hidup
                                        </div>
                                    @endif
                                </div>

                                {{-- Deskripsi --}}
                                @if ($product->short_description)
                                    <p style="font-size:0.8rem;color:#64748B;line-height:1.6;margin:0;">
                                        {{ Str::limit($product->short_description, 100) }}</p>
                                @endif

                                {{-- Benefits --}}
                                @if ($product->benefits->isNotEmpty())
                                    <div style="display:flex;flex-direction:column;gap:0.35rem;">
                                        @foreach ($product->benefits->take(4) as $benefit)
                                            <div
                                                style="display:flex;align-items:flex-start;gap:0.5rem;font-size:0.78rem;color:#111827;">
                                                <span style="color:#10B981;font-weight:700;flex-shrink:0;">✓</span>
                                                <span
                                                    style="color: #111827 !important;">{{ Str::limit($benefit->pivot->custom_value ?: $benefit->label, 60) }}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                    @if ($product->benefits->count() > 4)
                                        <button type="button"
                                            onclick='openBenefitModal({{ json_encode($product->name) }}, {{ json_encode($product->benefits->map(fn($b) => $b->pivot->custom_value ?: $b->label)) }})'
                                            style="align-self:flex-start;font-size:0.72rem;color:#7C3AED;font-weight:700;text-decoration:none;background:rgba(124,58,237,0.08);padding:0.2rem 0.6rem;border-radius:6px;border:1px dashed rgba(124,58,237,0.3);margin-top:0.3rem;cursor:pointer;transition:all 0.2s;"
                                            onmouseover="this.style.background='rgba(124,58,237,0.15)'"
                                            onmouseout="this.style.background='rgba(124,58,237,0.08)'">
                                            +{{ $product->benefits->count() - 4 }} benefit lainnya — Lihat Semua
                                        </button>
                                    @elseif($product->benefits->isNotEmpty())
                                        <button type="button"
                                            onclick='openBenefitModal({{ json_encode($product->name) }}, {{ json_encode($product->benefits->map(fn($b) => $b->pivot->custom_value ?: $b->label)) }})'
                                            style="align-self:flex-start;font-size:0.72rem;color:#7C3AED;font-weight:700;text-decoration:none;margin-top:0.3rem;cursor:pointer;border:none;background:transparent;padding:0;">
                                            Lihat Semua Detail Benefit
                                        </button>
                                    @endif
                                @endif

                                {{-- Action Button --}}
                                <div style="margin-top:auto;">
                                    @if ($isOwned)
                                        <a href="{{ \App\Filament\Student\Pages\MyClasses::getUrl() }}"
                                            style="display:flex;align-items:center;justify-content:center;gap:0.5rem;background:#ECFDF5;color:#065F46;border:2px solid #10B981;padding:0.7rem;border-radius:12px;font-size:0.875rem;font-weight:700;text-decoration:none;transition:all 0.2s;">
                                            📚 Lihat di Kelas Saya
                                        </a>
                                    @else
                                        <a href="{{ route('filament.student.pages.buy-course') }}?product={{ $product->slug }}"
                                            style="display:flex;align-items:center;justify-content:center;gap:0.5rem;background:linear-gradient(135deg,#7C3AED,#A855F7);color:#fff;border:none;padding:0.7rem;border-radius:12px;font-size:0.875rem;font-weight:700;text-decoration:none;transition:all 0.2s;"
                                            onmouseover="this.style.transform='translateY(-1px)';this.style.boxShadow='0 8px 20px rgba(124,58,237,0.4)'"
                                            onmouseout="this.style.transform='';this.style.boxShadow=''">
                                            🛒 Beli Sekarang
                                        </a>
                                    @endif
                                </div>
                            </div>

                        @empty
                            <div
                                style="grid-column:1/-1;text-align:center;padding:2rem;color:#94A3B8;font-size:0.9rem;">
                                Belum ada produk di kategori ini.
                            </div>
                        @endforelse

                    </div>{{-- /.grid --}}
                @endforeach

            @endif{{-- categories not empty --}}

            {{-- ── OWNED COURSES CTA (bottom) ───────────────────────────────────── --}}
            @if (!empty($ownedProductIds))
                <div
                    style="margin-top:2rem;background:linear-gradient(135deg,#F0FDFB,#ECFDF5);border:1.5px solid #10B981;border-radius:16px;padding:1.25rem 1.5rem;display:flex;align-items:center;justify-content:space-between;gap:1rem;flex-wrap:wrap;">
                    <div style="display:flex;align-items:center;gap:0.75rem;">
                        <span style="font-size:1.5rem;">🎓</span>
                        <div>
                            <div style="font-size:0.9rem;font-weight:700;color:#065F46;">Kamu punya
                                {{ count($ownedProductIds) }} kursus aktif!</div>
                            <div style="font-size:0.78rem;color:#047857;margin-top:0.1rem;">Langsung akses materi di
                                halaman
                                Kelas Saya.</div>
                        </div>
                    </div>
                    <a href="{{ \App\Filament\Student\Pages\MyClasses::getUrl() }}"
                        style="display:inline-flex;align-items:center;gap:0.5rem;background:#10B981;color:#fff;text-decoration:none;padding:0.65rem 1.25rem;border-radius:10px;font-size:0.82rem;font-weight:700;white-space:nowrap;">
                        📖 Ke Kelas Saya →
                    </a>
                </div>
            @endif

            {{-- ── BENEFIT MODAL ────────────────────────────────────────────────── --}}
            <div id="benefitModal"
                style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.6);z-index:9999;align-items:center;justify-content:center;backdrop-filter:blur(4px);padding:1rem;">
                <div
                    style="background:#fff;width:100%;max-width:550px;border-radius:24px;overflow:hidden;animation:modalIn 0.3s cubic-bezier(0.34,1.56,0.64,1);box-shadow:0 25px 50px -12px rgba(0,0,0,0.5);">
                    <div
                        style="background:linear-gradient(135deg,#1E0A3C 0%,#4C1D95 100%);padding:1.5rem 2rem;display:flex;justify-content:space-between;align-items:center;color:#fff;">
                        <div>
                            <div
                                style="font-size:0.7rem;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;opacity:0.8;margin-bottom:0.2rem;">
                                ✨ Detail Benefit</div>
                            <h3 id="modalProductName" style="font-size:1.15rem;font-weight:800;margin:0;">Program Name
                            </h3>
                        </div>
                        <button onclick="closeBenefitModal()"
                            style="background:rgba(255,255,255,0.15);border:none;color:#fff;width:32px;height:32px;border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:1.2rem;transition:all 0.2s;"
                            onmouseover="this.style.background='rgba(255,255,255,0.25)'"
                            onmouseout="this.style.background='rgba(255,255,255,0.15)'">&times;</button>
                    </div>
                    <div style="padding:2rem;max-height:60vh;overflow-y:auto;background:#fff;">
                        <div id="modalBenefitList" style="display:flex;flex-direction:column;gap:1rem;">
                            {{-- Diisi via JS --}}
                        </div>
                    </div>
                    <div
                        style="padding:1.25rem 2rem;background:#F9FAFB;border-top:1px solid #F1F5F9;display:flex;justify-content:flex-end;">
                        <button onclick="closeBenefitModal()"
                            style="padding:0.6rem 1.5rem;background:#F1F5F9;color:#475569;border:none;border-radius:10px;font-weight:700;font-size:0.875rem;cursor:pointer;transition:all 0.2s;"
                            onmouseover="this.style.background='#E2E8F0'"
                            onmouseout="this.style.background='#F1F5F9'">Tutup</button>
                    </div>
                </div>
            </div>

            <style>
                @keyframes modalIn {
                    from {
                        opacity: 0;
                        transform: scale(0.9) translateY(20px);
                    }

                    to {
                        opacity: 1;
                        transform: scale(1) translateY(0);
                    }
                }
            </style>

            <script>
                function openBenefitModal(name, benefits) {
                    document.getElementById('modalProductName').textContent = name;
                    const list = document.getElementById('modalBenefitList');
                    list.innerHTML = '';

                    benefits.forEach(b => {
                        const item = document.createElement('div');
                        item.style.display = 'flex';
                        item.style.alignItems = 'flex-start';
                        item.style.gap = '1rem';
                        item.style.padding = '1rem';
                        item.style.background = '#F8FAFC';
                        item.style.borderRadius = '12px';
                        item.style.border = '1px solid #E2E8F0';

                        item.innerHTML = `
                        <div style="width:24px;height:24px;background:#10B981;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-size:0.8rem;flex-shrink:0;">✓</div>
                        <div style="font-size:0.92rem;font-weight:600;color:#1E293B;line-height:1.5;">${b}</div>
                    `;
                        list.appendChild(item);
                    });

                    const modal = document.getElementById('benefitModal');
                    modal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                }

                function closeBenefitModal() {
                    const modal = document.getElementById('benefitModal');
                    modal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }

                // Close on escape
                window.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') closeBenefitModal();
                });

                // Close on backdrop click
                document.getElementById('benefitModal').addEventListener('click', (e) => {
                    if (e.target.id === 'benefitModal') closeBenefitModal();
                });

                function switchKatalogTab(slug) {
                    // Sembunyikan semua grid
                    document.querySelectorAll('[id^="grid-"]').forEach(el => el.style.display = 'none');

                    // Reset semua tombol tab
                    document.querySelectorAll('[id^="tab-"]').forEach(btn => {
                        btn.style.background = '#fff';
                        btn.style.borderColor = '#e8e8f0';
                        btn.style.color = '#374151';
                    });

                    // Tampilkan grid yang dipilih
                    const grid = document.getElementById('grid-' + slug);
                    if (grid) grid.style.display = 'grid';

                    // Aktifkan tombol
                    const tab = document.getElementById('tab-' + slug);
                    if (tab) {
                        tab.style.background = 'linear-gradient(135deg,#7C3AED,#A855F7)';
                        tab.style.borderColor = '#7C3AED';
                        tab.style.color = '#fff';
                    }
                }
            </script>

            <style>
                @media (max-width: 640px) {
                    div[id^="grid-"] {
                        grid-template-columns: 1fr !important;
                    }
                }
            </style>
        </div>
    </x-filament-panels::page>
</div>
