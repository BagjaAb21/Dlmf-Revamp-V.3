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
        'grammatik-online-a1-english' => [
            'code' => 'grammatik-online-a1-english',
            'name' => 'Private Grammatik Online A1 Dalam Bahasa Inggris',
            'price' => 1150000,
            'description' => 'Private Grammar A1 - Online Dalam Bahasa Inggris'
        ],
        'grammatik-online-a2' => [
            'code' => 'grammatik-online-a2',
            'name' => 'Private Grammatik Online A2',
            'price' => 975000,
            'description' => 'Private Grammar A2 - Online'
        ],
        'grammatik-online-a2-english' => [
            'code' => 'grammatik-online-a2-english',
            'name' => 'Private Grammatik Online A2 Dalam Bahasa Inggris',
            'price' => 1150000,
            'description' => 'Private Grammar A2 - Online Dalam Bahasa Inggris'
        ],
        'grammatik-online-b1' => [
            'code' => 'grammatik-online-b1',
            'name' => 'Private Grammatik Online B1',
            'price' => 1095000,
            'description' => 'Private Grammar B1 - Online'
        ],
        'grammatik-online-b1-english' => [
            'code' => 'grammatik-online-b1-english',
            'name' => 'Private Grammatik Online B1 Dalam Bahasa Inggris',
            'price' => 1270000,
            'description' => 'Private Grammar B1 - Online Dalam Bahasa Inggris'
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
        'goethe-online-a1-english' => [
            'code' => 'goethe-online-a1-english',
            'name' => 'Private Persiapan Ujian Goethe A1 Online Dalam Bahasa Inggris',
            'price' => 1150000,
            'description' => 'Persiapan Ujian Goethe A1 - Online Dalam Bahasa Inggris'
        ],
        'goethe-online-a2' => [
            'code' => 'goethe-online-a2',
            'name' => 'Private Persiapan Ujian Goethe A2 Online',
            'price' => 975000,
            'description' => 'Persiapan Ujian Goethe A2 - Online'
        ],
        'goethe-online-a2-english' => [
            'code' => 'goethe-online-a2-english',
            'name' => 'Private Persiapan Ujian Goethe A2 Online Dalam Bahasa Inggris',
            'price' => 1150000,
            'description' => 'Persiapan Ujian Goethe A2 - Online Dalam Bahasa Inggris'
        ],
        'goethe-online-b1' => [
            'code' => 'goethe-online-b1',
            'name' => 'Private Persiapan Ujian Goethe B1 Online',
            'price' => 1095000,
            'description' => 'Persiapan Ujian Goethe B1 - Online'
        ],
        'goethe-online-b1-english' => [
            'code' => 'goethe-online-b1-english',
            'name' => 'Private Persiapan Ujian Goethe B1 Online Dalam Bahasa Inggris',
            'price' => 1270000,
            'description' => 'Persiapan Ujian Goethe B1 - Online Dalam Bahasa Inggris'
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
            'description' => 'Persiapan Ujian Goethe A1 - Offline Dalam Bahasa Inggris'
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
            'price' => 1575000,
            'description' => 'Persiapan Ujian Goethe A2 - Offline Dalam Bahasa Inggris'
        ],
        'goethe-offline-b1' => [
            'code' => 'goethe-offline-b1',
            'name' => 'Private Persiapan Ujian Goethe B1 Offline',
            'price' => 1400000,
            'description' => 'Persiapan Ujian Goethe B1 - Offline'
        ],
        'goethe-offline-b1-english' => [
            'code' => 'goethe-offline-b1-english',
            'name' => 'Private Persiapan Ujian Goethe B1 Offline Dalam Bahasa Inggris',
            'price' => 1675000,
            'description' => 'Persiapan Ujian Goethe B1 - Offline Dalam Bahasa Inggris'
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
            'price' => 1070000,
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
            'description' => 'Paket Bundling Reguler Intensif Level A1-A2 - Online'
        ],
        'bundling-a2-b1-online' => [
            'code' => 'bundling-a2-b1-online',
            'name' => 'Bundling Reguler Intensif A2-B1 Online',
            'price' => 5999000,
            'description' => 'Paket Bundling Reguler Intensif Level A2-B1 - Online'
        ],
        'bundling-a1-b1-online' => [
            'code' => 'bundling-a1-b1-online',
            'name' => 'Bundling Reguler Intensif A1-B1 Online',
            'price' => 8399000,
            'description' => 'Paket Bundling Reguler Intensif Level A1-B1 - Online'
        ],

        // ==================== FLEXILEARN A1 ====================
        'flexilearn-a1-2m' => [
            'code' => 'flexilearn-a1-2m',
            'name' => 'FlexiLearn A1 - 2 Bulan',
            'price' => 149000,
            'description' => 'Akses FlexiLearn Level A1 - 2 Bulan'
        ],
        'flexilearn-a1-6m' => [
            'code' => 'flexilearn-a1-6m',
            'name' => 'FlexiLearn A1 - 6 Bulan',
            'price' => 169000,
            'description' => 'Akses FlexiLearn Level A1 - 6 Bulan'
        ],
        'flexilearn-a1-12m' => [
            'code' => 'flexilearn-a1-12m',
            'name' => 'FlexiLearn A1 - 12 Bulan',
            'price' => 189000,
            'description' => 'Akses FlexiLearn Level A1 - 12 Bulan'
        ],
        'flexilearn-a1-lifetime' => [
            'code' => 'flexilearn-a1-lifetime',
            'name' => 'FlexiLearn A1 - Lifetime Basic',
            'price' => 199000,
            'description' => 'Akses FlexiLearn Level A1 - Lifetime Basic'
        ],
        'flexilearn-a1-lifetime-10book' => [
            'code' => 'flexilearn-a1-lifetime-10book',
            'name' => 'FlexiLearn A1 - Lifetime Basic + 10 E-Book',
            'price' => 299000,
            'description' => 'Akses FlexiLearn Level A1 - Lifetime Basic + 10 E-Book'
        ],
        'flexilearn-a1-lifetime-20book' => [
            'code' => 'flexilearn-a1-lifetime-20book',
            'name' => 'FlexiLearn A1 - Lifetime Basic + 20 E-Book',
            'price' => 399000,
            'description' => 'Akses FlexiLearn Level A1 - Lifetime Basic + 20 E-Book'
        ],
        'flexilearn-a1-lifetime-20book-1private' => [
            'code' => 'flexilearn-a1-lifetime-20book-1private',
            'name' => 'FlexiLearn A1 - Lifetime Basic + 20 E-Book + 1x Private Session',
            'price' => 599000,
            'description' => 'Akses FlexiLearn Level A1 - Lifetime Basic + 20 E-Book + 1x Private Session'
        ],
        'flexilearn-a1-lifetime-20book-2private' => [
            'code' => 'flexilearn-a1-lifetime-20book-2private',
            'name' => 'FlexiLearn A1 - Lifetime Basic + 20 E-Book + 2x Private Session',
            'price' => 699000,
            'description' => 'Akses FlexiLearn Level A1 - Lifetime Basic + 20 E-Book + 2x Private Session'
        ],

        // ==================== FLEXILEARN A2 ====================
        'flexilearn-a2-2m' => [
            'code' => 'flexilearn-a2-2m',
            'name' => 'FlexiLearn A2 - 2 Bulan',
            'price' => 149000,
            'description' => 'Akses FlexiLearn Level A2 - 2 Bulan'
        ],
        'flexilearn-a2-6m' => [
            'code' => 'flexilearn-a2-6m',
            'name' => 'FlexiLearn A2 - 6 Bulan',
            'price' => 169000,
            'description' => 'Akses FlexiLearn Level A2 - 6 Bulan'
        ],
        'flexilearn-a2-12m' => [
            'code' => 'flexilearn-a2-12m',
            'name' => 'FlexiLearn A2 - 12 Bulan',
            'price' => 189000,
            'description' => 'Akses FlexiLearn Level A2 - 12 Bulan'
        ],
        'flexilearn-a2-lifetime' => [
            'code' => 'flexilearn-a2-lifetime',
            'name' => 'FlexiLearn A2 - Lifetime Basic',
            'price' => 199000,
            'description' => 'Akses FlexiLearn Level A2 - Lifetime Basic'
        ],
        'flexilearn-a2-lifetime-10book' => [
            'code' => 'flexilearn-a2-lifetime-10book',
            'name' => 'FlexiLearn A2 - Lifetime Basic + 10 E-Book',
            'price' => 299000,
            'description' => 'Akses FlexiLearn Level A2 - Lifetime Basic + 10 E-Book'
        ],
        'flexilearn-a2-lifetime-20book' => [
            'code' => 'flexilearn-a2-lifetime-20book',
            'name' => 'FlexiLearn A2 - Lifetime Basic + 20 E-Book',
            'price' => 399000,
            'description' => 'Akses FlexiLearn Level A2 - Lifetime Basic + 20 E-Book'
        ],
        'flexilearn-a2-lifetime-20book-1private' => [
            'code' => 'flexilearn-a2-lifetime-20book-1private',
            'name' => 'FlexiLearn A2 - Lifetime Basic + 20 E-Book + 1x Private Session',
            'price' => 599000,
            'description' => 'Akses FlexiLearn Level A2 - Lifetime Basic + 20 E-Book + 1x Private Session'
        ],
        'flexilearn-a2-lifetime-20book-2private' => [
            'code' => 'flexilearn-a2-lifetime-20book-2private',
            'name' => 'FlexiLearn A2 - Lifetime Basic + 20 E-Book + 2x Private Session',
            'price' => 699000,
            'description' => 'Akses FlexiLearn Level A2 - Lifetime Basic + 20 E-Book + 2x Private Session'
        ],

        // ==================== FLEXILEARN B1 ====================
        'flexilearn-b1-2m' => [
            'code' => 'flexilearn-b1-2m',
            'name' => 'FlexiLearn B1 - 2 Bulan',
            'price' => 159000,
            'description' => 'Akses FlexiLearn Level B1 - 2 Bulan'
        ],
        'flexilearn-b1-6m' => [
            'code' => 'flexilearn-b1-6m',
            'name' => 'FlexiLearn B1 - 6 Bulan',
            'price' => 179000,
            'description' => 'Akses FlexiLearn Level B1 - 6 Bulan'
        ],
        'flexilearn-b1-12m' => [
            'code' => 'flexilearn-b1-12m',
            'name' => 'FlexiLearn B1 - 12 Bulan',
            'price' => 199000,
            'description' => 'Akses FlexiLearn Level B1 - 12 Bulan'
        ],
        'flexilearn-b1-lifetime' => [
            'code' => 'flexilearn-b1-lifetime',
            'name' => 'FlexiLearn B1 - Lifetime Basic',
            'price' => 199000,
            'description' => 'Akses FlexiLearn Level B1 - Lifetime Basic'
        ],
        'flexilearn-b1-lifetime-10book' => [
            'code' => 'flexilearn-b1-lifetime-10book',
            'name' => 'FlexiLearn B1 - Lifetime Basic + 10 E-Book',
            'price' => 399000,
            'description' => 'Akses FlexiLearn Level B1 - Lifetime Basic + 10 E-Book'
        ],
        'flexilearn-b1-lifetime-20book' => [
            'code' => 'flexilearn-b1-lifetime-20book',
            'name' => 'FlexiLearn B1 - Lifetime Basic + 20 E-Book',
            'price' => 469000,
            'description' => 'Akses FlexiLearn Level B1 - Lifetime Basic + 20 E-Book'
        ],
        'flexilearn-b1-lifetime-20book-1private' => [
            'code' => 'flexilearn-b1-lifetime-20book-1private',
            'name' => 'FlexiLearn B1 - Lifetime Basic + 20 E-Book + 1x Private Session',
            'price' => 649000,
            'description' => 'Akses FlexiLearn Level B1 - Lifetime Basic + 20 E-Book + 1x Private Session'
        ],
        'flexilearn-b1-lifetime-20book-2private' => [
            'code' => 'flexilearn-b1-lifetime-20book-2private',
            'name' => 'FlexiLearn B1 - Lifetime Basic + 20 E-Book + 2x Private Session',
            'price' => 759000,
            'description' => 'Akses FlexiLearn Level B1 - Lifetime Basic + 20 E-Book + 2x Private Session'
        ],

        // ==================== BUNDLING FLEXILEARN A1-A2 ====================
        'flexilearn-a1-a2-2m' => [
            'code' => 'flexilearn-a1-a2-2m',
            'name' => 'FlexiLearn A1-A2 - 2 Bulan',
            'price' => 269000,
            'description' => 'Akses FlexiLearn Level A1-A2 - 2 Bulan'
        ],
        'flexilearn-a1-a2-6m' => [
            'code' => 'flexilearn-a1-a2-6m',
            'name' => 'FlexiLearn A1-A2 - 6 Bulan',
            'price' => 309000,
            'description' => 'Akses FlexiLearn Level A1-A2 - 6 Bulan'
        ],
        'flexilearn-a1-a2-12m' => [
            'code' => 'flexilearn-a1-a2-12m',
            'name' => 'FlexiLearn A1-A2 - 12 Bulan',
            'price' => 339000,
            'description' => 'Akses FlexiLearn Level A1-A2 - 12 Bulan'
        ],
        'flexilearn-a1-a2-lifetime' => [
            'code' => 'flexilearn-a1-a2-lifetime',
            'name' => 'FlexiLearn A1-A2 - Lifetime Basic',
            'price' => 339000,
            'description' => 'Akses FlexiLearn Level A1-A2 - Lifetime Basic'
        ],
        'flexilearn-a1-a2-lifetime-10book' => [
            'code' => 'flexilearn-a1-a2-lifetime-10book',
            'name' => 'FlexiLearn A1-A2 - Lifetime Basic + 10 E-Book',
            'price' => 569000,
            'description' => 'Akses FlexiLearn Level A1-A2 - Lifetime Basic + 10 E-Book'
        ],
        'flexilearn-a1-a2-lifetime-20book' => [
            'code' => 'flexilearn-a1-a2-lifetime-20book',
            'name' => 'FlexiLearn A1-A2 - Lifetime Basic + 20 E-Book',
            'price' => 779000,
            'description' => 'Akses FlexiLearn Level A1-A2 - Lifetime Basic + 20 E-Book'
        ],
        'flexilearn-a1-a2-lifetime-20book-1private' => [
            'code' => 'flexilearn-a1-a2-lifetime-20book-1private',
            'name' => 'FlexiLearn A1-A2 - Lifetime Basic + 20 E-Book + 1x Private Session',
            'price' => 1169000,
            'description' => 'Akses FlexiLearn Level A1-A2 - Lifetime Basic + 20 E-Book + 1x Private Session'
        ],
        'flexilearn-a1-a2-lifetime-20book-2private' => [
            'code' => 'flexilearn-a1-a2-lifetime-20book-2private',
            'name' => 'FlexiLearn A1-A2 - Lifetime Basic + 20 E-Book + 2x Private Session',
            'price' => 1349000,
            'description' => 'Akses FlexiLearn Level A1-A2 - Lifetime Basic + 20 E-Book + 2x Private Session'
        ],

        // ==================== BUNDLING FLEXILEARN A2-B1 ====================
        'flexilearn-a2-b1-2m' => [
            'code' => 'flexilearn-a2-b1-2m',
            'name' => 'FlexiLearn A2-B1 - 2 Bulan',
            'price' => 289000,
            'description' => 'Akses FlexiLearn Level A2-B1 - 2 Bulan'
        ],
        'flexilearn-a2-b1-6m' => [
            'code' => 'flexilearn-a2-b1-6m',
            'name' => 'FlexiLearn A2-B1 - 6 Bulan',
            'price' => 319000,
            'description' => 'Akses FlexiLearn Level A2-B1 - 6 Bulan'
        ],
        'flexilearn-a2-b1-12m' => [
            'code' => 'flexilearn-a2-b1-12m',
            'name' => 'FlexiLearn A2-B1 - 12 Bulan',
            'price' => 359000,
            'description' => 'Akses FlexiLearn Level A2-B1 - 12 Bulan'
        ],
        'flexilearn-a2-b1-lifetime' => [
            'code' => 'flexilearn-a2-b1-lifetime',
            'name' => 'FlexiLearn A2-B1 - Lifetime Basic',
            'price' => 379000,
            'description' => 'Akses FlexiLearn Level A2-B1 - Lifetime Basic'
        ],
        'flexilearn-a2-b1-lifetime-10book' => [
            'code' => 'flexilearn-a2-b1-lifetime-10book',
            'name' => 'FlexiLearn A2-B1 - Lifetime Basic + 10 E-Book',
            'price' => 609000,
            'description' => 'Akses FlexiLearn Level A2-B1 - Lifetime Basic + 10 E-Book'
        ],
        'flexilearn-a2-b1-lifetime-20book' => [
            'code' => 'flexilearn-a2-b1-lifetime-20book',
            'name' => 'FlexiLearn A2-B1 - Lifetime Basic + 20 E-Book',
            'price' => 839000,
            'description' => 'Akses FlexiLearn Level A2-B1 - Lifetime Basic + 20 E-Book'
        ],
        'flexilearn-a2-b1-lifetime-20book-1private' => [
            'code' => 'flexilearn-a2-b1-lifetime-20book-1private',
            'name' => 'FlexiLearn A2-B1 - Lifetime Basic + 20 E-Book + 1x Private Session',
            'price' => 1209000,
            'description' => 'Akses FlexiLearn Level A2-B1 - Lifetime Basic + 20 E-Book + 1x Private Session'
        ],
        'flexilearn-a2-b1-lifetime-20book-2private' => [
            'code' => 'flexilearn-a2-b1-lifetime-20book-2private',
            'name' => 'FlexiLearn A2-B1 - Lifetime Basic + 20 E-Book + 2x Private Session',
            'price' => 1409000,
            'description' => 'Akses FlexiLearn Level A2-B1 - Lifetime Basic + 20 E-Book + 2x Private Session'
        ],

        // ==================== BUNDLING FLEXILEARN A1-B1 ====================
        'flexilearn-a1-b1-2m' => [
            'code' => 'flexilearn-a1-b1-2m',
            'name' => 'FlexiLearn A1-B1 - 2 Bulan',
            'price' => 429000,
            'description' => 'Akses FlexiLearn Level A1-B1 - 2 Bulan'
        ],
        'flexilearn-a1-b1-6m' => [
            'code' => 'flexilearn-a1-b1-6m',
            'name' => 'FlexiLearn A1-B1 - 6 Bulan',
            'price' => 479000,
            'description' => 'Akses FlexiLearn Level A1-B1 - 6 Bulan'
        ],
        'flexilearn-a1-b1-12m' => [
            'code' => 'flexilearn-a1-b1-12m',
            'name' => 'FlexiLearn A1-B1 - 12 Bulan',
            'price' => 529000,
            'description' => 'Akses FlexiLearn Level A1-B1 - 12 Bulan'
        ],
        'flexilearn-a1-b1-lifetime' => [
            'code' => 'flexilearn-a1-b1-lifetime',
            'name' => 'FlexiLearn A1-B1 - Lifetime Basic',
            'price' => 569000,
            'description' => 'Akses FlexiLearn Level A1-B1 - Lifetime Basic'
        ],
        'flexilearn-a1-b1-lifetime-10book' => [
            'code' => 'flexilearn-a1-b1-lifetime-10book',
            'name' => 'FlexiLearn A1-B1 - Lifetime Basic + 10 E-Book',
            'price' => 889000,
            'description' => 'Akses FlexiLearn Level A1-B1 - Lifetime Basic + 10 E-Book'
        ],
        'flexilearn-a1-b1-lifetime-20book' => [
            'code' => 'flexilearn-a1-b1-lifetime-20book',
            'name' => 'FlexiLearn A1-B1 - Lifetime Basic + 20 E-Book',
            'price' => 1229000,
            'description' => 'Akses FlexiLearn Level A1-B1 - Lifetime Basic + 20 E-Book'
        ],
        'flexilearn-a1-b1-lifetime-20book-1private' => [
            'code' => 'flexilearn-a1-b1-lifetime-20book-1private',
            'name' => 'FlexiLearn A1-B1 - Lifetime Basic + 20 E-Book + 1x Private Session',
            'price' => 1779000,
            'description' => 'Akses FlexiLearn Level A1-B1 - Lifetime Basic + 20 E-Book + 1x Private Session'
        ],
        'flexilearn-a1-b1-lifetime-20book-2private' => [
            'code' => 'flexilearn-a1-b1-lifetime-20book-2private',
            'name' => 'FlexiLearn A1-B1 - Lifetime Basic + 20 E-Book + 2x Private Session',
            'price' => 2009000,
            'description' => 'Akses FlexiLearn Level A1-B1 - Lifetime Basic + 20 E-Book + 2x Private Session'
        ],
    ];

    public function __construct()
    {
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
        $this->invoiceApi = new InvoiceApi();
    }

    /**
     * Menampilkan halaman checkout dengan product yang dipilih
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
     * Proses pembayaran dan create invoice di Xendit
     */
    public function processPayment(Request $request)
    {
        // Validasi input sesuai dengan field yang dibutuhkan Xendit
        $validated = $request->validate([
            'product_code' => 'required|string',
            'given_names' => 'required|string|max:255', // Sesuai Xendit: given_names
            'surname' => 'nullable|string|max:255', // Sesuai Xendit: surname
            'email' => 'required|email|max:255', // Sesuai Xendit: email
            'mobile_number' => 'nullable|string|max:20', // Sesuai Xendit: mobile_number (E164 format)
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required|string|in:VA,QRIS', // Metode pembayaran dipilih user
            // --- FIELD BARU DARI CHECKOUT.BLADE.PHP ---
            'grand_total_amount' => 'required|integer|min:1', // Total akhir termasuk fee
            'convenience_fee_amount' => 'required|integer|min:0', // Biaya tambahan
            // --- END FIELD BARU ---
        ]);

        // Cek apakah produk ada
        if (!isset($this->products[$validated['product_code']])) {
            return back()->with('error', 'Produk tidak valid');
        }

        $product = $this->products[$validated['product_code']];

        // Ambil jumlah dari request
        $subTotal = $product['price'] * $validated['quantity'];
        $convenienceFee = $validated['convenience_fee_amount'];
        $totalAmount = $validated['grand_total_amount']; // GRAND TOTAL: Subtotal + Fee (sudah benar dari frontend)

        // Generate external_id yang unik
        $externalId = 'DLMF-' . strtoupper(Str::random(8)) . '-' . time();

        try {
            // Format nomor telepon ke E164 jika ada
            $mobileNumber = null;
            if (!empty($validated['mobile_number'])) {
                $phone = preg_replace('/[^0-9]/', '', $validated['mobile_number']);
                // Jika dimulai dengan 0, ganti dengan +62
                if (substr($phone, 0, 1) === '0') {
                    $mobileNumber = '+62' . substr($phone, 1);
                }
                // Jika dimulai dengan 62, tambahkan +
                elseif (substr($phone, 0, 2) === '62') {
                    $mobileNumber = '+' . $phone;
                }
                // Jika tidak ada prefix, anggap 08xx -> +628xx
                else {
                    $mobileNumber = '+62' . $phone;
                }
            }

            // Buat data invoice sesuai dengan dokumentasi Xendit
            $invoiceData = [
                'external_id' => $externalId,
                'amount' => $totalAmount,
                'description' => $product['description'] ?? $product['name'],
                'invoice_duration' => 3600, // 1 jam dalam detik
                'currency' => 'IDR',

                // Customer object sesuai dokumentasi Xendit
                'customer' => [
                    'given_names' => $validated['given_names'],
                    'email' => $validated['email'],
                ],

                // Customer notification preference (PENTING: untuk mengirim email & WhatsApp)
                // Notifikasi akan terkirim ke email dan WhatsApp (jika mobile_number diisi)
                'customer_notification_preference' => [
                    'invoice_created' => ['whatsapp', 'email'], // Notifikasi saat invoice dibuat
                    'invoice_reminder' => ['whatsapp', 'email'], // Notifikasi reminder
                    'invoice_paid' => ['whatsapp', 'email'], // Notifikasi saat invoice dibayar
                ],

                // Redirect URLs
                'success_redirect_url' => route('payment.success') . '?external_id=' . $externalId,
                'failure_redirect_url' => route('payment.failed') . '?external_id=' . $externalId,

                // Payment methods - HANYA QRIS dan Virtual Account
                'payment_methods' => ['QRIS', 'BCA', 'BNI', 'BRI', 'MANDIRI', 'PERMATA', 'BSI'],

                // Items array (untuk detail produk)
                'items' => [
                    [
                        'name' => $product['name'],
                        'quantity' => $validated['quantity'],
                        'price' => $product['price'],
                        'category' => 'Education',
                    ]
                ],
            ];

            // --- TAMBAHKAN ITEM CONVENIENCE FEE JIKA ADA ---
            if ($convenienceFee > 0) {
                $paymentMethodLabel = $validated['payment_method'] === 'QRIS' ? 'QRIS' : 'Virtual Account';
                $invoiceData['items'][] = [
                    'name' => "Convenience Fee ({$paymentMethodLabel})",
                    'quantity' => 1,
                    'price' => $convenienceFee, // Nilai convenience fee sudah termasuk PPN 11%
                    'category' => 'Fee',
                ];
            }

            // Tambahkan surname jika ada
            if (!empty($validated['surname'])) {
                $invoiceData['customer']['surname'] = $validated['surname'];
            }

            // Tambahkan mobile_number jika ada
            if ($mobileNumber) {
                $invoiceData['customer']['mobile_number'] = $mobileNumber;
            }

            Log::info('Creating Xendit Invoice:', $invoiceData);

            // Create invoice di Xendit
            $invoice = $this->invoiceApi->createInvoice($invoiceData);

            Log::info('Xendit Invoice Created:', (array) $invoice);

            // Simpan data payment ke database dengan field yang sesuai
            $payment = Payment::create([
                'external_id' => $externalId,
                'xendit_invoice_id' => $invoice['id'], // ID dari Xendit

                // Customer information (sesuai struktur baru)
                'given_names' => $validated['given_names'],
                'surname' => $validated['surname'] ?? null,
                'email' => $validated['email'],
                'mobile_number' => $mobileNumber,

                // Product information
                'product_name' => $product['name'],
                'quantity' => $validated['quantity'],

                // Amount information
                'amount' => $totalAmount,
                'currency' => 'IDR',

                // Invoice information
                'description' => $product['description'] ?? $product['name'],
                'invoice_url' => $invoice['invoice_url'],

                // Status
                'status' => strtolower($invoice['status']), // PENDING, PAID, EXPIRED

                // Expiry
                'expired_at' => $invoice['expiry_date'] ? \Carbon\Carbon::parse($invoice['expiry_date'])->timezone('Asia/Jakarta') : null,
            ]);

            Log::info('Payment record created:', $payment->toArray());

            // Redirect ke Xendit checkout page
            return redirect($invoice['invoice_url']);

        } catch (\Exception $e) {
            Log::error('Payment Error: ' . $e->getMessage());
            Log::error('Stack Trace: ' . $e->getTraceAsString());

            return back()->with('error', 'Terjadi kesalahan saat memproses pembayaran: ' . $e->getMessage());
        }
    }

    /**
     * Callback dari Xendit setelah pembayaran
     * Endpoint ini akan dipanggil oleh Xendit saat status invoice berubah
     */
    public function callback(Request $request)
    {
        // Verifikasi callback token dari Xendit
        $callbackToken = $request->header('x-callback-token');
        $xenditCallbackToken = env('XENDIT_CALLBACK_TOKEN');

        if ($callbackToken !== $xenditCallbackToken) {
            Log::warning('Invalid callback token', [
                'received' => $callbackToken,
                'expected' => $xenditCallbackToken
            ]);
            return response()->json(['message' => 'Invalid token'], 401);
        }

        try {
            $data = $request->all();
            Log::info('Xendit Callback Received:', $data);

            // Cari payment berdasarkan external_id
            $payment = Payment::where('external_id', $data['external_id'])->first();

            if (!$payment) {
                Log::error('Payment not found for external_id: ' . $data['external_id']);
                return response()->json(['message' => 'Payment not found'], 404);
            }

            // Update status payment sesuai callback dari Xendit
            $payment->status = strtolower($data['status']); // PAID, EXPIRED, etc

            // Jika status PAID, simpan informasi pembayaran
            if (strtoupper($data['status']) === 'PAID') {
                $payment->paid_at = isset($data['paid_at'])
                    ? \Carbon\Carbon::parse($data['paid_at'])->timezone('Asia/Jakarta')
                    : now()->timezone('Asia/Jakarta');

                // Simpan payment method dan channel jika ada
                if (isset($data['payment_method'])) {
                    $payment->payment_method = $data['payment_method'];
                }
                if (isset($data['payment_channel'])) {
                    $payment->payment_channel = $data['payment_channel'];
                }
                if (isset($data['payment_destination'])) {
                    $payment->payment_destination = $data['payment_destination'];
                }
            }

            $payment->save();

            Log::info('Payment updated successfully:', $payment->toArray());

            return response()->json(['message' => 'Callback processed successfully'], 200);

        } catch (\Exception $e) {
            Log::error('Callback Error: ' . $e->getMessage());
            return response()->json(['message' => 'Error processing callback'], 500);
        }
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
                'given_names' => $payment->given_names,
                'surname' => $payment->surname,
                'email' => $payment->email,
                'mobile_number' => $payment->mobile_number,
                'product_name' => $payment->product_name,
                'quantity' => $payment->quantity,
                'amount' => $payment->amount,
                'currency' => $payment->currency,
                'status' => $payment->status,
                'invoice_url' => $payment->invoice_url,
                'payment_method' => $payment->payment_method,
                'payment_channel' => $payment->payment_channel,
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
            // Gunakan HTTP Client Laravel untuk hit Xendit API
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

            // Update payment details jika status PAID
            if (strtoupper($invoice['status']) === 'PAID' && !$payment->paid_at) {
                $payment->paid_at = isset($invoice['paid_at'])
                    ? \Carbon\Carbon::parse($invoice['paid_at'])
                    : now();

                if (isset($invoice['payment_method'])) {
                    $payment->payment_method = $invoice['payment_method'];
                }
                if (isset($invoice['payment_channel'])) {
                    $payment->payment_channel = $invoice['payment_channel'];
                }
                if (isset($invoice['payment_destination'])) {
                    $payment->payment_destination = $invoice['payment_destination'];
                }
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
                    'payment_method' => $payment->payment_method,
                    'payment_channel' => $payment->payment_channel,
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
            return view('payment-success');
        }

        $payment = Payment::where('external_id', $externalId)->first();

        if (!$payment) {
            return redirect('/')->with('error', 'Data pembayaran tidak ditemukan');
        }

        // Generate WhatsApp URL untuk konfirmasi
        $whatsappNumber = '62859106869302';

        // Gabungkan given_names dan surname untuk nama lengkap
        $fullName = trim($payment->given_names . ' ' . ($payment->surname ?? ''));

        $message = "*KONFIRMASI PEMBAYARAN BERHASIL*%0A%0A";
        $message .= "Halo MinFara, saya telah menyelesaikan pembayaran dengan detail sebagai berikut:%0A%0A";
        $message .= "📋 *Detail Pembayaran:*%0A";
        $message .= "━━━━━━━━━━━━━━━━━━━━%0A";
        $message .= "🔖 *No. Invoice:* " . $payment->external_id . "%0A";

        if ($payment->product_name) {
            $message .= "📦 *Produk:* " . urlencode($payment->product_name) . "%0A";
        }

        if ($payment->quantity && $payment->quantity > 1) {
            $message .= "🔢 *Jumlah:* " . $payment->quantity . " item%0A";
        }

        $message .= "👤 *Nama:* " . urlencode($fullName) . "%0A";
        $message .= "📧 *Email:* " . urlencode($payment->email) . "%0A";

        if ($payment->mobile_number) {
            $message .= "📱 *No. Telepon:* " . $payment->mobile_number . "%0A";
        }

        $message .= "💰 *Jumlah Bayar:* Rp " . number_format((float) $payment->amount, 0, ',', '.') . "%0A";
        $message .= "✅ *Status:* Lunas%0A";

        if ($payment->paid_at) {
            $message .= "🗓️ *Tanggal Bayar:* " . $payment->paid_at->format('d/m/Y H:i') . " WIB%0A";
        }

        $message .= "━━━━━━━━━━━━━━━━━━━━%0A%0A";
        $message .= "Mohon informasi lebih lanjut mengenai akses kursus.%0A%0A";
        $message .= "Terima kasih! 🙏";

        $whatsappUrl = "https://api.whatsapp.com/send?phone={$whatsappNumber}&text={$message}";

        return view('payment-success', compact('payment', 'whatsappUrl'));
    }

    /**
     * Menampilkan halaman payment failed
     */
    public function showFailed(Request $request)
    {
        $externalId = $request->query('external_id');

        if (!$externalId) {
            return view('payment-failed');
        }

        $payment = Payment::where('external_id', $externalId)->first();

        if (!$payment) {
            return redirect('/')->with('error', 'Data pembayaran tidak ditemukan');
        }

        return view('payment-failed', compact('payment'));
    }
}
