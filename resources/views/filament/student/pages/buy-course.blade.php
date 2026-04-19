<div>
    <x-filament-panels::page>
        <div>

            @php
                /* $product, $user, $givenNames, $surname passed from BuyCourse::getViewData() */
                $hasProduct = isset($product) && $product !== null;
                $hasDiscount = $hasProduct && $product->discount?->is_active;
                $discountValid =
                    $hasDiscount &&
                    (!$product->discount->valid_from || $product->discount->valid_from->lte(now())) &&
                    (!$product->discount->valid_until || $product->discount->valid_until->gte(now()));
                $showOldPrice = $discountValid;
                $unitPrice = $hasProduct ? (int) $product->effective_price : 0;

                // Check if user already owns this product (active enrollment)
                $alreadyOwned = false;
                if ($hasProduct && auth()->check()) {
                    $alreadyOwned = auth()
                        ->user()
                        ->enrollments()
                        ->where('product_id', $product->id)
                        ->where('status', 'active')
                        ->exists();
                }
            @endphp

            @if (session('student_payment_error'))
                <div
                    style="background:#FEE2E2;border:1.5px solid #EF4444;border-radius:14px;padding:1rem 1.25rem;margin-bottom:1.25rem;display:flex;align-items:center;gap:0.75rem;">
                    <span style="font-size:1.1rem;">⚠️</span>
                    <span
                        style="font-size:0.875rem;font-weight:500;color:#991B1B;">{{ session('student_payment_error') }}</span>
                </div>
            @endif

            {{-- ═══════════════════════════════════════════
     KONTEN UTAMA
═══════════════════════════════════════════ --}}

            @if (!$hasProduct)

                {{-- ── PRODUK TIDAK DITEMUKAN ───────────────────── --}}
                <div
                    style="background:#fff;border-radius:20px;box-shadow:0 4px 20px rgba(124,58,237,0.1);padding:3rem 2rem;text-align:center;max-width:520px;margin:2rem auto;">
                    <div style="font-size:3rem;margin-bottom:1rem;">🔍</div>
                    <h2 style="font-size:1.3rem;font-weight:700;color:#1a1a2e;margin-bottom:0.5rem;">Produk Tidak
                        Ditemukan
                    </h2>
                    <p style="font-size:0.875rem;color:#64748B;margin-bottom:1.5rem;">
                        Program yang kamu cari tidak tersedia atau sudah tidak aktif. Silakan lihat paket kursus
                        lainnya.
                    </p>
                    <a href="{{ \App\Filament\Student\Pages\KatalogKursus::getUrl() }}"
                        style="display:inline-flex;align-items:center;gap:0.5rem;background:linear-gradient(135deg,#7C3AED,#A855F7);color:#fff;text-decoration:none;padding:0.65rem 1.5rem;border-radius:12px;font-size:0.875rem;font-weight:600;">
                        🛒 Lihat Semua Paket
                    </a>
                </div>
            @else
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;max-width:1200px;margin:0 auto;">

                    {{-- ── KIRI: Info Produk ─────────────────────────────────── --}}
                    <div>

                        {{-- Header Produk --}}
                        <div
                            style="background:linear-gradient(135deg,#1E0A3C 0%,#4C1D95 55%,#7C3AED 100%);border-radius:20px;padding:1.75rem;color:#fff;position:relative;overflow:hidden;box-shadow:0 12px 36px rgba(124,58,237,0.28);margin-bottom:1.25rem;">
                            <div
                                style="position:absolute;top:-40px;right:-40px;width:160px;height:160px;background:rgba(255,255,255,0.05);border-radius:50%;">
                            </div>
                            <div style="position:relative;z-index:1;">
                                <span
                                    style="display:inline-block;background:rgba(255,255,255,0.12);color:#FDE047;font-size:0.65rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;padding:0.2rem 0.75rem;border-radius:9999px;border:1px solid rgba(253,224,71,0.3);margin-bottom:0.75rem;">
                                    🇩🇪 Deutsch Lernen Mit Fara
                                </span>
                                <h1
                                    style="font-size:clamp(1.1rem,2.5vw,1.4rem);font-weight:800;margin:0 0 0.5rem;line-height:1.3;">
                                    {{ $product->name }}
                                </h1>
                                @if ($product->short_description)
                                    <p style="font-size:0.82rem;opacity:0.82;margin:0;line-height:1.6;">
                                        {{ $product->short_description }}</p>
                                @endif

                                <div
                                    style="margin-top:1.25rem;padding-top:1.25rem;border-top:1px solid rgba(255,255,255,0.15);">
                                    @if ($showOldPrice)
                                        <div
                                            style="font-size:0.9rem;text-decoration:line-through;opacity:0.55;margin-bottom:0.2rem;">
                                            {{ $product->formatted_base_price }}
                                        </div>
                                    @endif
                                    <div style="font-size:2rem;font-weight:900;color:#FDE047;" id="unitPriceDisplay">
                                        {{ $product->formatted_price }}
                                    </div>
                                    <div style="font-size:0.75rem;opacity:0.65;margin-top:0.2rem;">per item</div>
                                </div>
                            </div>
                        </div>

                        {{-- Benefit list --}}
                        @if ($product->benefits->isNotEmpty())
                            <div
                                style="background:#fff;border-radius:16px;border:1px solid rgba(124,58,237,0.1);padding:1.25rem;margin-bottom:1.25rem;box-shadow:0 2px 10px rgba(124,58,237,0.07);">
                                <div
                                    style="font-size:0.7rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:#7C3AED;margin-bottom:0.75rem;">
                                    ✨ Yang Kamu Dapatkan</div>
                                <div style="display:flex;flex-direction:column;gap:0.5rem;">
                                    @foreach ($product->benefits as $benefit)
                                        <div
                                            style="display:flex;align-items:flex-start;gap:0.6rem;font-size:0.85rem;color:#111827;">
                                            <span
                                                style="color:#10B981;font-weight:700;flex-shrink:0;margin-top:1px;">✓</span>
                                            <span
                                                style="color:#111827 !important;">{{ $benefit->pivot->custom_value ?: $benefit->label }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Durasi --}}
                        @if ($product->formatted_duration)
                            <div
                                style="background:linear-gradient(135deg,#ECFDF5,#D1FAE5);border:1px solid #10B981;border-radius:12px;padding:0.75rem 1rem;display:flex;align-items:center;gap:0.6rem;">
                                <span style="font-size:1.1rem;">⏳</span>
                                <div>
                                    <div
                                        style="font-size:0.65rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:#065F46;">
                                        Durasi Program</div>
                                    <div style="font-size:0.9rem;font-weight:700;color:#047857;">
                                        {{ $product->formatted_duration }}</div>
                                </div>
                            </div>
                        @endif

                    </div>

                    {{-- ── KANAN: Form Checkout ──────────────────────────────── --}}
                    <div>
                        <div
                            style="background:#fff;border-radius:20px;border:1px solid rgba(124,58,237,0.12);box-shadow:0 4px 24px rgba(124,58,237,0.1);overflow:hidden;">

                            {{-- Form Header --}}
                            <div
                                style="background:linear-gradient(135deg,#F9F7FF,#F0EBFF);padding:1.25rem 1.5rem;border-bottom:1px solid rgba(124,58,237,0.1);">
                                <div
                                    style="font-size:0.7rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:#7C3AED;margin-bottom:0.25rem;">
                                    🛒 Form Pembelian</div>
                                <p style="margin:0;font-size:0.82rem;color:#64748B;">Data Anda sudah terisi otomatis
                                    dari
                                    akun
                                    yang login.</p>
                            </div>

                            <form id="buyForm" action="{{ route('student.checkout.process') }}" method="POST"
                                style="padding:1.5rem;display:flex;flex-direction:column;gap:1.1rem;">
                                @csrf
                                <input type="hidden" name="product_slug" value="{{ $product->slug }}">
                                <input type="hidden" name="grand_total_amount" id="hidden_grand_total"
                                    value="{{ $unitPrice }}">
                                <input type="hidden" name="convenience_fee_amount" id="hidden_conv_fee" value="0">
                                <input type="hidden" name="payment_method" id="hidden_payment_method" value="QRIS">

                                {{-- Nama --}}
                                <div style="display:grid;grid-template-columns:1fr 1fr;gap:0.75rem;">
                                    <div>
                                        <label
                                            style="font-size:0.75rem;font-weight:700;color:#374151;display:block;margin-bottom:0.4rem;">Nama
                                            Depan *</label>
                                        <input type="text" name="given_names" id="given_names"
                                            value="{{ $givenNames }}" required
                                            style="width:100%;padding:0.6rem 0.85rem;border:2px solid #e8e8f0;border-radius:10px;font-size:0.875rem;outline:none;transition:border-color 0.2s;"
                                            onfocus="this.style.borderColor='#7C3AED'"
                                            onblur="this.style.borderColor='#e8e8f0'">
                                    </div>
                                    <div>
                                        <label
                                            style="font-size:0.75rem;font-weight:700;color:#374151;display:block;margin-bottom:0.4rem;">Nama
                                            Belakang</label>
                                        <input type="text" name="surname" id="surname" value="{{ $surname }}"
                                            style="width:100%;padding:0.6rem 0.85rem;border:2px solid #e8e8f0;border-radius:10px;font-size:0.875rem;outline:none;transition:border-color 0.2s;"
                                            onfocus="this.style.borderColor='#7C3AED'"
                                            onblur="this.style.borderColor='#e8e8f0'">
                                    </div>
                                </div>

                                {{-- Email (read-only dari akun) --}}
                                <div>
                                    <label
                                        style="font-size:0.75rem;font-weight:700;color:#374151;display:block;margin-bottom:0.4rem;">Email
                                        Akun</label>
                                    <div style="position:relative;">
                                        <input type="email" readonly value="{{ $user->email }}"
                                            style="width:100%;padding:0.6rem 0.85rem;border:2px solid #e8e8f0;border-radius:10px;font-size:0.875rem;background:#f8f9fc;color:#64748B;cursor:not-allowed;">
                                        <span
                                            style="position:absolute;right:0.75rem;top:50%;transform:translateY(-50%);font-size:0.65rem;background:#C7D2FE;color:#3730A3;padding:0.15rem 0.5rem;border-radius:9999px;font-weight:700;">Auto</span>
                                    </div>
                                    <div style="font-size:0.72rem;color:#94A3B8;margin-top:0.25rem;">📩 Notifikasi
                                        pembayaran
                                        dikirim ke email ini</div>
                                </div>

                                {{-- WhatsApp --}}
                                <div>
                                    <label
                                        style="font-size:0.75rem;font-weight:700;color:#374151;display:block;margin-bottom:0.4rem;">Nomor
                                        WhatsApp <span
                                            style="color:#10B981;font-weight:500;">(Disarankan)</span></label>
                                    <input type="tel" name="mobile_number" id="mobile_number"
                                        value="{{ $user->phone ?? '' }}" placeholder="08123456789"
                                        style="width:100%;padding:0.6rem 0.85rem;border:2px solid #e8e8f0;border-radius:10px;font-size:0.875rem;outline:none;transition:border-color 0.2s;"
                                        onfocus="this.style.borderColor='#7C3AED'"
                                        onblur="this.style.borderColor='#e8e8f0'">
                                    <div style="font-size:0.72rem;color:#94A3B8;margin-top:0.25rem;">💬 Notifikasi
                                        WhatsApp
                                        akan
                                        dikirim ke nomor ini</div>
                                </div>

                                {{-- Jumlah (Hidden, always 1) --}}
                                <input type="hidden" name="quantity" id="quantity" value="1">

                                {{-- Metode Pembayaran --}}
                                <div>
                                    <label
                                        style="font-size:0.75rem;font-weight:700;color:#374151;display:block;margin-bottom:0.6rem;">Metode
                                        Pembayaran *</label>
                                    <div style="display:flex;flex-direction:column;gap:0.5rem;">

                                        {{-- QRIS --}}
                                        <label for="pm_qris" id="label_qris"
                                            style="display:flex;justify-content:space-between;align-items:center;padding:0.75rem 1rem;border:2px solid #7C3AED;border-radius:12px;cursor:pointer;background:linear-gradient(135deg,rgba(124,58,237,0.05),rgba(168,85,247,0.05));transition:all 0.2s;">
                                            <div style="display:flex;align-items:center;gap:0.65rem;">
                                                <input type="radio" name="payment_method_display" id="pm_qris"
                                                    value="QRIS" checked onchange="selectMethod('QRIS')"
                                                    style="accent-color:#7C3AED;">
                                                <div>
                                                    <div style="font-size:0.875rem;font-weight:700;color:#374151;">📲
                                                        QRIS
                                                    </div>
                                                    <div style="font-size:0.72rem;color:#94A3B8;">Scan & Bayar (Mobile
                                                        Banking
                                                        / E-Wallet)</div>
                                                </div>
                                            </div>
                                            <span
                                                style="font-size:0.68rem;background:#DBEAFE;color:#1E40AF;padding:0.2rem 0.6rem;border-radius:9999px;font-weight:600;">+0.63%
                                                + PPN</span>
                                        </label>

                                        {{-- VA --}}
                                        <label for="pm_va" id="label_va"
                                            style="display:flex;justify-content:space-between;align-items:center;padding:0.75rem 1rem;border:2px solid #e8e8f0;border-radius:12px;cursor:pointer;background:#fafafa;transition:all 0.2s;">
                                            <div style="display:flex;align-items:center;gap:0.65rem;">
                                                <input type="radio" name="payment_method_display" id="pm_va"
                                                    value="VA" onchange="selectMethod('VA')"
                                                    style="accent-color:#7C3AED;">
                                                <div>
                                                    <div style="font-size:0.875rem;font-weight:700;color:#374151;">🏦
                                                        Virtual
                                                        Account</div>
                                                    <div style="font-size:0.72rem;color:#94A3B8;">Transfer via ATM /
                                                        Mobile
                                                        Banking</div>
                                                </div>
                                            </div>
                                            <span
                                                style="font-size:0.68rem;background:#FEF3C7;color:#92400E;padding:0.2rem 0.6rem;border-radius:9999px;font-weight:600;">+Rp
                                                4.440</span>
                                        </label>
                                    </div>
                                </div>

                                {{-- Rincian Total --}}
                                <div
                                    style="background:linear-gradient(135deg,#1E0A3C,#4C1D95);border-radius:14px;padding:1.1rem 1.25rem;color:#fff;">
                                    <div
                                        style="font-size:0.7rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;opacity:0.7;margin-bottom:0.6rem;">
                                        Rincian Pembayaran</div>
                                    <div
                                        style="display:flex;justify-content:space-between;font-size:0.82rem;margin-bottom:0.35rem;opacity:0.85;">
                                        <span>Subtotal (1 item)</span>
                                        <span id="subtotalDisp">{{ $product->formatted_price }}</span>
                                    </div>
                                    <div id="convFeeRow"
                                        style="display:none;justify-content:space-between;font-size:0.82rem;margin-bottom:0.35rem;color:#FDE047;">
                                        <span>Convenience Fee</span>
                                        <span id="convFeeDisp">Rp 0</span>
                                    </div>
                                    <div
                                        style="border-top:1px solid rgba(255,255,255,0.2);margin-top:0.6rem;padding-top:0.6rem;display:flex;justify-content:space-between;align-items:center;">
                                        <span style="font-size:0.875rem;font-weight:600;">Total</span>
                                        <span id="totalDisp"
                                            style="font-size:1.3rem;font-weight:900;color:#FDE047;">{{ $product->formatted_price }}</span>
                                    </div>
                                </div>

                                {{-- S&K --}}
                                <div style="display:flex;align-items:flex-start;gap:0.5rem;">
                                    <input type="checkbox" id="agreeTnc" required
                                        style="margin-top:3px;accent-color:#7C3AED;width:15px;height:15px;flex-shrink:0;">
                                    <label for="agreeTnc"
                                        style="font-size:0.78rem;color:#64748B;cursor:pointer;line-height:1.5;">
                                        Saya setuju dengan <a href="{{ route('student.checkout.terms') }}"
                                            target="_blank"
                                            style="color:#7C3AED;text-decoration:none;font-weight:600;">syarat dan
                                            ketentuan</a> yang berlaku
                                    </label>
                                </div>

                                {{-- Submit --}}
                                @if ($alreadyOwned)
                                    <div
                                        style="background:#F3F4F6;color:#9CA3AF;border:none;padding:0.9rem;border-radius:14px;font-size:1rem;font-weight:700;text-align:center;width:100%;cursor:not-allowed;display:flex;flex-direction:column;gap:0.2rem;">
                                        <span>📝 Kursus Masih Aktif</span>
                                        <span style="font-size:0.7rem;font-weight:500;">Silakan cek di halaman Kelas
                                            Saya</span>
                                    </div>
                                @else
                                    <button type="submit" id="submitBtn"
                                        style="background:linear-gradient(135deg,#7C3AED,#A855F7);color:#fff;border:none;padding:0.9rem;border-radius:14px;font-size:1rem;font-weight:700;cursor:pointer;transition:all 0.25s;letter-spacing:0.3px;width:100%;"
                                        onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 10px 25px rgba(124,58,237,0.4)'"
                                        onmouseout="this.style.transform='';this.style.boxShadow=''">
                                        <span id="submitText">💳 Lanjutkan Pembayaran</span>
                                    </button>
                                @endif

                                <a href="{{ \App\Filament\Student\Pages\KatalogKursus::getUrl() }}"
                                    style="text-align:center;font-size:0.78rem;color:#94A3B8;text-decoration:none;border-bottom:1px dashed #CBD5E1;padding-bottom:2px;align-self:center;">
                                    ← Kembali ke daftar paket
                                </a>
                            </form>
                        </div>
                    </div>

                </div>{{-- /.grid --}}
                {{-- Kelas yang sudah dimiliki --}}
                @if ($alreadyOwned)
                    <div
                        style="background:linear-gradient(135deg,#ECFDF5,#D1FAE5);border:1.5px solid #10B981;border-radius:14px;padding:1rem 1.25rem;margin-top:1.5rem;display:flex;align-items:center;gap:0.75rem;box-shadow:0 4px 12px rgba(16,185,129,0.1);">
                        <span style="font-size:1.4rem;">✅</span>
                        <div>
                            <div style="font-size:0.875rem;font-weight:700;color:#065F46;">Kamu sudah memiliki kursus
                                ini!
                            </div>
                            <div style="font-size:0.78rem;color:#047857;margin-top:0.2rem;">
                                Akses materi belajarmu di halaman <a
                                    href="{{ \App\Filament\Student\Pages\MyClasses::getUrl() }}"
                                    style="color:#059669;font-weight:800;text-decoration:underline;">Kelas Saya</a>.
                            </div>
                        </div>
                    </div>
                @endif

            @endif {{-- $hasProduct --}}

            {{-- ── PAYMENT CONFIRMATION MODAL ────────────────────────────────────── --}}
            <div id="confirmModal"
                style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(15,23,42,0.6);z-index:9999;align-items:center;justify-content:center;backdrop-filter:blur(8px);padding:1rem;">
                <div
                    style="background:#fff;width:100%;max-width:440px;border-radius:24px;overflow:hidden;animation:modalIn 0.3s cubic-bezier(0.34,1.56,0.64,1);box-shadow:0 25px 50px -12px rgba(0,0,0,0.5);">
                    <div style="padding:2.25rem 2rem;text-align:center;">
                        <div
                            style="width:70px;height:70px;background:#FDE047;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem;font-size:2rem;box-shadow:0 8px 20px rgba(253,224,71,0.3);">
                            ⚠️
                        </div>
                        <h3 style="font-size:1.4rem;font-weight:800;color:#0F172A;margin-bottom:0.75rem;">Konfirmasi
                            Pembayaran</h3>
                        <p id="confirmMessage"
                            style="font-size:0.95rem;color:#475569;line-height:1.6;margin-bottom:0;">
                            {{-- Diisi via JS --}}
                        </p>
                    </div>
                    <div
                        style="padding:1.5rem 2rem;background:#F8FAFC;border-top:1px solid #F1F5F9;display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                        <button type="button" onclick="closeConfirmModal()"
                            style="padding:0.75rem;background:#fff;color:#64748B;border:1.5px solid #E2E8F0;border-radius:12px;font-weight:700;font-size:0.9rem;cursor:pointer;transition:all 0.2s;">Batal</button>
                        <button type="button" onclick="proceedToPayment()"
                            style="padding:0.75rem;background:linear-gradient(135deg,#7C3AED,#A855F7);color:#fff;border:none;border-radius:12px;font-weight:700;font-size:0.9rem;cursor:pointer;transition:all 0.2s;box-shadow:0 4px 12px rgba(124,58,237,0.3);">Ya,
                            Lanjutkan</button>
                    </div>
                </div>
            </div>

            <script>
                let isConfirmed = false;

                function showConfirmModal() {
                    const method = document.getElementById('hidden_payment_method').value;
                    const msg = document.getElementById('confirmMessage');

                    if (method === 'QRIS') {
                        msg.innerHTML =
                            `Kamu memilih metode <b>QRIS</b>. Pastikan kamu melakukan pembayaran melalui <b>QR Scan (QRIS)</b> pada halaman checkout nanti.`;
                    } else {
                        msg.innerHTML =
                            `Kamu memilih metode <b>Virtual Account</b>. Pastikan kamu melakukan pembayaran melalui <b>Transfer VA</b> pada halaman checkout nanti.`;
                    }

                    document.getElementById('confirmModal').style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                }

                function closeConfirmModal() {
                    document.getElementById('confirmModal').style.display = 'none';
                    document.body.style.overflow = 'auto';
                }

                function proceedToPayment() {
                    isConfirmed = true;
                    const modal = document.getElementById('confirmModal');
                    modal.style.opacity = '0.5';
                    modal.style.pointerEvents = 'none';

                    const btn = document.querySelector('#confirmModal button:last-child');
                    btn.innerHTML = '⏳ Memproses...';

                    document.getElementById('buyForm').submit();
                }

                const UNIT_PRICE = {{ $unitPrice ?? 0 }};

                function fmt(n) {
                    return 'Rp ' + n.toLocaleString('id-ID');
                }

                function recalc() {
                    const method = document.querySelector('input[name="payment_method_display"]:checked')?.value ?? 'QRIS';
                    const sub = UNIT_PRICE;

                    let convFee = 0;
                    if (method === 'QRIS') {
                        // 0.63% + PPN 11%
                        convFee = Math.round(sub * 0.0063 * 1.11);
                    } else {
                        convFee = 4440; // VA flat
                    }

                    const total = sub + convFee;

                    document.getElementById('subtotalDisp').textContent = fmt(sub);
                    document.getElementById('convFeeDisp').textContent = fmt(convFee);
                    document.getElementById('totalDisp').textContent = fmt(total);

                    const feeRow = document.getElementById('convFeeRow');
                    if (convFee > 0) {
                        feeRow.style.display = 'flex';
                    } else {
                        feeRow.style.display = 'none';
                    }

                    document.getElementById('hidden_grand_total').value = total;
                    document.getElementById('hidden_conv_fee').value = convFee;
                }


                function selectMethod(m) {
                    document.getElementById('hidden_payment_method').value = m;
                    const labelQris = document.getElementById('label_qris');
                    const labelVa = document.getElementById('label_va');
                    if (m === 'QRIS') {
                        labelQris.style.borderColor = '#7C3AED';
                        labelQris.style.background = 'linear-gradient(135deg,rgba(124,58,237,0.05),rgba(168,85,247,0.05))';
                        labelVa.style.borderColor = '#e8e8f0';
                        labelVa.style.background = '#fafafa';
                    } else {
                        labelVa.style.borderColor = '#7C3AED';
                        labelVa.style.background = 'linear-gradient(135deg,rgba(124,58,237,0.05),rgba(168,85,247,0.05))';
                        labelQris.style.borderColor = '#e8e8f0';
                        labelQris.style.background = '#fafafa';
                    }
                    recalc();
                }

                document.getElementById('buyForm')?.addEventListener('submit', function(e) {
                    if (!isConfirmed) {
                        e.preventDefault();
                        showConfirmModal();
                        return false;
                    }

                    const btn = document.getElementById('submitBtn');
                    const txt = document.getElementById('submitText');
                    if (btn) {
                        btn.disabled = true;
                        txt.innerHTML = '⏳ Memproses...';
                    }
                });


                // Init
                recalc();
            </script>

            {{-- Responsive: stack on mobile --}}
            <style>
                @media (max-width: 768px) {
                    div[style*="grid-template-columns:1fr 1fr"] {
                        grid-template-columns: 1fr !important;
                    }
                }
            </style>

        </div>
    </x-filament-panels::page>
</div>
