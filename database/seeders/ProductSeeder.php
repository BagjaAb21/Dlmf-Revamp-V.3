<?php

namespace Database\Seeders;

use App\Models\BenefitMaster;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // ── 0. Pembersihan Data Lama (DI LUAR TRANSAKSI) ────────────────
        // Truncate adalah DDL dan akan menyebabkan implicit commit di MySQL.
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('product_benefits')->truncate();
        DB::table('product_discounts')->truncate();
        DB::table('product_meta_ads')->truncate();
        DB::table('products')->truncate();
        DB::table('product_categories')->truncate();
        DB::table('benefit_masters')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::transaction(function () {

            // ══════════════════════════════════════════════════════════════
            // 1. BENEFIT MASTERS
            // ══════════════════════════════════════════════════════════════
            $benefitLabels = [
                // ── Reguler Online ─────────────────────────────────────
                '20x Pertemuan',
                '120 Menit/Sesi',
                'Free record akses kelas 24/7',
                'Free Modul',
                'Free Konsultasi',
                'Free 20 e-book Bahasa Jerman',
                'Free 1x Sesi kelas dengan native',
                'Include Simulasi Ujian Goethe 8x',
                'Sertifikat',

                // ── Private ────────────────────────────────────────────
                '5x Pertemuan',
                'Materi sama dengan kelas reguler',
                '1 on 1 dengan tutor',
                'Durasi 90 menit/pertemuan',
                'Durasi 60 menit/pertemuan',
                'Bisa request jadwal',
                'Bisa request materi',

                // ── Native Speaker ─────────────────────────────────────
                '4x Pertemuan',

                // ── Bundling Reguler ───────────────────────────────────
                '80x Pertemuan',
                '120x Pertemuan',
                '120 Menit/Pertemuan',
                'Free Modul Setiap Level (A-1 - A-2)',
                'Free Modul Setiap Level (A-2 - B-1)',
                'Free Modul Setiap Level (A-1 - B-1)',
                'Free 4x sesi kelas dengan Native',
                'Free 6x sesi kelas dengan Native',
                'Include simulasi Ujian Goethe',

                // ── FlexiLearn ─────────────────────────────────────────
                'Premium Access ke semua materi',
                'Waktu yang flexible',
                'Belajar sesuai ritme masing-masing',
                'Certificate of completion',
                'Dashboard Personal',
                'Akses video pembelajaran 24/7',
                'Evaluasi & Quiz otomatis',
                'Tersedia Forum diskusi dan & Chat',
                'Multi Device Access',
                '1.000+ latihan soal',

                // ── DeutschKit — Netzwerk Neu ──────────────────────────
                'Kursbuch: materi utama, dialog, kosakata, tata bahasa & latihan komunikasi',
                'Übungsbuch: latihan listening, reading, writing & speaking tambahan',
                'Sesuai standar Goethe-Institut & CEFR',
                'Disertai audio & video autentik yang bisa diakses online',
                'Pendekatan interaktif & komunikatif',
                'Materi relevan dengan kehidupan sehari-hari & budaya Jerman',

                // ── DeutschKit — E-Book ────────────────────────────────
                'E-Book tematik untuk memperkaya kosakata dan idiom bahasa Jerman',
                'Materi disusun berdasarkan tema sehari-hari & mudah dipahami',
                'Bisa langsung dipraktikkan oleh pelajar level A1–B1',
                'Tersedia dalam format PDF digital',
                'Bisa diakses dimana saja dan kapan saja',
            ];

            $bm = [];
            foreach ($benefitLabels as $i => $label) {
                // Mapping icon berdasarkan kata kunci di label
                $icon = '✨'; // default
                $lowerLabel = strtolower($label);
                
                if (str_contains($lowerLabel, 'pertemuan')) $icon = '📅';
                elseif (str_contains($lowerLabel, 'menit')) $icon = '⏱️';
                elseif (str_contains($lowerLabel, 'record') || str_contains($lowerLabel, 'video')) $icon = '🎥';
                elseif (str_contains($lowerLabel, 'modul') || str_contains($lowerLabel, 'buku')) $icon = '📚';
                elseif (str_contains($lowerLabel, 'konsultasi')) $icon = '💬';
                elseif (str_contains($lowerLabel, 'e-book')) $icon = '📖';
                elseif (str_contains($lowerLabel, 'native')) $icon = '🇩🇪';
                elseif (str_contains($lowerLabel, 'goethe') || str_contains($lowerLabel, 'ujian') || str_contains($lowerLabel, 'soal')) $icon = '📝';
                elseif (str_contains($lowerLabel, 'sertifikat') || str_contains($lowerLabel, 'certificate')) $icon = '🏆';
                elseif (str_contains($lowerLabel, 'private') || str_contains($lowerLabel, '1 on 1')) $icon = '👤';
                elseif (str_contains($lowerLabel, 'jadwal') || str_contains($lowerLabel, 'waktu')) $icon = '⏰';
                elseif (str_contains($lowerLabel, 'materi')) $icon = '📄';
                elseif (str_contains($lowerLabel, 'flexi') || str_contains($lowerLabel, 'access')) $icon = '🌐';
                elseif (str_contains($lowerLabel, 'dashboard')) $icon = '📊';
                elseif (str_contains($lowerLabel, 'quiz') || str_contains($lowerLabel, 'evaluasi')) $icon = '✅';
                elseif (str_contains($lowerLabel, 'forum') || str_contains($lowerLabel, 'chat')) $icon = '👥';
                elseif (str_contains($lowerLabel, 'device')) $icon = '📱';
                elseif (str_contains($lowerLabel, 'kursbuch')) $icon = '📕';
                elseif (str_contains($lowerLabel, 'übungsbuch')) $icon = '📘';
                elseif (str_contains($lowerLabel, 'ritme') || str_contains($lowerLabel, 'flexible')) $icon = '🔄';

                $bm[$label] = BenefitMaster::create([
                    'label'      => $label,
                    'icon'       => $icon,
                    'sort_order' => $i + 1,
                    'is_active'  => true,
                ]);
            }

            // ══════════════════════════════════════════════════════════════
            // 2. KATEGORI PRODUK
            // ══════════════════════════════════════════════════════════════
            $categoryData = [
                ['slug' => 'online',               'name' => 'Online',                    'sort_order' => 1,  'icon' => 'bi-laptop'],
                ['slug' => 'offline',              'name' => 'Offline',                   'sort_order' => 2,  'icon' => 'bi-people'],
                ['slug' => 'bundling_reguler',     'name' => 'Bundling Reguler',          'sort_order' => 3,  'icon' => 'bi-gift'],
                ['slug' => 'flexilearn1',          'name' => 'FlexiLearn A1',             'sort_order' => 4,  'icon' => 'bi-globe'],
                ['slug' => 'flexilearn2',          'name' => 'FlexiLearn A2',             'sort_order' => 5,  'icon' => 'bi-globe'],
                ['slug' => 'flexilearnb1',         'name' => 'FlexiLearn B1',             'sort_order' => 6,  'icon' => 'bi-globe'],
                ['slug' => 'bundling_flex_a1-a2',  'name' => 'Bundling FlexiLearn A1-A2', 'sort_order' => 7,  'icon' => 'bi-gift'],
                ['slug' => 'bundling_flex_a2-b1',  'name' => 'Bundling FlexiLearn A2-B1', 'sort_order' => 8,  'icon' => 'bi-gift'],
                ['slug' => 'bundling_flex_a1-b1',  'name' => 'Bundling FlexiLearn A1-B1', 'sort_order' => 9,  'icon' => 'bi-gift'],
                ['slug' => 'deutschkit',           'name' => 'DeutschKit',                'sort_order' => 10, 'icon' => 'bi-book'],
            ];

            $cats = [];
            foreach ($categoryData as $c) {
                $cats[$c['slug']] = ProductCategory::create([
                    'slug'       => $c['slug'],
                    'name'       => $c['name'],
                    'sort_order' => $c['sort_order'],
                    'is_active'  => true,
                    'icon'       => $c['icon'],
                ]);
            }

            // ── Helper: buat produk + sync benefits ─────────────────────
            $make = function (array $data, array $benefits) use ($bm, $cats) {
                $catSlug = '';
                foreach ($cats as $slug => $cat) {
                    if ($cat->id === $data['product_category_id']) {
                        $catSlug = $slug;
                        break;
                    }
                }

                $product = Product::create(array_merge($data, [
                    'product_code' => $data['product_code']
                        ?? Product::generateProductCode($catSlug, $data['name']),
                    'is_active'    => $data['is_active'] ?? true,
                ]));

                $pivot = [];
                foreach ($benefits as $i => $label) {
                    if (isset($bm[$label])) {
                        $pivot[$bm[$label]->id] = ['sort_order' => $i + 1];
                    }
                }
                $product->benefits()->sync($pivot);
                return $product;
            };

            // ══════════════════════════════════════════════════════════════
            // BENEFIT GROUP SHORTCUTS
            // ══════════════════════════════════════════════════════════════

            // Reguler Online (9 benefit)
            $stdOnline = [
                '20x Pertemuan', '120 Menit/Sesi', 'Free record akses kelas 24/7',
                'Free Modul', 'Free Konsultasi', 'Free 20 e-book Bahasa Jerman',
                'Free 1x Sesi kelas dengan native', 'Include Simulasi Ujian Goethe 8x', 'Sertifikat',
            ];

            // Reguler Offline (tanpa Free record) - B1 Offline ditambah sendiri
            $stdOffline = [
                '20x Pertemuan', '120 Menit/Sesi', 'Free Modul', 'Free Konsultasi',
                'Free 20 e-book Bahasa Jerman', 'Free 1x Sesi kelas dengan native',
                'Include Simulasi Ujian Goethe 8x', 'Sertifikat',
            ];

            // Private Grammatik Online
            $stdGrammatik = [
                '5x Pertemuan', 'Materi sama dengan kelas reguler', '1 on 1 dengan tutor',
                'Durasi 90 menit/pertemuan', 'Free record akses kelas 24/7', 'Free Konsultasi',
                'Bisa request jadwal',
            ];

            // Private Grammatik Offline (tanpa Free record)
            $stdGrammatikOffline = [
                '5x Pertemuan', 'Materi sama dengan kelas reguler', '1 on 1 dengan tutor',
                'Durasi 90 menit/pertemuan', 'Free Konsultasi', 'Bisa request jadwal',
            ];

            // Private Goethe Online
            $stdGoethe = [
                '5x Pertemuan', 'Durasi 90 menit/pertemuan', 'Free record akses kelas 24/7',
                'Free Konsultasi', 'Bisa request jadwal', 'Bisa request materi',
            ];

            // Private Goethe Offline (tanpa Free record)
            $stdGoetheOffline = [
                '5x Pertemuan', '1 on 1 dengan tutor', 'Durasi 90 menit/pertemuan',
                'Free Konsultasi', 'Bisa request jadwal', 'Bisa request materi',
            ];

            // Kinder
            $stdKinder = [
                '5x Pertemuan', '1 on 1 dengan tutor', 'Durasi 60 menit/pertemuan',
                'Free record akses kelas 24/7', 'Free Konsultasi', 'Bisa request jadwal',
            ];

            // Native Speaker
            $stdNative = [
                '4x Pertemuan', '1 on 1 dengan tutor', 'Durasi 60 menit/pertemuan',
                'Free record akses kelas 24/7', 'Free Konsultasi', 'Bisa request jadwal',
                'Bisa request materi',
            ];

            // FlexiLearn
            $stdFlexi = [
                'Premium Access ke semua materi', 'Waktu yang flexible',
                'Belajar sesuai ritme masing-masing', 'Certificate of completion',
                'Dashboard Personal', 'Akses video pembelajaran 24/7',
                'Evaluasi & Quiz otomatis', 'Tersedia Forum diskusi dan & Chat',
                'Multi Device Access', '1.000+ latihan soal',
            ];

            // Netzwerk Neu
            $stdNetzwerk = [
                'Kursbuch: materi utama, dialog, kosakata, tata bahasa & latihan komunikasi',
                'Übungsbuch: latihan listening, reading, writing & speaking tambahan',
                'Sesuai standar Goethe-Institut & CEFR',
                'Disertai audio & video autentik yang bisa diakses online',
                'Pendekatan interaktif & komunikatif',
                'Materi relevan dengan kehidupan sehari-hari & budaya Jerman',
            ];

            // DeutschKit E-Book
            $stdDeutschkit = [
                'E-Book tematik untuk memperkaya kosakata dan idiom bahasa Jerman',
                'Materi disusun berdasarkan tema sehari-hari & mudah dipahami',
                'Bisa langsung dipraktikkan oleh pelajar level A1–B1',
                'Tersedia dalam format PDF digital',
                'Bisa diakses dimana saja dan kapan saja',
            ];

            // ══════════════════════════════════════════════════════════════
            // 3. ONLINE  (18 produk)
            // ══════════════════════════════════════════════════════════════
            $catId = $cats['online']->id;
            $sort  = 1;

            // -- Intensif Reguler
            $descIntensifOnline = 'Belajar dari mana saja dengan metode intensif dan terarah. Dirancang untuk kamu yang ingin fasih berbahasa Jerman secara efektif melalui sesi live online interaktif.';
            $make(['product_category_id' => $catId, 'name' => 'Intensif Reguler A-1', 'slug' => 'intensif-online-a1', 'base_price' => 1499000, 'duration_type' => '3', 'short_description' => $descIntensifOnline, 'sort_order' => $sort++], $stdOnline);
            $make(['product_category_id' => $catId, 'name' => 'Intensif Reguler A-2', 'slug' => 'intensif-online-a2', 'base_price' => 1499000, 'duration_type' => '3', 'short_description' => $descIntensifOnline, 'sort_order' => $sort++], $stdOnline);
            $make(['product_category_id' => $catId, 'name' => 'Intensif Reguler B-1', 'slug' => 'intensif-online-b1', 'base_price' => 1699000, 'duration_type' => '3', 'short_description' => $descIntensifOnline, 'sort_order' => $sort++], $stdOnline);

            // -- Private Grammatik Online
            $descGrammatik = 'Belajar secara personal bersama pengajar berpengalaman yang akan membantu kamu memahami struktur kalimat, pola kata kerja, hingga penggunaan kasus dengan cara yang mudah dan praktis.';
            $make(['product_category_id' => $catId, 'name' => 'Private Grammatik A-1',              'slug' => 'grammatik-online-a1',         'base_price' => 975000,  'duration_type' => '1', 'short_description' => $descGrammatik, 'sort_order' => $sort++], $stdGrammatik);
            $make(['product_category_id' => $catId, 'name' => 'Private Grammatik A-1 English',      'slug' => 'grammatik-online-a1-english', 'base_price' => 1150000, 'duration_type' => '1', 'short_description' => $descGrammatik, 'sort_order' => $sort++], $stdGrammatik);
            $make(['product_category_id' => $catId, 'name' => 'Private Grammatik A-2',              'slug' => 'grammatik-online-a2',         'base_price' => 975000,  'duration_type' => '1', 'short_description' => $descGrammatik, 'sort_order' => $sort++], $stdGrammatik);
            $make(['product_category_id' => $catId, 'name' => 'Private Grammatik A-2 English',      'slug' => 'grammatik-online-a2-english', 'base_price' => 1150000, 'duration_type' => '1', 'short_description' => $descGrammatik, 'sort_order' => $sort++], $stdGrammatik);
            $make(['product_category_id' => $catId, 'name' => 'Private Grammatik B-1',              'slug' => 'grammatik-online-b1',         'base_price' => 1095000, 'duration_type' => '1', 'short_description' => $descGrammatik, 'sort_order' => $sort++], $stdGrammatik);
            $make(['product_category_id' => $catId, 'name' => 'Private Grammatik B-1 English',      'slug' => 'grammatik-online-b1-english', 'base_price' => 1270000, 'duration_type' => '1', 'short_description' => $descGrammatik, 'sort_order' => $sort++], $stdGrammatik);

            // -- Private Persiapan Ujian Goethe Online
            $descGoethe = 'Dirancang untuk membantu kamu mempersiapkan diri menghadapi ujian sertifikasi Goethe-Institut dengan optimal. Peserta dapat memilih modul tertentu (Hören, Lesen, Schreiben, Sprechen) untuk difokuskan.';
            $make(['product_category_id' => $catId, 'name' => 'Private Persiapan Ujian Goethe A-1',         'slug' => 'goethe-online-a1',         'base_price' => 975000,  'duration_type' => '1', 'short_description' => $descGoethe, 'sort_order' => $sort++], $stdGoethe);
            $make(['product_category_id' => $catId, 'name' => 'Private Persiapan Ujian Goethe A-1 English', 'slug' => 'goethe-online-a1-english', 'base_price' => 1150000, 'duration_type' => '1', 'short_description' => $descGoethe, 'sort_order' => $sort++], $stdGoethe);
            $make(['product_category_id' => $catId, 'name' => 'Private Persiapan Ujian Goethe A-2',         'slug' => 'goethe-online-a2',         'base_price' => 975000,  'duration_type' => '1', 'short_description' => $descGoethe, 'sort_order' => $sort++], $stdGoethe);
            $make(['product_category_id' => $catId, 'name' => 'Private Persiapan Ujian Goethe A-2 English', 'slug' => 'goethe-online-a2-english', 'base_price' => 1150000, 'duration_type' => '1', 'short_description' => $descGoethe, 'sort_order' => $sort++], $stdGoethe);
            $make(['product_category_id' => $catId, 'name' => 'Private Persiapan Ujian Goethe B-1',         'slug' => 'goethe-online-b1',         'base_price' => 1095000, 'duration_type' => '1', 'short_description' => $descGoethe, 'sort_order' => $sort++], $stdGoethe);
            $make(['product_category_id' => $catId, 'name' => 'Private Persiapan Ujian Goethe B-1 English', 'slug' => 'goethe-online-b1-english', 'base_price' => 1270000, 'duration_type' => '1', 'short_description' => $descGoethe, 'sort_order' => $sort++], $stdGoethe);

            // -- Kinder Online
            $descKinder = 'Dirancang khusus untuk anak-anak dengan metode belajar interaktif, permainan edukatif, dan aktivitas menyenangkan. Pengajar berpengalaman akan menyesuaikan cara mengajar sesuai usia dan karakter anak.';
            $make(['product_category_id' => $catId, 'name' => 'Private Kinder Bahasa Indonesia', 'slug' => 'kinder-online-indo',    'base_price' => 895000,  'duration_type' => '1', 'short_description' => $descKinder, 'sort_order' => $sort++], $stdKinder);
            $make(['product_category_id' => $catId, 'name' => 'Private Kinder English',          'slug' => 'kinder-online-english', 'base_price' => 1070000, 'duration_type' => '1', 'short_description' => $descKinder, 'sort_order' => $sort++], $stdKinder);

            // -- Native Online
            $make(['product_category_id' => $catId, 'name' => 'Sprachkurs mit Muttersprachler', 'slug' => 'native-online', 'base_price' => 1596000, 'duration_type' => '1', 'short_description' => 'Belajar langsung bersama pengajar native speaker yang akan membantu kamu berbicara lebih natural, memahami budaya Jerman, dan memperbaiki pelafalan dengan cara yang autentik.', 'sort_order' => $sort++], $stdNative);

            // ══════════════════════════════════════════════════════════════
            // 4. OFFLINE  (16 produk)
            // ══════════════════════════════════════════════════════════════
            $catId = $cats['offline']->id;
            $sort  = 100;

            // -- Intensif Reguler Offline
            $descIntensifOffline = 'Belajar langsung di kelas dengan suasana interaktif dan bimbingan intensif. Cocok untuk kamu yang ingin memahami bahasa Jerman secara menyeluruh lewat pengalaman tatap muka.';
            $make(['product_category_id' => $catId, 'name' => 'Intensif Reguler A-1 Offline', 'slug' => 'intensif-offline-a1', 'base_price' => 2099000, 'duration_type' => '3', 'short_description' => $descIntensifOffline, 'sort_order' => $sort++], $stdOffline);
            $make(['product_category_id' => $catId, 'name' => 'Intensif Reguler A-2 Offline', 'slug' => 'intensif-offline-a2', 'base_price' => 2099000, 'duration_type' => '3', 'short_description' => $descIntensifOffline, 'sort_order' => $sort++], $stdOffline);
            // B-1 Offline dapat Free record ekstra
            $make(['product_category_id' => $catId, 'name' => 'Intensif Reguler B-1 Offline', 'slug' => 'intensif-offline-b1', 'base_price' => 2250000, 'duration_type' => '3', 'short_description' => $descIntensifOffline, 'sort_order' => $sort++], array_merge($stdOffline, ['Free record akses kelas 24/7']));

            // -- Private Grammatik Offline
            $make(['product_category_id' => $catId, 'name' => 'Private Grammatik A-1 Offline',        'slug' => 'grammatik-offline-a1',         'base_price' => 1400000, 'duration_type' => '1', 'short_description' => $descGrammatik, 'sort_order' => $sort++], $stdGrammatikOffline);
            $make(['product_category_id' => $catId, 'name' => 'Private Grammatik A-1 English Offline', 'slug' => 'grammatik-offline-a1-english', 'base_price' => 1575000, 'duration_type' => '1', 'short_description' => $descGrammatik, 'sort_order' => $sort++], $stdGrammatikOffline);
            $make(['product_category_id' => $catId, 'name' => 'Private Grammatik A-2 Offline',        'slug' => 'grammatik-offline-a2',         'base_price' => 1400000, 'duration_type' => '1', 'short_description' => $descGrammatik, 'sort_order' => $sort++], $stdGrammatikOffline);
            $make(['product_category_id' => $catId, 'name' => 'Private Grammatik A-2 English Offline', 'slug' => 'grammatik-offline-a2-english', 'base_price' => 1575000, 'duration_type' => '1', 'short_description' => $descGrammatik, 'sort_order' => $sort++], $stdGrammatikOffline);
            $make(['product_category_id' => $catId, 'name' => 'Private Grammatik B-1 Offline',        'slug' => 'grammatik-offline-b1',         'base_price' => 1500000, 'duration_type' => '1', 'short_description' => $descGrammatik, 'sort_order' => $sort++], $stdGrammatikOffline);
            $make(['product_category_id' => $catId, 'name' => 'Private Grammatik B-1 English Offline', 'slug' => 'grammatik-offline-b1-english', 'base_price' => 1675000, 'duration_type' => '1', 'short_description' => $descGrammatik, 'sort_order' => $sort++], $stdGrammatikOffline);

            // -- Private Goethe Offline
            $make(['product_category_id' => $catId, 'name' => 'Private Persiapan Ujian Goethe A-1 Offline',        'slug' => 'goethe-offline-a1',         'base_price' => 1400000, 'duration_type' => '1', 'short_description' => $descGoethe, 'sort_order' => $sort++], $stdGoetheOffline);
            $make(['product_category_id' => $catId, 'name' => 'Private Persiapan Ujian Goethe A-1 English Offline', 'slug' => 'goethe-offline-a1-english', 'base_price' => 1575000, 'duration_type' => '1', 'short_description' => $descGoethe, 'sort_order' => $sort++], $stdGoetheOffline);
            $make(['product_category_id' => $catId, 'name' => 'Private Persiapan Ujian Goethe A-2 Offline',        'slug' => 'goethe-offline-a2',         'base_price' => 1400000, 'duration_type' => '1', 'short_description' => $descGoethe, 'sort_order' => $sort++], $stdGoetheOffline);
            $make(['product_category_id' => $catId, 'name' => 'Private Persiapan Ujian Goethe A-2 English Offline', 'slug' => 'goethe-offline-a2-english', 'base_price' => 1575000, 'duration_type' => '1', 'short_description' => $descGoethe, 'sort_order' => $sort++], $stdGoetheOffline);
            $make(['product_category_id' => $catId, 'name' => 'Private Persiapan Ujian Goethe B-1 Offline',        'slug' => 'goethe-offline-b1',         'base_price' => 1400000, 'duration_type' => '1', 'short_description' => $descGoethe, 'sort_order' => $sort++], $stdGoetheOffline);
            $make(['product_category_id' => $catId, 'name' => 'Private Persiapan Ujian Goethe B-1 English Offline', 'slug' => 'goethe-offline-b1-english', 'base_price' => 1675000, 'duration_type' => '1', 'short_description' => $descGoethe, 'sort_order' => $sort++], $stdGoetheOffline);

            // -- Native Offline
            $make(['product_category_id' => $catId, 'name' => 'Sprachkurs mit Muttersprachler Offline', 'slug' => 'native-offline', 'base_price' => 1676000, 'duration_type' => '1', 'short_description' => 'Belajar langsung bersama pengajar native speaker yang akan membantu kamu berbicara lebih natural, memahami budaya Jerman, dan memperbaiki pelafalan dengan cara yang autentik.', 'sort_order' => $sort++], array_merge($stdNative, ['Free record akses kelas 24/7']));

            // ══════════════════════════════════════════════════════════════
            // 5. BUNDLING REGULER  (3 produk)
            // ══════════════════════════════════════════════════════════════
            $catId = $cats['bundling_reguler']->id;
            $sort  = 200;

            $stdBundlingA1A2 = ['80x Pertemuan', '120 Menit/Pertemuan', 'Free record akses kelas 24/7', 'Free Modul Setiap Level (A-1 - A-2)', 'Free Konsultasi', 'Free 20 e-book Bahasa Jerman', 'Free 4x sesi kelas dengan Native', 'Include simulasi Ujian Goethe', 'Sertifikat'];
            $stdBundlingA2B1 = ['80x Pertemuan', '120 Menit/Pertemuan', 'Free record akses kelas 24/7', 'Free Modul Setiap Level (A-2 - B-1)', 'Free Konsultasi', 'Free 20 e-book Bahasa Jerman', 'Free 4x sesi kelas dengan Native', 'Include simulasi Ujian Goethe', 'Sertifikat'];
            $stdBundlingA1B1 = ['120x Pertemuan', '120 Menit/Pertemuan', 'Free record akses kelas 24/7', 'Free Modul Setiap Level (A-1 - B-1)', 'Free Konsultasi', 'Free 20 e-book Bahasa Jerman', 'Free 6x sesi kelas dengan Native', 'Include simulasi Ujian Goethe', 'Sertifikat'];

            $make(['product_category_id' => $catId, 'name' => 'Bundling Reguler Intensif A1-A2 Online', 'slug' => 'bundling-reg-a1-a2-online', 'base_price' => 5599000, 'duration_type' => '6',  'short_description' => 'Belajar lebih cepat, terarah, dan hemat hingga hampir Rp400.000 dibandingkan mendaftar per level.', 'sort_order' => $sort++], $stdBundlingA1A2);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Reguler Intensif A2-B1 Online', 'slug' => 'bundling-reg-a2-b1-online', 'base_price' => 5999000, 'duration_type' => '6',  'short_description' => 'Belajar lebih cepat, terarah, dan hemat hingga hampir Rp400.000 dibandingkan mendaftar per level.', 'sort_order' => $sort++], $stdBundlingA2B1);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Reguler Intensif A1-B1 Online', 'slug' => 'bundling-reg-a1-b1-online', 'base_price' => 8399000, 'duration_type' => '12', 'short_description' => 'Belajar lebih cepat, terarah, dan hemat hingga hampir Rp1.000.000 dibandingkan mendaftar per level.', 'sort_order' => $sort++], $stdBundlingA1B1);

            // ══════════════════════════════════════════════════════════════
            // 6. FLEXILEARN A1  (8 produk)
            // ══════════════════════════════════════════════════════════════
            $catId = $cats['flexilearn1']->id;
            $sort  = 300;

            $descFlexi = 'Program belajar Bahasa Jerman asinkronus yang bisa diakses kapan pun dan di mana pun. Materinya lengkap dan terstruktur, mencakup video, latihan interaktif, dan evaluasi mandiri.';

            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn A1 - 2 Bulan',                    'slug' => 'flexi-a1-2m',            'base_price' => 149000, 'duration_type' => '2',        'short_description' => $descFlexi . ' Akses 2 Bulan.',        'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn A1 - 6 Bulan',                    'slug' => 'flexi-a1-6m',            'base_price' => 169000, 'duration_type' => '6',        'short_description' => $descFlexi . ' Akses 6 Bulan.',        'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn A1 - 12 Bulan',                   'slug' => 'flexi-a1-12m',           'base_price' => 189000, 'duration_type' => '12',       'short_description' => $descFlexi . ' Akses 12 Bulan.',       'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn A1 - Lifetime Basic',              'slug' => 'flexi-a1-lifetime',      'base_price' => 199000, 'duration_type' => 'lifetime', 'short_description' => $descFlexi . ' Akses Lifetime.',       'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn A1 - Lifetime + 10 E-Book',        'slug' => 'flexi-a1-lifetime-10eb', 'base_price' => 299000, 'duration_type' => 'lifetime', 'short_description' => $descFlexi . ' Akses Lifetime + 10 E-Book.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn A1 - Lifetime + 20 E-Book',        'slug' => 'flexi-a1-lifetime-20eb', 'base_price' => 399000, 'duration_type' => 'lifetime', 'short_description' => $descFlexi . ' Akses Lifetime + 20 E-Book.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn A1 - Lifetime + 20 E-Book + 1x Private', 'slug' => 'flexi-a1-lifetime-20eb-1p', 'base_price' => 599000, 'duration_type' => 'lifetime', 'short_description' => $descFlexi . ' Akses Lifetime + 20 E-Book + 1x Sesi Private.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn A1 - Lifetime + 20 E-Book + 2x Private', 'slug' => 'flexi-a1-lifetime-20eb-2p', 'base_price' => 699000, 'duration_type' => 'lifetime', 'short_description' => $descFlexi . ' Akses Lifetime + 20 E-Book + 2x Sesi Private.', 'sort_order' => $sort++], $stdFlexi);

            // ══════════════════════════════════════════════════════════════
            // 7. FLEXILEARN A2  (8 produk)
            // ══════════════════════════════════════════════════════════════
            $catId = $cats['flexilearn2']->id;
            $sort  = 400;

            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn A2 - 2 Bulan',                    'slug' => 'flexi-a2-2m',            'base_price' => 149000, 'duration_type' => '2',        'short_description' => $descFlexi . ' Akses 2 Bulan.',        'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn A2 - 6 Bulan',                    'slug' => 'flexi-a2-6m',            'base_price' => 169000, 'duration_type' => '6',        'short_description' => $descFlexi . ' Akses 6 Bulan.',        'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn A2 - 12 Bulan',                   'slug' => 'flexi-a2-12m',           'base_price' => 189000, 'duration_type' => '12',       'short_description' => $descFlexi . ' Akses 12 Bulan.',       'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn A2 - Lifetime Basic',              'slug' => 'flexi-a2-lifetime',      'base_price' => 199000, 'duration_type' => 'lifetime', 'short_description' => $descFlexi . ' Akses Lifetime.',       'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn A2 - Lifetime + 10 E-Book',        'slug' => 'flexi-a2-lifetime-10eb', 'base_price' => 299000, 'duration_type' => 'lifetime', 'short_description' => $descFlexi . ' Akses Lifetime + 10 E-Book.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn A2 - Lifetime + 20 E-Book',        'slug' => 'flexi-a2-lifetime-20eb', 'base_price' => 399000, 'duration_type' => 'lifetime', 'short_description' => $descFlexi . ' Akses Lifetime + 20 E-Book.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn A2 - Lifetime + 20 E-Book + 1x Private', 'slug' => 'flexi-a2-lifetime-20eb-1p', 'base_price' => 599000, 'duration_type' => 'lifetime', 'short_description' => $descFlexi . ' Akses Lifetime + 20 E-Book + 1x Sesi Private.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn A2 - Lifetime + 20 E-Book + 2x Private', 'slug' => 'flexi-a2-lifetime-20eb-2p', 'base_price' => 699000, 'duration_type' => 'lifetime', 'short_description' => $descFlexi . ' Akses Lifetime + 20 E-Book + 2x Sesi Private.', 'sort_order' => $sort++], $stdFlexi);

            // ══════════════════════════════════════════════════════════════
            // 8. FLEXILEARN B1  (8 produk)
            // ══════════════════════════════════════════════════════════════
            $catId = $cats['flexilearnb1']->id;
            $sort  = 500;

            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn B1 - 2 Bulan',                    'slug' => 'flexi-b1-2m',            'base_price' => 159000, 'duration_type' => '2',        'short_description' => $descFlexi . ' Akses 2 Bulan.',        'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn B1 - 6 Bulan',                    'slug' => 'flexi-b1-6m',            'base_price' => 179000, 'duration_type' => '6',        'short_description' => $descFlexi . ' Akses 6 Bulan.',        'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn B1 - 12 Bulan',                   'slug' => 'flexi-b1-12m',           'base_price' => 199000, 'duration_type' => '12',       'short_description' => $descFlexi . ' Akses 12 Bulan.',       'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn B1 - Lifetime Basic',              'slug' => 'flexi-b1-lifetime',      'base_price' => 199000, 'duration_type' => 'lifetime', 'short_description' => $descFlexi . ' Akses Lifetime.',       'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn B1 - Lifetime + 10 E-Book',        'slug' => 'flexi-b1-lifetime-10eb', 'base_price' => 399000, 'duration_type' => 'lifetime', 'short_description' => $descFlexi . ' Akses Lifetime + 10 E-Book.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn B1 - Lifetime + 20 E-Book',        'slug' => 'flexi-b1-lifetime-20eb', 'base_price' => 469000, 'duration_type' => 'lifetime', 'short_description' => $descFlexi . ' Akses Lifetime + 20 E-Book.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn B1 - Lifetime + 20 E-Book + 1x Private', 'slug' => 'flexi-b1-lifetime-20eb-1p', 'base_price' => 649000, 'duration_type' => 'lifetime', 'short_description' => $descFlexi . ' Akses Lifetime + 20 E-Book + 1x Sesi Private.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Deutsch FlexiLearn B1 - Lifetime + 20 E-Book + 2x Private', 'slug' => 'flexi-b1-lifetime-20eb-2p', 'base_price' => 759000, 'duration_type' => 'lifetime', 'short_description' => $descFlexi . ' Akses Lifetime + 20 E-Book + 2x Sesi Private.', 'sort_order' => $sort++], $stdFlexi);

            // ══════════════════════════════════════════════════════════════
            // 9. BUNDLING FLEXILEARN A1-A2  (8 produk)
            // ══════════════════════════════════════════════════════════════
            $catId = $cats['bundling_flex_a1-a2']->id;
            $sort  = 600;
            $descBundleFlexi = 'Program belajar Bahasa Jerman asinkronus yang bisa diakses kapan pun dan di mana pun. Akses dua level sekaligus (A1 & A2) dengan harga lebih hemat.';

            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A1-A2 - 2 Bulan',                    'slug' => 'flexi-bundle-a1-a2-2m',            'base_price' => 269000,  'duration_type' => '2',        'short_description' => $descBundleFlexi . ' Akses 2 Bulan.',        'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A1-A2 - 6 Bulan',                    'slug' => 'flexi-bundle-a1-a2-6m',            'base_price' => 309000,  'duration_type' => '6',        'short_description' => $descBundleFlexi . ' Akses 6 Bulan.',        'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A1-A2 - 12 Bulan',                   'slug' => 'flexi-bundle-a1-a2-12m',           'base_price' => 339000,  'duration_type' => '12',       'short_description' => $descBundleFlexi . ' Akses 12 Bulan.',       'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A1-A2 - Lifetime Basic',              'slug' => 'flexi-bundle-a1-a2-lifetime',      'base_price' => 339000,  'duration_type' => 'lifetime', 'short_description' => $descBundleFlexi . ' Akses Lifetime.',       'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A1-A2 - Lifetime + 10 E-Book',        'slug' => 'flexi-bundle-a1-a2-lifetime-10eb', 'base_price' => 569000,  'duration_type' => 'lifetime', 'short_description' => $descBundleFlexi . ' Akses Lifetime + 10 E-Book.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A1-A2 - Lifetime + 20 E-Book',        'slug' => 'flexi-bundle-a1-a2-lifetime-20eb', 'base_price' => 779000,  'duration_type' => 'lifetime', 'short_description' => $descBundleFlexi . ' Akses Lifetime + 20 E-Book.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A1-A2 - Lifetime + 20 E-Book + 1x Private', 'slug' => 'flexi-bundle-a1-a2-lifetime-20eb-1p', 'base_price' => 1169000, 'duration_type' => 'lifetime', 'short_description' => $descBundleFlexi . ' Akses Lifetime + 20 E-Book + 1x Private.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A1-A2 - Lifetime + 20 E-Book + 2x Private', 'slug' => 'flexi-bundle-a1-a2-lifetime-20eb-2p', 'base_price' => 1349000, 'duration_type' => 'lifetime', 'short_description' => $descBundleFlexi . ' Akses Lifetime + 20 E-Book + 2x Private.', 'sort_order' => $sort++], $stdFlexi);

            // ══════════════════════════════════════════════════════════════
            // 10. BUNDLING FLEXILEARN A2-B1  (8 produk)
            // ══════════════════════════════════════════════════════════════
            $catId = $cats['bundling_flex_a2-b1']->id;
            $sort  = 700;
            $descBundleFlexiA2B1 = 'Program belajar Bahasa Jerman asinkronus yang bisa diakses kapan pun dan di mana pun. Akses dua level sekaligus (A2 & B1) with harga lebih hemat.';

            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A2-B1 - 2 Bulan',                    'slug' => 'flexi-bundle-a2-b1-2m',            'base_price' => 289000,  'duration_type' => '2',        'short_description' => $descBundleFlexiA2B1 . ' Akses 2 Bulan.',        'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A2-B1 - 6 Bulan',                    'slug' => 'flexi-bundle-a2-b1-6m',            'base_price' => 319000,  'duration_type' => '6',        'short_description' => $descBundleFlexiA2B1 . ' Akses 6 Bulan.',        'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A2-B1 - 12 Bulan',                   'slug' => 'flexi-bundle-a2-b1-12m',           'base_price' => 359000,  'duration_type' => '12',       'short_description' => $descBundleFlexiA2B1 . ' Akses 12 Bulan.',       'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A2-B1 - Lifetime Basic',              'slug' => 'flexi-bundle-a2-b1-lifetime',      'base_price' => 379000,  'duration_type' => 'lifetime', 'short_description' => $descBundleFlexiA2B1 . ' Akses Lifetime.',       'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A2-B1 - Lifetime + 10 E-Book',        'slug' => 'flexi-bundle-a2-b1-lifetime-10eb', 'base_price' => 609000,  'duration_type' => 'lifetime', 'short_description' => $descBundleFlexiA2B1 . ' Akses Lifetime + 10 E-Book.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A2-B1 - Lifetime + 20 E-Book',        'slug' => 'flexi-bundle-a2-b1-lifetime-20eb', 'base_price' => 839000,  'duration_type' => 'lifetime', 'short_description' => $descBundleFlexiA2B1 . ' Akses Lifetime + 20 E-Book.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A2-B1 - Lifetime + 20 E-Book + 1x Private', 'slug' => 'flexi-bundle-a2-b1-lifetime-20eb-1p', 'base_price' => 1209000, 'duration_type' => 'lifetime', 'short_description' => $descBundleFlexiA2B1 . ' Akses Lifetime + 20 E-Book + 1x Private.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A2-B1 - Lifetime + 20 E-Book + 2x Private', 'slug' => 'flexi-bundle-a2-b1-lifetime-20eb-2p', 'base_price' => 1409000, 'duration_type' => 'lifetime', 'short_description' => $descBundleFlexiA2B1 . ' Akses Lifetime + 20 E-Book + 2x Private.', 'sort_order' => $sort++], $stdFlexi);

            // ══════════════════════════════════════════════════════════════
            // 11. BUNDLING FLEXILEARN A1-B1  (8 produk)
            // ══════════════════════════════════════════════════════════════
            $catId = $cats['bundling_flex_a1-b1']->id;
            $sort  = 800;
            $descBundleFlexiA1B1 = 'Program belajar Bahasa Jerman asinkronus yang bisa diakses kapan pun dan di mana pun. Akses tiga level sekaligus (A1, A2 & B1) with harga paling hemat.';

            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A1-B1 - 2 Bulan',                    'slug' => 'flexi-bundle-a1-b1-2m',            'base_price' => 429000,  'duration_type' => '2',        'short_description' => $descBundleFlexiA1B1 . ' Akses 2 Bulan.',        'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A1-B1 - 6 Bulan',                    'slug' => 'flexi-bundle-a1-b1-6m',            'base_price' => 479000,  'duration_type' => '6',        'short_description' => $descBundleFlexiA1B1 . ' Akses 6 Bulan.',        'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A1-B1 - 12 Bulan',                   'slug' => 'flexi-bundle-a1-b1-12m',           'base_price' => 529000,  'duration_type' => '12',       'short_description' => $descBundleFlexiA1B1 . ' Akses 12 Bulan.',       'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A1-B1 - Lifetime Basic',              'slug' => 'flexi-bundle-a1-b1-lifetime',      'base_price' => 569000,  'duration_type' => 'lifetime', 'short_description' => $descBundleFlexiA1B1 . ' Akses Lifetime.',       'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A1-B1 - Lifetime + 10 E-Book',        'slug' => 'flexi-bundle-a1-b1-lifetime-10eb', 'base_price' => 889000,  'duration_type' => 'lifetime', 'short_description' => $descBundleFlexiA1B1 . ' Akses Lifetime + 10 E-Book.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A1-B1 - Lifetime + 20 E-Book',        'slug' => 'flexi-bundle-a1-b1-lifetime-20eb', 'base_price' => 1229000, 'duration_type' => 'lifetime', 'short_description' => $descBundleFlexiA1B1 . ' Akses Lifetime + 20 E-Book.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A1-B1 - Lifetime + 20 E-Book + 1x Private', 'slug' => 'flexi-bundle-a1-b1-lifetime-20eb-1p', 'base_price' => 1779000, 'duration_type' => 'lifetime', 'short_description' => $descBundleFlexiA1B1 . ' Akses Lifetime + 20 E-Book + 1x Private.', 'sort_order' => $sort++], $stdFlexi);
            $make(['product_category_id' => $catId, 'name' => 'Bundling Deutsch FlexiLearn A1-B1 - Lifetime + 20 E-Book + 2x Private', 'slug' => 'flexi-bundle-a1-b1-lifetime-20eb-2p', 'base_price' => 2099000, 'duration_type' => 'lifetime', 'short_description' => $descBundleFlexiA1B1 . ' Akses Lifetime + 20 E-Book + 2x Private.', 'sort_order' => $sort++], $stdFlexi);

            // ══════════════════════════════════════════════════════════════
            // 12. DEUTSCHKIT  (2 produk)
            // ══════════════════════════════════════════════════════════════
            $catId = $cats['deutschkit']->id;
            $sort  = 900;

            // Netzwerk Neu — buku fisik (dijual via Shopee/TikTok Shop)
            $make([
                'product_category_id' => $catId,
                'name'              => 'Netzwerk Neu',
                'slug'              => 'netzwerk-neu',
                'base_price'        => 0,           // harga via marketplace
                'duration_type'     => 'lifetime',
                'short_description' => 'Buku ajar resmi Bahasa Jerman standar Goethe-Institut. Tersedia Kursbuch & Übungsbuch level A1–B1 dengan materi audio & video autentik.',
                'sort_order'        => $sort++,
            ], $stdNetzwerk);

            // DeutschKit — E-Book digital (dijual via Shopee/TikTok Shop)
            $make([
                'product_category_id' => $catId,
                'name'              => 'DeutschKit',
                'slug'              => 'deutschkit-ebook',
                'base_price'        => 0,           // harga via marketplace
                'duration_type'     => 'lifetime',
                'short_description' => 'Kumpulan E-Book tematik bahasa Jerman dalam format PDF digital yang bisa diakses kapan saja. Cocok untuk pelajar level A1–B1.',
                'sort_order'        => $sort++,
            ], $stdDeutschkit);

        }); // end DB::transaction

        $this->command->info('ProductSeeder selesai: 10 kategori, 87 produk, benefit master lengkap berhasil dibuat!');
    }
}
