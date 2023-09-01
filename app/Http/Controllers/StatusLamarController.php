<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Auth;
use App\Models\Lamar;
use Illuminate\Database\Eloquent\Builder;

class StatusLamarController extends Controller
{
    // Pastikan pengguna sudah masuk sebelum mengakses metode di controller ini
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();

        // Cek apakah user memiliki profile
        if (!$user->profile) {
            return redirect()->route('profile.edit')->with('error', 'Silahkan lengkapi profil Anda terlebih dahulu.');
        }

        $query = Lamar::with('loker.perusahaan')
            ->where('id_pencari_kerja', $user->profile->id);

        // Filter by posisi
        if ($request->has('posisi') && $request->posisi != '') {
            $query->whereHas('loker', function (Builder $q) use ($request) {
                $q->where('judul', 'like', '%' . $request->posisi . '%');
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Filter by lokasi
        if ($request->has('lokasi') && $request->lokasi != '') {
            $query->whereHas('loker.perusahaan.kecamatan', function (Builder $q) use ($request) {
                $q->where('kecamatan', 'like', '%' . $request->lokasi . '%');
            });
        }

        // Fetch all kecamatan for the select box
        $kecamatan = Kecamatan::all();

        $lamaran = $query->orderByDesc('created_at')->paginate(3);

        if ($lamaran->isEmpty()) {
            return view('melamar.status', ['lamaran' => $lamaran, 'message' => 'Belum ada loker tersedia.', 'kecamatan' => $kecamatan]);
        }

        return view('melamar.status', ['lamaran' => $lamaran, 'kecamatan' => $kecamatan]);
    }
}
