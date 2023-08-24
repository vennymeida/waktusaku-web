<?php

namespace App\Http\Controllers;

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
        $query = Lamar::with('loker.perusahaan')
            ->where('id_pencari_kerja', Auth::user()->profile->id);

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
            $query->whereHas('loker', function (Builder $q) use ($request) {
                $q->where('lokasi', 'like', '%' . $request->lokasi . '%');
            });
        }

        $lamaran = $query->get();

        return view('melamar.status', ['lamaran' => $lamaran]);
    }
}