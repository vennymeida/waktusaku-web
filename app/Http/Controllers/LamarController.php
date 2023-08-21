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

class LamarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:pelamarkerja.index')->only('index');
        $this->middleware('permission:pelamarkerja.create')->only('create', 'store');
        $this->middleware('permission:pelamarkerja.edit')->only('edit', 'update');
        $this->middleware('permission:pelamarkerja.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statuses = ['pending', 'diterima', 'ditolak'];

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
            'u.email',
            'p.nama',
            'lp.judul',
            'l.status'
        )
        ->when($request->has('search'), function ($query) use ($request) {
            $search = $request->input('search');
            return $query->where('lp.judul', 'like', '%' . $search . '%')
                ->orWhere('u.name', 'like', '%' . $search . '%')
                ->orWhere('p.nama', 'like', '%' . $search . '%');
        })
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
                'u.email',
                'p.nama',
                'lp.judul',
                'l.status',
                'p.user_id'
            )
            ->where('p.user_id', $loggedInUserId)
            ->when($request->has('search'), function ($query) use ($request) {
                $search = $request->input('search');
                return $query->where('lp.judul', 'like', '%' . $search . '%')
                    ->orWhere('u.name', 'like', '%' . $search . '%')
                    ->orWhere('p.nama', 'like', '%' . $search . '%');
            })
           ->paginate(10);

        return view('lamar.index', ['allResults' => $allResults, 'loggedInUserResults' => $loggedInUserResults, 'statuses' => $statuses, 'profilUser' => $profileUser, 'perusahaan' => $perusahaan, 'loker' => $loker]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelamarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelamarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lamar  $lamar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $lamar = Lamar::findOrFail($id); // Mencari data Lamar berdasarkan ID

    // Menghubungkan relasi yang diperlukan untuk ditampilkan di halaman detail
    $relasiLamar = $lamar->load(['pencarikerja.user', 'loker.perusahaan']);

    // Mendapatkan informasi yang diperlukan dari relasi
    $namaPengguna = $relasiLamar->pencarikerja->user->name;
    $profile = $relasiLamar->pencarikerja->user->foto;
    $resume = $relasiLamar->pencarikerja->user->resume;
    $judulPekerjaan = $relasiLamar->loker->judul;
    $namaPerusahaan = $relasiLamar->loker->perusahaan->nama;

    return view('lamar.detail', [
        'namaPengguna' => $namaPengguna,
        'profile' => $profile,
        'resume' => $resume,
        'judulPekerjaan' => $judulPekerjaan,
        'namaPerusahaan' => $namaPerusahaan,
        'lamar' => $lamar
    ]);
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lamar  $lamar
     * @return \Illuminate\Http\Response
     */
    public function edit(lamar $lamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelamarRequest  $request
     * @param  \App\Models\lamar  $lamar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelamarRequest $request, lamar $lamar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lamar  $lamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(lamar $lamar)
    {
        try {
            $lamar->delete();
            return redirect()->route('pelamarkerja.index')->with('success', 'Data Berhasil Di Hapus');
        } catch (\Exception $e) {
            return redirect()->route('pelamarkerja.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
