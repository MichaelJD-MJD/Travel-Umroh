<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GaleriSeeder extends Seeder
{
    public function run()
    {
        $galeriData = [
            [
                'judul' => 'Keberangkatan Jamaah Umrah',
                'deskripsi' => 'Momen haru saat para jamaah berangkat menuju Tanah Suci.',
                'url_gambar' => 'https://res.cloudinary.com/dy6x5yzwe/image/upload/v1747972930/travel_umroh/galeri/yb1eecfc3xvcczklzth3.png',
            ],
            [
                'judul' => 'Suasana di Makkah',
                'deskripsi' => 'Foto suasana Masjidil Haram saat malam hari.',
                'url_gambar' => 'https://res.cloudinary.com/dy6x5yzwe/image/upload/v1747922068/travel_umroh/galeri/dnbpkplfujcamq6zmocu.png',
            ],
            [
                'judul' => 'Jamaah Berdoa di Raudhah',
                'deskripsi' => 'Pengalaman spiritual di Raudhah, Madinah.',
                'url_gambar' => 'https://res.cloudinary.com/dy6x5yzwe/image/upload/v1747972930/travel_umroh/galeri/yb1eecfc3xvcczklzth3.png',
            ],
            [
                'judul' => 'Hotel Dekat Masjid Nabawi',
                'deskripsi' => 'Akomodasi hotel dekat Masjid Nabawi untuk kenyamanan jamaah.',
                'url_gambar' => 'https://res.cloudinary.com/dy6x5yzwe/image/upload/v1747922068/travel_umroh/galeri/dnbpkplfujcamq6zmocu.png',
            ],
            [
                'judul' => 'City Tour Madinah',
                'deskripsi' => 'Kunjungan ke situs bersejarah di Madinah.',
                'url_gambar' => 'https://res.cloudinary.com/dy6x5yzwe/image/upload/v1747972930/travel_umroh/galeri/yb1eecfc3xvcczklzth3.png',
            ],
            [
                'judul' => 'Ziarah Jabal Uhud',
                'deskripsi' => 'Momen ziarah ke Jabal Uhud yang penuh hikmah.',
                'url_gambar' => 'https://res.cloudinary.com/dy6x5yzwe/image/upload/v1747922068/travel_umroh/galeri/dnbpkplfujcamq6zmocu.png',
            ],
            [
                'judul' => 'Masjid Quba',
                'deskripsi' => 'Kunjungan ke masjid pertama yang dibangun Nabi Muhammad SAW.',
                'url_gambar' => 'https://res.cloudinary.com/dy6x5yzwe/image/upload/v1747972930/travel_umroh/galeri/yb1eecfc3xvcczklzth3.png',
            ],
            [
                'judul' => 'Suasana Tawaf',
                'deskripsi' => 'Dokumentasi jamaah sedang melakukan Tawaf di Masjidil Haram.',
                'url_gambar' => 'https://res.cloudinary.com/dy6x5yzwe/image/upload/v1747922068/travel_umroh/galeri/dnbpkplfujcamq6zmocu.png',
            ],
            [
                'judul' => 'Pembekalan Jamaah',
                'deskripsi' => 'Kegiatan manasik sebelum keberangkatan.',
                'url_gambar' => 'https://res.cloudinary.com/dy6x5yzwe/image/upload/v1747972930/travel_umroh/galeri/yb1eecfc3xvcczklzth3.png',
            ],
            [
                'judul' => 'Kebersamaan Jamaah',
                'deskripsi' => 'Foto kebersamaan antar jamaah selama perjalanan.',
                'url_gambar' => 'https://res.cloudinary.com/dy6x5yzwe/image/upload/v1747922068/travel_umroh/galeri/dnbpkplfujcamq6zmocu.png',
            ],
        ];

        foreach ($galeriData as $item) {
            DB::table('galeris')->insert([
                'judul' => $item['judul'],
                'deskripsi' => $item['deskripsi'],
                'url_gambar' => $item['url_gambar'],
                'diupload_oleh' => 1, // diasumsikan user ID 1 adalah admin
                'tanggal_upload' => Carbon::now(),
            ]);
        }
    }
}
