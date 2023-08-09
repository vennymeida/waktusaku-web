<?php

namespace App\Http\Controllers;

use App\Models\LowonganPekerjaan;
use App\Models\Perusahaan;
use App\Models\KategoriPekerjaan;
use App\Models\ProfileUser;
use App\Models\User;
use App\Http\Requests\StoreLowonganPekerjaanRequest;
use App\Http\Requests\UpdateLowonganPekerjaanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
                // 'pu.id as profileId',
                // 'u.id as userId',
                'p.nama',
                'kp.kategori',
                'lp.judul',
                'lp.deskripsi',
                'lp.requirement',
                'lp.tipe_pekerjaan',
                'lp.gaji',
                'lp.jumlah_pelamar',
                'lp.status'
            )
            ->paginate(10);
        // dd($allResults);
        $loggedInUserId = Auth::id();

        $loggedInUserResults = DB::table('lowongan_pekerjaans as lp')
            ->join('perusahaan as p', 'lp.id_perusahaan', '=', 'p.id')
            ->join('kategori_pekerjaans as kp', 'lp.id_kategori', '=', 'kp.id')
            ->join('profile_users as pu', 'lp.user_id', '=', 'pu.id')
            ->join('users as u', 'pu.user_id', '=', 'u.id')
            ->select('lp.id', 'lp.user_id', 'lp.id_perusahaan', 'lp.id_kategori', 'pu.id', 'u.id', 'p.nama', 'kp.kategori', 'lp.judul', 'lp.deskripsi', 'lp.requirement', 'lp.tipe_pekerjaan', 'lp.gaji', 'lp.jumlah_pelamar', 'lp.status')
            ->where('u.id', $loggedInUserId)
            ->paginate(10);

        return view('loker.index', ['allResults' => $allResults, 'loggedInUserResults' => $loggedInUserResults]);
    }

    public function create()
    {
        $kategoris = KategoriPekerjaan::all();

        $user = auth()->user();
        $profileUser = ProfileUser::where('user_id', $user->id)->first();
        $perusahaan = Perusahaan::where('user_id', $user->id)->first();

        // return view('loker.create', [
        //     'kategoris' => $kategoris,
        //     'user' => $user,
        //     'perusahaan' => $perusahaan,
        //     'profileUser' => $profileUser,
        // ]);

        return view('loker.create', [
            'kategoris' => $kategoris,
            'user' => $user,
            'perusahaan' => $perusahaan,
            'profileUser' => $profileUser,
        ])->with(['kategoris' => $kategoris]);
    }

    public function store(StoreLowonganPekerjaanRequest $request)
    {
        LowonganPekerjaan::create([
            'user_id' => $request->user_id,
            'id_perusahaan' => $request->id_perusahaan,
            'id_kategori' => $request->id_kategori,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'requirement' => $request->requirement,
            'tipe_pekerjaan' => $request->tipe_pekerjaan,
            'gaji' => $request->gaji,
            'jumlah_pelamar' => $request->jumlah_pelamar,
            'status' => $request->status,
        ]);

        return redirect()->route('loker.index')
            ->with('success', 'Lowongan Pekerjaan berhasil ditambahkan');

        // $validatedData = $request->validate([
        //     'user_id' => 'required',
        //     'id_perusahaan' => 'required',
        //     'id_kategori' => 'required',
        //     'judul' => 'required',
        //     'deskripsi' => 'required',
        //     'requirement' => 'required',
        //     'tipe_pekerjaan' => 'required',
        //     'gaji' => 'required',
        //     'jumlah_pelamar' => 'required',
        //     'status' => 'required',
        // ], [
        //     'id_kategori.required' => 'Kategori Pekerjaan tidak boleh kosong',
        //     'judul.required' => 'Judul tidak boleh kosong',
        // ]);

        // LowonganPekerjaan::create($validatedData);

        // return redirect()->route('loker.index')
        //     ->withErrors($validatedData)
        //     ->withInput()
        //     ->with('success', 'Lowongan Pekerjaan berhasil ditambahkan.');

        // $validator = Validator::make($request->all(), [
        //     'user_id' => 'required',
        //     'id_perusahaan' => 'required',
        //     'id_kategori' => 'required',
        //     'judul' => 'required',
        //     'deskripsi' => 'required',
        //     'requirement' => 'required',
        //     'tipe_pekerjaan' => 'required',
        //     'gaji' => 'required',
        //     'jumlah_pelamar' => 'required',
        //     'status' => 'required',
        // ], [
        //     'id_kategori.required' => 'Kategori Pekerjaan tidak boleh kosong',
        //     'judul.required' => 'Judul tidak boleh kosong',
        // ]);

        // if ($validator->fails()) {
        //     return view('loker.create', [
        //         'errors' => $validator->errors(),
        //     ]);
        // }

        // LowonganPekerjaan::create($request->all());

        // return redirect()->route('loker.index')
        //     ->withErrors($validator)
        //     ->withInput()
        //     ->with('success', 'Lowongan Pekerjaan berhasil ditambahkan.');
    }

    public function show(LowonganPekerjaan $lowonganPekerjaan)
    {
    }

    public function edit($id)
    {
        $loker = DB::table('lowongan_pekerjaans as lp')
            ->join('perusahaan as p', 'lp.id_perusahaan', '=', 'p.id')
            ->join('kategori_pekerjaans as kp', 'lp.id_kategori', '=', 'kp.id')
            ->select('lp.id', 'p.nama', 'kp.kategori', 'lp.judul', 'lp.deskripsi', 'lp.requirement', 'lp.tipe_pekerjaan', 'lp.gaji', 'lp.jumlah_pelamar', 'lp.status')
            ->where('lp.id', $id)
            ->first();

        return view('loker.edit', ['loker' => $loker]);
    }

    public function update(Request $request, $id)
    {
        DB::table('lowongan_pekerjaans')
            ->where('id', $id)
            ->update([
                'status' => $request->input('status')
            ]);

        return redirect()->route('loker.index')->with('success', 'Data lowongan pekerjaan berhasil diperbarui.');
    }


    public function destroy(LowonganPekerjaan $loker)
{
    try {
        $loker->delete();
        return redirect()->route('loker.index')->with('success', 'Data Lowongan Berhasil Di Hapus');
    } catch (\Exception $e) {
        return redirect()->route('loker.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
    }
}

}
