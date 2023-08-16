<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlljobsController extends Controller
{
    public function index(Request $request)
    {
        $posisiKerja = $request->input('posisi');
        $lokasi = $request->input('lokasi');
        $kategori = $request->input('kategori');

        $allResults = DB::table('lowongan_pekerjaans as lp')
            ->join('perusahaan as p', 'lp.id_perusahaan', '=', 'p.id')
            ->join('lowongan_kategori as lk', 'lp.id', '=', 'lk.lowongan_id')
            ->join('kategori_pekerjaans as kp', 'lk.kategori_id', '=', 'kp.id')
            ->join('profile_users as pu', 'lp.user_id', '=', 'pu.id')
            ->join('users as u', 'pu.user_id', '=', 'u.id')
            ->select(
                'lp.id',
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
            ->when($posisiKerja, function ($allResults, $posisi) {
                return $allResults->where('lp.judul', 'like', '%' . $posisi . '%');
            })
            ->when($lokasi, function ($allResults, $lokasi) {
                return $allResults->where('lp.lokasi', 'like', '%' . $lokasi . '%');
            })
            ->when($kategori, function ($allResults, $kategori) {
                return $allResults->whereIn('lp.id', function ($query) use ($kategori) {
                    $query->select('lp.id')
                        ->from('lowongan_pekerjaans AS lp')
                        ->join('lowongan_kategori as lk', 'lp.id', '=', 'lk.lowongan_id')
                        ->join('kategori_pekerjaans as kp', 'lk.kategori_id', '=', 'kp.id')
                        ->groupBy('lp.id')
                        ->havingRaw("GROUP_CONCAT(kp.kategori SEPARATOR ', ') LIKE ?", ['%' . $kategori . '%']);
                });
            })
            ->where('lp.status', 'dibuka')
            ->orderBy('lp.created_at', 'desc')
            ->groupBy('lp.id', 'lp.user_id', 'lp.id_perusahaan', 'p.nama', 'lp.judul', 'lp.deskripsi', 'lp.requirement', 'lp.gaji_bawah', 'gaji_atas', 'lp.tipe_pekerjaan', 'lp.jumlah_pelamar', 'lp.status', 'lp.tutup', 'lp.lokasi', 'lp.min_pengalaman', 'lp.min_pendidikan', 'p.pemilik', 'p.logo')
            ->paginate(9);

        return view('all-jobs', ['allResults' => $allResults]);
    }
}