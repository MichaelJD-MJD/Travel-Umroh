<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $primaryKey = 'paket_id';

    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'harga',
        'durasi_hari',
        'tanggal_keberangkatan',
        'kuota',
        'gambar_url',
    ];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'paket_id', 'paket_id');
    }
}
