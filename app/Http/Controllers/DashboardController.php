<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\lamar;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $dashboard = DB::table('lamars as l')
            ->join('lowongan_pekerjaans as lp', 'l.id_loker', '=', 'lp.id')
            ->join('perusahaan as p', 'lp.id_perusahaan', '=', 'p.id')
            ->join('profile_users as pu', 'l.id_pencari_kerja', '=', 'pu.id')
            ->join('users as u', 'pu.user_id', '=', 'u.id')
            ->select(
                'l.id',
                'l.id_pencari_kerja',
                'u.name',
                'pu.no_hp',
                'pu.foto',
                'pu.resume',
                'u.email',
                'p.nama as perusahaan',
                'lp.judul',
                'l.status',
                'l.created_at'
            )
            ->orderBy('l.created_at', 'desc') // Menambahkan pengurutan berdasarkan created_at terbaru
            ->take(5) //mengambil 5 data teratas
            ->get();


        $grafik = DB::table('lamars as l')
            ->join('lowongan_pekerjaans as lp', 'l.id_loker', '=', 'lp.id')
            ->join('perusahaan as p', 'lp.id_perusahaan', '=', 'p.id')
            ->select(
                DB::raw('COUNT(*) as jumlah_lamars'),
                DB::raw('MONTH(l.created_at) as month'),
                DB::raw('COUNT(*) as count'),
                'p.nama'
            )
            ->groupBy(DB::raw('MONTH(l.created_at)'), 'p.nama')
            ->take(5)
            ->get();


        return view('home')->with([
            'dashboard' => $dashboard,
            'grafik' => $grafik
        ]);
    }
}