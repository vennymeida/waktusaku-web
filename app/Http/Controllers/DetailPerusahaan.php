<?php

namespace App\Http\Controllers;

use App\Models\KategoriPekerjaan;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\LowonganPekerjaan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailPerusahaan extends Controller
{
    public function index(Request $request)
    {
        $allResults = DB::table('lowongan_pekerjaans as lp')
            ->join('perusahaan as p', 'lp.id_perusahaan', '=', 'p.id')
            ->join('lowongan_kategori as lk', 'lp.id', '=', 'lk.lowongan_id')
            ->join('kategori_pekerjaans as kp', 'lk.kategori_id', '=', 'kp.id')
            ->join('profile_users as pu', 'lp.user_id', '=', 'pu.id')
            ->join('users as u', 'pu.user_id', '=', 'u.id')
            ->select(
                'p.id',
                'lp.user_id',
                'lp.id_perusahaan',
                'lp.judul',
                'lp.deskripsi',
                'lp.requirement',
                'lp.gaji_bawah',
                'lp.gaji_atas',
                'lp.tipe_pekerjaan',
                'lp.jumlah_pelamar',
                'lp.min_pengalaman',
                'lp.min_pendidikan',
                'lp.status',
                'lp.lokasi',
                'lp.tutup',
                'p.nama',
                'p.pemilik',
                'p.logo',
                DB::raw("GROUP_CONCAT(kp.kategori SEPARATOR ', ') as kategori"),
            )
            ->where('lp.status', 'dibuka')
            ->orderBy('lp.created_at', 'desc')
            ->groupBy('p.id', 'lp.user_id', 'lp.id_perusahaan', 'p.nama', 'lp.judul', 'lp.deskripsi', 'lp.requirement', 'lp.gaji_bawah', 'gaji_atas', 'lp.tipe_pekerjaan', 'lp.jumlah_pelamar', 'lp.status', 'lp.tutup', 'lp.lokasi', 'lp.min_pengalaman', 'lp.min_pendidikan', 'p.pemilik', 'p.logo')
            ->paginate(10);

        return view('detailPerusahaan', ['allResults' => $allResults]);
    }

    public function show(Perusahaan $detail)
    {
        $lowonganPekerjaan = DB::table('lowongan_pekerjaans as lp')
            ->join('lowongan_kategori', 'lp.id', '=', 'lowongan_kategori.lowongan_id')
            ->join('kategori_pekerjaans as kp', 'lowongan_kategori.kategori_id', '=', 'kp.id')
            ->select('lp.id', 'lp.judul', 'lp.deskripsi', 'lp.user_id', 'lp.gaji_atas', 'lp.gaji_bawah', 'lp.lokasi', 'lp.min_pendidikan', 'lp.min_pengalaman', DB::raw("GROUP_CONCAT(kp.kategori SEPARATOR ', ') as kategori"))
            ->where('lp.id_perusahaan', $detail->id)
            ->groupBy('lp.id', 'lp.judul', 'lp.deskripsi', 'lp.user_id', 'lp.gaji_atas', 'lp.gaji_bawah', 'lp.lokasi', 'lp.min_pendidikan', 'lp.min_pengalaman')
            ->get();

        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        return view('detailPerusahaan', [
            'detail' => $detail,
            'lowonganPekerjaan' => $lowonganPekerjaan,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan
        ]);
    }
}