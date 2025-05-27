<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'nama' => 'Admin As-Syamiah',
                'email' => 'admin@assyamiah.com',
                'password' => Hash::make('admin123'),
                'nomor_telepon' => '081234567890',
                'alamat' => 'Jl. KBIH No.1, Jakarta',
                'role' => 'admin',
                'created_at' => now(),
            ],
            [
                'nama' => 'Ahmad Fauzi',
                'email' => 'ahmad@example.com',
                'password' => Hash::make('password123'),
                'nomor_telepon' => '081111111111',
                'alamat' => 'Jl. Merpati, Bandung',
                'role' => 'user',
                'created_at' => now(),
            ],
            [
                'nama' => 'Siti Aminah',
                'email' => 'siti@example.com',
                'password' => Hash::make('password123'),
                'nomor_telepon' => '082222222222',
                'alamat' => 'Jl. Kenanga, Surabaya',
                'role' => 'user',
                'created_at' => now(),
            ],
            [
                'nama' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'password' => Hash::make('password123'),
                'nomor_telepon' => '083333333333',
                'alamat' => 'Jl. Melati, Yogyakarta',
                'role' => 'user',
                'created_at' => now(),
            ],
            [
                'nama' => 'Nur Aini',
                'email' => 'nur@example.com',
                'password' => Hash::make('password123'),
                'nomor_telepon' => '084444444444',
                'alamat' => 'Jl. Mawar, Semarang',
                'role' => 'user',
                'created_at' => now(),
            ],
        ]);
    }
}
