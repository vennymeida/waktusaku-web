<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;
    protected $table = 'postingans';
    protected $fillable = [
        'user_id',
        'konteks',
        'gambar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
