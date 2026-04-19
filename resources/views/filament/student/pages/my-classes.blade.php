@php
    $user = auth()->user();
    $payments = \App\Models\Payment::with(['product', 'enrollment'])
        ->where(function ($q) use ($user) {
            $q->where('user_id', $user->id)->orWhere('email', $user->email);
        })
        ->latest()
        ->get();

    $statusConfig = [
        'paid' => ['bg' => '#ECFDF5', 'text' => '#065F46', 'border' => '#10B981', 'label' => '✅ Lunas'],
        'settled' => ['bg' => '#ECFDF5', 'text' => '#065F46', 'border' => '#10B981', 'label' => '✅ Settled'],
        'pending' => ['bg' => '#FFFBEB', 'text' => '#92400E', 'border' => '#F59E0B', 'label' => '⏳ Menunggu'],
        'expired' => ['bg' => '#FEF2F2', 'text' => '#991B1B', 'border' => '#EF4444', 'label' => '❌ Kadaluarsa'],
        'failed' => ['bg' => '#FEF2F2', 'text' => '#991B1B', 'border' => '#EF4444', 'label' => '❌ Gagal'],
    ];
    $getStatus = fn($s) => $statusConfig[strtolower($s)] ?? [
        'bg' => '#F3F4F6',
        'text' => '#374151',
        'border' => '#D1D5DB',
        'label' => ucfirst($s),
    ];
@endphp

