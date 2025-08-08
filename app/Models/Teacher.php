<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'level',
        'education',
        'experience',
        'certification',
        'description',
        'specialization',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'specialization' => 'array', // Jika Anda ingin menyimpan multiple specialization
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Accessor untuk format level yang lebih baik
    public function getLevelFormattedAttribute()
    {
        return "German Tutor {$this->level}, Grammar & Speaking, GOETHE Preparation";
    }

    // Accessor untuk certification default
    public function getCertificationAttribute($value)
    {
        return $value ?: 'Sertifikasi GOETHE B1';
    }
}
