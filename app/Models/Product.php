<?php

namespace App\Models;

use App\Enums\DurationTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_category_id',
        'product_code',
        'name',
        'slug',
        'short_description',
        'base_price',
        'duration_type',
        'duration_unit',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'base_price'    => 'decimal:2',
            'is_active'     => 'boolean',
            'sort_order'    => 'integer',
            'duration_type' => DurationTypeEnum::class,
        ];
    }

    // ── Boot ────────────────────────────────────────────────────

    protected static function booted(): void
    {
        static::creating(function (self $product) {
            if (empty($product->slug)) {
                $product->slug = self::uniqueSlug($product->name);
            }
            // product_code di-generate dari Resource sebelum save
            // (karena butuh relasi category yang belum tentu sudah di-load di booted)
        });

        static::updating(function (self $product) {
            if ($product->isDirty('name') && ! $product->isDirty('slug')) {
                $product->slug = self::uniqueSlug($product->name, $product->id);
            }
        });
    }

    // ── Relations ────────────────────────────────────────────────

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function discount(): HasOne
    {
        return $this->hasOne(ProductDiscount::class);
    }

    public function benefits(): BelongsToMany
    {
        return $this->belongsToMany(BenefitMaster::class, 'product_benefits')
            ->withPivot('custom_value', 'sort_order')
            ->orderByPivot('sort_order');
    }

    public function metaAd(): HasOne
    {
        return $this->hasOne(ProductMetaAd::class);
    }

    // ── Accessors ────────────────────────────────────────────────

    /**
     * Harga efektif: gunakan final_price dari diskon jika aktif dan dalam masa berlaku.
     */
    public function getEffectivePriceAttribute(): float
    {
        if ($this->discount && $this->discount->is_active) {
            $fromOk  = ! $this->discount->valid_from  || $this->discount->valid_from->lte(now());
            $untilOk = ! $this->discount->valid_until || $this->discount->valid_until->gte(now());

            if ($fromOk && $untilOk) {
                return (float) $this->discount->final_price;
            }
        }

        return (float) $this->base_price;
    }

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->effective_price, 0, ',', '.');
    }

    public function getFormattedBasePriceAttribute(): string
    {
        return 'Rp ' . number_format((float) $this->base_price, 0, ',', '.');
    }

    public function getFormattedDurationAttribute(): string
    {
        $type = $this->duration_type instanceof DurationTypeEnum
            ? $this->duration_type->value
            : $this->duration_type;

        if ($type === 'lifetime') {
            return 'Lifetime';
        }

        return $type . ' ' . ($type == 1 ? 'Bulan' : 'Bulan');
    }

    // ── Static Helpers ───────────────────────────────────────────

    /**
     * Generate kode produk unik.
     * Format: {CAT}-{NAME}-{0001}
     * Contoh: ONL-INTEN-0042
     */
    public static function generateProductCode(string $categorySlug, string $productName): string
    {
        $catPart  = strtoupper(substr(preg_replace('/[^a-z0-9]/i', '', $categorySlug), 0, 3));
        $namePart = strtoupper(substr(preg_replace('/[^a-z0-9]/i', '', Str::slug($productName)), 0, 5));

        do {
            $rand = str_pad((string) random_int(1, 9999), 4, '0', STR_PAD_LEFT);
            $code = "{$catPart}-{$namePart}-{$rand}";
        } while (static::withTrashed()->where('product_code', $code)->exists());

        return $code;
    }

    /**
     * Generate slug yang unik (append angka jika sudah ada).
     */
    public static function uniqueSlug(string $name, ?int $excludeId = null): string
    {
        $base  = Str::slug($name);
        $slug  = $base;
        $count = 1;
        $query = static::query();

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        while ($query->where('slug', $slug)->exists()) {
            $slug = "{$base}-{$count}";
            $count++;
        }

        return $slug;
    }

    // ── Meta Ads Generator ───────────────────────────────────────

    /**
     * Generate konten Meta Ads dari data produk yang sudah ada.
     * Panggil setelah produk dan relasinya sudah tersimpan.
     */
    public function generateMetaAdsData(): array
    {
        $this->loadMissing(['benefits', 'discount', 'productCategory']);

        $price    = $this->formatted_price;
        $baseP    = $this->formatted_base_price;
        $duration = $this->formatted_duration;
        $category = $this->productCategory?->name ?? '';

        $benefitLines = $this->benefits
            ->map(fn ($b) => '✅ ' . ($b->pivot->custom_value ?: $b->label))
            ->join("\n");

        $hasDiscount  = $this->discount && $this->discount->is_active;
        $discountInfo = $hasDiscount
            ? "\n\n🔥 PROMO SPESIAL! Harga normal {$baseP}, sekarang hanya {$price}!"
            : '';

        $headline = "{$this->name} | {$duration} | {$price}";

        $primaryText = "🎓 {$this->name}\n\n{$this->short_description}{$discountInfo}\n\n📋 Yang Kamu Dapatkan:\n{$benefitLines}\n\n⏳ Durasi: {$duration}\n🗂️ Kategori: {$category}\n💰 Investasi: {$price}";

        $description = "{$this->short_description} Daftar sekarang dan mulai perjalanan belajar Bahasa Jerman bersama Deutsch Lernen Mit Fara! 🇩🇪";

        return [
            'headline'       => $headline,
            'primary_text'   => trim($primaryText),
            'description'    => $description,
            'call_to_action' => 'Daftar Sekarang',
        ];
    }
}
