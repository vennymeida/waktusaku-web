<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganPekerjaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'id_perusahaan',
        'id_kategori',
        'judul',
        'deskripsi',
        'requirement',
        'tipe_pekerjaan',
        'gaji',
        'jumlah_pelamar',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(ProfileUser::class, 'user_id');
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriPekerjaan::class, 'id_kategori');
    }
}
