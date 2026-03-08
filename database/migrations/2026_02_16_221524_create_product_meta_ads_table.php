<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_meta_ads', function (Blueprint $table) {
            $table->id();$table->foreignId('product_id')
                ->unique() // hasOne: satu produk satu meta ads
                ->constrained('products')
                ->cascadeOnDelete();
            $table->string('headline', 255);       // Auto-gen dari nama + harga + durasi
            $table->text('primary_text');          // Auto-gen dari deskripsi + benefit list
            $table->text('description')->nullable(); // Auto-gen ringkasan + CTA

            $table->string('call_to_action', 100)->default('Beli Sekarang');
            $table->string('target_url', 500)->nullable();
            $table->boolean('is_approved')->default(false); // Admin review sebelum dipakai

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_meta_ads');
    }
};
