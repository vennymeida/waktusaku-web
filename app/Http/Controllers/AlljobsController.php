<?php

namespace App\Http\Controllers;

use App\Models\lamar;
use App\Models\LowonganPekerjaan;
use App\Models\Perusahaan;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

    public function show(LowonganPekerjaan $loker)
    {
        $perusahaan = Perusahaan::all();
        $kategori = $loker->kategori()->pluck('kategori')->implode(', ');
        $keahlian = $loker->keahlian()->pluck('keahlian');
        $loker->requirement = Str::replace(['<ol>', '</ol>', '<li>', '</li>', '<br>', '<p>', '</p>'], ['', '', '', "\n", '', '', ''], $loker->requirement);

        $updatedDiff = $loker->updated_at->diffInSeconds(now());

        if ($updatedDiff < 60) {
            $updatedAgo = $updatedDiff . ' detik yang lalu';
        } elseif ($updatedDiff < 3600) {
            $updatedAgo = floor($updatedDiff / 60) . ' menit yang lalu';
        } elseif ($updatedDiff < 86400) {
            $updatedAgo = floor($updatedDiff / 3600) . ' jam yang lalu';
        } else {
            $updatedAgo = $loker->updated_at->diffInDays(now()) . ' hari yang lalu';
        }

        $hasApplied = $loker->hasApplied;

        if (Auth::check()) {
            return view('showAlljobs', ['loker' => $loker, 'perusahaan' => $perusahaan, 'kategori' => $kategori, 'keahlian' => $keahlian, 'hasApplied' => $hasApplied, 'updatedAgo' => $updatedAgo]);
        } else {
            return view('auth.login');
        }
    }
}