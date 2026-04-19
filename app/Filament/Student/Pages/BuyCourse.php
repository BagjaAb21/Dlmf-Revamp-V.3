<?php

namespace App\Filament\Student\Pages;

use App\Models\Product;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class BuyCourse extends Page
{
    protected static ?string $navigationIcon  = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel = 'Beli Kursus';
    protected static ?string $title           = 'Checkout Kursus';
    protected static ?int    $navigationSort  = 4;
    protected static string  $view            = 'filament.student.pages.buy-course';

    // Sembunyikan dari navigasi — hanya diakses via URL langsung dari harga page
    protected static bool $shouldRegisterNavigation = false;

    // URL parameter: ?product={slug}
    public string $productSlug = '';

    public function mount(): void
    {
        $this->productSlug = request()->query('product', '');
    }

    public function getViewData(): array
    {
        $user    = Auth::user();
        $product = null;

        if ($this->productSlug) {
            $product = Product::with(['discount', 'benefits', 'metaAd', 'productCategory'])
                ->where('slug', $this->productSlug)
                ->where('is_active', true)
                ->first();
        }

        // Split nama user menjadi given_names dan surname
        $nameParts   = explode(' ', $user->name, 2);
        $givenNames  = $nameParts[0] ?? $user->name;
        $surname     = $nameParts[1] ?? '';

        return [
            'user'       => $user,
            'product'    => $product,
            'givenNames' => $givenNames,
            'surname'    => $surname,
        ];
    }

    /**
     * URL route diperlukan agar route('filament.student.pages.buy-course', ['product' => $slug]) berfungsi.
     */
    public static function getUrl(array $parameters = [], bool $isAbsolute = true, ?string $panel = null, ?\Illuminate\Database\Eloquent\Model $tenant = null): string
    {
        return parent::getUrl($parameters, $isAbsolute, $panel, $tenant);
    }
}
