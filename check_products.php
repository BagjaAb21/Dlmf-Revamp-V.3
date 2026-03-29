<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$products = App\Models\Product::with(['productCategory','discount','benefits'])
    ->where('is_active', true)
    ->orderBy('sort_order')
    ->get();

echo "=== TOTAL PRODUK AKTIF: " . $products->count() . " ===\n\n";

foreach ($products as $p) {
    echo "ID: {$p->id}\n";
    echo "Nama: {$p->name}\n";
    echo "Kategori: " . ($p->productCategory?->name ?? 'N/A') . "\n";
    echo "Base Price: " . $p->formatted_base_price . "\n";
    echo "Effective Price: " . $p->formatted_price . "\n";
    echo "Diskon Aktif: " . ($p->discount?->is_active ? 'Ya' : 'Tidak') . "\n";
    echo "Jumlah Benefit: " . $p->benefits->count() . "\n";
    echo "Duration: " . $p->formatted_duration . "\n";
    echo "Short Desc: " . substr($p->short_description ?? '', 0, 60) . "...\n";
    echo "---\n";
}
