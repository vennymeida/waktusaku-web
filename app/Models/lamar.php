<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_loker',
        'id_pencari_kerja',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(ProfileUser::class, 'id_pencari_kerja');
    }

    public function loker()
    {
        return $this->belongsTo(LowonganPekerjaan::class, 'id_loker');
    }

}
