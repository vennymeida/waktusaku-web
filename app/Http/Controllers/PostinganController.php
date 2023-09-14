<?php

namespace App\Http\Controllers;

use App\Models\Postingan;
use App\Http\Requests\StorePostinganRequest;
use App\Http\Requests\UpdatePostinganRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostinganController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::user()->id;
        $postingan = Postingan::where('user_id', $userId)->get();
        $showAllPosts = false; // Secara default, hanya menampilkan 3 postingan terbaru

        if ($request->has('show_all')) {
            $showAllPosts = true; // Jika show_all diaktifkan, maka tampilkan semua postingan
        }

        $query = Postingan::where('user_id', $userId);

        if (!$showAllPosts) {
            $query->latest(); // Ambil postingan terbaru
        }

        $postingan = $query->get();

        return view('profile.index', compact('postingan', 'showAllPosts'));
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

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time() . '_' . $gambar->getClientOriginalName();
            $path = $gambar->storeAs('gambar', $filename, 'public');
            $postingan->gambar = $path;
        }

        $postingan->save();

        return redirect()->route('postingan.index')->with('success', 'Postingan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $postingan = Postingan::findOrFail($id);
        return response()->json($postingan);
    }

    public function update(UpdatePostinganRequest $request, Postingan $postingan)
    {
        try {
            $postingan->update($request->all());

            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $filename = time() . '_' . $gambar->getClientOriginalName();
                $path = $gambar->storeAs('gambar', $filename, 'public');
                $postingan->gambar = $path;
            }

            return response()->json(['success' => true, 'message' => 'Postingan berhasil diperbarui.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function destroy(Postingan $postingan)
    {
        $postingan->delete();
        return redirect()->route('postingan.delete')->with('success', 'Postingan berhasil dihapus.');
    }
}
