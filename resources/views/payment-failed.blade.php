<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Gagal - Deutsch Lernen Mit Fara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .failed-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        .failed-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 3rem;
            text-align: center;
            max-width: 500px;
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
        .failed-icon {
            font-size: 5rem;
            color: #dc3545;
            margin-bottom: 1.5rem;
            animation: shake 0.5s ease-out 0.2s both;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }
        .btn-custom {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border: none;
            padding: 12px 40px;
            border-radius: 25px;
            color: white;
            font-weight: 600;
            transition: transform 0.2s;
            margin: 5px;
        }
        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(245, 87, 108, 0.4);
        }
        .btn-secondary-custom {
            background: white;
            border: 2px solid #f5576c;
            color: #f5576c;
        }
        .btn-secondary-custom:hover {
            background: #f5576c;
            color: white;
        }
    </style>
</head>
<body>
    <div class="failed-container">
        <div class="failed-card">
            <i class="fas fa-times-circle failed-icon"></i>
            <h2 class="mb-3">Pembayaran Gagal</h2>
            <p class="text-muted mb-4">
                Maaf, pembayaran Anda tidak dapat diproses. Silakan coba lagi atau hubungi customer service kami jika masalah berlanjut.
            </p>
            <div class="d-flex flex-column flex-sm-row justify-content-center gap-2">
                <a href="{{ url('/harga') }}" class="btn btn-custom">
                    <i class="fas fa-redo me-2"></i>Coba Lagi
                </a>
                <a href="{{ url('/') }}" class="btn btn-custom btn-secondary-custom">
                    <i class="fas fa-home me-2"></i>Ke Beranda
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
