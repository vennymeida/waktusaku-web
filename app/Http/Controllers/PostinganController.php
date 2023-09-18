<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Postingan;
use App\Http\Requests\StorePostinganRequest;
use App\Http\Requests\UpdatePostinganRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostinganController extends Controller
{

    public function index()
    {
        $userId = Auth::user()->id;
        $postingan = Postingan::where('user_id', $userId)->get();
        return view('profile.postingan', compact('postingan'));
    }

    public function create()
    {
        return view('profile.index');
    }

    public function store(StorePostinganRequest $request)
    {
        $userId = Auth::user()->id;

        $postingan = new Postingan($request->validated());
        $postingan->user_id = $userId;

        if ($request->hasFile('media')) {
            $media = $request->file('media');
            $filename = time() . '_' . $media->getClientOriginalName();
            $path = $media->storeAs('media', $filename, 'public');
            $postingan->media = $path;
        }

        $postingan->save();

        return redirect()->route('postingan.index')->with('success', 'Postingan berhasil ditambahkan.');
    }

    public function show(Postingan $postingan)
    {
        //
    }

    public function edit(Postingan $postingan)
    {
        if ($postingan->user_id !== Auth::id()) {
            return redirect()->route('profile.index')->with('error', 'Anda tidak memiliki izin untuk mengedit postingan ini.');
        }
        return response()->json($postingan);
    }


    public function update(UpdatePostinganRequest $request, Postingan $postingan)
    {
        $userId = Auth::user()->id;

        // Verifikasi apakah pengguna yang ingin mengedit postingan adalah pemilik postingan
        if ($postingan->user_id !== $userId) {
            return redirect()->route('postingan.index')->with('error', 'Anda tidak memiliki izin untuk mengedit postingan ini.');
        }

        // Validasi input dari form
        $validatedData = $request->validated();

        // Update konteks postingan
        $postingan->konteks = $validatedData['konteks'];

        // Update media jika ada file yang diunggah
        if ($request->hasFile('media')) {
            $media = $request->file('media');
            $filename = time() . '_' . $media->getClientOriginalName();
            $path = $media->storeAs('media', $filename, 'public');
            $postingan->media = $path;
        }

        $postingan->save();

        return redirect()->route('postingan.index')->with('success', 'Postingan berhasil diperbarui.');
    }


    public function destroy(Postingan $postingan)
    {
        $postingan->delete();

        return redirect()->route('profile.index')->with('success', 'Postingan berhasil dihapus.');
    }
}
