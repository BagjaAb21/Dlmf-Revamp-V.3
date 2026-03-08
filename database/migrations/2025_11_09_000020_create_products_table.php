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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_category_id')
                ->constrained('product_categories')
                ->restrictOnDelete(); // Tidak bisa hapus kategori jika masih ada produk
            $table->string('product_code', 50)->unique();
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->text('short_description')->nullable();
            $table->decimal('base_price', 15, 2);
            $table->enum('duration_type', ['1', '2', '3', '6', '12', 'lifetime']);
            $table->enum('duration_unit', ['month', 'lifetime'])->default('month');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();  // Menjaga histori transaksi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
