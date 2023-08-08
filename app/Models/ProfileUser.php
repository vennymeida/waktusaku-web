<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileUser extends Model
{
    use HasFactory;
    protected $table = 'profile_users';
    protected $fillable = [
        'user_id',
        'alamat',
        'jenis_kelamin',
        'no_hp',
        'foto',
        'resume'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function profile()
    {
        return $this->hasOne(ProfileUser::class);
    }
}
