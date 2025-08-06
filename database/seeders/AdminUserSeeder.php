<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Set timezone ke Indonesia
        $now = Carbon::now('Asia/Jakarta');

        User::create([
            'name' => 'Admin',
            'email' => 'admin@dlmf.com',
            'email_verified_at' => $now,
            'password' => Hash::make('password!'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        User::create([
            'name' => 'Editor',
            'email' => 'editor@dlmf.com',
            'email_verified_at' => $now,
            'password' => Hash::make('password!!'),
            'role' => 'editor',
            'remember_token' => Str::random(10),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
