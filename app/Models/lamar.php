<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lamar extends Model
{
    use HasFactory;

    protected $table = 'lamars'; // nama tabel di database

    protected $fillable = [
        'id_loker',
        'id_pencari_kerja',
        'resume',
        'status',
    ];

    public function loker()
    {
        return $this->belongsTo(LowonganPekerjaan::class, 'id_loker');
    }

    public function pencariKerja()
    {
        return $this->belongsTo(ProfileUser::class, 'id_pencari_kerja');
    }
}
