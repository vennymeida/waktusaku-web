<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePerusahaanRequest;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'pemilik' => 'nullable|string|max:255',
            'nama' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'no_hp' => 'nullable|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,8}$/',
            'deskripsi' => 'nullable|string|max:255',
            'siu' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'pemilik.max' => 'Nama Pemilik Melebihi Batas Maksimal',
            'nama.max' => 'Nama Perusahaan Melebihi Batas Maksimal',
            'alamat.max' => 'Alamat Melebihi Batas Maksimal',
            'email.max' => 'Email Melebihi Batas Maksimal',
            'website.max' => 'Website Melebihi Batas Maksimal',
            'logo.image' => 'Logo Tidak Sesuai Format',
            'logo.mimes' => 'Logo Hanya Mendukung Format jpeg, png, jpg',
            'logo.max' => 'Ukuran Logo Terlalu Besar',
            'no_hp.regex' => 'Nomor Hp Tidak Sesuai Format',
            'deskripsi.max' => 'Deskripsi Melebihi Batas Maksimal',
            'siu.image' => 'Surat Izin Usaha Tidak Sesuai Format',
            'siu.mimes' => 'Surat Izin Usaha Hanya Mendukung Format jpeg, png, jpg',
            'siu.max' => 'Ukuran Surat Izin Usaha Terlalu Besar',
        ]);

        $fotoLama = DB::table('perusahaan')->where('user_id', Auth::user()->id)->first();
        $user = $request->user();
        $user->perusahaan()->update($request->except('_token', '_method', 'logo', 'siu', 'show_siu', 'show_logo'));
        $perusahaanUser = DB::table('perusahaan')->where('user_id', Auth::user()->id)->first();
        $perusahaanUserBaru = new \App\Models\Perusahaan();
        $perusahaanUserBaru->user_id = Auth::user()->id;
        if ($perusahaanUser === null) {
            $perusahaanUserBaru->pemilik = $request->input('pemilik');
            $perusahaanUserBaru->nama = $request->input('nama');
            $perusahaanUserBaru->alamat = $request->input('alamat');
            $perusahaanUserBaru->email = $request->input('email');
            $perusahaanUserBaru->website = $request->input('website');
            $perusahaanUserBaru->no_hp = $request->input('no_hp');
            $perusahaanUserBaru->deskripsi = $request->input('deskripsi');
            $perusahaanUserBaru->save();
        }

        if ($request->hasFile('logo')) {
            $photo = $request->file('logo');
            $validExtensions = ['jpg', 'jpeg', 'png'];

            if (!in_array(strtolower($photo->getClientOriginalExtension()), $validExtensions)) {
                return response()->json(['message' => 'The gambar must be a file of type: jpeg, png, jpg.'], 422);
            }
            $oriName = $photo->getClientOriginalName();

            $namaGambar = uniqid() . '.' . $oriName;
            Storage::putFileAs('public/database/perusahaan/', $photo, $namaGambar);

            if ($perusahaanUser === null) {
                $perusahaanUserBaru->logo = 'database/perusahaan/' . $namaGambar;
                $perusahaanUserBaru->save();
            } elseif ($request->hasFile('logo')) {
                $user->perusahaan->logo = 'database/perusahaan/' . $namaGambar;
                $user->perusahaan->save();
            } else {
                return redirect()->back()->with('error', 'Pembaharuan GAGAL');
            }
        } elseif ($user->perusahaan && $user->perusahaan->logo != 'null') {
            $user->perusahaan->logo = $fotoLama->logo;
            $user->perusahaan->save();
        } else {
            return redirect()->back()->with('error', 'Pembaharuan GAGAL');
        }
        
        if ($request->hasFile('siu')) {
            $siu = $request->file('siu');
            $validExtensions = ['jpg', 'jpeg', 'png'];

            if (!in_array(strtolower($siu->getClientOriginalExtension()), $validExtensions)) {
                return response()->json(['message' => 'The Surat Izin Usaha must be a file of type: jpeg, png, jpg.'], 422);
            }
            $oriName = $siu->getClientOriginalName();

            $namaSiu = uniqid() . '.' . $oriName;
            Storage::putFileAs('public/database/siu/', $siu, $namaSiu);

            $siuCheck = DB::table('perusahaan')->where('user_id', Auth::user()->id)->first();
            if ($siuCheck === null) {
                // $perusahaanSiuBaru = new \App\Models\Perusahaan();
                // $perusahaanSiuBaru->user_id = Auth::user()->id;
                $perusahaanUserBaru->siu = 'database/siu/' . $namaSiu;
                $perusahaanUserBaru->save();
            } elseif ($request->hasFile('siu')) {
                $user->perusahaan->siu = 'database/siu/' . $namaSiu;
                $user->perusahaan->save();
            } else {
                return redirect()->back()->with('error', 'Pembaharuan GAGAL');
            }
        } elseif ($user->perusahaan && $user->perusahaan->siu != 'null') {
            $user->perusahaan->siu = $fotoLama->siu;
            $user->perusahaan->save();
        } else {
            return redirect()->back()->with('error', 'Pembaharuan GAGAL');
        }

        return redirect()->back()->with('success', 'Perusahaan updated successfully.');
    }
}