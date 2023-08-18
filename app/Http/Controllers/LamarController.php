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
        $allResults = DB::table('lamars as l')
        ->join('lowongan_pekerjaans as lp', 'l.id_loker', '=', 'lp.id')
        ->join('perusahaan as p', 'lp.id_perusahaan', '=', 'p.id')
        ->join('profile_users as pu', 'l.id_pencari_kerja', '=', 'pu.id')
        ->join('users as u', 'pu.user_id', '=', 'u.id')
        ->select(
            'l.id',
            'u.name',
            'pu.no_hp',
            'u.email',
            'p.nama',
            'lp.judul',
            'l.status'
        )
        ->paginate(10);

        return view('lamar.index', ['allResults' => $allResults]);
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
    public function show(lamar $lamar)
    {
        $profileUser = ProfileUser::all();
        $perusahaan = Perusahaan::all();
        $relasiLamar = $lamar->load('user.user');
        $name = $relasiLamar->user->user->name;
        $loker = LowonganPekerjaan::all();
        return view('lamar.detail', ['name' => $name, 'lamar' => $lamar, 'loker'=> $loker, 'profilUser' => $profileUser, 'perusahaan' => $perusahaan]);
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
