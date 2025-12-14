<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'given_names',     // Mengganti 'payer_name' (Nama depan)
        'surname',         // Nama belakang
        'email',           // Mengganti 'payer_email'
        'mobile_number',   // Mengganti 'payer_phone' (Format E164)

        'product_name',
        'quantity',
        'amount',
        'currency',
        'description',
        'invoice_url',     // Mengganti 'checkout_link'
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
}
