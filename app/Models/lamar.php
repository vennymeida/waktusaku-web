<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class lamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_loker',
        'id_pencari_kerja',
        'resume',
        'status',
    ];

    public function pencarikerja()
    {
        return $this->belongsTo(ProfileUser::class, 'id_pencari_kerja');
    }

    public function loker()
    {
        return $this->belongsTo(LowonganPekerjaan::class, 'id_loker');
    }

}
