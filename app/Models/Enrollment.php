<?php
// app/Models/Enrollment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
        'user_id',
        'payment_id',
        'product_id',
        'status',
        'started_at',
        'expires_at',
    ];

    protected function casts(): array
    {
        return [
            'started_at' => 'date',
            'expires_at' => 'date',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
