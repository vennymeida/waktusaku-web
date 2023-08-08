<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPelamar = DB::table('users')->where('role', 'pelamar')->count();

        return view('home', ['jumlahPelamar' => $jumlahPelamar]);
    }
}
