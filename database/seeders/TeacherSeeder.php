<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now('Asia/Jakarta');

        $teachers = [
            [
                'name' => 'Frau Caca',
                'level' => 'A1',
                'education' => 'Sastra Jerman Universitas Indonesia',
                'experience' => '2 tahun',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Frau Fia',
                'level' => 'A2',
                'education' => 'Pendidikan Bahasa Jerman UNJ',
                'experience' => '3.5 tahun',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Frau Azizah',
                'level' => 'B1',
                'education' => 'Sastra Jerman Universitas Padjadjaran',
                'experience' => '4 tahun',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Frau Rara',
                'level' => 'B2',
                'education' => 'Germanistik Universitas Gadjah Mada',
                'experience' => '5 tahun',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Herr Mueller',
                'level' => 'C1',
                'education' => 'Native Speaker dari Berlin',
                'experience' => '10 tahun',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Frau Schmidt',
                'level' => 'C2',
                'education' => 'Sertifikat GOETHE C2, Hamburg',
                'experience' => '8 tahun',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($teachers as $teacher) {
            Teacher::create(array_merge($teacher, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
