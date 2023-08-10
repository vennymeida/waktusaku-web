<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePerusahaanRequest;
use App\Models\Perusahaan;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
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
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
            'email' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'no_hp' => 'nullable|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,8}$/',
            'deskripsi' => 'nullable|string|max:255',
            'siu' => 'nullable|file|mimes:pdf|max:2048',
        ], [
            'pemilik.max' => 'Nama Pemilik Melebihi Batas Maksimal',
            'nama.max' => 'Nama Perusahaan Melebihi Batas Maksimal',
            'alamat.max' => 'Alamat Melebihi Batas Maksimal',
            'kecamatan_id.exists' => 'Kecamatan tidak valid.',
            'kelurahan_id.exists' => 'Kelurahan tidak valid.',
            'email.max' => 'Email Melebihi Batas Maksimal',
            'website.max' => 'Website Melebihi Batas Maksimal',
            'logo.image' => 'Logo Tidak Sesuai Format',
            'logo.mimes' => 'Logo Hanya Mendukung Format jpeg, png, jpg',
            'logo.max' => 'Ukuran Logo Terlalu Besar',
            'no_hp.regex' => 'Nomor Hp Tidak Sesuai Format',
            'deskripsi.max' => 'Deskripsi Melebihi Batas Maksimal',
            'siu.mimes' => 'Surat Izin Usaha Hanya Mendukung Format pdf',
            'siu.max' => 'Ukuran Surat Izin Usaha Terlalu Besar',
        ]);

        $fotoLama = DB::table('perusahaan')->where('user_id', Auth::user()->id)->first();
        $user = $request->user();
        $user->perusahaan()->update($request->except('_token', '_method', 'logo', 'siu', 'show_siu', 'show_logo'));
        $perusahaanUser = DB::table('perusahaan')->where('user_id', Auth::user()->id)->first();
        $perusahaanUserBaru = new \App\Models\Perusahaan();
        $perusahaanUserBaru->user_id = Auth::user()->id;
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        if ($perusahaanUser === null) {
            $perusahaanUserBaru->pemilik = $request->input('pemilik');
            $perusahaanUserBaru->nama = $request->input('nama');
            $perusahaanUserBaru->alamat = $request->input('alamat');
            $perusahaanUserBaru->email = $request->input('email');
            $perusahaanUserBaru->website = $request->input('website');
            $perusahaanUserBaru->no_hp = $request->input('no_hp');
            $perusahaanUserBaru->deskripsi = $request->input('deskripsi');
            $perusahaanUserBaru->kecamatan_id = $request->input('kecamatan_id');
            $perusahaanUserBaru->kelurahan_id = $request->input('kelurahan_id');
            $perusahaanUserBaru->save();
        }

        if ($request->hasFile('logo')) {
            $photo = $request->file('logo');
            $oriName = $photo->getClientOriginalExtension();

            $namaGambar = uniqid() . '.' . $oriName;
            Storage::putFileAs('public/database/perusahaan/', $photo, $namaGambar);

            if ($user->perusahaan === null) {
                $user->perusahaan = new \App\Models\Perusahaan();
            }

            if ($user->perusahaan->logo) {
                Storage::delete('public/' . $user->perusahaan->logo);
            }

            $user->perusahaan->logo = 'database/perusahaan/' . $namaGambar;
            $user->perusahaan->save();
        } else {
            if ($user->perusahaan && $user->perusahaan->logo !== null) {
                $user->perusahaan->logo = $user->perusahaan->logo;
            } else {
                if ($user->perusahaan === null) {
                    $user->perusahaan->logo = asset('assets/img/avatar/avatar-1.png');
                }
            }
            $user->perusahaan->save();
        }

        if ($request->hasFile('siu')) {
            $siu = $request->file('siu');
            $oriName = $siu->getClientOriginalExtension();

            $namaSiu = uniqid() . '.' . $oriName;
            Storage::putFileAs('public/database/siu/', $siu, $namaSiu);

            if ($user->perusahaan === null) {
                $user->perusahaan = new \App\Models\Perusahaan();
            }

            if ($user->perusahaan->siu) {
                Storage::delete('public/' . $user->perusahaan->siu);
            }

            $user->perusahaan->siu = 'database/siu/' . $namaSiu;
            $user->perusahaan->save();
        } else {
            if ($user->perusahaan && $user->perusahaan->siu !== null) {
                $user->perusahaan->siu = $user->perusahaan->siu;
            } else {
                if ($user->perusahaan === null) {
                    $user->perusahaan->siu = asset('assets/img/avatar/avatar-1.png');
                }
            }
            $user->perusahaan->save();
        }

        return redirect()->back()->with('success', 'Perusahaan updated successfully.');
    }
}
