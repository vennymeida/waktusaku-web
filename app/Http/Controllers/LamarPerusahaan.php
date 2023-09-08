<?php

namespace App\Http\Controllers;

use App\Models\lamar;
use App\Models\LowonganPekerjaan;
use App\Models\Perusahaan;
use App\Models\KategoriPekerjaan;
use App\Models\ProfileUser;
use App\Models\User;
use App\Http\Requests\StorelamarRequest;
use App\Http\Requests\UpdatelamarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LamarPerusahaan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:lamarperusahaan.index')->only('index');
        $this->middleware('permission:lamarperusahaan.edit')->only('edit', 'update');
        $this->middleware('permission:lamarperusahaan.show')->only('show');
    }

    public function index(Request $request)
    {
        $statuses = ['Pending', 'Diterima', 'Ditolak'];
        $selectedStatus = $request->input('status');

        $allResults = DB::table('lamars as l')
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
                'pu.alamat',
                'u.email',
                'p.nama',
                'lp.judul',
                'l.status',
                'l.created_at'
            )
            ->when($request->has('search'), function ($query) use ($request) {
                $search = $request->input('search');
                return $query->where('lp.judul', 'like', '%' . $search . '%')
                    ->orWhere('u.name', 'like', '%' . $search . '%')
                    ->orWhere('p.nama', 'like', '%' . $search . '%');
            })
            ->when($selectedStatus, function ($query, $selectedStatus) {
                return $query->where('l.status', $selectedStatus);

            })
            ->orderBy('l.created_at', 'desc')
            ->paginate(10);

        $loggedInUserId = Auth::id();
        $user = auth()->user();

        $profileUser = ProfileUser::where('user_id', $user->id)->first();
        $perusahaan = Perusahaan::where('user_id', $user->id)->first();
        $loker = LowonganPekerjaan::where('user_id', $user->id)->first();

        $loggedInUserResults = DB::table('lamars as l')
            ->join('lowongan_pekerjaans as lp', 'l.id_loker', '=', 'lp.id')
            ->join('perusahaan as p', 'lp.id_perusahaan', '=', 'p.id')
            ->join('profile_users as pu', 'l.id_pencari_kerja', '=', 'pu.id')
            ->join('users as u', 'pu.user_id', '=', 'u.id')
            ->select(
                'l.id',
                'u.name',
                'pu.no_hp',
                'pu.foto',
                'pu.resume',
                'pu.alamat',
                'pu.harapan_gaji',
                'u.email',
                'p.nama',
                'lp.judul',
                'l.status',
                'p.user_id',
                'l.created_at'
            )
            ->where('p.user_id', $loggedInUserId)
            ->when($request->has('search'), function ($query) use ($request) {
                $search = $request->input('search');
                return $query->where('lp.judul', 'like', '%' . $search . '%');
            })
            ->when($selectedStatus, function ($query, $selectedStatus) {
                return $query->where('l.status', $selectedStatus);

            })
            ->orderBy('l.created_at', 'desc')
            ->paginate(4);

        if (Auth::user()->hasRole('Perusahaan')) {
            if ($profileUser == null && $perusahaan == null) {
                return redirect()->route('profile.edit');
            } else {
                return view('lamar-perusahaan.index', ['allResults' => $allResults, 'loggedInUserResults' => $loggedInUserResults, 'statuses' => $statuses, 'selectedStatus' => $selectedStatus, 'profilUser' => $profileUser, 'perusahaan' => $perusahaan, 'loker' => $loker]);
            }
        } else {
            return view('lamar-perusahaan.index', ['allResults' => $allResults, 'loggedInUserResults' => $loggedInUserResults, 'statuses' => $statuses, 'selectedStatus' => $selectedStatus, 'profilUser' => $profileUser, 'perusahaan' => $perusahaan, 'loker' => $loker]);
        }

    }

    public function create()
    {
        //
    }


    public function store(StorelamarRequest $request)
    {
        //
    }

    public function show($id)
    {
        $lamar = Lamar::findOrFail($id); // Mencari data Lamar berdasarkan ID
        $profileUser = $lamar->pencarikerja;

        // Menghubungkan relasi yang diperlukan untuk ditampilkan di halaman detail
        $relasiLamar = $lamar->load(['pencarikerja.user', 'loker.perusahaan',]);

        // Mendapatkan informasi yang diperlukan dari relasi
        $namaPengguna = $relasiLamar->pencarikerja->user->name;
        $email = $relasiLamar->pencarikerja->user->email;
        $resume = $relasiLamar->pencarikerja->user->resume;
        $pendidikan = $relasiLamar->pencarikerja->user->pendidikan;
        $pengalaman = $relasiLamar->pencarikerja->user->pengalaman;
        $pelatihan = $relasiLamar->pencarikerja->user->pelatihan;
        $keahlian = $relasiLamar->pencarikerja->user->profileKeahlians;
        $judulPekerjaan = $relasiLamar->loker->judul;
        $namaPerusahaan = $relasiLamar->loker->perusahaan->nama;

        return view('lamar-perusahaan.detail', [
            'namaPengguna' => $namaPengguna,
            'email' => $email,
            'resume' => $resume,
            'judulPekerjaan' => $judulPekerjaan,
            'namaPerusahaan' => $namaPerusahaan,
            'lamar' => $lamar,
            'profileUser' => $profileUser,
            'pendidikan' => $pendidikan,
            'pengalaman' => $pengalaman,
            'pelatihan' => $pelatihan,
            'keahlian' => $keahlian,

        ]);
    }



    public function edit($id)
    {
        $lamar = Lamar::findOrFail($id); // Mencari data Lamar berdasarkan ID
        return view('lamar.detail', compact('lamar'));
    }

    public function update(Request $request, $id)
    {
        $lamar = Lamar::findOrFail($id);

        $status = $request->input('status');

        $lamar->status = $status;
        $lamar->save();

        return redirect()->route('lamarperusahaan.index')->with('success', 'success-status');
    }


    public function destroy($id)
    {
        //
    }
}
