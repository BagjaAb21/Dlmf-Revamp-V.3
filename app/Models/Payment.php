<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'external_id',
        'given_names',
        'surname',
        'email',
        'mobile_number',
        'product_name',
        'quantity',
        'amount',
        'currency',
        'description',
        'invoice_url',
        'status',
        'payment_method',
        'payment_channel',
        'payment_destination',
        'xendit_invoice_id',
        'paid_at',
        'expired_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'paid_at' => 'datetime',
        'expired_at' => 'datetime', // Menambahkan casting untuk expired_at
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Accessor untuk memastikan timezone Asia/Jakarta
    public function getPaidAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->setTimezone('Asia/Jakarta') : null;
    }

    public function getExpiredAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->setTimezone('Asia/Jakarta') : null;
    }

    // Mutator untuk menyimpan dengan timezone yang benar
    public function setPaidAtAttribute($value)
    {
        $this->attributes['paid_at'] = $value
            ? Carbon::parse($value)->setTimezone('Asia/Jakarta')
            : null;
    }

    public function setExpiredAtAttribute($value)
    {
        $this->attributes['expired_at'] = $value
            ? Carbon::parse($value)->setTimezone('Asia/Jakarta')
            : null;
    }

    /**
     * Relasi ke User (Pembeli)
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }

    public function enrollment()
    {
        return $this->hasOne(Enrollment::class);
    }
}
