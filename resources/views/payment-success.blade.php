<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil - Deutsch Lernen Mit Fara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .success-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
        }
        .success-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 3rem;
            text-align: center;
            max-width: 600px;
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

        /* ===== CSS UNTUK INVOICE COPY ===== */
        .invoice-copy-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .invoice-number {
            position: relative;
        }
        .copy-btn {
            background: transparent;
            border: none;
            color: #667eea;
            cursor: pointer;
            padding: 4px 8px;
            border-radius: 4px;
            transition: all 0.2s;
            position: relative;
        }
        .copy-btn:hover {
            background: #667eea;
            color: white;
        }
        .copy-btn:active {
            transform: scale(0.95);
        }

        /* Toast notification */
        .copy-toast {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #28a745;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 9999;
            animation: slideInRight 0.3s ease-out;
            opacity: 0;
            pointer-events: none;
        }
        .copy-toast.show {
            opacity: 1;
            pointer-events: auto;
        }
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        /* ===== AKHIR CSS INVOICE COPY ===== */

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

        /* ===== TAMBAHKAN CSS INI ===== */
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
        /* ===== AKHIR CSS TAMBAHAN ===== */

        @media (max-width: 576px) {
            .success-card {
                padding: 2rem 1.5rem;
            }
            .detail-row {
                flex-direction: column;
                gap: 0.25rem;
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
        <div class="success-card">
            <i class="fas fa-check-circle success-icon"></i>
            <h2 class="mb-3">Pembayaran Berhasil!</h2>
            <p class="text-muted mb-2">
                Terima kasih telah melakukan pembayaran untuk kursus Bahasa Jerman di
                <strong>Deutsch Lernen Mit Fara</strong>.
            </p>

            @if(isset($payment))
            <div class="payment-details">
                <h5 class="mb-3 text-center"><i class="fas fa-receipt me-2"></i>Detail Pembayaran</h5>

                <!-- ===== INVOICE DENGAN COPY BUTTON ===== -->
                <div class="detail-row">
                    <span class="detail-label">No. Invoice:</span>
                    <div class="invoice-copy-wrapper">
                        <span class="detail-value invoice-number" id="invoiceNumber">{{ $payment->external_id }}</span>
                        <button
                            class="copy-btn"
                            onclick="copyInvoice()"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Klik untuk menyalin"
                        >
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>

                @if($payment->product_name)
                <div class="detail-row">
                    <span class="detail-label">Produk:</span>
                    <span class="detail-value">{{ $payment->product_name }}</span>
                </div>
                @endif

                @if($payment->quantity && $payment->quantity > 1)
                <div class="detail-row">
                    <span class="detail-label">Jumlah:</span>
                    <span class="detail-value">{{ $payment->quantity }} item</span>
                </div>
                @endif

                <div class="detail-row">
                    <span class="detail-label">Nama Pemesan:</span>
                    <span class="detail-value">{{ $payment->payer_name }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value">{{ $payment->payer_email }}</span>
                </div>

                @if($payment->payer_phone)
                <div class="detail-row">
                    <span class="detail-label">No. Telepon:</span>
                    <span class="detail-value">{{ $payment->payer_phone }}</span>
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

                @if($payment->paid_at)
                <div class="detail-row">
                    <span class="detail-label">Tanggal Bayar:</span>
                    <span class="detail-value">{{ $payment->paid_at->format('d/m/Y H:i') }} WIB</span>
                </div>
                @endif
            </div>
            @endif

            <!-- ===== GANTI BAGIAN INI ===== -->
            <div class="action-buttons">
                <a href="{{ $whatsappUrl ?? '#' }}" class="btn-whatsapp" target="_blank">
                    <i class="fab fa-whatsapp me-2"></i>Konfirmasi via WhatsApp
                </a>
                {{-- <a href="{{ url('/') }}" class="btn-custom">
                    <i class="fas fa-home me-2"></i>Kembali ke Beranda
                </a> --}}
            </div>
            <!-- ===== AKHIR BAGIAN YANG DIGANTI ===== -->

            <p class="text-muted mb-4">
                <i class="fas fa-envelope me-2"></i>
                Kami akan segera mengirimkan email konfirmasi dan detail akses kursus ke email Anda.
            </p>

            <a href="{{ url('/') }}" class="btn btn-custom">
                <i class="fas fa-home me-2"></i>Kembali ke Beranda
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ===== JAVASCRIPT ===== -->
    <script>
        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Function untuk copy invoice
        function copyInvoice() {
            const invoiceNumber = document.getElementById('invoiceNumber').textContent;

            // Copy ke clipboard
            navigator.clipboard.writeText(invoiceNumber).then(function() {
                // Show toast notification
                const toast = document.getElementById('copyToast');
                toast.classList.add('show');

                // Hide toast after 3 seconds
                setTimeout(function() {
                    toast.classList.remove('show');
                }, 3000);
            }).catch(function(err) {
                console.error('Failed to copy: ', err);
                // Fallback untuk browser yang tidak support clipboard API
                alert('Nomor Invoice: ' + invoiceNumber);
            });
        }
    </script>
</body>
</html>
