<?php

namespace App\Http\Controllers;

use App\Models\LowonganPekerjaan;
use App\Models\Perusahaan;
use App\Models\KategoriPekerjaan;
use App\Models\ProfileUser;
use App\Http\Requests\StoreLowonganPekerjaanRequest;
use App\Http\Requests\UpdateLowonganPekerjaanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LowonganPekerjaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:loker.index')->only('index');
        $this->middleware('permission:loker.create')->only('create', 'store');
        $this->middleware('permission:loker.edit')->only('edit', 'update');
        $this->middleware('permission:loker.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $results = DB::table('lowongan_pekerjaans as lp')
        ->join('perusahaan as p', 'lp.id_perusahaan', '=', 'p.id')
        ->join('kategori_pekerjaans as kp', 'lp.id_kategori', '=', 'kp.id')
        ->select('lp.id', 'p.nama', 'kp.kategori', 'lp.tipe_pekerjaan', 'lp.gaji', 'lp.status')
        ->paginate(10);

    return view('loker.index', ['results' => $results]);
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLowonganPekerjaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLowonganPekerjaanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LowonganPekerjaan  $lowonganPekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show(LowonganPekerjaan $lowonganPekerjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LowonganPekerjaan  $lowonganPekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loker = DB::table('lowongan_pekerjaans as lp')
            ->join('perusahaan as p', 'lp.id_perusahaan', '=', 'p.id')
            ->join('kategori_pekerjaans as kp', 'lp.id_kategori', '=', 'kp.id')
            ->select('lp.id', 'p.nama', 'kp.kategori', 'lp.tipe_pekerjaan', 'lp.gaji', 'lp.status')
            ->where('lp.id', $id)
            ->first();

        return view('loker.edit', ['loker' => $loker]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLowonganPekerjaanRequest  $request
     * @param  \App\Models\LowonganPekerjaan  $lowonganPekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // Lakukan validasi data input jika diperlukan

    DB::table('lowongan_pekerjaans')
        ->where('id', $id)
        ->update([
            'status' => $request->input('status')
        ]);

    return redirect()->route('loker.index')->with('success', 'Data lowongan pekerjaan berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LowonganPekerjaan  $lowonganPekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LowonganPekerjaan $lowonganPekerjaan)
    {
        $lowonganPekerjaan->delete();
        return redirect()->route('loker.index')->with('success', 'Data Lowongan Berhasil Di Hapus');
    }
}
