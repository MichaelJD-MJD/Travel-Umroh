<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $primaryKey = 'peserta_id';

    protected $fillable = [
        'pendaftaran_id',
        'nama_lengkap',
        'jenis_kelamin',
        'tanggal_lahir',
        'nik',
        'nomor_paspor',
        'alamat',
        'nomor_telepon',
        'email',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id', 'pendaftaran_id');
    }
}
