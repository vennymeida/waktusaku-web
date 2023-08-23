<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Lamar;

class StatusLamarController extends Controller
{
    // Pastikan pengguna sudah masuk sebelum mengakses metode di controller ini
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Ambil semua lamaran yang dilakukan oleh pengguna yang sedang masuk
        // Diasumsikan ada relasi antara Lamar dan User melalui profile_id pengguna
        $lamaran = Lamar::with('loker.perusahaan')
                ->where('id_pencari_kerja', Auth::user()->profile->id)
                ->get();

        // Kirim lamaran ke tampilan
        return view('melamar.status', ['lamaran' => $lamaran]);
    }
}

