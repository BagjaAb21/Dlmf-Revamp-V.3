<?php

namespace App\Filament\Resources\ProductResource\Concerns;

use App\Models\Product;
use App\Models\ProductDiscount;
//use Filament\Notifications\Notification;

trait HandlesProductRelations
{
    protected array $discountData = [];
    protected array $metaData     = [];

    /**
     * Pisahkan field discount & meta dari data utama produk.
     */
    protected function extractRelationsFromData(array $data): array
    {
        $this->discountData = [
            'has_discount'     => (bool) ($data['has_discount'] ?? false),
            'discount_type'    => $data['discount_type']         ?? 'percent',
            'discount_value'   => (float) ($data['discount_value'] ?? 0),
            'valid_from'       => $data['discount_valid_from']   ?? null,
            'valid_until'      => $data['discount_valid_until']  ?? null,
            'is_active'        => (bool) ($data['discount_is_active'] ?? true),
        ];

        $this->metaData = [
            'headline'       => $data['meta_headline']       ?? null,
            'primary_text'   => $data['meta_primary_text']   ?? null,
            'description'    => $data['meta_description']    ?? null,
            'call_to_action' => $data['meta_call_to_action'] ?? 'Daftar Sekarang',
            'target_url'     => $data['meta_target_url']     ?? null,
            'is_approved'    => (bool) ($data['meta_is_approved'] ?? false),
        ];

        // Bersihkan field yang bukan kolom tabel products
        $extraKeys = [
            'has_discount', 'discount_type', 'discount_value',
            'discount_valid_from', 'discount_valid_until', 'discount_is_active',
            'final_price_calculated',
            'meta_headline', 'meta_primary_text', 'meta_description',
            'meta_call_to_action', 'meta_target_url', 'meta_is_approved',
        ];

        foreach ($extraKeys as $key) {
            unset($data[$key]);
        }

        return $data;
    }

    /**
     * Simpan atau hapus record diskon.
     */
    protected function saveDiscount(Product $product): void
    {
        $hasDiscount  = $this->discountData['has_discount'];
        $discountValue = $this->discountData['discount_value'];

        if ($hasDiscount && $discountValue > 0) {
            $finalPrice = ProductDiscount::calcFinalPrice(
                (float) $product->base_price,
                $this->discountData['discount_type'],
                $discountValue
            );

            $product->discount()->updateOrCreate(
                ['product_id' => $product->id],
                [
                    'discount_type'  => $this->discountData['discount_type'],
                    'discount_value' => $discountValue,
                    'final_price'    => $finalPrice,
                    'valid_from'     => $this->discountData['valid_from'],
                    'valid_until'    => $this->discountData['valid_until'],
                    'is_active'      => $this->discountData['is_active'],
                ]
            );
        } else {
            // Hapus diskon jika toggle dimatikan
            $product->discount()->delete();
        }
    }

    /**
     * Simpan atau update Meta Ads.
     * Jika field kosong saat create, auto-generate dari data produk.
     */
    protected function saveMetaAds(Product $product): void
    {
        // Jika headline kosong, generate otomatis
        if (empty($this->metaData['headline'])) {
            $product->load(['benefits', 'discount', 'productCategory']);
            $generated = $product->generateMetaAdsData();

            $this->metaData = array_merge($generated, [
                'target_url'  => $this->metaData['target_url']  ?? null,
                'is_approved' => $this->metaData['is_approved'] ?? false,
            ]);
        }

        if (! empty($this->metaData['headline'])) {
            $product->metaAd()->updateOrCreate(
                ['product_id' => $product->id],
                $this->metaData
            );
        }
    }

    /**
     * Populate form fields untuk discount & meta ads saat edit.
     */
    protected function populateRelationFields(array $data, Product $record): array
    {
        $record->loadMissing(['discount', 'metaAd']);

        // Isi ulang field diskon
        if ($record->discount) {
            $data['has_discount']          = true;
            $data['discount_type']         = $record->discount->discount_type;
            $data['discount_value']        = (float) $record->discount->discount_value;
            $data['discount_valid_from']   = $record->discount->valid_from?->toDateString();
            $data['discount_valid_until']  = $record->discount->valid_until?->toDateString();
            $data['discount_is_active']    = $record->discount->is_active;
        } else {
            $data['has_discount'] = false;
        }

        // Isi ulang field meta ads
        if ($record->metaAd) {
            $data['meta_headline']       = $record->metaAd->headline;
            $data['meta_primary_text']   = $record->metaAd->primary_text;
            $data['meta_description']    = $record->metaAd->description;
            $data['meta_call_to_action'] = $record->metaAd->call_to_action;
            $data['meta_target_url']     = $record->metaAd->target_url;
            $data['meta_is_approved']    = $record->metaAd->is_approved;
        }

        return $data;
    }
}
