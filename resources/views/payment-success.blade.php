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

                <div class="detail-row">
                    <span class="detail-label">No. Invoice:</span>
                    <span class="detail-value">{{ $payment->external_id }}</span>
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
</body>
</html>
