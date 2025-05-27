<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaketSeeder extends Seeder
{
    public function run()
    {
        $imageUrls = [
            'https://res.cloudinary.com/dy6x5yzwe/image/upload/v1747928194/travel_umroh/fuvbj4gntrjvypfqq1dx.png',
            'https://res.cloudinary.com/dy6x5yzwe/image/upload/v1747919306/travel_umroh/qg04oaqtgqfon9hkmjnf.png',
            'https://res.cloudinary.com/dy6x5yzwe/image/upload/v1747716329/travel_umroh/p6cau0sz52ifodwjxkhe.png',
        ];

        $pakets = [
            [
                'nama_paket' => 'Umrah Hemat 9 Hari',
                'deskripsi' => 'Paket umrah hemat dengan akomodasi bintang 3.',
                'harga' => 27000000,
                'durasi_hari' => 9,
                'tanggal_keberangkatan' => Carbon::now()->addDays(10),
                'kuota' => 30,
                'gambar_url' => $imageUrls[0],
            ],
            [
                'nama_paket' => 'Umrah Nyaman 12 Hari',
                'deskripsi' => 'Nikmati umrah nyaman dengan hotel dekat Masjidil Haram.',
                'harga' => 32000000,
                'durasi_hari' => 12,
                'tanggal_keberangkatan' => Carbon::now()->addDays(20),
                'kuota' => 25,
                'gambar_url' => $imageUrls[1],
            ],
            [
                'nama_paket' => 'Umrah VIP 10 Hari',
                'deskripsi' => 'Umrah dengan fasilitas VIP dan city tour.',
                'harga' => 40000000,
                'durasi_hari' => 10,
                'tanggal_keberangkatan' => Carbon::now()->addDays(30),
                'kuota' => 20,
                'gambar_url' => $imageUrls[2],
            ],
            [
                'nama_paket' => 'Umrah Ramadhan Awal',
                'deskripsi' => 'Paket khusus untuk awal Ramadhan.',
                'harga' => 35000000,
                'durasi_hari' => 12,
                'tanggal_keberangkatan' => Carbon::now()->addDays(40),
                'kuota' => 40,
                'gambar_url' => $imageUrls[0],
            ],
            [
                'nama_paket' => 'Umrah Ramadhan Akhir',
                'deskripsi' => 'Paket ibadah di akhir bulan suci Ramadhan.',
                'harga' => 37000000,
                'durasi_hari' => 12,
                'tanggal_keberangkatan' => Carbon::now()->addDays(50),
                'kuota' => 30,
                'gambar_url' => $imageUrls[1],
            ],
            [
                'nama_paket' => 'Umrah Syawal',
                'deskripsi' => 'Umrah setelah Hari Raya Idul Fitri.',
                'harga' => 29000000,
                'durasi_hari' => 10,
                'tanggal_keberangkatan' => Carbon::now()->addDays(60),
                'kuota' => 35,
                'gambar_url' => $imageUrls[2],
            ],
            [
                'nama_paket' => 'Umrah Akhir Tahun',
                'deskripsi' => 'Paket liburan akhir tahun bersama keluarga.',
                'harga' => 31000000,
                'durasi_hari' => 11,
                'tanggal_keberangkatan' => Carbon::now()->addDays(70),
                'kuota' => 28,
                'gambar_url' => $imageUrls[0],
            ],
            [
                'nama_paket' => 'Umrah Plus Turki',
                'deskripsi' => 'Gabungan umrah dan wisata religi di Turki.',
                'harga' => 45000000,
                'durasi_hari' => 14,
                'tanggal_keberangkatan' => Carbon::now()->addDays(80),
                'kuota' => 20,
                'gambar_url' => $imageUrls[1],
            ],
            [
                'nama_paket' => 'Umrah Plus Dubai',
                'deskripsi' => 'Paket umrah dan city tour di Dubai.',
                'harga' => 43000000,
                'durasi_hari' => 13,
                'tanggal_keberangkatan' => Carbon::now()->addDays(90),
                'kuota' => 22,
                'gambar_url' => $imageUrls[2],
            ],
            [
                'nama_paket' => 'Umrah Keluarga',
                'deskripsi' => 'Paket khusus untuk keluarga dengan anak-anak.',
                'harga' => 29500000,
                'durasi_hari' => 10,
                'tanggal_keberangkatan' => Carbon::now()->addDays(100),
                'kuota' => 40,
                'gambar_url' => $imageUrls[0],
            ],
            [
                'nama_paket' => 'Umrah Weekend',
                'deskripsi' => 'Umrah singkat untuk akhir pekan.',
                'harga' => 25000000,
                'durasi_hari' => 7,
                'tanggal_keberangkatan' => Carbon::now()->addDays(110),
                'kuota' => 18,
                'gambar_url' => $imageUrls[1],
            ],
            [
                'nama_paket' => 'Umrah Reguler 10 Hari',
                'deskripsi' => 'Paket reguler dengan jadwal rutin tiap bulan.',
                'harga' => 28000000,
                'durasi_hari' => 10,
                'tanggal_keberangkatan' => Carbon::now()->addDays(120),
                'kuota' => 30,
                'gambar_url' => $imageUrls[2],
            ],
        ];

        foreach ($pakets as $paket) {
            DB::table('pakets')->insert([
                'nama_paket' => $paket['nama_paket'],
                'deskripsi' => $paket['deskripsi'],
                'harga' => $paket['harga'],
                'durasi_hari' => $paket['durasi_hari'],
                'tanggal_keberangkatan' => $paket['tanggal_keberangkatan'],
                'kuota' => $paket['kuota'],
                'gambar_url' => $paket['gambar_url'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
