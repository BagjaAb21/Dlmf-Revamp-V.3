<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // External ID - unique identifier dari sistem kita
            $table->string('external_id')->unique();

            // Customer Information (sesuai dengan customer object di Xendit)
            $table->string('given_names', 255); // Nama depan customer
            $table->string('surname', 255)->nullable(); // Nama belakang customer
            $table->string('email', 255); // Email customer
            $table->string('mobile_number', 20)->nullable(); // Format E164 (+62xxx)

            // Product Information
            $table->string('product_name')->nullable(); // Nama produk yang dibeli
            $table->integer('quantity')->default(1); // Jumlah produk

            // Amount Information (sesuai dengan dokumentasi Xendit)
            $table->decimal('amount', 15, 2); // Total amount (price * quantity)
            $table->string('currency', 3)->default('IDR'); // Currency code

            // Invoice Information
            $table->text('description')->nullable(); // Deskripsi invoice
            $table->text('invoice_url')->nullable(); // Link checkout dari Xendit

            // Status Information (sesuai dengan Xendit status: PENDING, PAID, SETTLED, EXPIRED)
            $table->string('status')->default('PENDING');

            // Payment Details (akan diisi setelah pembayaran berhasil)
            $table->string('payment_method')->nullable(); // BANK_TRANSFER, CREDIT_CARD, RETAIL_OUTLET, EWALLET, QR_CODE
            $table->string('payment_channel')->nullable(); // BCA, BNI, QRIS, dll
            $table->string('payment_destination')->nullable(); // VA number atau payment code

            // Xendit Invoice ID (untuk referensi ke sistem Xendit)
            $table->string('xendit_invoice_id')->nullable(); // ID dari response Xendit

            // Timestamps
            $table->timestamp('paid_at')->nullable(); // Kapan invoice dibayar
            $table->timestamp('expired_at')->nullable(); // Kapan invoice expire
            $table->timestamps();

            // Indexes untuk performa query
            $table->index('status');
            $table->index('email');
            $table->index('xendit_invoice_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
