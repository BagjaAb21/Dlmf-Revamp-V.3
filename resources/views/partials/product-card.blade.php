{{-- resources/views/partials/product-card.blade.php --}}
{{-- Variables: $product (App\Models\Product) --}}
<div class="program-card {{ $product->metaAd?->is_popular ? 'popular' : '' }}">
    <div class="program-type">{{ $product->name }}</div>

    <div class="program-price-container">
        @php
            $hasDiscount = $product->discount && $product->discount->is_active;
            $validFrom = !$product->discount?->valid_from || $product->discount?->valid_from?->lte(now());
            $validUntil = !$product->discount?->valid_until || $product->discount?->valid_until?->gte(now());
            $showDiscount = $hasDiscount && $validFrom && $validUntil;
        @endphp

        @if ($showDiscount)
            <div class="program-price-old">{{ $product->formatted_base_price }}</div>
        @endif

        <div class="program-price">{{ $product->formatted_price }}</div>
    </div>

    @if ($product->formatted_duration !== 'Lifetime')
        <p class="program-duration">{{ $product->formatted_duration }}</p>
    @endif

    @if ($product->short_description)
        <p class="program-description">{{ $product->short_description }}</p>
    @endif

    @if ($product->benefits->isNotEmpty())
        <div class="benefits-title">Benefit:</div>
        @foreach ($product->benefits as $benefit)
            <div class="benefit-item">
                <i class="bi bi-check-circle-fill"></i>
                <span>{{ $benefit->pivot->custom_value ?: $benefit->label }}</span>
            </div>
        @endforeach
    @endif

    @php
        /* Route "Beli Sekarang":
         * - Jika sudah login sebagai siswa → langsung ke halaman checkout siswa
         * - Jika belum login → ke halaman registrasi/login siswa (dengan ?product=slug)
         */
        $buyUrl = auth()->check()
            ? route('filament.student.pages.buy-course', ['product' => $product->slug])
            : route('filament.student.auth.register') . '?product=' . $product->slug;
    @endphp

    <button class="btn btn-program mt-auto">
        <a href="{{ $buyUrl }}" class="d-block w-100 text-decoration-none">
            <i class="fas fa-shopping-cart me-2"></i>Beli Sekarang
        </a>
    </button>
</div>
