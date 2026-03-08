<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductDiscount extends Model
{
    protected $fillable = [
        'product_id',
        'discount_type',
        'discount_value',
        'final_price',
        'valid_from',
        'valid_until',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'discount_value' => 'decimal:2',
            'final_price'    => 'decimal:2',
            'valid_from'     => 'date',
            'valid_until'    => 'date',
            'is_active'      => 'boolean',
        ];
    }

    // ── Relations ────────────────────────────────────────────────

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // ── Static Helpers ───────────────────────────────────────────

    /**
     * Kalkulasi harga final dari base_price + tipe + nilai diskon.
     */
    public static function calcFinalPrice(
        float  $basePrice,
        string $type,
        float  $value
    ): float {
        return match ($type) {
            'percent' => max(0, $basePrice - ($basePrice * $value / 100)),
            'fixed'   => max(0, $basePrice - $value),
            default   => $basePrice,
        };
    }

    // ── Accessors ────────────────────────────────────────────────

    public function getFormattedFinalPriceAttribute(): string
    {
        return 'Rp ' . number_format((float) $this->final_price, 0, ',', '.');
    }

    public function getDiscountSummaryAttribute(): string
    {
        return $this->discount_type === 'percent'
            ? $this->discount_value . '%'
            : 'Rp ' . number_format((float) $this->discount_value, 0, ',', '.');
    }
}
