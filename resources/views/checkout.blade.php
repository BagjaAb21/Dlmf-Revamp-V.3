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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
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
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
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

        .form-control,
        .form-select {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 20px;
            transition: all 0.3s;
        }

        .form-control:focus,
        .form-select:focus {
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

        /* Payment Method Styles */
        .payment-method-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .payment-option {
            position: relative;
            cursor: pointer;
        }

        .payment-option input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .payment-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border: 2px solid #e9ecef;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s;
            background: white;
        }

        .payment-option input[type="radio"]:checked+.payment-label {
            border-color: #667eea;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.2);
        }

        .payment-header {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .payment-icon {
            font-size: 2rem;
            color: #667eea;
        }

        .payment-name {
            font-weight: 700;
            font-size: 1.1rem;
            color: #495057;
        }

        .payment-desc {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 2px;
        }

        .payment-fee {
            text-align: right;
        }

        .payment-fee .badge {
            font-size: 0.85rem;
            padding: 8px 12px;
            font-weight: 600;
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

        .fee-breakdown {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
        }

        .fee-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .fee-item.subtotal {
            opacity: 0.9;
        }

        .fee-item.admin-fee {
            opacity: 0.9;
            color: #ffc107;
        }

        .fee-item.admin-fee i {
            transition: all 0.3s;
        }

        .fee-item.admin-fee i:hover {
            color: #fff;
            transform: scale(1.2);
        }

        .fee-item.total {
            font-size: 1.1rem;
            font-weight: 700;
            padding-top: 10px;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
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

        .btn-checkout.pulse-animation {
            animation: pulse-btn 0.5s ease-in-out 2;
        }

        @keyframes pulse-btn {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
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

            .payment-label {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .payment-fee {
                text-align: left;
            }
        }

        /* Terms Modal Styles */
        .modal-terms .modal-content {
            border-radius: 20px;
            border: none;
        }

        .modal-terms .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 20px 20px 0 0;
            padding: 25px 30px;
        }

        .modal-terms .modal-title {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .modal-terms .btn-close {
            filter: brightness(0) invert(1);
        }

        .modal-terms .modal-body {
            padding: 30px;
            max-height: 500px;
            overflow-y: auto;
        }

        .modal-terms .modal-body::-webkit-scrollbar {
            width: 8px;
        }

        .modal-terms .modal-body::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .modal-terms .modal-body::-webkit-scrollbar-thumb {
            background: #667eea;
            border-radius: 10px;
        }

        .modal-terms .modal-body::-webkit-scrollbar-thumb:hover {
            background: #764ba2;
        }

        .terms-content h3 {
            color: #667eea;
            font-weight: 700;
            font-size: 1.2rem;
            margin-top: 25px;
            margin-bottom: 15px;
        }

        .terms-content h3:first-child {
            margin-top: 0;
        }

        .terms-content p {
            color: #495057;
            line-height: 1.8;
            margin-bottom: 15px;
            text-align: justify;
        }

        .terms-content ul,
        .terms-content ol {
            color: #495057;
            line-height: 1.8;
            margin-bottom: 15px;
            padding-left: 25px;
        }

        .terms-content li {
            margin-bottom: 10px;
        }

        .terms-content strong {
            color: #764ba2;
        }

        .modal-terms .modal-footer {
            border-top: 2px solid #e9ecef;
            padding: 20px 30px;
        }

        .btn-accept-terms {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 40px;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-accept-terms:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .btn-accept-terms:disabled {
            background: #6c757d;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .scroll-indicator {
            text-align: center;
            padding: 10px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            border-radius: 10px;
            margin-bottom: 15px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        .scroll-indicator i {
            color: #667eea;
            font-size: 1.2rem;
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
                                placeholder="contoh@gmail.com" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="payer_phone" class="form-label">
                            <i class="fas fa-phone me-1"></i>Nomor Telepon/WhatsApp <span class="text-danger">*</span>
                        </label>
                        <input type="tel" class="form-control" id="payer_phone" name="payer_phone"
                            placeholder="62856xxxxxxxxxx" required pattern="[0-9]{10,15}" minlength="10" maxlength="15"
                            title="Nomor telepon harus 10-15 digit">
                        <div class="invalid-feedback">
                            Nomor telepon harus berisi 10-15 digit angka.
                        </div>
                        <!-- <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>Format: 62856xxxxxxxxxx (10-15 digit)
                        </small> -->
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

                    <!-- Payment Method Selection -->
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="fas fa-credit-card me-1"></i>Metode Pembayaran <span class="text-danger">*</span>
                        </label>
                        <div class="payment-method-container">
                            <div class="payment-option" onclick="selectPaymentMethod('QRIS')">
                                <input type="radio" class="form-check-input" id="qris" name="payment_method"
                                    value="QRIS" checked>
                                <label class="payment-label" for="qris">
                                    <div class="payment-header">
                                        <i class="fas fa-qrcode payment-icon"></i>
                                        <div>
                                            <div class="payment-name">QRIS</div>
                                            <div class="payment-desc">Scan & Bayar dengan Mobile Banking/E-Wallet</div>
                                        </div>
                                    </div>
                                    <div class="payment-fee">
                                        <span class="badge bg-info text-white">
                                            <i class="fas fa-plus-circle me-1"></i>Biaya 0.63% + PPN
                                        </span>
                                    </div>
                                </label>
                            </div>

                            <div class="payment-option" onclick="selectPaymentMethod('VA')">
                                <input type="radio" class="form-check-input" id="va" name="payment_method" value="VA">
                                <label class="payment-label" for="va">
                                    <div class="payment-header">
                                        <i class="fas fa-university payment-icon"></i>
                                        <div>
                                            <div class="payment-name">Virtual Account</div>
                                            <div class="payment-desc">Transfer via ATM/Mobile Banking</div>
                                        </div>
                                    </div>
                                    <div class="payment-fee">
                                        <span class="badge bg-warning text-dark">
                                            <i class="fas fa-plus-circle me-1"></i>Biaya Admin Rp 4.440
                                        </span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Payment Fee Information -->
                        <div class="alert alert-info mt-3" id="paymentFeeInfo">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-info-circle me-2 mt-1"></i>
                                <div>
                                    <strong>Informasi Biaya Tambahan:</strong>
                                    <ul class="mb-0 mt-2 ps-3">
                                        <li><strong>QRIS:</strong> 0.63% dari total harga + PPN 11%</li>
                                        <li><strong>Virtual Account:</strong> Rp 4.000 + PPN 11% = <strong>Rp
                                                4.440</strong></li>
                                    </ul>
                                    <small class="text-muted mt-2 d-block">
                                        <i class="fas fa-lightbulb me-1"></i>
                                        Biaya akan dihitung otomatis berdasarkan jumlah pembelian dan metode pembayaran
                                        yang dipilih
                                    </small>
                                </div>
                            </div>
                        </div>
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

                        <!-- Fee Breakdown -->
                        <div class="fee-breakdown" id="feeBreakdown">
                            <div class="fee-item subtotal">
                                <span>Subtotal (<span id="qtyText">1</span> item):</span>
                                <span id="subtotalDisplay">Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                            </div>
                            <div class="fee-item admin-fee" id="convenienceFeeDisplay" style="display: none;">
                                <span>
                                    Convenience Fee
                                    <i class="fas fa-info-circle ms-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                        id="feeTooltipIcon" style="cursor: pointer; font-size: 0.9rem;" title=""></i>
                                </span>
                                <span id="convenienceFeeAmount">Rp 0</span>
                            </div>
                            <div class="fee-item total">
                                <span>Total:</span>
                                <span id="grandTotalDisplay">Rp {{ number_format($product['price'], 0, ',', '.')
                                    }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Terms & Conditions -->
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms" disabled>
                            <label class="form-check-label" for="terms" style="cursor: pointer;"
                                onclick="openTermsModal()">
                                Saya setuju dengan <a href="#" class="text-decoration-none"
                                    onclick="event.preventDefault(); openTermsModal()">syarat dan ketentuan</a> yang
                                berlaku
                            </label>
                        </div>
                        <small class="text-muted d-block mt-1">
                            <i class="fas fa-info-circle me-1"></i>Silakan baca syarat dan ketentuan terlebih dahulu
                        </small>
                    </div>

                    <!-- Terms and Conditions Modal -->
                    <div class="modal fade modal-terms" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="termsModalLabel">
                                        <i class="fas fa-file-contract me-2"></i>Syarat dan Ketentuan
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="scroll-indicator" id="scrollIndicator">
                                    <i class="fas fa-arrow-down"></i>
                                    <div style="font-size: 0.85rem; color: #667eea; font-weight: 600; margin-top: 5px;">
                                        Scroll ke bawah untuk membaca seluruh ketentuan
                                    </div>
                                </div>
                                <div class="modal-body" id="termsModalBody">
                                    <div class="terms-content">
                                        <p
                                            style="text-align: center; font-weight: 600; color: #764ba2; font-size: 1.1rem; margin-bottom: 20px;">
                                            TERMS & CONDITIONS – DEUTSCH LERNEN MIT FARA (MITFARA.COM)<br>
                                            <span style="font-size: 0.9rem;">Dikelola oleh PT Fara Kreatif
                                                Sejahtera</span>
                                        </p>

                                        <p>Dokumen ini mengatur syarat dan ketentuan penggunaan seluruh layanan, produk,
                                            dan konten yang disediakan oleh Deutsch lernen mit Fara / mitfara.com
                                            ("Platform") yang dikelola oleh PT Fara Kreatif Sejahtera ("Kami").</p>

                                        <p>Dengan mengakses platform dan mengikuti layanan kami, Anda ("Pengguna")
                                            dianggap memahami dan menyetujui seluruh syarat dan ketentuan berikut.</p>

                                        <h3>1. Definisi</h3>
                                        <ol>
                                            <li><strong>Platform:</strong> Merujuk pada website mitfara.com, aplikasi,
                                                sistem pembelajaran, dan seluruh layanan yang disediakan oleh PT Fara
                                                Kreatif Sejahtera.</li>
                                            <li><strong>Pengguna:</strong> Individu yang mengakses, mendaftar, atau
                                                memanfaatkan layanan pembelajaran, baik secara gratis maupun berbayar.
                                            </li>
                                            <li><strong>Siswa:</strong> Pengguna yang telah membeli kursus atau
                                                mengikuti program pembelajaran berbayar.</li>
                                            <li><strong>Pengajar / Tutor (Teacher):</strong> Individu yang ditunjuk oleh
                                                PT Fara Kreatif Sejahtera untuk memberikan materi pembelajaran.</li>
                                            <li><strong>Kelas Live:</strong> Sesi pembelajaran melalui platform video
                                                conference (Microsoft Teams).</li>
                                            <li><strong>Materi Pembelajaran:</strong> Segala bentuk konten seperti
                                                video, modul PDF, kuis, rekaman kelas, dan bahan lainnya yang tersedia
                                                di platform.</li>
                                            <li><strong>Akses Kursus:</strong> Hak untuk mengakses materi sesuai dengan
                                                paket/level yang dibeli.</li>
                                            <li><strong>Payment Gateway:</strong> Fasilitas pembayaran yang bekerja sama
                                                dengan platform untuk memproses transaksi (Xendit).</li>
                                        </ol>

                                        <h3>2. Ruang Lingkup Layanan</h3>
                                        <p>Layanan platform meliputi:</p>
                                        <ul>
                                            <li>Pembelajaran bahasa Jerman (A1–B2)</li>
                                            <li>Kelas live interaktif</li>
                                            <li>Materi digital</li>
                                            <li>Kuis, latihan, ujian, dan placement test</li>
                                            <li>Komunitas pembelajaran</li>
                                            <li>Produk digital</li>
                                            <li>Konsultasi akademik (jika tersedia)</li>
                                        </ul>
                                        <p>Perubahan atau penambahan layanan dapat dilakukan sewaktu-waktu tanpa
                                            pemberitahuan awal kepada pengguna.</p>

                                        <h3>3. Registrasi Akun</h3>
                                        <ol>
                                            <li>Pengguna wajib menyediakan data akurat, terbaru, dan dapat diverifikasi.
                                            </li>
                                            <li>Pengguna bertanggung jawab menjaga kerahasiaan akun dan kata sandi.</li>
                                            <li>PT Fara Kreatif Sejahtera berhak menolak, menangguhkan, atau menutup
                                                akun apabila ditemukan:
                                                <ul>
                                                    <li>Data palsu</li>
                                                    <li>Pelanggaran aturan</li>
                                                    <li>Penyalahgunaan platform</li>
                                                </ul>
                                            </li>
                                        </ol>

                                        <h3>4. Pembelian, Pembayaran, dan Biaya</h3>
                                        <ol>
                                            <li>Seluruh transaksi dilakukan melalui payment gateway resmi platform.</li>
                                            <li>Harga kelas dapat berubah sewaktu-waktu mengikuti pembaruan yang berlaku
                                                di platform tanpa pemberitahuan sebelumnya.</li>
                                            <li>Biaya tambahan dapat berlaku, seperti:
                                                <ul>
                                                    <li>Convenience fee (biaya kemudahan pembayaran)</li>
                                                    <li>Admin fee</li>
                                                    <li>Biaya layanan platform</li>
                                                </ul>
                                            </li>
                                            <li>Pesanan dianggap sah setelah pembayaran dikonfirmasi oleh sistem.</li>
                                            <li>Bukti pembayaran akan dikirimkan secara otomatis ke email/akun siswa.
                                            </li>
                                        </ol>

                                        <h3>5. Kebijakan Refund</h3>
                                        <p><strong>Refund hanya berlaku jika:</strong></p>
                                        <ul>
                                            <li>Kelas dibatalkan oleh pihak PT Fara Kreatif Sejahtera</li>
                                        </ul>
                                        <p><strong>Refund tidak berlaku untuk:</strong></p>
                                        <ul>
                                            <li>Kesalahan transfer</li>
                                            <li>Ketidakmampuan hadir</li>
                                            <li>Perubahan jadwal pribadi</li>
                                            <li>Sudah mendapatkan akses ke materi digital</li>
                                            <li>Permintaan refund setelah kelas berjalan</li>
                                        </ul>
                                        <p>Seluruh biaya transaksi (admin fee, convenience fee) ditanggung oleh siswa
                                            dan tidak dapat dikembalikan.</p>

                                        <h3>6. Akses Konten & Durasi</h3>
                                        <ol>
                                            <li>Akses materi diberikan sesuai durasi paket kursus yang dibeli (misalnya
                                                3 bulan, 6 bulan, atau lifetime sesuai kebijakan kursus).</li>
                                            <li>Akses tidak dapat dipindahtangankan ke orang lain.</li>
                                            <li>PT Fara Kreatif Sejahtera berhak melakukan pembaruan, perubahan, atau
                                                penghapusan materi pembelajaran.</li>
                                            <li>Akses hanya diperbolehkan untuk penggunaan pribadi, bukan publik atau
                                                komersial.</li>
                                        </ol>

                                        <h3>7. Kelas Live, Rekaman, dan Absensi</h3>
                                        <ol>
                                            <li>Jadwal kelas live ditetapkan oleh pihak platform dan dapat berubah
                                                sesuai kebutuhan akademik.</li>
                                            <li>Ketidakhadiran siswa bukan kewajiban platform untuk menggantikan.</li>
                                            <li>Rekaman kelas (jika disediakan) hanya untuk keperluan review dan tidak
                                                boleh disebarkan.</li>
                                            <li>Pengguna dilarang:
                                                <ul>
                                                    <li>Merekam ulang kelas tanpa izin</li>
                                                    <li>Membagikan tautan kelas</li>
                                                    <li>Mengganggu proses belajar</li>
                                                </ul>
                                            </li>
                                        </ol>

                                        <h3>8. Hak & Kewajiban Siswa</h3>
                                        <p><strong>Siswa berhak untuk:</strong></p>
                                        <ul>
                                            <li>Mendapatkan materi sesuai paket yang dibeli</li>
                                            <li>Mengikuti kelas live</li>
                                            <li>Mengakses rekaman (jika ada)</li>
                                            <li>Mengajukan pertanyaan dalam proses belajar</li>
                                        </ul>
                                        <p><strong>Siswa berkewajiban untuk:</strong></p>
                                        <ul>
                                            <li>Mengikuti etika pembelajaran</li>
                                            <li>Tidak menyalahgunakan konten</li>
                                            <li>Menggunakan platform sesuai hukum yang berlaku</li>
                                            <li>Menjaga privasi pengajar dan siswa lain</li>
                                        </ul>

                                        <h3>9. Hak & Kewajiban Pengajar</h3>
                                        <p>Pengajar di bawah PT Fara Kreatif Sejahtera:</p>
                                        <ul>
                                            <li>Berhak menyampaikan materi sesuai kurikulum</li>
                                            <li>Wajib menjaga profesionalisme</li>
                                            <li>Tidak diperkenankan meminta pembayaran langsung kepada siswa</li>
                                            <li>Tidak diperkenankan melakukan tindakan yang merugikan siswa</li>
                                        </ul>

                                        <h3>10. Hak Kekayaan Intelektual</h3>
                                        <ol>
                                            <li>Seluruh materi di platform adalah milik PT Fara Kreatif Sejahtera atau
                                                pengajar yang memberikan lisensi penggunaan.</li>
                                            <li>Pengguna tidak diperbolehkan:
                                                <ul>
                                                    <li>Menggandakan</li>
                                                    <li>Memfotokopi</li>
                                                    <li>Mengunduh secara ilegal</li>
                                                    <li>Mendapatkan akses tanpa izin</li>
                                                    <li>Menjual kembali</li>
                                                </ul>
                                            </li>
                                            <li>Pelanggaran dapat berakibat pada:
                                                <ul>
                                                    <li>Penutupan akun permanen</li>
                                                    <li>Tindakan hukum</li>
                                                </ul>
                                            </li>
                                        </ol>

                                        <h3>11. Larangan Penggunaan Platform</h3>
                                        <p>Pengguna dilarang menggunakan platform untuk:</p>
                                        <ul>
                                            <li>Penipuan</li>
                                            <li>Penyebaran konten ilegal</li>
                                            <li>Pelanggaran SARA</li>
                                            <li>Pelecehan terhadap pengajar atau siswa</li>
                                            <li>Penyebaran materi tanpa izin</li>
                                            <li>Peretasan atau akses ilegal</li>
                                        </ul>

                                        <h3>12. Privasi dan Penggunaan Data</h3>
                                        <ol>
                                            <li>Data pengguna digunakan untuk keperluan:
                                                <ul>
                                                    <li>Aktivasi akun</li>
                                                    <li>Pembelian kursus</li>
                                                    <li>Akses kelas</li>
                                                    <li>Komunikasi akademik</li>
                                                    <li>Administrasi platform</li>
                                                </ul>
                                            </li>
                                            <li>Data siswa seperti rekaman kelas dapat digunakan untuk peningkatan
                                                kualitas pembelajaran.</li>
                                            <li>PT Fara Kreatif Sejahtera tidak menjual data kepada pihak luar.</li>
                                            <li>Data dapat dibagikan kepada pihak ketiga yang bekerja sama (payment
                                                gateway, LMS, dan layanan pengiriman email).</li>
                                        </ol>

                                        <h3>13. Batasan Tanggung Jawab</h3>
                                        <p>PT Fara Kreatif Sejahtera tidak bertanggung jawab atas:</p>
                                        <ul>
                                            <li>Kendala perangkat pengguna</li>
                                            <li>Koneksi internet pengguna</li>
                                            <li>Salah input data</li>
                                            <li>Gangguan layanan dari pihak ketiga</li>
                                            <li>Kerusakan yang timbul akibat penyalahgunaan platform</li>
                                            <li>Kehilangan kesempatan karena ketidakhadiran siswa</li>
                                        </ul>

                                        <h3>14. Pemutusan Akses</h3>
                                        <p>Akun dapat ditutup apabila:</p>
                                        <ul>
                                            <li>Melanggar aturan platform</li>
                                            <li>Menggunakan konten secara ilegal</li>
                                            <li>Mengganggu proses kelas</li>
                                            <li>Permintaan dari pihak pemerintah atau hukum</li>
                                        </ul>
                                        <p>Penutupan akun tidak memberikan hak refund kepada pengguna.</p>

                                        <h3>15. Perubahan Syarat dan Ketentuan</h3>
                                        <p>PT Fara Kreatif Sejahtera berhak memperbarui syarat dan ketentuan ini
                                            sewaktu-waktu tanpa pemberitahuan sebelumnya kepada pengguna.</p>

                                        <h3>16. Hukum yang Berlaku</h3>
                                        <p>Dokumen ini tunduk pada Undang-Undang Republik Indonesia.</p>

                                        <h3>17. Kontak Resmi</h3>
                                        <p>Untuk pertanyaan terkait layanan, Anda dapat menghubungi:</p>
                                        <ul>
                                            <li><strong>Email:</strong> <a href="mailto:info@mitfara.com"
                                                    class="text-decoration-none"
                                                    style="color: #495057;">info@mitfara.com</a></li>
                                            <li><strong>Website:</strong> <a href="https://mitfara.com" target="_blank"
                                                    class="text-decoration-none"
                                                    style="color: #495057;">https://mitfara.com</a></li>
                                            <li><strong>Nomor HP:</strong> <a href="https://wa.me/6289647897616"
                                                    target="_blank" class="text-decoration-none"
                                                    style="color: #495057;">Admin Minfara</a></li>
                                        </ul>

                                        <p
                                            style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #e9ecef; text-align: center; color: #764ba2; font-weight: 600;">
                                            Dengan mengakses platform dan mengikuti layanan kami, Anda dianggap memahami
                                            dan menyetujui seluruh syarat dan ketentuan di atas.
                                        </p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                        style="border-radius: 50px; padding: 12px 30px;" onclick="closeModalManually()">
                                        <i class="fas fa-times me-2"></i>Tutup
                                    </button>
                                    <button type="button" class="btn btn-accept-terms" id="btnAcceptTerms"
                                        onclick="acceptTerms()" disabled>
                                        <i class="fas fa-check me-2"></i>Saya Setuju
                                    </button>
                                </div>
                            </div>
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
        const VA_BASE_FEE = 4000; // Base fee untuk VA
        const PPN_RATE = 0.11; // PPN 11%
        const QRIS_RATE = 0.0063; // QRIS fee 0.63%
        const QRIS_LIMIT = 10000000; // Limit QRIS 10 juta

        // Calculate VA Fee: Rp 4.000 + PPN 11%
        const VA_FEE = Math.round(VA_BASE_FEE * (1 + PPN_RATE)); // = 4.440

        // Tooltip messages
        const TOOLTIP_QRIS = "Biaya QRIS: 0.63% dari subtotal + PPN 11%";
        const TOOLTIP_VA = "Biaya Admin Virtual Account: Rp 4.000 + PPN 11% = Rp 4.440";

        function calculateQRISFee(subtotal) {
            // QRIS Fee: 0.63% dari subtotal + PPN 11%
            const qrisFeeBase = subtotal * QRIS_RATE;
            const qrisFeeWithPPN = qrisFeeBase * (1 + PPN_RATE);
            return Math.round(qrisFeeWithPPN);
        }

        function updateTooltip(message) {
            const tooltipIcon = document.getElementById('feeTooltipIcon');
            if (tooltipIcon) {
                tooltipIcon.setAttribute('data-bs-original-title', message);
                tooltipIcon.setAttribute('title', message);

                // Reinitialize tooltip
                const tooltip = bootstrap.Tooltip.getInstance(tooltipIcon);
                if (tooltip) {
                    tooltip.dispose();
                }
                new bootstrap.Tooltip(tooltipIcon);
            }
        }

        function checkQRISAvailability(subtotal) {
            const qrisOption = document.querySelector('.payment-option:has(#qris)');
            const qrisRadio = document.getElementById('qris');
            const vaRadio = document.getElementById('va');

            if (subtotal >= QRIS_LIMIT) {
                // Hide QRIS option
                if (qrisOption) {
                    qrisOption.style.display = 'none';
                }

                // Auto select VA if QRIS was selected
                if (qrisRadio && qrisRadio.checked) {
                    vaRadio.checked = true;
                }

                // Disable QRIS radio
                if (qrisRadio) {
                    qrisRadio.disabled = true;
                }

                // Show info alert
                showQRISLimitAlert(true);
            } else {
                // Show QRIS option
                if (qrisOption) {
                    qrisOption.style.display = 'block';
                }

                // Enable QRIS radio
                if (qrisRadio) {
                    qrisRadio.disabled = false;
                }

                // Hide info alert
                showQRISLimitAlert(false);
            }
        }

        function showQRISLimitAlert(show) {
            let alertElement = document.getElementById('qrisLimitAlert');

            if (show) {
                if (!alertElement) {
                    // Create alert if doesn't exist
                    const paymentMethodContainer = document.querySelector('.payment-method-container');
                    alertElement = document.createElement('div');
                    alertElement.id = 'qrisLimitAlert';
                    alertElement.className = 'alert alert-warning mt-3';
                    alertElement.innerHTML = `
                <div class="d-flex align-items-start">
                    <i class="fas fa-exclamation-triangle me-2 mt-1"></i>
                    <div>
                        <strong>Informasi QRIS:</strong>
                        <p class="mb-0 mt-1">
                            Metode pembayaran QRIS tidak tersedia untuk transaksi di atas Rp 10.000.000.
                            Silakan gunakan metode Virtual Account.
                        </p>
                    </div>
                </div>
            `;
                    paymentMethodContainer.parentNode.insertBefore(alertElement, paymentMethodContainer.nextSibling);
                } else {
                    alertElement.style.display = 'block';
                }
            } else {
                if (alertElement) {
                    alertElement.style.display = 'none';
                }
            }
        }

        function selectPaymentMethod(method) {
            const quantity = parseInt(document.getElementById('quantity').value);
            const subtotal = basePrice * quantity;

            // Check if QRIS is available for current amount
            if (method === 'QRIS' && subtotal >= QRIS_LIMIT) {
                // Don't allow QRIS selection if amount exceeds limit
                document.getElementById('va').checked = true;
                return;
            }

            // Update radio button
            if (method === 'QRIS') {
                document.getElementById('qris').checked = true;
            } else {
                document.getElementById('va').checked = true;
            }

            // Update total
            updateTotal();
        }

        function updateTotal() {
            const quantity = parseInt(document.getElementById('quantity').value);
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;

            const subtotal = basePrice * quantity;

            // Check QRIS availability based on subtotal
            checkQRISAvailability(subtotal);

            let adminFee = 0;
            let grandTotal = subtotal;

            // Calculate and show appropriate fee
            if (paymentMethod === 'QRIS' && subtotal < QRIS_LIMIT) {
                adminFee = calculateQRISFee(subtotal);
                grandTotal = subtotal + adminFee;

                // Update convenience fee display
                document.getElementById('convenienceFeeAmount').textContent = 'Rp ' + adminFee.toLocaleString('id-ID');
                document.getElementById('convenienceFeeDisplay').style.display = 'flex';

                // Update tooltip
                updateTooltip(TOOLTIP_QRIS);

            } else if (paymentMethod === 'VA' || subtotal >= QRIS_LIMIT) {
                adminFee = VA_FEE;
                grandTotal = subtotal + adminFee;

                // Update convenience fee display
                document.getElementById('convenienceFeeAmount').textContent = 'Rp ' + adminFee.toLocaleString('id-ID');
                document.getElementById('convenienceFeeDisplay').style.display = 'flex';

                // Update tooltip
                updateTooltip(TOOLTIP_VA);
            }

            // Update displays
            document.getElementById('qtyText').textContent = quantity;
            document.getElementById('subtotalDisplay').textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
            document.getElementById('totalAmount').textContent = 'Rp ' + grandTotal.toLocaleString('id-ID');
            document.getElementById('grandTotalDisplay').textContent = 'Rp ' + grandTotal.toLocaleString('id-ID');
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

        // Event listener for payment method change
        document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
            radio.addEventListener('change', updateTotal);
        });

        // Form submission dengan loading state
        document.getElementById('checkoutForm').addEventListener('submit', function (e) {
            const btnSubmit = document.getElementById('btnSubmit');
            btnSubmit.disabled = true;
            btnSubmit.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
        });

        // Validasi phone number format dengan feedback visual
        document.getElementById('payer_phone').addEventListener('input', function (e) {
            let value = e.target.value.replace(/[^0-9]/g, '');

            // Limit maksimal 15 digit
            if (value.length > 15) {
                value = value.substring(0, 15);
            }

            e.target.value = value;

            // Visual feedback untuk validasi
            if (value.length >= 10 && value.length <= 15) {
                e.target.classList.remove('is-invalid');
                e.target.classList.add('is-valid');
            } else if (value.length > 0) {
                e.target.classList.remove('is-valid');
                e.target.classList.add('is-invalid');
            } else {
                e.target.classList.remove('is-valid', 'is-invalid');
            }
        });

        // Close Modal Manually (Fallback function)
        function closeModalManually() {
            const modalElement = document.getElementById('termsModal');
            const modal = bootstrap.Modal.getInstance(modalElement);

            if (modal) {
                modal.hide();
            }

            // Force cleanup after delay
            setTimeout(() => {
                const backdrops = document.querySelectorAll('.modal-backdrop');
                backdrops.forEach(backdrop => backdrop.remove());

                document.body.classList.remove('modal-open');
                document.body.style.overflow = '';
                document.body.style.paddingRight = '';
            }, 300);
        }

        // Accept Terms Function
        function acceptTerms() {
            const termsCheckbox = document.getElementById('terms');

            // Enable dan check checkbox
            termsCheckbox.disabled = false;
            termsCheckbox.checked = true;

            // Remove invalid feedback classes
            termsCheckbox.classList.remove('is-invalid');
            termsCheckbox.setCustomValidity('');

            // Trigger validation events
            const changeEvent = new Event('change', { bubbles: true });
            const inputEvent = new Event('input', { bubbles: true });
            termsCheckbox.dispatchEvent(changeEvent);
            termsCheckbox.dispatchEvent(inputEvent);

            // Close modal dengan cara yang lebih reliable
            const modalElement = document.getElementById('termsModal');
            const modal = bootstrap.Modal.getInstance(modalElement);

            if (modal) {
                modal.hide();
            }

            // Pastikan backdrop dan body class dihapus
            setTimeout(() => {
                // Remove all modal backdrops
                const backdrops = document.querySelectorAll('.modal-backdrop');
                backdrops.forEach(backdrop => backdrop.remove());

                // Remove modal-open class from body
                document.body.classList.remove('modal-open');
                document.body.style.overflow = '';
                document.body.style.paddingRight = '';

                // Optional: Visual feedback dengan pulse animation
                const submitBtn = document.getElementById('btnSubmit');
                if (submitBtn) {
                    submitBtn.classList.add('pulse-animation');
                    setTimeout(() => submitBtn.classList.remove('pulse-animation'), 1000);
                }
            }, 300);
        }

        // Open Terms Modal Function
        function openTermsModal() {
            if (typeof event !== 'undefined') {
                event.preventDefault(); // Prevent default behavior
            }

            // Pastikan tidak ada backdrop yang tertinggal
            const oldBackdrops = document.querySelectorAll('.modal-backdrop');
            oldBackdrops.forEach(backdrop => backdrop.remove());

            const modalElement = document.getElementById('termsModal');
            const termsModal = new bootstrap.Modal(modalElement, {
                backdrop: 'static',
                keyboard: false
            });

            termsModal.show();

            // Reset button state when modal opens
            const acceptButton = document.getElementById('btnAcceptTerms');
            const scrollIndicator = document.getElementById('scrollIndicator');

            if (acceptButton) acceptButton.disabled = true;
            if (scrollIndicator) scrollIndicator.style.display = 'block';

            // Reset scroll position
            const modalBody = document.getElementById('termsModalBody');
            if (modalBody) {
                modalBody.scrollTop = 0;
            }
        }

        // Initialize total and tooltip on page load
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Bootstrap tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Track scroll in modal body
            const modalBody = document.getElementById('termsModalBody');
            const acceptButton = document.getElementById('btnAcceptTerms');
            const scrollIndicator = document.getElementById('scrollIndicator');

            if (modalBody) {
                modalBody.addEventListener('scroll', function () {
                    // Check if scrolled to bottom (with 10px tolerance)
                    const isScrolledToBottom = modalBody.scrollHeight - modalBody.scrollTop <= modalBody.clientHeight + 10;

                    if (isScrolledToBottom) {
                        acceptButton.disabled = false;
                        scrollIndicator.style.display = 'none';
                    }
                });
            }

            // Handle modal hidden event untuk cleanup
            const termsModalElement = document.getElementById('termsModal');
            if (termsModalElement) {
                termsModalElement.addEventListener('hidden.bs.modal', function () {
                    // Cleanup backdrop yang mungkin tertinggal
                    const backdrops = document.querySelectorAll('.modal-backdrop');
                    backdrops.forEach(backdrop => backdrop.remove());

                    // Reset body styles
                    document.body.classList.remove('modal-open');
                    document.body.style.overflow = '';
                    document.body.style.paddingRight = '';
                });
            }

            // Prevent form submission if terms not checked
            const checkoutForm = document.getElementById('checkoutForm');
            const termsCheckbox = document.getElementById('terms');

            if (checkoutForm) {
                checkoutForm.addEventListener('submit', function (e) {
                    // Check if terms is checked and enabled
                    if (!termsCheckbox.checked || termsCheckbox.disabled) {
                        e.preventDefault();
                        e.stopPropagation();

                        // Show alert
                        alert('Silakan baca dan setujui syarat dan ketentuan terlebih dahulu.');

                        // Open modal if not checked
                        if (!termsCheckbox.checked) {
                            openTermsModal();
                        }

                        return false;
                    }
                });
            }

            // Update total
            updateTotal();
        });

        // Form submission dengan loading state
        document.getElementById('checkoutForm').addEventListener('submit', function (e) {
            const btnSubmit = document.getElementById('btnSubmit');
            btnSubmit.disabled = true;
            btnSubmit.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
        });

        // Validasi phone number format
        document.getElementById('payer_phone').addEventListener('input', function (e) {
            let value = e.target.value.replace(/[^0-9]/g, '');
            e.target.value = value;
        });

        // Close Modal Manually (Fallback function)
        function closeModalManually() {
            const modalElement = document.getElementById('termsModal');
            const modal = bootstrap.Modal.getInstance(modalElement);

            if (modal) {
                modal.hide();
            }

            // Force cleanup after delay
            setTimeout(() => {
                const backdrops = document.querySelectorAll('.modal-backdrop');
                backdrops.forEach(backdrop => backdrop.remove());

                document.body.classList.remove('modal-open');
                document.body.style.overflow = '';
                document.body.style.paddingRight = '';
            }, 300);
        }

        // Accept Terms Function
        function acceptTerms() {
            const termsCheckbox = document.getElementById('terms');

            // Enable dan check checkbox
            termsCheckbox.disabled = false;
            termsCheckbox.checked = true;

            // Remove invalid feedback classes
            termsCheckbox.classList.remove('is-invalid');
            termsCheckbox.setCustomValidity('');

            // Trigger validation events
            const changeEvent = new Event('change', { bubbles: true });
            const inputEvent = new Event('input', { bubbles: true });
            termsCheckbox.dispatchEvent(changeEvent);
            termsCheckbox.dispatchEvent(inputEvent);

            // Close modal dengan cara yang lebih reliable
            const modalElement = document.getElementById('termsModal');
            const modal = bootstrap.Modal.getInstance(modalElement);

            if (modal) {
                modal.hide();
            }

            // Pastikan backdrop dan body class dihapus
            setTimeout(() => {
                // Remove all modal backdrops
                const backdrops = document.querySelectorAll('.modal-backdrop');
                backdrops.forEach(backdrop => backdrop.remove());

                // Remove modal-open class from body
                document.body.classList.remove('modal-open');
                document.body.style.overflow = '';
                document.body.style.paddingRight = '';

                // Optional: Visual feedback dengan pulse animation
                const submitBtn = document.getElementById('btnSubmit');
                if (submitBtn) {
                    submitBtn.classList.add('pulse-animation');
                    setTimeout(() => submitBtn.classList.remove('pulse-animation'), 1000);
                }
            }, 300);
        }

        // Open Terms Modal Function
        function openTermsModal() {
            if (typeof event !== 'undefined') {
                event.preventDefault(); // Prevent default behavior
            }

            // Pastikan tidak ada backdrop yang tertinggal
            const oldBackdrops = document.querySelectorAll('.modal-backdrop');
            oldBackdrops.forEach(backdrop => backdrop.remove());

            const modalElement = document.getElementById('termsModal');
            const termsModal = new bootstrap.Modal(modalElement, {
                backdrop: 'static',
                keyboard: false
            });

            termsModal.show();

            // Reset button state when modal opens
            const acceptButton = document.getElementById('btnAcceptTerms');
            const scrollIndicator = document.getElementById('scrollIndicator');

            if (acceptButton) acceptButton.disabled = true;
            if (scrollIndicator) scrollIndicator.style.display = 'block';

            // Reset scroll position
            const modalBody = document.getElementById('termsModalBody');
            if (modalBody) {
                modalBody.scrollTop = 0;
            }
        }

        // Initialize total and tooltip on page load
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Bootstrap tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Track scroll in modal body
            const modalBody = document.getElementById('termsModalBody');
            const acceptButton = document.getElementById('btnAcceptTerms');
            const scrollIndicator = document.getElementById('scrollIndicator');

            if (modalBody) {
                modalBody.addEventListener('scroll', function () {
                    // Check if scrolled to bottom (with 10px tolerance)
                    const isScrolledToBottom = modalBody.scrollHeight - modalBody.scrollTop <= modalBody.clientHeight + 10;

                    if (isScrolledToBottom) {
                        acceptButton.disabled = false;
                        scrollIndicator.style.display = 'none';
                    }
                });
            }

            // Handle modal hidden event untuk cleanup
            const termsModalElement = document.getElementById('termsModal');
            if (termsModalElement) {
                termsModalElement.addEventListener('hidden.bs.modal', function () {
                    // Cleanup backdrop yang mungkin tertinggal
                    const backdrops = document.querySelectorAll('.modal-backdrop');
                    backdrops.forEach(backdrop => backdrop.remove());

                    // Reset body styles
                    document.body.classList.remove('modal-open');
                    document.body.style.overflow = '';
                    document.body.style.paddingRight = '';
                });
            }

            // Prevent form submission if terms not checked
            const checkoutForm = document.getElementById('checkoutForm');
            const termsCheckbox = document.getElementById('terms');

            if (checkoutForm) {
                checkoutForm.addEventListener('submit', function (e) {
                    // Check if terms is checked and enabled
                    if (!termsCheckbox.checked || termsCheckbox.disabled) {
                        e.preventDefault();
                        e.stopPropagation();

                        // Show alert
                        alert('Silakan baca dan setujui syarat dan ketentuan terlebih dahulu.');

                        // Open modal if not checked
                        if (!termsCheckbox.checked) {
                            openTermsModal();
                        }

                        return false;
                    }
                });
            }

            // Update total
            updateTotal();
        });
    </script>
</body>

</html>
