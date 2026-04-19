<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel survey_responses — "Jawaban Survei Pasca-Checkout"
     *
     * Diisi oleh siswa setelah berhasil checkout / pembayaran.
     * Data ini digunakan admin untuk analisis marketing & program.
     *
     * Pertanyaan:
     *  Q1 → Dari mana pertama kali mengetahui program ini? (pilih 1)
     *  Q2 → Pertimbangan utama saat memilih program? (pilih max 2)
     *  Q3 → Tertarik program lanjutan / private? (pilih 1)
     *  Q4 → Rentang budget yang disiapkan? (pilih 1)
     */
    public function up(): void
    {
        Schema::create('survey_responses', function (Blueprint $table) {
            $table->id();

            // ── Relasi ke user (nullable: bisa saja guest) ─────────────────
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // ── Relasi ke payment (untuk trace dari invoice) ───────────────
            $table->foreignId('payment_id')
                ->nullable()
                ->constrained('payments')
                ->nullOnDelete();

            // ── Relasi ke enrollment (opsional, untuk link ke kelas aktif) ──
            $table->foreignId('enrollment_id')
                ->nullable()
                ->constrained('enrollments')
                ->nullOnDelete();

            // ── Q1: Dari mana Anda pertama kali mengetahui program ini? ────
            // (Pilih satu)
            $table->string('q1_source')->nullable()->comment(
                'Instagram | TikTok | Google Search | Website | WhatsApp (Broadcast) | Teman / Referral | Sekolah / Kampus'
            );

            // ── Q2: Pertimbangan utama saat memilih program? ───────────────
            // (Boleh pilih 2) — disimpan sebagai JSON array
            $table->json('q2_considerations')->nullable()->comment(
                'Array: Harga | Promo/Diskon | Kualitas pengajar | Jadwal | Metode belajar | Benefit | Reputasi lembaga | Lainnya'
            );

            // ── Q2 "Lainnya" isi bebas ────────────────────────────────────
            $table->string('q2_other_text')->nullable();

            // ── Q3: Tertarik jika tersedia program lanjutan / private? ─────
            // (Pilih satu)
            $table->string('q3_interest')->nullable()->comment(
                'Ya, sangat tertarik | Mungkin | Tidak'
            );

            // ── Q4: Rentang budget yang disiapkan? ────────────────────────
            // (Pilih satu)
            $table->string('q4_budget')->nullable()->comment(
                '< 1 jt | 1–3 jt | 3–5 jt | > 5 jt'
            );

            // ── Metadata ──────────────────────────────────────────────────
            $table->string('respondent_name')->nullable();   // Snapshot nama saat isi survei
            $table->string('respondent_email')->nullable();  // Snapshot email saat isi survei
            $table->string('product_name')->nullable();      // Snapshot nama produk yang dibeli
            $table->string('external_id')->nullable();       // external_id dari payment (untuk link non-login)

            $table->timestamps();

            // ── Indexes ───────────────────────────────────────────────────
            $table->index('user_id');
            $table->index('payment_id');
            $table->index('q1_source');
            $table->index('q3_interest');
            $table->index('q4_budget');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('survey_responses');
    }
};
