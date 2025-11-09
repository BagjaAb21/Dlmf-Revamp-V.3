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
            $table->string('payer_name')->max(255);
            $table->string('payer_email')->max(255);
            $table->string('payer_phone')->max(20);
            $table->decimal('amount', 15, 2);
            $table->string('status')->default('pending');
            $table->text('checkout_link');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
