<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil - Deutsch Lernen Mit Fara</title>
    <link rel="icon" href="{{ asset('asset/img/logo/logo-Transparant3.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .success-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 40px 20px 60px;
        }

        .success-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 3rem;
            text-align: center;
            max-width: 750px;
            width: 100%;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-icon {
            font-size: 5rem;
            color: #28a745;
            margin-bottom: 1.5rem;
            animation: scaleIn 0.5s ease-out 0.2s both;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
            }

            to {
                transform: scale(1);
            }
        }

        .payment-details {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin: 2rem 0;
            text-align: left;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid #dee2e6;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #6c757d;
        }

        .detail-value {
            color: #212529;
            font-weight: 500;
        }

        .invoice-copy-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .copy-btn {
            background: transparent;
            border: none;
            color: #667eea;
            cursor: pointer;
            padding: 4px 8px;
            border-radius: 4px;
            transition: all 0.2s;
        }

        .copy-btn:hover {
            background: #667eea;
            color: white;
        }

        .copy-toast {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #28a745;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 9999;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
        }

        .copy-toast.show {
            opacity: 1;
            pointer-events: auto;
        }

        .btn-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 40px;
            border-radius: 25px;
            color: white;
            font-weight: 600;
            transition: transform 0.2s;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-whatsapp {
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            border: none;
            padding: 12px 40px;
            border-radius: 25px;
            color: white;
            font-weight: 600;
            transition: transform 0.2s;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
        }

        .btn-whatsapp:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37, 211, 102, 0.4);
            color: white;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 2rem;
        }

        /* ── SURVEY ─────────────────────────────────────────── */
        .survey-wrapper {
            max-width: 750px;
            width: 100%;
            margin-top: 2rem;
            animation: slideUp 0.6s ease-out 0.3s both;
        }

        .survey-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.15);
            overflow: hidden;
        }

        .survey-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem 2.5rem 1.8rem;
            color: white;
            text-align: center;
        }

        .survey-header .survey-emoji {
            font-size: 2.5rem;
            display: block;
            margin-bottom: 0.5rem;
        }

        .survey-header h3 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.4rem;
        }

        .survey-header p {
            opacity: 0.88;
            font-size: 0.92rem;
            margin: 0;
        }

        .survey-body {
            padding: 2rem 2.5rem 2.5rem;
        }

        .survey-question {
            margin-bottom: 2rem;
        }

        .survey-question:last-of-type {
            margin-bottom: 0;
        }

        .question-label {
            font-weight: 700;
            font-size: 1rem;
            color: #1a1a2e;
            margin-bottom: 0.3rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .question-hint {
            font-size: 0.8rem;
            color: #9b9bbd;
            margin-bottom: 0.9rem;
            margin-top: 0;
        }

        .options-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 0.6rem;
        }

        .options-grid.two-col {
            grid-template-columns: 1fr 1fr;
        }

        .options-grid.single-col {
            grid-template-columns: 1fr;
        }

        .survey-option {
            position: relative;
        }

        .survey-option input[type="radio"],
        .survey-option input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .survey-option label {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0.65rem 1rem;
            border: 2px solid #e8e8f0;
            border-radius: 12px;
            cursor: pointer;
            font-size: 0.88rem;
            font-weight: 500;
            color: #444;
            transition: all 0.2s ease;
            background: #fafafa;
            user-select: none;
        }

        .survey-option label .option-dot {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid #cbd5e1;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .survey-option label .option-box {
            width: 18px;
            height: 18px;
            border-radius: 5px;
            border: 2px solid #cbd5e1;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .survey-option input[type="radio"]:checked+label,
        .survey-option input[type="checkbox"]:checked+label {
            border-color: #667eea;
            background: linear-gradient(135deg, #f0f3ff 0%, #f5f0ff 100%);
            color: #4a4fd6;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.18);
        }

        .survey-option input[type="radio"]:checked+label .option-dot {
            border-color: #667eea;
            background: #667eea;
        }

        .survey-option input[type="radio"]:checked+label .option-dot::after {
            content: '';
            width: 7px;
            height: 7px;
            background: white;
            border-radius: 50%;
            display: block;
        }

        .survey-option input[type="checkbox"]:checked+label .option-box {
            border-color: #667eea;
            background: #667eea;
        }

        .survey-option input[type="checkbox"]:checked+label .option-box::after {
            content: '\2713';
            font-size: 11px;
            color: white;
            font-weight: 900;
        }

        .survey-option label:hover {
            border-color: #a0a8f8;
            background: #f7f8ff;
            transform: translateY(-1px);
        }

        .survey-divider {
            border: none;
            height: 1px;
            background: linear-gradient(to right, transparent, #e4e6f3, transparent);
            margin: 1.8rem 0;
        }

        .other-input {
            margin-top: 0.6rem;
            display: none;
        }

        .other-input input {
            width: 100%;
            padding: 0.5rem 0.9rem;
            border: 2px solid #e8e8f0;
            border-radius: 10px;
            font-size: 0.88rem;
            outline: none;
            transition: border-color 0.2s;
        }

        .other-input input:focus {
            border-color: #667eea;
        }

        .btn-survey-submit {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 14px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.25s;
            margin-top: 2rem;
            letter-spacing: 0.3px;
        }

        .btn-survey-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(102, 126, 234, 0.4);
        }

        .survey-skip {
            text-align: center;
            margin-top: 1rem;
        }

        .survey-skip a {
            font-size: 0.82rem;
            color: #9b9bbd;
            text-decoration: none;
            border-bottom: 1px dashed #c0c0d8;
            transition: color 0.2s;
        }

        .survey-skip a:hover {
            color: #667eea;
        }

        .survey-success-alert {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            border: none;
            border-radius: 14px;
            padding: 1.2rem 1.5rem;
            color: #065f46;
            font-weight: 600;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .q-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-size: 0.75rem;
            font-weight: 700;
            flex-shrink: 0;
        }

        @media (max-width: 576px) {
            .success-card {
                padding: 2rem 1.5rem;
            }

            .detail-row {
                flex-direction: column;
                gap: 0.25rem;
            }

            .survey-body {
                padding: 1.5rem 1.2rem 2rem;
            }

            .survey-header {
                padding: 1.5rem 1.2rem 1.3rem;
            }

            .options-grid,
            .options-grid.two-col {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Toast Notification -->
    <div class="copy-toast" id="copyToast">
        <i class="fas fa-check-circle"></i>
        <span>Nomor invoice berhasil disalin!</span>
    </div>

    <div class="success-container">

        {{-- ── SUCCESS CARD ──────────────────────────────────────── --}}
        <div class="success-card">
            <i class="fas fa-check-circle success-icon"></i>
            <h2 class="mb-3">Pembayaran Berhasil!</h2>
            <p class="text-muted mb-2">
                Terima kasih telah melakukan pembayaran untuk kursus Bahasa Jerman di
                <strong>Deutsch Lernen Mit Fara</strong>.
            </p>

            @if (isset($payment))
                <div class="payment-details">
                    <h5 class="mb-3 text-center"><i class="fas fa-receipt me-2"></i>Detail Pembayaran</h5>

                    <div class="detail-row">
                        <span class="detail-label">No. Invoice:</span>
                        <div class="invoice-copy-wrapper">
                            <span class="detail-value invoice-number"
                                id="invoiceNumber">{{ $payment->external_id }}</span>
                            <button class="copy-btn" onclick="copyInvoice()" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Klik untuk menyalin">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>

                    @if ($payment->product_name)
                        <div class="detail-row">
                            <span class="detail-label">Produk:</span>
                            <span class="detail-value">{{ $payment->product_name }}</span>
                        </div>
                    @endif

                    @if ($payment->quantity && $payment->quantity > 1)
                        <div class="detail-row">
                            <span class="detail-label">Jumlah:</span>
                            <span class="detail-value">{{ $payment->quantity }} item</span>
                        </div>
                    @endif

                    <div class="detail-row">
                        <span class="detail-label">Nama Pemesan:</span>
                        <span
                            class="detail-value">{{ $payment->given_names }}{{ $payment->surname ? ' ' . $payment->surname : '' }}</span>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Email:</span>
                        <span class="detail-value">{{ $payment->email }}</span>
                    </div>

                    @if ($payment->mobile_number)
                        <div class="detail-row">
                            <span class="detail-label">No. Telepon:</span>
                            <span class="detail-value">{{ $payment->mobile_number }}</span>
                        </div>
                    @endif

                    <div class="detail-row">
                        <span class="detail-label">Jumlah Bayar:</span>
                        <span class="detail-value">Rp {{ number_format($payment->amount, 0, ',', '.') }}</span>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Status:</span>
                        <span class="detail-value text-success"><i class="fas fa-check-circle me-1"></i>Lunas</span>
                    </div>

                    @if ($payment->paid_at)
                        <div class="detail-row">
                            <span class="detail-label">Tanggal Bayar:</span>
                            <span class="detail-value">{{ $payment->paid_at->format('d/m/Y H:i') }} WIB</span>
                        </div>
                    @endif

                    @if ($payment->payment_channel)
                        <div class="detail-row">
                            <span class="detail-label">Metode Pembayaran:</span>
                            <span class="detail-value">{{ $payment->payment_channel }}</span>
                        </div>
                    @endif
                </div>
            @endif

            <div class="action-buttons">
                <a href="{{ $whatsappUrl ?? '#' }}" class="btn-whatsapp" target="_blank">
                    <i class="fab fa-whatsapp me-2"></i>Konfirmasi via WhatsApp
                </a>
            </div>

            <p class="text-muted mb-4 mt-3">
                <i class="fas fa-envelope me-2"></i>
                Kami akan segera mengirimkan email konfirmasi dan detail akses kursus ke email Anda.
            </p>

            <a href="{{ url('/student') }}" class="btn btn-custom">
                <i class="fas fa-home me-2"></i>Kembali ke Dashboard Siswa
            </a>
        </div>


    </div>{{-- /.success-container --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // tooltips
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => new bootstrap.Tooltip(el));

        // copy invoice
        function copyInvoice() {
            const val = document.getElementById('invoiceNumber').textContent;
            navigator.clipboard.writeText(val).then(() => {
                const t = document.getElementById('copyToast');
                t.classList.add('show');
                setTimeout(() => t.classList.remove('show'), 3000);
            }).catch(() => alert('Nomor Invoice: ' + val));
        }

        // Q2: max 2 checkboxes + "Lainnya" text input
        const q2Boxes = document.querySelectorAll('.q2-checkbox');
        const otherBox = document.getElementById('q2_7'); // index 7 = "Lainnya"
        const otherInput = document.getElementById('otherInput');

        function syncQ2() {
            const checked = Array.from(q2Boxes).filter(c => c.checked);
            q2Boxes.forEach(cb => {
                cb.disabled = checked.length >= 2 && !cb.checked;
            });
            if (otherInput) otherInput.style.display = otherBox && otherBox.checked ? 'block' : 'none';
        }

        q2Boxes.forEach(cb => cb.addEventListener('change', syncQ2));

        // form submit validation
        const surveyForm = document.getElementById('surveyForm');
        if (surveyForm) {
            surveyForm.addEventListener('submit', function(e) {
                const checked = Array.from(q2Boxes).filter(c => c.checked);
                if (checked.length === 0) {
                    e.preventDefault();
                    alert('Mohon pilih minimal 1 pertimbangan utama (Pertanyaan 2).');
                    return;
                }
                const btn = document.getElementById('surveySubmitBtn');
                if (btn) {
                    btn.disabled = true;
                    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
                }
            });
        }
    </script>
</body>

</html>
