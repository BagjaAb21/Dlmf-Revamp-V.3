<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Configuration;
use Illuminate\Support\Str;
use Xendit\Invoice\InvoiceApi;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private $invoiceApi;

    // Daftar produk yang tersedia - LENGKAP SESUAI HARGA.BLADE.PHP
    private $products = [
        // ==================== INTENSIF REGULER ONLINE ====================
        'intensif-online-a1' => [
            'code' => 'intensif-online-a1',
            'name' => 'Intensif Reguler Online A1',
            'price' => 1499000,
            'description' => 'Kursus Bahasa Jerman Level A1 - Online'
        ],
        'intensif-online-a2' => [
            'code' => 'intensif-online-a2',
            'name' => 'Intensif Reguler Online A2',
            'price' => 1499000,
            'description' => 'Kursus Bahasa Jerman Level A2 - Online'
        ],
        'intensif-online-b1' => [
            'code' => 'intensif-online-b1',
            'name' => 'Intensif Reguler Online B1',
            'price' => 1699000,
            'description' => 'Kursus Bahasa Jerman Level B1 - Online'
        ],

        // ==================== INTENSIF REGULER OFFLINE ====================
        'intensif-offline-a1' => [
            'code' => 'intensif-offline-a1',
            'name' => 'Intensif Reguler Offline A1',
            'price' => 2099000,
            'description' => 'Kursus Bahasa Jerman Level A1 - Offline'
        ],
        'intensif-offline-a2' => [
            'code' => 'intensif-offline-a2',
            'name' => 'Intensif Reguler Offline A2',
            'price' => 2099000,
            'description' => 'Kursus Bahasa Jerman Level A2 - Offline'
        ],
        'intensif-offline-b1' => [
            'code' => 'intensif-offline-b1',
            'name' => 'Intensif Reguler Offline B1',
            'price' => 2250000,
            'description' => 'Kursus Bahasa Jerman Level B1 - Offline'
        ],

        // ==================== PRIVATE GRAMMATIK ONLINE ====================
        'grammatik-online-a1' => [
            'code' => 'grammatik-online-a1',
            'name' => 'Private Grammatik Online A1',
            'price' => 975000,
            'description' => 'Private Grammar A1 - Online'
        ],
        'grammatik-online-a2' => [
            'code' => 'grammatik-online-a2',
            'name' => 'Private Grammatik Online A2',
            'price' => 975000,
            'description' => 'Private Grammar A2 - Online'
        ],
        'grammatik-online-b1' => [
            'code' => 'grammatik-online-b1',
            'name' => 'Private Grammatik Online B1',
            'price' => 1095000,
            'description' => 'Private Grammar B1 - Online'
        ],

        // ==================== PRIVATE GRAMMATIK OFFLINE ====================
        'grammatik-offline-a1' => [
            'code' => 'grammatik-offline-a1',
            'name' => 'Private Grammatik Offline A1',
            'price' => 1400000,
            'description' => 'Private Grammar A1 - Offline'
        ],
        'grammatik-offline-a1-english' => [
            'code' => 'grammatik-offline-a1-english',
            'name' => 'Private Grammatik Offline A1 Dalam Bahasa Inggris',
            'price' => 1575000,
            'description' => 'Private Grammar A1 - Offline (English)'
        ],
        'grammatik-offline-a2' => [
            'code' => 'grammatik-offline-a2',
            'name' => 'Private Grammatik Offline A2',
            'price' => 1400000,
            'description' => 'Private Grammar A2 - Offline'
        ],
        'grammatik-offline-a2-english' => [
            'code' => 'grammatik-offline-a2-english',
            'name' => 'Private Grammatik Offline A2 Dalam Bahasa Inggris',
            'price' => 1575000,
            'description' => 'Private Grammar A2 - Offline (English)'
        ],
        'grammatik-offline-b1' => [
            'code' => 'grammatik-offline-b1',
            'name' => 'Private Grammatik Offline B1',
            'price' => 1500000,
            'description' => 'Private Grammar B1 - Offline'
        ],
        'grammatik-offline-b1-english' => [
            'code' => 'grammatik-offline-b1-english',
            'name' => 'Private Grammatik Offline B1 Dalam Bahasa Inggris',
            'price' => 1675000,
            'description' => 'Private Grammar B1 - Offline (English)'
        ],

        // ==================== PERSIAPAN UJIAN GOETHE ONLINE ====================
        'goethe-online-a1' => [
            'code' => 'goethe-online-a1',
            'name' => 'Private Persiapan Ujian Goethe A1 Online',
            'price' => 975000,
            'description' => 'Persiapan Ujian Goethe A1 - Online'
        ],
        'goethe-online-a2' => [
            'code' => 'goethe-online-a2',
            'name' => 'Private Persiapan Ujian Goethe A2 Online',
            'price' => 975000,
            'description' => 'Persiapan Ujian Goethe A2 - Online'
        ],
        'goethe-online-b1' => [
            'code' => 'goethe-online-b1',
            'name' => 'Private Persiapan Ujian Goethe B1 Online',
            'price' => 975000,
            'description' => 'Persiapan Ujian Goethe B1 - Online'
        ],

        // ==================== PERSIAPAN UJIAN GOETHE OFFLINE ====================
        'goethe-offline-a1' => [
            'code' => 'goethe-offline-a1',
            'name' => 'Private Persiapan Ujian Goethe A1 Offline',
            'price' => 1400000,
            'description' => 'Persiapan Ujian Goethe A1 - Offline'
        ],
        'goethe-offline-a1-english' => [
            'code' => 'goethe-offline-a1-english',
            'name' => 'Private Persiapan Ujian Goethe A1 Offline Dalam Bahasa Inggris',
            'price' => 1575000,
            'description' => 'Persiapan Ujian Goethe A1 - Offline (English)'
        ],
        'goethe-offline-a2' => [
            'code' => 'goethe-offline-a2',
            'name' => 'Private Persiapan Ujian Goethe A2 Offline',
            'price' => 1400000,
            'description' => 'Persiapan Ujian Goethe A2 - Offline'
        ],
        'goethe-offline-a2-english' => [
            'code' => 'goethe-offline-a2-english',
            'name' => 'Private Persiapan Ujian Goethe A2 Offline Dalam Bahasa Inggris',
            'price' => 1675000,
            'description' => 'Persiapan Ujian Goethe A2 - Offline (English)'
        ],

        // ==================== KINDER (ANAK-ANAK) ====================
        'kinder-online-indo' => [
            'code' => 'kinder-online-indo',
            'name' => 'Private Kinder dengan Bahasa Indonesia Online',
            'price' => 895000,
            'description' => 'Kursus Anak dengan Bahasa Indonesia - Online'
        ],
        'kinder-online-english' => [
            'code' => 'kinder-online-english',
            'name' => 'Private Kinder dengan Bahasa Inggris Online',
            'price' => 1000000,
            'description' => 'Kursus Anak dengan Bahasa Inggris - Online'
        ],

        // ==================== MUTTERSPRACHLER (NATIVE SPEAKER) ====================
        'muttersprachler-online' => [
            'code' => 'muttersprachler-online',
            'name' => 'Sprachkurs mit Muttersprachler Online',
            'price' => 1596000,
            'description' => 'Kursus dengan Native Speaker - Online'
        ],
        'muttersprachler-offline' => [
            'code' => 'muttersprachler-offline',
            'name' => 'Sprachkurs mit Muttersprachler Offline',
            'price' => 1676000,
            'description' => 'Kursus dengan Native Speaker - Offline'
        ],

        // ==================== BUNDLING PACKAGES INTENSIF ====================
        'bundling-a1-a2-online' => [
            'code' => 'bundling-a1-a2-online',
            'name' => 'Bundling Reguler Intensif A1-A2 Online',
            'price' => 5599000,
            'description' => 'Paket Bundling Level A1-A2 - Online'
        ],
        'bundling-a2-b1-online' => [
            'code' => 'bundling-a2-b1-online',
            'name' => 'Bundling Reguler Intensif A2-B1 Online',
            'price' => 5999000,
            'description' => 'Paket Bundling Level A2-B1 - Online'
        ],
        'bundling-a1-b1-online' => [
            'code' => 'bundling-a1-b1-online',
            'name' => 'Bundling Reguler Intensif A1-B1 Online',
            'price' => 8394000,
            'description' => 'Paket Bundling Level A1-B1 - Online'
        ],

        // ==================== FLEXILEARN A1 ====================
        'flexilearn-a1-2m' => [
            'code' => 'flexilearn-a1-2m',
            'name' => 'Deutsch FlexiLearn A1 - 2 Bulan',
            'price' => 149000,
            'description' => 'Akses FlexiLearn A1 selama 2 Bulan'
        ],
        'flexilearn-a1-6m' => [
            'code' => 'flexilearn-a1-6m',
            'name' => 'Deutsch FlexiLearn A1 - 6 Bulan',
            'price' => 169000,
            'description' => 'Akses FlexiLearn A1 selama 6 Bulan'
        ],
        'flexilearn-a1-12m' => [
            'code' => 'flexilearn-a1-12m',
            'name' => 'Deutsch FlexiLearn A1 - 12 Bulan',
            'price' => 189000,
            'description' => 'Akses FlexiLearn A1 selama 12 Bulan'
        ],
        'flexilearn-a1-lifetime' => [
            'code' => 'flexilearn-a1-lifetime',
            'name' => 'Deutsch FlexiLearn A1 - Lifetime Basic',
            'price' => 199000,
            'description' => 'Akses Lifetime FlexiLearn A1'
        ],
        'flexilearn-a1-lifetime-10ebook' => [
            'code' => 'flexilearn-a1-lifetime-10ebook',
            'name' => 'Deutsch FlexiLearn A1 - Lifetime + 10 E-Book',
            'price' => 299000,
            'description' => 'Akses Lifetime FlexiLearn A1 + 10 E-Book'
        ],
        'flexilearn-a1-lifetime-20ebook' => [
            'code' => 'flexilearn-a1-lifetime-20ebook',
            'name' => 'Deutsch FlexiLearn A1 - Lifetime + 20 E-Book',
            'price' => 399000,
            'description' => 'Akses Lifetime FlexiLearn A1 + 20 E-Book'
        ],
        'flexilearn-a1-lifetime-20ebook-1private' => [
            'code' => 'flexilearn-a1-lifetime-20ebook-1private',
            'name' => 'Deutsch FlexiLearn A1 - Lifetime + 20 E-Book + 1x Private',
            'price' => 599000,
            'description' => 'Akses Lifetime FlexiLearn A1 + 20 E-Book + 1x Private Class'
        ],
        'flexilearn-a1-lifetime-20ebook-2private' => [
            'code' => 'flexilearn-a1-lifetime-20ebook-2private',
            'name' => 'Deutsch FlexiLearn A1 - Lifetime + 20 E-Book + 2x Private',
            'price' => 699000,
            'description' => 'Akses Lifetime FlexiLearn A1 + 20 E-Book + 2x Private Class'
        ],

        // ==================== FLEXILEARN A2 ====================
        'flexilearn-a2-2m' => [
            'code' => 'flexilearn-a2-2m',
            'name' => 'Deutsch FlexiLearn A2 - 2 Bulan',
            'price' => 149000,
            'description' => 'Akses FlexiLearn A2 selama 2 Bulan'
        ],
        'flexilearn-a2-6m' => [
            'code' => 'flexilearn-a2-6m',
            'name' => 'Deutsch FlexiLearn A2 - 6 Bulan',
            'price' => 169000,
            'description' => 'Akses FlexiLearn A2 selama 6 Bulan'
        ],
        'flexilearn-a2-12m' => [
            'code' => 'flexilearn-a2-12m',
            'name' => 'Deutsch FlexiLearn A2 - 12 Bulan',
            'price' => 189000,
            'description' => 'Akses FlexiLearn A2 selama 12 Bulan'
        ],
        'flexilearn-a2-lifetime' => [
            'code' => 'flexilearn-a2-lifetime',
            'name' => 'Deutsch FlexiLearn A2 - Lifetime Basic',
            'price' => 199000,
            'description' => 'Akses Lifetime FlexiLearn A2'
        ],
        'flexilearn-a2-lifetime-10ebook' => [
            'code' => 'flexilearn-a2-lifetime-10ebook',
            'name' => 'Deutsch FlexiLearn A2 - Lifetime + 10 E-Book',
            'price' => 299000,
            'description' => 'Akses Lifetime FlexiLearn A2 + 10 E-Book'
        ],
        'flexilearn-a2-lifetime-20ebook' => [
            'code' => 'flexilearn-a2-lifetime-20ebook',
            'name' => 'Deutsch FlexiLearn A2 - Lifetime + 20 E-Book',
            'price' => 399000,
            'description' => 'Akses Lifetime FlexiLearn A2 + 20 E-Book'
        ],
        'flexilearn-a2-lifetime-20ebook-1private' => [
            'code' => 'flexilearn-a2-lifetime-20ebook-1private',
            'name' => 'Deutsch FlexiLearn A2 - Lifetime + 20 E-Book + 1x Private',
            'price' => 599000,
            'description' => 'Akses Lifetime FlexiLearn A2 + 20 E-Book + 1x Private Class'
        ],
        'flexilearn-a2-lifetime-20ebook-2private' => [
            'code' => 'flexilearn-a2-lifetime-20ebook-2private',
            'name' => 'Deutsch FlexiLearn A2 - Lifetime + 20 E-Book + 2x Private',
            'price' => 699000,
            'description' => 'Akses Lifetime FlexiLearn A2 + 20 E-Book + 2x Private Class'
        ],

        // ==================== FLEXILEARN B1 ====================
        'flexilearn-b1-2m' => [
            'code' => 'flexilearn-b1-2m',
            'name' => 'Deutsch FlexiLearn B1 - 2 Bulan',
            'price' => 159000,
            'description' => 'Akses FlexiLearn B1 selama 2 Bulan'
        ],
        'flexilearn-b1-6m' => [
            'code' => 'flexilearn-b1-6m',
            'name' => 'Deutsch FlexiLearn B1 - 6 Bulan',
            'price' => 179000,
            'description' => 'Akses FlexiLearn B1 selama 6 Bulan'
        ],
        'flexilearn-b1-12m' => [
            'code' => 'flexilearn-b1-12m',
            'name' => 'Deutsch FlexiLearn B1 - 12 Bulan',
            'price' => 199000,
            'description' => 'Akses FlexiLearn B1 selama 12 Bulan'
        ],
        'flexilearn-b1-lifetime' => [
            'code' => 'flexilearn-b1-lifetime',
            'name' => 'Deutsch FlexiLearn B1 - Lifetime Basic',
            'price' => 199000,
            'description' => 'Akses Lifetime FlexiLearn B1'
        ],
        'flexilearn-b1-lifetime-10ebook' => [
            'code' => 'flexilearn-b1-lifetime-10ebook',
            'name' => 'Deutsch FlexiLearn B1 - Lifetime + 10 E-Book',
            'price' => 399000,
            'description' => 'Akses Lifetime FlexiLearn B1 + 10 E-Book'
        ],
        'flexilearn-b1-lifetime-20ebook' => [
            'code' => 'flexilearn-b1-lifetime-20ebook',
            'name' => 'Deutsch FlexiLearn B1 - Lifetime + 20 E-Book',
            'price' => 469000,
            'description' => 'Akses Lifetime FlexiLearn B1 + 20 E-Book'
        ],
        'flexilearn-b1-lifetime-20ebook-1private' => [
            'code' => 'flexilearn-b1-lifetime-20ebook-1private',
            'name' => 'Deutsch FlexiLearn B1 - Lifetime + 20 E-Book + 1x Private',
            'price' => 649000,
            'description' => 'Akses Lifetime FlexiLearn B1 + 20 E-Book + 1x Private Class'
        ],
        'flexilearn-b1-lifetime-20ebook-2private' => [
            'code' => 'flexilearn-b1-lifetime-20ebook-2private',
            'name' => 'Deutsch FlexiLearn B1 - Lifetime + 20 E-Book + 2x Private',
            'price' => 759000,
            'description' => 'Akses Lifetime FlexiLearn B1 + 20 E-Book + 2x Private Class'
        ],

        // ==================== BUNDLING FLEXILEARN A1-A2 ====================
        'bundling-flex-a1a2-2m' => [
            'code' => 'bundling-flex-a1a2-2m',
            'name' => 'Bundling Deutsch FlexiLearn A1-A2 - 2 Bulan',
            'price' => 269000,
            'description' => 'Akses FlexiLearn A1-A2 selama 2 Bulan'
        ],
        'bundling-flex-a1a2-6m' => [
            'code' => 'bundling-flex-a1a2-6m',
            'name' => 'Bundling Deutsch FlexiLearn A1-A2 - 6 Bulan',
            'price' => 309000,
            'description' => 'Akses FlexiLearn A1-A2 selama 6 Bulan'
        ],
        'bundling-flex-a1a2-12m' => [
            'code' => 'bundling-flex-a1a2-12m',
            'name' => 'Bundling Deutsch FlexiLearn A1-A2 - 12 Bulan',
            'price' => 339000,
            'description' => 'Akses FlexiLearn A1-A2 selama 12 Bulan'
        ],
        'bundling-flex-a1a2-lifetime' => [
            'code' => 'bundling-flex-a1a2-lifetime',
            'name' => 'Bundling Deutsch FlexiLearn A1-A2 - Lifetime Basic',
            'price' => 339000,
            'description' => 'Akses Lifetime FlexiLearn A1-A2'
        ],
        'bundling-flex-a1a2-lifetime-10ebook' => [
            'code' => 'bundling-flex-a1a2-lifetime-10ebook',
            'name' => 'Bundling Deutsch FlexiLearn A1-A2 - Lifetime + 10 E-Book',
            'price' => 569000,
            'description' => 'Akses Lifetime FlexiLearn A1-A2 + 10 E-Book'
        ],
        'bundling-flex-a1a2-lifetime-20ebook' => [
            'code' => 'bundling-flex-a1a2-lifetime-20ebook',
            'name' => 'Bundling Deutsch FlexiLearn A1-A2 - Lifetime + 20 E-Book',
            'price' => 779000,
            'description' => 'Akses Lifetime FlexiLearn A1-A2 + 20 E-Book'
        ],
        'bundling-flex-a1a2-lifetime-20ebook-1private' => [
            'code' => 'bundling-flex-a1a2-lifetime-20ebook-1private',
            'name' => 'Bundling Deutsch FlexiLearn A1-A2 - Lifetime + 20 E-Book + 1x Private',
            'price' => 1169000,
            'description' => 'Akses Lifetime FlexiLearn A1-A2 + 20 E-Book + 1x Private Class'
        ],
        'bundling-flex-a1a2-lifetime-20ebook-2private' => [
            'code' => 'bundling-flex-a1a2-lifetime-20ebook-2private',
            'name' => 'Bundling Deutsch FlexiLearn A1-A2 - Lifetime + 20 E-Book + 2x Private',
            'price' => 1349000,
            'description' => 'Akses Lifetime FlexiLearn A1-A2 + 20 E-Book + 2x Private Class'
        ],

        // ==================== BUNDLING FLEXILEARN A2-B1 ====================
        'bundling-flex-a2b1-2m' => [
            'code' => 'bundling-flex-a2b1-2m',
            'name' => 'Bundling Deutsch FlexiLearn A2-B1 - 2 Bulan',
            'price' => 289000,
            'description' => 'Akses FlexiLearn A2-B1 selama 2 Bulan'
        ],
        'bundling-flex-a2b1-6m' => [
            'code' => 'bundling-flex-a2b1-6m',
            'name' => 'Bundling Deutsch FlexiLearn A2-B1 - 6 Bulan',
            'price' => 319000,
            'description' => 'Akses FlexiLearn A2-B1 selama 6 Bulan'
        ],
        'bundling-flex-a2b1-12m' => [
            'code' => 'bundling-flex-a2b1-12m',
            'name' => 'Bundling Deutsch FlexiLearn A2-B1 - 12 Bulan',
            'price' => 359000,
            'description' => 'Akses FlexiLearn A2-B1 selama 12 Bulan'
        ],
        'bundling-flex-a2b1-lifetime' => [
            'code' => 'bundling-flex-a2b1-lifetime',
            'name' => 'Bundling Deutsch FlexiLearn A2-B1 - Lifetime Basic',
            'price' => 379000,
            'description' => 'Akses Lifetime FlexiLearn A2-B1'
        ],
        'bundling-flex-a2b1-lifetime-10ebook' => [
            'code' => 'bundling-flex-a2b1-lifetime-10ebook',
            'name' => 'Bundling Deutsch FlexiLearn A2-B1 - Lifetime + 10 E-Book',
            'price' => 609000,
            'description' => 'Akses Lifetime FlexiLearn A2-B1 + 10 E-Book'
        ],
        'bundling-flex-a2b1-lifetime-20ebook' => [
            'code' => 'bundling-flex-a2b1-lifetime-20ebook',
            'name' => 'Bundling Deutsch FlexiLearn A2-B1 - Lifetime + 20 E-Book',
            'price' => 839000,
            'description' => 'Akses Lifetime FlexiLearn A2-B1 + 20 E-Book'
        ],
        'bundling-flex-a2b1-lifetime-20ebook-1private' => [
            'code' => 'bundling-flex-a2b1-lifetime-20ebook-1private',
            'name' => 'Bundling Deutsch FlexiLearn A2-B1 - Lifetime + 20 E-Book + 1x Private',
            'price' => 1209000,
            'description' => 'Akses Lifetime FlexiLearn A2-B1 + 20 E-Book + 1x Private Class'
        ],
        'bundling-flex-a2b1-lifetime-20ebook-2private' => [
            'code' => 'bundling-flex-a2b1-lifetime-20ebook-2private',
            'name' => 'Bundling Deutsch FlexiLearn A2-B1 - Lifetime + 20 E-Book + 2x Private',
            'price' => 1409000,
            'description' => 'Akses Lifetime FlexiLearn A2-B1 + 20 E-Book + 2x Private Class'
        ],

        // ==================== BUNDLING FLEXILEARN A1-B1 ====================
        'bundling-flex-a1b1-2m' => [
            'code' => 'bundling-flex-a1b1-2m',
            'name' => 'Bundling Deutsch FlexiLearn A1-B1 - 2 Bulan',
            'price' => 429000,
            'description' => 'Akses FlexiLearn A1-B1 selama 2 Bulan'
        ],
        'bundling-flex-a1b1-6m' => [
            'code' => 'bundling-flex-a1b1-6m',
            'name' => 'Bundling Deutsch FlexiLearn A1-B1 - 6 Bulan',
            'price' => 479000,
            'description' => 'Akses FlexiLearn A1-B1 selama 6 Bulan'
        ],
        'bundling-flex-a1b1-12m' => [
            'code' => 'bundling-flex-a1b1-12m',
            'name' => 'Bundling Deutsch FlexiLearn A1-B1 - 12 Bulan',
            'price' => 529000,
            'description' => 'Akses FlexiLearn A1-B1 selama 12 Bulan'
        ],
        'bundling-flex-a1b1-lifetime' => [
            'code' => 'bundling-flex-a1b1-lifetime',
            'name' => 'Bundling Deutsch FlexiLearn A1-B1 - Lifetime Basic',
            'price' => 569000,
            'description' => 'Akses Lifetime FlexiLearn A1-B1'
        ],
        'bundling-flex-a1b1-lifetime-10ebook' => [
            'code' => 'bundling-flex-a1b1-lifetime-10ebook',
            'name' => 'Bundling Deutsch FlexiLearn A1-B1 - Lifetime + 10 E-Book',
            'price' => 889000,
            'description' => 'Akses Lifetime FlexiLearn A1-B1 + 10 E-Book'
        ],
        'bundling-flex-a1b1-lifetime-20ebook' => [
            'code' => 'bundling-flex-a1b1-lifetime-20ebook',
            'name' => 'Bundling Deutsch FlexiLearn A1-B1 - Lifetime + 20 E-Book',
            'price' => 1229000,
            'description' => 'Akses Lifetime FlexiLearn A1-B1 + 20 E-Book'
        ],
        'bundling-flex-a1b1-lifetime-20ebook-1private' => [
            'code' => 'bundling-flex-a1b1-lifetime-20ebook-1private',
            'name' => 'Bundling Deutsch FlexiLearn A1-B1 - Lifetime + 20 E-Book + 1x Private',
            'price' => 1779000,
            'description' => 'Akses Lifetime FlexiLearn A1-B1 + 20 E-Book + 1x Private Class'
        ],
        'bundling-flex-a1b1-lifetime-20ebook-2private' => [
            'code' => 'bundling-flex-a1b1-lifetime-20ebook-2private',
            'name' => 'Bundling Deutsch FlexiLearn A1-B1 - Lifetime + 20 E-Book + 2x Private',
            'price' => 2009000,
            'description' => 'Akses Lifetime FlexiLearn A1-B1 + 20 E-Book + 2x Private Class'
        ],
    ];

    public function __construct()
    {
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
        $this->invoiceApi = new InvoiceApi();
    }

    /**
     * Menampilkan halaman checkout untuk produk tertentu
     */
    public function showCheckout(Request $request)
    {
        $productCode = $request->query('product');

        if (!$productCode || !isset($this->products[$productCode])) {
            return redirect('/harga')->with('error', 'Produk tidak ditemukan');
        }

        $product = $this->products[$productCode];

        return view('checkout', compact('product'));
    }

    /**
     * Proses payment dengan quantity
     * DENGAN SECURITY VALIDATION
     */
    public function processPayment(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'product_code' => 'required|string',
        'payer_name' => 'required|string|max:255',
        'payer_email' => 'required|email|max:255',
        'payer_phone' => 'required|string|max:20',
        'quantity' => 'required|integer|min:1|max:10',
        'payment_method' => 'required|in:QRIS,VA', // Tambahkan validasi payment method
    ]);

    // ============================================================================
    // SECURITY LAYER 1: Verify product exists
    // ============================================================================
    if (!isset($this->products[$validated['product_code']])) {
        Log::warning('Invalid product code attempt', [
            'product_code' => $validated['product_code'],
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        return redirect('/harga')->with('error', 'Produk tidak valid');
    }

    $product = $this->products[$validated['product_code']];

    // ============================================================================
    // SECURITY LAYER 2: Calculate price SERVER-SIDE
    // ============================================================================
    $quantity = $validated['quantity'];
    $pricePerItem = $product['price'];
    $subtotal = $pricePerItem * $quantity;
    $paymentMethod = $validated['payment_method'];

    // ============================================================================
    // CALCULATE CONVENIENCE FEE (sama seperti di frontend)
    // ============================================================================
    $VA_BASE_FEE = 4000;
    $PPN_RATE = 0.11;
    $QRIS_RATE = 0.0063;
    $QRIS_LIMIT = 10000000;

    $convenienceFee = 0;

    if ($paymentMethod === 'QRIS' && $subtotal < $QRIS_LIMIT) {
        // QRIS Fee: 0.63% dari subtotal + PPN 11%
        $qrisFeeBase = $subtotal * $QRIS_RATE;
        $convenienceFee = round($qrisFeeBase * (1 + $PPN_RATE));
    } elseif ($paymentMethod === 'VA' || $subtotal >= $QRIS_LIMIT) {
        // VA Fee: Rp 4.000 + PPN 11% = Rp 4.440
        $convenienceFee = round($VA_BASE_FEE * (1 + $PPN_RATE));

        // Jika subtotal >= 10 juta, paksa gunakan VA
        if ($subtotal >= $QRIS_LIMIT) {
            $paymentMethod = 'VA';
        }
    }

    // Total yang harus dibayar
    $totalAmount = $subtotal + $convenienceFee;

    // ============================================================================
    // SECURITY LAYER 3: Additional validation
    // ============================================================================
    if ($totalAmount < 10000) {
        Log::warning('Amount below minimum', [
            'product_code' => $validated['product_code'],
            'amount' => $totalAmount,
            'ip' => $request->ip()
        ]);

        return redirect('/harga')->with('error', 'Jumlah pembayaran minimal Rp 10.000');
    }

    $maxAmount = 100000000;
    if ($totalAmount > $maxAmount) {
        Log::warning('Amount exceeds maximum', [
            'product_code' => $validated['product_code'],
            'amount' => $totalAmount,
            'quantity' => $quantity,
            'ip' => $request->ip()
        ]);

        return redirect('/harga')->with('error', 'Jumlah pembayaran melebihi batas maksimal');
    }

    if ($quantity > 10) {
        Log::warning('Quantity exceeds limit', [
            'product_code' => $validated['product_code'],
            'quantity' => $quantity,
            'ip' => $request->ip()
        ]);

        return redirect('/harga')->with('error', 'Maksimal pembelian 10 item per transaksi');
    }

    // ============================================================================
    // SECURITY LAYER 4: Log transaction
    // ============================================================================
    Log::info('Payment creation attempt', [
        'product_code' => $validated['product_code'],
        'product_name' => $product['name'],
        'quantity' => $quantity,
        'price_per_item' => $pricePerItem,
        'subtotal' => $subtotal,
        'payment_method' => $paymentMethod,
        'convenience_fee' => $convenienceFee,
        'total_amount' => $totalAmount,
        'payer_email' => $validated['payer_email'],
        'ip' => $request->ip(),
        'timestamp' => now()
    ]);

    // Generate external ID
    $externalId = (string) Str::uuid();

    // Prepare description dengan detail biaya
    $description = sprintf(
        '%s (Qty: %d) | Subtotal: Rp %s | %s Fee: Rp %s | Total: Rp %s',
        $product['description'],
        $quantity,
        number_format($subtotal, 0, ',', '.'),
        $paymentMethod,
        number_format($convenienceFee, 0, ',', '.'),
        number_format($totalAmount, 0, ',', '.')
    );

    $params = [
        'external_id' => $externalId,
        'payer_name' => $validated['payer_name'],
        'payer_email' => $validated['payer_email'],
        'payer_phone' => $validated['payer_phone'],
        'description' => $description,
        'amount' => $totalAmount, // Total sudah termasuk convenience fee
        'success_redirect_url' => url('/payment-success?external_id=' . $externalId),
        'failure_redirect_url' => url('/payment-failed?external_id=' . $externalId),
        'invoice_duration' => 86400,
    ];

    try {
        $createInvoice = $this->invoiceApi->createInvoice($params);

        // Save to DB
        $payment = new Payment;
        $payment->external_id = $externalId;
        $payment->product_name = $product['name'];
        $payment->quantity = $quantity;
        $payment->payer_name = $validated['payer_name'];
        $payment->payer_email = $validated['payer_email'];
        $payment->payer_phone = $validated['payer_phone'];
        $payment->amount = $totalAmount; // Simpan total amount (sudah include fee)
        $payment->status = 'pending';
        $payment->checkout_link = $createInvoice['invoice_url'];
        $payment->save();

        Log::info('Payment invoice created successfully', [
            'external_id' => $externalId,
            'payment_id' => $payment->id,
            'subtotal' => $subtotal,
            'convenience_fee' => $convenienceFee,
            'total_amount' => $totalAmount
        ]);

        return redirect($createInvoice['invoice_url']);

    } catch (\Xendit\XenditSdkException $e) {
        Log::error('Xendit Error', [
            'message' => $e->getMessage(),
            'product_code' => $validated['product_code'],
            'amount' => $totalAmount,
            'ip' => $request->ip()
        ]);

        return redirect('/harga')->with('error', 'Gagal membuat invoice. Silakan coba lagi.');
    } catch (\Exception $e) {
        Log::error('Payment Error', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
            'product_code' => $validated['product_code'],
            'ip' => $request->ip()
        ]);

        return redirect('/harga')->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
    }
}

    public function create(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'payer_name' => 'required|string',
            'payer_email' => 'required|email',
            'payer_phone' => 'nullable|string',
            'description' => 'required|string',
            'amount' => 'required|numeric|min:10000',
        ]);

        $externalId = (string) Str::uuid();

        $params = [
            'external_id' => $externalId,
            'payer_name' => $validated['payer_name'],
            'payer_email' => $validated['payer_email'],
            'payer_phone' => $validated['payer_phone'],
            'description' => $validated['description'],
            'amount' => $validated['amount'],
            'success_redirect_url' => url('/payment-success?external_id=' . $externalId),
            'failure_redirect_url' => url('/payment-failed?external_id=' . $externalId),
            'invoice_duration' => 86400, // 24 jam (dalam detik)
        ];

        try {
            $createInvoice = $this->invoiceApi->createInvoice($params);

            // Save to DB
            $payment = new Payment;
            $payment->status = 'pending';
            $payment->checkout_link = $createInvoice['invoice_url'];
            $payment->external_id = $externalId;
            $payment->payer_name = $validated['payer_name'];
            $payment->payer_email = $validated['payer_email'];
            $payment->payer_phone = $validated['payer_phone'];
            $payment->amount = $validated['amount'];
            $payment->save();

            return response()->json([
                'success' => true,
                'data' => [
                    'checkout_link' => $createInvoice['invoice_url'],
                    'external_id' => $externalId,
                    'pembeli' => $validated['payer_name'],
                    'email' => $validated['payer_email'],
                    'phone' => $validated['payer_phone'],
                    'status' => 'pending',
                    'amount' => $validated['amount'],
                    'description' => $validated['description'],
                    'message' => 'Invoice created successfully',
                ]
            ]);

        } catch (\Xendit\XenditSdkException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create invoice: ' . $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    public function callback(Request $request)
    {
        // Log untuk debugging
        Log::info('Xendit Callback Received:', $request->all());

        // Verifikasi callback token
        $xenditCallbackToken = $request->header('x-callback-token');

        if ($xenditCallbackToken !== env('XENDIT_CALLBACK_TOKEN')) {
            Log::error('Invalid callback token');
            return response()->json(['message' => 'Invalid callback token'], 401);
        }

        $externalId = $request->input('external_id');
        $status = $request->input('status');

        Log::info("Processing payment: {$externalId} with status: {$status}");

        // Update payment status
        $payment = Payment::where('external_id', $externalId)->first();

        if ($payment) {
            $payment->status = strtolower($status);
            $payment->paid_at = $status === 'PAID' ? now() : null;
            $payment->save();

            Log::info("Payment updated successfully: {$externalId}");
            return response()->json(['message' => 'Callback processed successfully']);
        }

        Log::error("Payment not found: {$externalId}");
        return response()->json(['message' => 'Payment not found'], 404);
    }

    /**
     * Cek status payment dari database
     * Cepat, tidak hit Xendit API
     */
    public function checkStatus($external_id)
    {
        $payment = Payment::where('external_id', $external_id)->first();

        if (!$payment) {
            return response()->json([
                'success' => false,
                'message' => 'Payment not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'external_id' => $payment->external_id,
                'payer_name' => $payment->payer_name,
                'payer_email' => $payment->payer_email,
                'payer_phone' => $payment->payer_phone,
                'amount' => $payment->amount,
                'status' => $payment->status,
                'checkout_link' => $payment->checkout_link,
                'paid_at' => $payment->paid_at,
                'created_at' => $payment->created_at,
            ]
        ]);
    }

    /**
     * Sync status dari Xendit (force update)
     * Hit Xendit API untuk mendapatkan status terkini
     */
    public function syncStatus($external_id)
    {
        $payment = Payment::where('external_id', $external_id)->first();

        if (!$payment) {
            return response()->json([
                'success' => false,
                'message' => 'Payment not found'
            ], 404);
        }

        try {
            // Gunakan HTTP Client Laravel
            $response = \Illuminate\Support\Facades\Http::withHeaders([
                'Authorization' => 'Basic ' . base64_encode(env('XENDIT_SECRET_KEY') . ':'),
            ])->get("https://api.xendit.co/v2/invoices", [
                'external_id' => $external_id
            ]);

            if (!$response->successful()) {
                Log::error('Xendit API Error:', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Failed to connect to Xendit API'
                ], 500);
            }

            $invoices = $response->json();

            if (empty($invoices)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invoice not found in Xendit'
                ], 404);
            }

            $invoice = $invoices[0];

            Log::info('Xendit Invoice Data:', $invoice);

            $oldStatus = $payment->status;
            $newStatus = strtolower($invoice['status']);

            $payment->status = $newStatus;

            if (strtoupper($invoice['status']) === 'PAID' && !$payment->paid_at) {
                $payment->paid_at = isset($invoice['paid_at'])
                    ? \Carbon\Carbon::parse($invoice['paid_at'])
                    : now();
            }

            $payment->save();

            return response()->json([
                'success' => true,
                'message' => 'Status synced successfully',
                'data' => [
                    'external_id' => $payment->external_id,
                    'old_status' => $oldStatus,
                    'new_status' => $payment->status,
                    'amount' => $payment->amount,
                    'paid_at' => $payment->paid_at,
                    'xendit_data' => [
                        'invoice_url' => $invoice['invoice_url'] ?? null,
                        'expiry_date' => $invoice['expiry_date'] ?? null,
                        'status' => $invoice['status'] ?? null,
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Sync Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Menampilkan halaman payment success
     */
    public function showSuccess(Request $request)
    {
        $externalId = $request->query('external_id');

        if (!$externalId) {
            // Jika tidak ada external_id, tampilkan halaman tanpa data
            return view('payment-success');
        }

        // Ambil data payment dari database
        $payment = Payment::where('external_id', $externalId)->first();

        if (!$payment) {
            // Jika payment tidak ditemukan, redirect ke homepage atau tampilkan error
            return redirect('/')->with('error', 'Data pembayaran tidak ditemukan');
        }

        // Tampilkan view dengan data payment
        return view('payment-success', compact('payment'));
    }

    /**
     * Menampilkan halaman payment failed
     */
    public function showFailed(Request $request)
    {
        $externalId = $request->query('external_id');

        if (!$externalId) {
            // Jika tidak ada external_id, tampilkan halaman tanpa data
            return view('payment-failed');
        }

        // Ambil data payment dari database
        $payment = Payment::where('external_id', $externalId)->first();

        if (!$payment) {
            // Jika payment tidak ditemukan, redirect ke homepage atau tampilkan error
            return redirect('/')->with('error', 'Data pembayaran tidak ditemukan');
        }

        // Tampilkan view dengan data payment
        return view('payment-failed', compact('payment'));
    }
}
