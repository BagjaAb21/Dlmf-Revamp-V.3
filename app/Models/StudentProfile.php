<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    protected $fillable = [
        'user_id',
        'address_detail',
        'city',
        'province',
        'country',
        'birth_date',
        'institution',
        'class_schedule',
        'level',
        'class_start_date',
        'learning_goal',
    ];

    protected function casts(): array
    {
        return [
            'birth_date'       => 'date',
            'class_start_date' => 'date',
        ];
    }

    public const SCHEDULE_LABELS = [
        'morgen'    => '07:00 - 09:00 WIB (Pagi)',
        'vormittag' => '10:00 - 12:00 WIB (Siang)',
        'abend'     => '19:00 - 21:00 WIB (Malam)',
        'nacht'     => '20:00 - 22:00 WIB (Larut Malam)',
    ];

    public const LEVEL_LABELS = [
        'A1' => 'A1 — Pemula',
        'A2' => 'A2 — Dasar',
        'B1' => 'B1 — Menengah Bawah',
        'B2' => 'B2 — Menengah Atas',
        'C1' => 'C1 — Mahir',
        'C2' => 'C2 — Sangat Mahir',
    ];

    public function getScheduleLabelAttribute(): ?string
    {
        return self::SCHEDULE_LABELS[$this->class_schedule] ?? null;
    }

    public function getLevelLabelAttribute(): ?string
    {
        return self::LEVEL_LABELS[$this->level] ?? null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
