<?php

namespace App\Http\Controllers;

use App\Models\LowonganPekerjaan;
use App\Models\Perusahaan;
use App\Models\KategoriPekerjaan;
use App\Models\ProfileUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $allResults = DB::table('lowongan_pekerjaans as lp')
            ->join('perusahaan as p', 'lp.id_perusahaan', '=', 'p.id')
            ->join('kategori_pekerjaans as kp', 'lp.id_kategori', '=', 'kp.id')
            ->join('profile_users as pu', 'lp.user_id', '=', 'pu.id')
            ->join('users as u', 'pu.user_id', '=', 'u.id')
            ->select(
                'lp.id',
                'lp.user_id',
                'lp.id_perusahaan',
                'lp.id_kategori',
                'p.nama',
                'p.logo',
                'kp.kategori',
                'lp.judul',
                'lp.deskripsi',
                'lp.requirement',
                'lp.tipe_pekerjaan',
                'lp.gaji',
                'lp.jumlah_pelamar',
                'lp.status',
                'u.name',
            )
            ->where('lp.status', 'dibuka')
            ->orderBy('lp.created_at', 'desc')
            ->limit(5)
            ->get();

        return view('welcome', ['allResults' => $allResults]);
    }
}