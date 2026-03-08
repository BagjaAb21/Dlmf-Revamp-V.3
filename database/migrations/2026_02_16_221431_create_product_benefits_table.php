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
        Schema::create('product_benefits', function (Blueprint $table) {
            $table->id();$table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();
            $table->foreignId('benefit_master_id')
                ->constrained('benefit_masters')
                ->restrictOnDelete();
            $table->integer('sort_order')->default(0);
            $table->string('custom_value', 100)->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->unique(['product_id', 'benefit_master_id'], 'product_benefits_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_benefits');
    }
};
