<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Data detail siswa — dipisahkan dari tabel users agar:
     *  - Tabel users tetap bersih (hanya data autentikasi)
     *  - Data profil siswa tidak mencemari data admin
     *  - Bisa nullable semua → siswa bisa register dulu, isi profil belakangan
     *
     * Relasi: belongsTo users (1:1, user_id UNIQUE)
     * Auto-created saat user register (observer/event di model User)
     */
    public function up(): void
    {
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();

            // ── Relasi ke users ────────────────────────────────────────
            $table->foreignId('user_id')
                ->unique()                      // 1 user = 1 profile
                ->constrained('users')
                ->cascadeOnDelete();            // Hapus user → hapus profile

            // ── ① Domisili ────────────────────────────────────────────
            $table->text('address_detail')->nullable();          // Detail jalan / RT / RW
            $table->string('city', 100)->nullable();             // Kota / Kabupaten
            $table->string('province', 100)->nullable();         // Provinsi
            $table->string('country', 100)->nullable()->default('Indonesia');

            // ── ② Tanggal Lahir ───────────────────────────────────────
            $table->date('birth_date')->nullable();              // Tanggal, Bulan, Tahun

            // ── ③ Asal Institusi / Pekerjaan ─────────────────────────
            $table->longText('institution')->nullable();         // Nama kampus / perusahaan / dll

            // ── ④ Jadwal Kelas (Dropdown) ─────────────────────────────
            $table->enum('class_schedule', [
                'morgen',       // 07:00 - 09:00 WIB  (Pagi)
                'vormittag',    // 10:00 - 12:00 WIB  (Siang)
                'abend',        // 19:00 - 21:00 WIB  (Malam)
                'nacht',        // 20:00 - 22:00 WIB  (Larut Malam)
            ])->nullable();

            // ── ⑤ Level Bahasa Jerman (Dropdown) ─────────────────────
            $table->enum('level', [
                'A1', 'A2',     // Beginner
                'B1', 'B2',     // Intermediate
                'C1', 'C2',     // Advanced
            ])->nullable();

            // ── ⑥ Bulan Mulai Kelas ───────────────────────────────────
            $table->date('class_start_date')->nullable();        // Tanggal mulai kelas

            // ── ⑦ Tujuan Belajar ──────────────────────────────────────
            $table->longText('learning_goal')->nullable();       // Bebas tulis

            $table->timestamps();

            // ── Indexes untuk filter di Filament ──────────────────────
            $table->index('level');
            $table->index('class_schedule');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
