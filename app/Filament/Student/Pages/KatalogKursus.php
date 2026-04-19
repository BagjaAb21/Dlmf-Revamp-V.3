<?php

namespace App\Filament\Student\Pages;

use App\Models\Enrollment;
use App\Models\ProductCategory;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class KatalogKursus extends Page
{
    protected static ?string $navigationIcon  = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'Katalog Kursus';
    protected static ?string $title           = 'Katalog Kursus';
    protected static ?int    $navigationSort  = 3;
    protected static string  $view            = 'filament.student.pages.katalog-kursus';

    public function getViewData(): array
    {
        $categories = ProductCategory::with([
            'products' => function ($q) {
                $q->where('is_active', true)
                  ->with(['discount', 'benefits', 'metaAd'])
                  ->orderBy('sort_order');
            },
        ])
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get();

        // Produk yang sudah dimiliki siswa (enrollment aktif)
        $ownedProductIds = Enrollment::where('user_id', Auth::id())
            ->where('status', 'active')
            ->pluck('product_id')
            ->toArray();

        return [
            'categories'      => $categories,
            'ownedProductIds' => $ownedProductIds,
        ];
    }
}
