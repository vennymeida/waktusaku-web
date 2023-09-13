<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileUserRequest;
use App\Models\Keahlian;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\Perusahaan;
use App\Models\ProfileUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileUserController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $pendidikans = Pendidikan::select('pendidikan.*')
            ->where('user_id', $userId)
            ->get();
        $pengalamans = Pengalaman::select('pengalaman.*')
            ->where('user_id', $userId)
            ->get();
        return view('profile.index')->with([
            'pendidikans' => $pendidikans,
            'pengalamans' => $pengalamans,
        ]);
    }
    public function profile(ProfileUser $profileUser)
    {
        $userId = Auth::id();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        $keahlians = Keahlian::all();
        $perusahaans = Perusahaan::where('user_id', $userId)->first();
        $pendidikans = Pendidikan::select('pendidikan.*')
            ->where('user_id', $userId)
            ->get();
        $pengalamans = Pengalaman::select('pengalaman.*')
            ->where('user_id', $userId)
            ->get();
        $selectedKeahlians = auth()
            ->user()
            ->keahlians->pluck('id')
            ->toArray();

        return view('profile.edit')->with([
            'kecamatans' => $kecamatans,
            'kelurahans' => $kelurahans,
            'profileUser' => $profileUser,
            'perusahaans' => $perusahaans,
            'pendidikans' => $pendidikans,
            'pengalamans' => $pengalamans,
            'keahlians' => $keahlians,
            'selectedKeahlians' => $selectedKeahlians,
        ]);
    }

    public function loadFilter(Request $request)
    {
        $kelurahans = Kelurahan::all()->where('id_kecamatan', $request->id);
        return response()->json(['kelurahans' => $kelurahans]);
    }

    public function getKelurahans(Request $request)
    {
        $kelurahans = Kelurahan::all()->where('id_kecamatan', $request->kecamatan_id);

        return response()->json(['kelurahans' => $kelurahans]);
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'alamat' => 'nullable|string|max:255',
                'jenis_kelamin' => 'nullable|in:L,P',
                'no_hp' => ['nullable', 'regex:/^08[0-9]{8,13}$/'],
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'resume' => 'nullable|file|mimes:pdf|max:2048',
                'tgl_lahir' => 'nullable|date:d/m/Y',
                'ringkasan' => 'nullable|string|max:500',
                'harapan_gaji' => 'nullable|string',
            ],
            [
                'alamat.max' => 'Alamat Melebihi Batas Maksimal',
                'jenis_kelamin.in' => 'Jenis Kelamin Hanya Pada Pilihan L/P',
                'no_hp' => ['regex: Nomor Hp Tidak Sesuai Format'],
                'no_hp.regex' => 'Nomor Hp Tidak Sesuai Format',
                'foto.image' => 'Foto Tidak Sesuai Format',
                'foto.mimes' => 'Foto Hanya Mendukung Format jpeg, png, jpg',
                'foto.max' => 'Ukuran Foto Terlalu Besar',
                'resume.mimes' => 'Resume Hanya Mendukung Format pdf',
                'resume.max' => 'Ukuran Resume Terlalu Besar',
                'tgl_lahir.date' => 'Tanggal Lahir Harus Sesuai Format',
                'ringkasan.max' => 'Ringkasan Melebihi Batas Maksimal',
                'harapan_gaji.string' => 'Harapan Gaji Harus Angka',
            ],
        );

        $fotoLama = DB::table('profile_users')
            ->where('user_id', Auth::user()->id)
            ->first();
        $user = $request->user();
        $user->profile()->update($request->except('_token', '_method', 'foto', 'resume', 'show_resume', 'show_foto'));
        $profileUser = DB::table('profile_users')
            ->where('user_id', Auth::user()->id)
            ->first();
        $profileUserBaru = new \App\Models\ProfileUser();
        $profileUserBaru->user_id = Auth::user()->id;
        if ($profileUser === null) {
            $profileUserBaru->alamat = $request->input('alamat');
            $profileUserBaru->jenis_kelamin = $request->input('jenis_kelamin');
            $profileUserBaru->no_hp = $request->input('no_hp');
            $profileUserBaru->tgl_lahir = $request->input('tgl_lahir');
            $profileUserBaru->ringkasan = $request->input('ringkasan');
            $profileUserBaru->harapan_gaji = $request->input('harapan_gaji');
            $profileUserBaru->save();
        }

        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $oriName = $photo->getClientOriginalExtension();

            $namaGambar = uniqid() . '.' . $oriName;
            Storage::putFileAs('public/database/profile/', $photo, $namaGambar);

            if ($user->profile === null) {
                $user->profile = new \App\Models\ProfileUser();
            }

            if ($user->profile->foto) {
                Storage::delete('public/' . $user->profile->foto);
            }

            $user->profile->foto = 'database/profile/' . $namaGambar;
            $user->profile->save();
        } else {
            if ($user->profile && $user->profile->foto !== null) {
                $user->profile->foto = $user->profile->foto;
            } else {
                if ($user->profile === null) {
                    $user->profile->foto = asset('assets/img/avatar/avatar-1.png');
                }
            }
            $user->profile->save();
        }

        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $oriName = $resume->getClientOriginalExtension();

            $namaResume = uniqid() . '.' . $oriName;
            Storage::putFileAs('public/database/resume/', $resume, $namaResume);

            if ($user->profile === null) {
                $user->profile = new \App\Models\ProfileUser();
            }

            if ($user->profile->resume) {
                Storage::delete('public/' . $user->profile->resume);
            }

            $user->profile->resume = 'database/resume/' . $namaResume;
            $user->profile->save();
        } else {
            if ($user->profile && $user->profile->resume !== null) {
                $user->profile->resume = $user->profile->resume;
            } else {
                if ($user->profile === null) {
                    $user->profile->resume = asset('assets/img/avatar/avatar-1.png');
                }
            }
            $user->profile->save();
        }

        return redirect()
            ->back()
            ->with('success', 'Profile updated successfully.');
    }
}
