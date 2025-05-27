<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'pendaftaran_id';

    protected $fillable = [
        'user_id',
        'paket_id',
        'status',
        'tanggal_pendaftaran',
        'tanggal_dikonfirmasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id', 'paket_id');
    }

    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'pendaftaran_id', 'pendaftaran_id');
    }
}
