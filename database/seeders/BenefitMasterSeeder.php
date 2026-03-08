<?php

namespace Database\Seeders;

use App\Models\BenefitMaster;
use Illuminate\Database\Seeder;

class BenefitMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $benefits = [
            ['label' => '20x Pertemuan',                    'icon' => '📅', 'sort_order' => 1],
            ['label' => '120 Menit/Sesi',                   'icon' => '⏱️', 'sort_order' => 2],
            ['label' => 'Free Record Akses Kelas 24/7',     'icon' => '🎥', 'sort_order' => 3],
            ['label' => 'Free Modul',                       'icon' => '📚', 'sort_order' => 4],
            ['label' => 'Free Konsultasi',                  'icon' => '💬', 'sort_order' => 5],
            ['label' => 'Free 20 e-Book Bahasa Jerman',     'icon' => '📖', 'sort_order' => 6],
            ['label' => 'Free 1x Sesi Kelas dengan Native', 'icon' => '🇩🇪', 'sort_order' => 7],
            ['label' => 'Include Simulasi Ujian Goethe 8x', 'icon' => '📝', 'sort_order' => 8],
            ['label' => 'Sertifikat',                       'icon' => '🏆', 'sort_order' => 9],
        ];

        foreach ($benefits as $benefit) {
            BenefitMaster::updateOrCreate(
                ['label' => $benefit['label']],
                array_merge($benefit, ['is_active' => true])
            );
        }

        $this->command->info('✅ Benefit Masters seeded: ' . count($benefits) . ' benefit.');
    }
}
