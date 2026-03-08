<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BenefitMaster extends Model
{
    protected $fillable = [
        'label',
        'icon',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active'  => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    // ── Relations ────────────────────────────────────────────────

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_benefits')
            ->withPivot('custom_value', 'sort_order')
            ->withTimestamps();
    }

    // ── Scopes ───────────────────────────────────────────────────

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    // ── Accessors ────────────────────────────────────────────────

    public function getDisplayLabelAttribute(): string
    {
        return trim(($this->icon ? $this->icon . ' ' : '') . $this->label);
    }
}
