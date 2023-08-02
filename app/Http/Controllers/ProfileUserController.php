<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileUserRequest;
use App\Models\ProfileUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileUserController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'alamat' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|in:L,P',
            'no_hp' => 'nullable|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,8}$/',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'resume' => 'nullable|file|mimes:pdf|max:2048',
        ], [
            'alamat.max' => 'Alamat Melebihi Batas Maksimal',
            'jenis_kelamin.in' => 'Jenis Kelamin Hanya Pada Pilihan L/P',
            'no_hp.regex' => 'Nomor Hp Tidak Sesuai Format',
            'foto.image' => 'Foto Tidak Sesuai Format',
            'foto.mimes' => 'Foto Hanya Mendukung Format jpeg, png, jpg',
            'foto.max' => 'Ukuran Foto Terlalu Besar',
            'resume.mimes' => 'Resume Hanya Mendukung Format pdf',
            'resume.max' => 'Ukuran Resume Terlalu Besar',
        ]);

        $fotoLama = DB::table('profile_users')->where('user_id', Auth::user()->id)->first();
        $user = $request->user();
        $user->profile()->update($request->except('_token', '_method', 'foto', 'resume', 'show_resume', 'show_foto'));
        $profileUser = DB::table('profile_users')->where('user_id', Auth::user()->id)->first();
        $profileUserBaru = new \App\Models\ProfileUser();
        $profileUserBaru->user_id = Auth::user()->id;
        if ($profileUser === null) {
            $profileUserBaru->alamat = $request->input('alamat');
            $profileUserBaru->jenis_kelamin = $request->input('jenis_kelamin');
            $profileUserBaru->no_hp = $request->input('no_hp');
            $profileUserBaru->save();
        }

        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $validExtensions = ['jpg', 'jpeg', 'png'];

            if (!in_array(strtolower($photo->getClientOriginalExtension()), $validExtensions)) {
                return response()->json(['message' => 'The gambar must be a file of type: jpeg, png, jpg.'], 422);
            }
            $oriName = $photo->getClientOriginalName();

            $namaGambar = uniqid() . '.' . $oriName;
            Storage::putFileAs('public/database/profile/', $photo, $namaGambar);

            if ($profileUser === null) {
                $profileUserBaru->foto = 'database/profile/' . $namaGambar;
                $profileUserBaru->save();
            } elseif ($request->hasFile('foto')) {
                // Hapus foto lama dari direktori
                if ($user->profile && $user->profile->foto) {
                    Storage::delete('public/' . $user->profile->foto);
                }
                $user->profile->foto = 'database/profile/' . $namaGambar;
                $user->profile->save();
            } else {
                return redirect()->back()->with('error', 'Pembaharuan GAGAL');
            }
        } elseif ($user->profile && $user->profile->foto != 'null') {
            $user->profile->foto = $fotoLama->foto;
            $user->profile->save();
        } else {
            return redirect()->back()->with('error', 'Pembaharuan GAGAL');
        }
        
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $validExtensions = ['pdf'];

            if (!in_array(strtolower($resume->getClientOriginalExtension()), $validExtensions)) {
                return response()->json(['message' => 'The Resume must be a file of type: pdf.'], 422);
            }
            $oriName = $resume->getClientOriginalName();

            $namaResume = uniqid() . '.' . $oriName;
            Storage::putFileAs('public/database/resume/', $resume, $namaResume);

            $resumeCheck = DB::table('profile_users')->where('user_id', Auth::user()->id)->first();
            if ($resumeCheck === null) {
                $profileUserBaru->resume = 'database/resume/' . $namaResume;
                $profileUserBaru->save();
            } elseif ($request->hasFile('resume')) {
                // Hapus resume lama dari direktori
                if ($user->profile && $user->profile->resume) {
                    Storage::delete('public/' . $user->profile->resume);
                }
                $user->profile->resume = 'database/resume/' . $namaResume;
                $user->profile->save();
            } else {
                return redirect()->back()->with('error', 'Pembaharuan GAGAL');
            }
        } elseif ($user->profile && $user->profile->resume != 'null') {
            $user->profile->resume = $fotoLama->resume;
            $user->profile->save();
        } else {
            return redirect()->back()->with('error', 'Pembaharuan GAGAL');
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}