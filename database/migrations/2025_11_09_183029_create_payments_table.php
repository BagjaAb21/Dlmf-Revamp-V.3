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
            $table->string('external_id')->unique();
            $table->string('product_name')->nullable(); // Nama produk yang dibeli
            $table->integer('quantity')->default(1); // Jumlah produk
            $table->string('payer_name', 255);
            $table->string('payer_email', 255);
            $table->string('payer_phone', 20)->nullable();
            $table->decimal('amount', 15, 2); // Total amount (price * quantity)
            $table->string('status')->default('pending');
            $table->text('checkout_link')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