<x-filament-panels::page>
    <div id="dlmf-my-classes-root">
        {{-- Header Banner --}}
        <div
            style="background:linear-gradient(135deg,#1E0A3C 0%,#4C1D95 50%,#7C3AED 100%);border-radius:20px;padding:1.75rem 2rem;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;box-shadow:0 12px 36px rgba(124,58,237,0.32);position:relative;overflow:hidden;margin-bottom:1.5rem;">
            <div
                style="position:absolute;top:-50px;right:-50px;width:200px;height:200px;background:rgba(255,255,255,0.05);border-radius:50%;pointer-events:none;">
            </div>
            <div style="display:flex;align-items:center;gap:1rem;position:relative;z-index:1;">
                <div
                    style="width:50px;height:50px;background:rgba(255,255,255,0.12);border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;border:1.5px solid rgba(255,255,255,0.2);">
                    📚</div>
                <div>
                    <h1
                        style="font-family:'Poppins',sans-serif;font-size:clamp(1.1rem,3vw,1.4rem);font-weight:800;color:#fff;margin:0 0 0.2rem;line-height:1.25;">
                        Kelas & Riwayat Pembayaran</h1>
                    <p style="font-size:0.82rem;color:rgba(255,255,255,0.75);margin:0;">Kelas aktif dan seluruh riwayat
                        transaksimu.</p>
                </div>
            </div>
            <a href="{{ \App\Filament\Student\Pages\KatalogKursus::getUrl() }}"
                style="display:inline-flex;align-items:center;gap:0.4rem;background:#FDE047;color:#4C1D95;border:none;padding:0.6rem 1.25rem;border-radius:10px;font-size:0.82rem;font-weight:700;text-decoration:none;position:relative;z-index:1;transition:all 0.2s;">🛒
                Beli Kursus</a>
        </div>

        {{-- Widgets --}}
        <div style="margin-bottom:1.5rem;">
            <x-filament-widgets::widgets :widgets="$this->getEnrollmentWidgets()" :columns="$this->getFooterWidgetsColumns()" />
        </div>

        {{-- Riwayat Pembayaran --}}
        <div
            style="background:#1a0a35;border-radius:18px;border:1px solid rgba(124,58,237,0.22);box-shadow:0 2px 12px rgba(124,58,237,0.12);overflow:hidden;">
            <div
                style="display:flex;align-items:center;justify-content:space-between;padding:0.875rem 1.25rem;background:linear-gradient(135deg,#2D1060,#1E0A3C);border-bottom:1px solid rgba(124,58,237,0.15);">
                <div style="display:flex;align-items:center;gap:0.5rem;">
                    <span>🧾</span>
                    <span
                        style="font-size:0.72rem;font-weight:700;text-transform:uppercase;letter-spacing:0.07em;color:#C4B5FD;">Riwayat
                        Pembayaran</span>
                    <span
                        style="background:#7C3AED;color:#fff;font-size:0.65rem;font-weight:700;padding:0.1rem 0.5rem;border-radius:9999px;">{{ $payments->count() }}</span>
                </div>
            </div>

            @if ($payments->isEmpty())
                <div style="padding:2.5rem;text-align:center;">
                    <p style="font-size:0.875rem;color:#A78BFA;margin:0;">Belum ada transaksi.</p>
                </div>
            @else
                <div style="overflow-x:auto;">
                    <table style="width:100%;border-collapse:collapse;font-size:0.82rem;">
                        <thead>
                            <tr style="background:#220d45;border-bottom:2px solid rgba(124,58,237,0.25);">
                                <th style="padding:0.65rem 1rem;text-align:left;color:#C4B5FD;">Tanggal</th>
                                <th style="padding:0.65rem 1rem;text-align:left;color:#C4B5FD;">Produk</th>
                                <th style="padding:0.65rem 1rem;text-align:right;color:#C4B5FD;">Total</th>
                                <th style="padding:0.65rem 1rem;text-align:center;color:#C4B5FD;">Status</th>
                                <th style="padding:0.65rem 1rem;text-align:center;color:#C4B5FD;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $idx => $payment)
                                @php
                                    $sc = $getStatus($payment->status);
                                    $isPaid = in_array(strtolower($payment->status), ['paid', 'settled']);
                                    $productName = $payment->product_name ?: ($payment->product?->name ?: '');
                                    $isLms = (bool) preg_match('/flexilearn/i', $productName);
                                    $enrollment = $payment->enrollment;
                                    $modalData = json_encode(
                                        [
                                            'id' => $payment->id,
                                            'ext' => $payment->external_id,
                                            'produk' => $productName ?: '—',
                                            'nama' => trim(
                                                ($payment->given_names ?? '') . ' ' . ($payment->surname ?? ''),
                                            ),
                                            'email' => $payment->email,
                                            'hp' => $payment->mobile_number ?? '—',
                                            'jumlah' => $payment->quantity ?? 1,
                                            'total' => 'Rp ' . number_format((float) $payment->amount, 0, ',', '.'),
                                            'metode' => trim(
                                                ($payment->payment_method ?? '') .
                                                    ' ' .
                                                    ($payment->payment_channel ?? ''),
                                            ),
                                            'dest' => $payment->payment_destination ?? null,
                                            'status' => $sc['label'],
                                            'statusBg' => $sc['bg'],
                                            'statusText' => $sc['text'],
                                            'statusBdr' => $sc['border'],
                                            'dibuat' =>
                                                $payment->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i') .
                                                ' WIB',
                                            'dibayar' =>
                                                $isPaid && $payment->paid_at
                                                    ? $payment->paid_at->format('d M Y, H:i') . ' WIB'
                                                    : null,
                                            'url' => $payment->invoice_url,
                                            'class_start' => $enrollment?->started_at?->format('d M Y'),
                                            'class_end' => $enrollment?->expires_at?->format('d M Y'),
                                            'raw_end' => $enrollment?->expires_at?->toIso8601String(),
                                            'isPaid' => $isPaid,
                                            'isLms' => $isLms,
                                        ],
                                        JSON_HEX_QUOT | JSON_HEX_TAG,
                                    );
                                @endphp
                                <tr
                                    style="border-bottom:1px solid rgba(124,58,237,0.1);{{ $idx % 2 === 0 ? 'background:rgba(255,255,255,0.02);' : '' }}">
                                    <td style="padding:0.75rem 1rem;color:#A78BFA;">
                                        {{ $payment->created_at->format('d M Y') }}</td>
                                    <td style="padding:0.75rem 1rem;color:#F3F4F6;font-weight:700;">
                                        {{ Str::limit($productName, 40) }}</td>
                                    <td style="padding:0.75rem 1rem;text-align:right;color:#FDE047;font-weight:800;">Rp
                                        {{ number_format((float) $payment->amount, 0, ',', '.') }}</td>
                                    <td style="padding:0.75rem 1rem;text-align:center;"><span
                                            style="font-size:0.68rem;background:{{ $sc['bg'] }};color:{{ $sc['text'] }};border:1px solid {{ $sc['border'] }};padding:0.2rem 0.5rem;border-radius:9999px;">{{ $sc['label'] }}</span>
                                    </td>
                                    <td style="padding:0.75rem 1rem;text-align:center;"><button
                                            onclick='showInvoiceModal({{ $modalData }})'
                                            style="background:linear-gradient(135deg,#7C3AED,#A855F7);color:#fff;padding:0.4rem 0.8rem;border-radius:8px;border:none;cursor:pointer;">🔍
                                            Detail</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        {{-- Modal Invoice (Redesigned) --}}
        <div id="invoiceModal"
            style="display:none;position:fixed;inset:0;z-index:9999;background:rgba(10,5,25,0.7);backdrop-filter:blur(6px);align-items:center;justify-content:center;padding:1rem;"
            onclick="if(event.target===this)closeInvoiceModal()">
            <div
                style="background:#1a0a35;border-radius:24px;max-width:500px;width:100%;max-height:95vh;overflow-y:auto;border:1px solid rgba(124,58,237,0.3);box-shadow: 0 10px 40px rgba(0,0,0,0.5);">

                {{-- Header --}}
                <div
                    style="background:linear-gradient(135deg,#7C3AED,#A855F7);padding:1.25rem 1.5rem;display:flex;align-items:center;justify-content:space-between;">
                    <div>
                        <h3
                            style="color:#FDE047;margin:0;font-size:1.1rem;font-weight:800;display:flex;align-items:center;gap:0.5rem;">
                            <span>📄</span> DETAIL INVOICE
                        </h3>
                        <div id="modal-ext"
                            style="color:rgba(255,255,255,0.8);font-size:0.7rem;font-family:monospace;margin-top:0.2rem;">
                        </div>
                    </div>
                    <button onclick="closeInvoiceModal()"
                        style="width:32px;height:32px;background:rgba(255,255,255,0.2);border:none;border-radius:50%;color:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:1.2rem;line-height:0;">&times;</button>
                </div>

                <div style="padding:1.5rem;">
                    {{-- Status Badge --}}
                    <div style="text-align:center;margin-bottom:1.5rem;">
                        <span id="modal-status-badge"
                            style="display:inline-flex;align-items:center;gap:0.4rem;padding:0.4rem 1.25rem;border-radius:9999px;font-weight:700;font-size:0.85rem;"></span>
                    </div>

                    {{-- Section: PRODUK --}}
                    <div
                        style="background:rgba(255,255,255,0.03);border:1px solid rgba(124,58,237,0.2);border-radius:14px;padding:1.1rem;margin-bottom:1rem;">
                        <div
                            style="font-size:0.65rem;font-weight:700;color:#A78BFA;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:0.4rem;">
                            📦 PRODUK</div>
                        <div id="modal-produk" style="font-size:1.1rem;font-weight:800;color:#fff;line-height:1.4;">
                        </div>
                        <div id="modal-qty" style="font-size:0.8rem;color:#94A3B8;margin-top:0.2rem;"></div>
                    </div>

                    {{-- Info Grid --}}
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:0.75rem;margin-bottom:1rem;">
                        <div
                            style="background:rgba(255,255,255,0.03);border:1px solid rgba(124,58,237,0.1);border-radius:12px;padding:0.75rem 1rem;">
                            <div style="font-size:0.6rem;font-weight:700;color:#A78BFA;text-transform:uppercase;">👤
                                NAMA</div>
                            <div id="modal-nama"
                                style="font-size:0.85rem;color:#fff;font-weight:600;margin-top:0.2rem;"></div>
                        </div>
                        <div
                            style="background:rgba(255,255,255,0.03);border:1px solid rgba(124,58,237,0.1);border-radius:12px;padding:0.75rem 1rem;">
                            <div style="font-size:0.6rem;font-weight:700;color:#A78BFA;text-transform:uppercase;">📧
                                EMAIL</div>
                            <div id="modal-email"
                                style="font-size:0.85rem;color:#fff;font-weight:600;margin-top:0.2rem;overflow:hidden;text-overflow:ellipsis;">
                            </div>
                        </div>
                        <div
                            style="background:rgba(255,255,255,0.03);border:1px solid rgba(124,58,237,0.1);border-radius:12px;padding:0.75rem 1rem;">
                            <div style="font-size:0.6rem;font-weight:700;color:#A78BFA;text-transform:uppercase;">📱
                                WHATSAPP</div>
                            <div id="modal-hp" style="font-size:0.85rem;color:#fff;font-weight:600;margin-top:0.2rem;">
                            </div>
                        </div>
                        <div
                            style="background:rgba(255,255,255,0.03);border:1px solid rgba(124,58,237,0.1);border-radius:12px;padding:0.75rem 1rem;">
                            <div style="font-size:0.6rem;font-weight:700;color:#A78BFA;text-transform:uppercase;">💳
                                METODE</div>
                            <div id="modal-metode"
                                style="font-size:0.85rem;color:#fff;font-weight:600;margin-top:0.2rem;"></div>
                        </div>
                    </div>

                    {{-- Payment Details --}}
                    <div
                        style="background:#220d45;border:1px solid #FDE047;border-radius:14px;padding:0.85rem 1.1rem;margin-bottom:1rem;">
                        <div
                            style="font-size:0.65rem;font-weight:700;color:#FDE047;text-transform:uppercase;margin-bottom:0.4rem;">
                            🏛️ NOMOR REKENING / KODE BAYAR</div>
                        <div id="modal-dest"
                            style="font-size:1.25rem;font-weight:800;color:#FDE047;font-family:monospace;letter-spacing:1px;">
                        </div>
                    </div>

                    <div
                        style="background:linear-gradient(135deg,#2D1060,#1E0A3C);border-radius:14px;padding:1rem 1.25rem;margin-bottom:1.25rem;display:flex;justify-content:space-between;align-items:center;border:1px solid rgba(124,58,237,0.15);">
                        <div style="font-size:0.85rem;color:#A78BFA;">💰 Total Pembayaran</div>
                        <div id="modal-total" style="font-size:1.6rem;font-weight:900;color:#FDE047;"></div>
                    </div>

                    {{-- Payment Meta --}}
                    <div
                        style="font-size:0.75rem;color:#94A3B8;display:flex;flex-direction:column;gap:0.5rem;margin-bottom:1.5rem;background:rgba(255,255,255,0.02);padding:0.75rem;border-radius:10px;">
                        <div style="display:flex;justify-content:space-between;">
                            <span>⏻ Dibuat:</span>
                            <span id="modal-dibuat" style="color:#fff;font-weight:600;"></span>
                        </div>
                        <div style="display:flex;justify-content:space-between;">
                            <span>✅ Dibayar:</span>
                            <span id="modal-dibayar" style="color:#10B981;font-weight:600;"></span>
                        </div>
                    </div>

                    {{-- Info Kelas (Conditional for LMS/Flexilearn) --}}
                    <div id="modal-info-kelas"
                        style="display:none;background:rgba(255,255,255,0.03);border:1px solid rgba(16,185,129,0.3);border-radius:14px;padding:1.1rem;margin-bottom:1.5rem;">
                        <div
                            style="font-size:0.72rem;font-weight:800;color:#10B981;text-transform:uppercase;margin-bottom:0.75rem;display:flex;align-items:center;gap:0.5rem;">
                            <span>📖</span> INFO KELAS
                        </div>
                        <div style="display:flex;gap:1.5rem;">
                            <div>
                                <div style="font-size:0.7rem;color:#94A3B8;margin-bottom:0.15rem;">Mulai:</div>
                                <div id="modal-start" style="font-size:0.95rem;color:#fff;font-weight:700;"></div>
                            </div>
                            <div>
                                <div style="font-size:0.7rem;color:#94A3B8;margin-bottom:0.15rem;">Berakhir:</div>
                                <div id="modal-end" style="font-size:0.95rem;color:#fff;font-weight:700;"></div>
                            </div>
                        </div>

                        {{-- Countdown Wrapper --}}
                        <div id="modal-countdown-wrapper"
                            style="margin-top:1rem;padding-top:1rem;border-top:1px dashed rgba(255,255,255,0.1);">
                            <div style="font-size:0.7rem;color:#94A3B8;margin-bottom:0.4rem;">Countdown Berakhir:</div>
                            <div id="modal-countdown"
                                style="font-size:1rem;font-weight:800;color:#FDE047;letter-spacing:0.5px;"></div>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div id="modal-actions-container" style="display:flex;flex-direction:column;gap:0.75rem;">
                        <div id="modal-whatsapp-container"></div>
                        <a id="modal-url" target="_blank"
                            style="display:flex;align-items:center;justify-content:center;gap:0.55rem;background:rgba(255,255,255,0.05);color:#fff;border:1px solid rgba(255,255,255,0.15);padding:0.75rem;border-radius:12px;text-decoration:none;font-size:0.875rem;font-weight:700;transition:all 0.2s;">
                            🔗 Buka Invoice Xendit
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <script>
            let countdownInterval = null;

            function showInvoiceModal(d) {
                // Clear any existing interval
                if (countdownInterval) clearInterval(countdownInterval);

                document.getElementById('modal-ext').textContent = d.ext || '—';
                document.getElementById('modal-produk').textContent = d.produk || '—';
                document.getElementById('modal-qty').textContent = 'Jumlah: ' + (d.jumlah || 1) + ' item';
                document.getElementById('modal-nama').textContent = d.nama || '—';
                document.getElementById('modal-email').textContent = d.email || '—';
                document.getElementById('modal-hp').textContent = d.hp || '—';
                document.getElementById('modal-metode').textContent = d.metode || '—';
                document.getElementById('modal-dest').textContent = d.dest || '—';
                document.getElementById('modal-total').textContent = d.total || '—';
                document.getElementById('modal-dibuat').textContent = d.dibuat || '—';
                document.getElementById('modal-dibayar').textContent = d.dibayar || 'Belum Lunas';
                document.getElementById('modal-url').href = d.url || '#';

                const badge = document.getElementById('modal-status-badge');
                badge.textContent = d.status;
                badge.style.background = d.statusBg;
                badge.style.color = d.statusText;
                badge.style.border = '1px solid ' + (d.statusBdr || 'transparent');

                const infoKelas = document.getElementById('modal-info-kelas');
                const whatsappContainer = document.getElementById('modal-whatsapp-container');
                whatsappContainer.innerHTML = '';

                if (d.isPaid) {
                    if (d.isLms) {
                        // Tampilkan Info Kelas & Countdown
                        infoKelas.style.display = 'block';
                        document.getElementById('modal-start').textContent = d.class_start || '—';
                        document.getElementById('modal-end').textContent = d.class_end || '—';

                        if (d.raw_end) {
                            startCountdown(d.raw_end);
                        } else {
                            document.getElementById('modal-countdown-wrapper').style.display = 'none';
                        }
                    } else {
                        // Sembunyikan Info Kelas (Hanya untuk non-LMS sesuai req)
                        infoKelas.style.display = 'none';
                        // Berikan button WhatsApp
                        whatsappContainer.innerHTML = `
                            <a href="https://api.whatsapp.com/send?phone=6289647897616&text=Halo%20Admin%2C%20saya%20ingin%20bertanya%20seputar%20akses%20kelas%20untuk%20invoice%20${d.ext}" 
                               target="_blank" 
                               style="display:flex;align-items:center;justify-content:center;gap:0.55rem;background:linear-gradient(135deg,#25D366,#128C7E);color:#fff;padding:0.85rem;border-radius:12px;text-decoration:none;font-size:0.9rem;font-weight:800;box-shadow:0 10px 20px rgba(37,211,102,0.25);">
                                📱 Hubungi Admin via WhatsApp
                            </a>`;
                    }
                } else {
                    infoKelas.style.display = 'none';
                }

                document.getElementById('invoiceModal').style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }

            function startCountdown(endTimeStr) {
                const targetDate = new Date(endTimeStr).getTime();
                const wrapper = document.getElementById('modal-countdown-wrapper');
                const display = document.getElementById('modal-countdown');

                wrapper.style.display = 'block';

                const update = () => {
                    const now = new Date().getTime();
                    const diff = targetDate - now;

                    if (diff <= 0) {
                        display.textContent = 'BERAKHIR / EXPIRED';
                        display.style.color = '#EF4444';
                        clearInterval(countdownInterval);
                        return;
                    }

                    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    const secs = Math.floor((diff % (1000 * 60)) / 1000);

                    display.textContent = `${days} Hari ${hours} Jam ${mins} Menit ${secs} Detik`;
                    display.style.color = '#FDE047';
                };

                update();
                countdownInterval = setInterval(update, 1000);
            }

            function closeInvoiceModal() {
                document.getElementById('invoiceModal').style.display = 'none';
                document.body.style.overflow = 'auto';
                if (countdownInterval) clearInterval(countdownInterval);
            }
        </script>
    </div>
</x-filament-panels::page>
