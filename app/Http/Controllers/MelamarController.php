<?php

namespace App\Http\Controllers;

use App\Models\Lamar;
use Illuminate\Http\Request;

class MelamarController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'resume' => 'mimes:pdf|max:2048' // mimes untuk format dan max untuk ukuran (dalam KB)
        ]);
        
        $data = $request->all();

        // Proses file resume jika ada yang di-upload
        if ($request->hasFile('resume')) {
            $resumeFile = $request->file('resume');
            $resumePath = $resumeFile->store('resumes', 'public');
            $data['resume'] = $resumePath;
        } else {
            // Jika tidak ada file yang di-upload, kita tetap menyertakan resume saat ini 
            // dari profile_user ke tabel lamars tanpa mengubahnya di profile_user
            $data['resume'] = auth()->user()->profile->resume;
        }

        // Menyertakan id_loker dan id_pencari_kerja
        $data['id_loker'] = $request->input('loker_id');
        $data['id_pencari_kerja'] = auth()->user()->profile->id; // mengambil ID dari profile user

        // Simpan ke database
        Lamar::create($data);

        return back()->with('success', 'Pekerjaan berhasil dilamar.');
    }
}
