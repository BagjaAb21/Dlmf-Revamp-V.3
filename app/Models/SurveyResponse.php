<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    protected $fillable = [
        'user_id',
        'payment_id',
        'enrollment_id',
        'q1_source',
        'q2_considerations',
        'q2_other_text',
        'q3_interest',
        'q4_budget',
        'respondent_name',
        'respondent_email',
        'product_name',
        'external_id',
    ];

    protected function casts(): array
    {
        return [
            'q2_considerations' => 'array',
        ];
    }

    /* ── Relasi ─────────────────────────────────────────────────── */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    /* ── Scopes ─────────────────────────────────────────────────── */

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month)
                     ->whereYear('created_at', now()->year);
    }

    /* ── Helper: label pilihan ──────────────────────────────────── */

    public static function q1Options(): array
    {
        return [
            'Instagram',
            'TikTok',
            'Google Search',
            'Website',
            'WhatsApp (Broadcast)',
            'Teman / Referral',
            'Sekolah / Kampus',
        ];
    }

    public static function q2Options(): array
    {
        return [
            'Harga',
            'Promo/Diskon',
            'Kualitas pengajar',
            'Jadwal',
            'Metode belajar',
            'Benefit',
            'Reputasi lembaga',
            'Lainnya',
        ];
    }

    public static function q3Options(): array
    {
        return [
            'Ya, sangat tertarik',
            'Mungkin',
            'Tidak',
        ];
    }

    public static function q4Options(): array
    {
        return [
            '< 1 jt',
            '1–3 jt',
            '3–5 jt',
            '> 5 jt',
        ];
    }
}
