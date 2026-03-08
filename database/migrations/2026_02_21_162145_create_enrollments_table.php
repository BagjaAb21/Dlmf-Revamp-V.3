<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel enrollment — "Kelas yang dimiliki siswa".
     *
     * Dibuat OTOMATIS saat Xendit webhook callback status = PAID.
     * Ini yang tampil di halaman "Kelas Saya" di dashboard siswa.
     *
     * Kenapa ada FK ke user_id DAN payment_id?
     *  - user_id   → untuk query langsung "semua kelas milik siswa X" tanpa JOIN payments
     *  - payment_id → untuk trace balik ke invoice (unique: 1 payment = 1 enrollment)
     *  - product_id → untuk query "siapa saja yang beli produk Y"
     *
     * started_at / expires_at dihitung dari:
     *  - started_at = payments.paid_at
     *  - expires_at = paid_at + duration_type (dari products)
     */
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();

            // ── Foreign Keys ───────────────────────────────────────────
            $table->foreignId('user_id')
                ->constrained('users')
                ->restrictOnDelete();   // Jangan hapus user jika masih ada enrollment

            $table->foreignId('payment_id')
                ->unique()              // 1 payment hanya bisa generate 1 enrollment
                ->constrained('payments')
                ->restrictOnDelete();   // Jangan hapus payment jika enrollment masih ada

            $table->foreignId('product_id')
                ->constrained('products')
                ->restrictOnDelete();   // Jangan hapus produk jika ada enrollment aktif

            // ── Status Enrollment ─────────────────────────────────────
            $table->enum('status', [
                'active',       // Kelas sedang berjalan
                'expired',      // Masa belajar sudah habis (cron job yang update)
                'cancelled',    // Dibatalkan oleh admin
            ])->default('active');

            // ── Periode Kelas ─────────────────────────────────────────
            $table->date('started_at')->nullable();     // Tanggal mulai (dari paid_at)
            $table->date('expires_at')->nullable();     // Tanggal berakhir (null = lifetime)

            $table->timestamps();

            // ── Indexes ────────────────────────────────────────────────
            $table->index('user_id');                           // Query "kelas saya"
            $table->index('status');                            // Filter kelas aktif/expired
            $table->index(['user_id', 'status']);               // Query kombinasi
            $table->index('expires_at');                        // Untuk cron auto-expire
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
