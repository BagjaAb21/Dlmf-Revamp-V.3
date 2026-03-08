<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel utama autentikasi untuk Admin dan Siswa.
     *
     * Dipisahkan dari default Laravel karena:
     *  - Kolom `role` membedakan admin vs siswa
     *  - Self-registration hanya menghasilkan role=siswa
     *  - Admin hanya bisa dibuat lewat Filament panel
     *
     * Relasi:
     *  - hasOne  → student_profiles   (hanya role=siswa)
     *  - hasMany → payments            (via user_id nullable)
     *  - hasMany → enrollments         (via user_id)
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // ── Identitas ──────────────────────────────────────────────
            $table->string('name', 255);                    // Nama lengkap (satu kolom, di-split saat checkout)
            $table->string('email', 255)->unique();         // Email sebagai login identifier
            $table->string('phone', 20)->nullable();        // No HP (auto-fill ke payments.mobile_number)
            $table->string('password');

            // ── Role ───────────────────────────────────────────────────
            $table->enum('role', ['admin', 'siswa'])->default('siswa');
            // PENTING: Self-registration selalu hardcode role=siswa di controller.
            // Role admin hanya bisa di-set dari Filament panel.

            // ── Email verification (bawaan Laravel) ───────────────────
            $table->timestamp('email_verified_at')->nullable();

            // ── Remember me token ─────────────────────────────────────
            $table->rememberToken();

            $table->timestamps();

            // ── Indexes ───────────────────────────────────────────────
            $table->index('role');   // Untuk query filter admin/siswa di Filament
        });

        // Password reset tokens (bawaan Laravel Auth)
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Session management
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
