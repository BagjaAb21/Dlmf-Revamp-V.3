<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    public function index()
    {
        // Query semua kategori aktif beserta produknya (dengan diskon + benefit)
        $categories = ProductCategory::with([
            'products' => function ($q) {
                $q->where('is_active', true)
                  ->with(['discount', 'benefits'])
                  ->orderBy('sort_order');
            },
        ])
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get();

        return view('harga', compact('categories'));
    }
}
