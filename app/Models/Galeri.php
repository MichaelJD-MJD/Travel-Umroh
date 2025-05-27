<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Galeri extends Model
{
    use HasFactory;

    protected $primaryKey = 'galeri_id';

    protected $fillable = [
        'judul',
        'deskripsi',
        'url_gambar',
        'diupload_oleh',
        'tanggal_upload',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'diupload_oleh', 'id');
    }
}
