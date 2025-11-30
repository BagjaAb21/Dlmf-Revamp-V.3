<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Deutsch Lernen Mit Fara</title>
    <link rel="icon" href="{{ asset('asset/img/logo/logo-Transparant3.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 0;
        }
        .checkout-container {
            max-width: 900px;
            margin: 0 auto;
        }
        .checkout-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .checkout-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .checkout-header h2 {
            margin: 0;
            font-weight: 700;
        }
        .checkout-body {
            padding: 40px;
        }
        .product-info {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
        }
        .product-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 10px;
        }
        .product-price {
            font-size: 1.8rem;
            font-weight: 800;
            color: #764ba2;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }
        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 20px;
            transition: all 0.3s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .quantity-control {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .quantity-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 2px solid #667eea;
            background: white;
            color: #667eea;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .quantity-btn:hover {
            background: #667eea;
            color: white;
            transform: scale(1.1);
        }
        .quantity-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        .quantity-input {
            width: 80px;
            text-align: center;
            font-size: 1.2rem;
            font-weight: 700;
        }
        .total-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            padding: 25px;
            color: white;
            margin: 30px 0;
        }
        .total-label {
            font-size: 1.1rem;
            font-weight: 500;
            opacity: 0.9;
        }
        .total-amount {
            font-size: 2rem;
            font-weight: 800;
            margin-top: 10px;
        }
        .btn-checkout {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 15px 50px;
            border-radius: 50px;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            width: 100%;
            transition: all 0.3s;
        }
        .btn-checkout:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
        }
        .btn-back {
            background: white;
            border: 2px solid #667eea;
            color: #667eea;
            padding: 12px 40px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }
        .btn-back:hover {
            background: #667eea;
            color: white;
        }
        .alert-custom {
            border-radius: 15px;
            border: none;
            padding: 15px 20px;
        }
        @media (max-width: 768px) {
            .checkout-body {
                padding: 25px;
            }
            .product-name {
                font-size: 1.2rem;
            }
            .product-price {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <div class="checkout-card">
            <div class="checkout-header">
                <h2><i class="fas fa-shopping-cart me-2"></i>Checkout Produk</h2>
                <p class="mb-0 mt-2">Lengkapi data Anda untuk melanjutkan pembayaran</p>
            </div>

            <div class="checkout-body">
                @if(session('error'))
                <div class="alert alert-danger alert-custom" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                </div>
                @endif

                <!-- Product Information -->
                <div class="product-info">
                    <div class="product-name">{{ $product['name'] }}</div>
                    <div class="product-price">Rp {{ number_format($product['price'], 0, ',', '.') }}</div>
                    <div class="mt-2 text-muted">
                        <i class="fas fa-info-circle me-1"></i>Harga per item
                    </div>
                </div>

                <!-- Checkout Form -->
                <form id="checkoutForm" action="{{ route('payment.process') }}" method="POST">
                    @csrf
                    <!-- HANYA KIRIM PRODUCT CODE - Server akan calculate price -->
                    <input type="hidden" name="product_code" value="{{ $product['code'] }}">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="payer_name" class="form-label">
                                <i class="fas fa-user me-1"></i>Nama Lengkap <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="payer_name" name="payer_name"
                                   placeholder="Masukkan nama lengkap" required>
                        </div>
                        <div class="col-md-6">
                            <label for="payer_email" class="form-label">
                                <i class="fas fa-envelope me-1"></i>Email <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control" id="payer_email" name="payer_email"
                                   placeholder="contoh@email.com" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="payer_phone" class="form-label">
                            <i class="fas fa-phone me-1"></i>Nomor Telepon/WhatsApp <span class="text-danger">*</span>
                        </label>
                        <input type="tel" class="form-control" id="payer_phone" name="payer_phone"
                               placeholder="08xxxxxxxxxx" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            <i class="fas fa-shopping-basket me-1"></i>Jumlah Item <span class="text-danger">*</span>
                        </label>
                        <div class="quantity-control">
                            <button type="button" class="quantity-btn" onclick="decreaseQuantity()">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" class="form-control quantity-input" id="quantity" name="quantity"
                                   value="1" min="1" max="10" readonly>
                            <button type="button" class="quantity-btn" onclick="increaseQuantity()">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>Maksimal 10 item per transaksi
                        </small>
                    </div>

                    <!-- Total Section -->
                    <div class="total-section">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="total-label">Total Pembayaran</div>
                                <div class="total-amount" id="totalAmount">
                                    Rp {{ number_format($product['price'], 0, ',', '.') }}
                                </div>
                            </div>
                            <div class="text-end">
                                <div class="total-label">Quantity</div>
                                <div style="font-size: 2rem; font-weight: 800;" id="displayQuantity">1</div>
                            </div>
                        </div>
                    </div>

                    <!-- Terms & Conditions -->
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms" required>
                            <label class="form-check-label" for="terms">
                                Saya setuju dengan <a href="#" class="text-decoration-none">syarat dan ketentuan</a> yang berlaku
                            </label>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex gap-3 flex-column flex-md-row">
                        <a href="{{ url('/harga') }}" class="btn-back text-center">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn-checkout" id="btnSubmit">
                            <i class="fas fa-credit-card me-2"></i>Lanjut ke Pembayaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const basePrice = {{ $product['price'] }};

        function updateTotal() {
            const quantity = parseInt(document.getElementById('quantity').value);
            const total = basePrice * quantity;

            document.getElementById('totalAmount').textContent =
                'Rp ' + total.toLocaleString('id-ID');
            document.getElementById('displayQuantity').textContent = quantity;
        }

        function increaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);

            if (currentValue < 10) {
                quantityInput.value = currentValue + 1;
                updateTotal();
            }
        }

        function decreaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);

            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateTotal();
            }
        }

        // Form submission dengan loading state
        document.getElementById('checkoutForm').addEventListener('submit', function(e) {
            const btnSubmit = document.getElementById('btnSubmit');
            btnSubmit.disabled = true;
            btnSubmit.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
        });

        // Validasi phone number format
        document.getElementById('payer_phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^0-9]/g, '');
            e.target.value = value;
        });
    </script>
</body>
</html>
