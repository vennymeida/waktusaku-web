<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaan';
    protected $fillable = [
        'user_id',
        'kecamatan_id',
        'kelurahan_id',
        'pemilik',
        'nama',
        'alamat',
        'email',
        'website',
        'logo',
        'no_hp',
        'deskripsi',
        'siu'    
    ];

    public function perusahaan()
    {
        return $this->belongsTo(User::class);
        return $this->belongsTo(Kecamatan::class);
        return $this->belongsTo(Kelurahan::class);
    }
}