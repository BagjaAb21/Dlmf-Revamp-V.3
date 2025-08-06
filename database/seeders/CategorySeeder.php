<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $now = Carbon::now('Asia/Jakarta');

        $categories = [
            'Tips Belajar',
            'Grammar Jerman',
            'Kosakata',
            'Budaya Jerman',
            'Ujian Sertifikat',
            'Beasiswa',
            'Pengalaman Belajar',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
