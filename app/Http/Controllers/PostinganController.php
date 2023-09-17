<?php

namespace App\Http\Controllers;

use App\Models\Postingan;
use App\Http\Requests\StorePostinganRequest;
use App\Http\Requests\UpdatePostinganRequest;
use Illuminate\Support\Facades\Auth;

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
            $extension = $media->getClientOriginalExtension();

            // Cek apakah jenis file adalah gambar
            if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                $filename = time() . '_' . $media->getClientOriginalName();
                $path = $media->storeAs('media', $filename, 'public');
                $postingan->media = $path;
            }
            // Cek apakah jenis file adalah video
            elseif (in_array($extension, ['mp4', 'mov', 'avi'])) {
                $filename = time() . '_' . $media->getClientOriginalName();
                $path = $media->storeAs('media', $filename, 'public');
                $postingan->media = $path;
            } else {
                // Jenis file tidak didukung
                return response()->json(['message' => 'Jenis file tidak didukung. Hanya gambar (jpg, jpeg, png) atau video (mp4, mov, avi) yang diizinkan.'], 400);
            }
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
        //
    }

    public function update(UpdatePostinganRequest $request, Postingan $postingan)
    {
        //
    }

    public function destroy(Postingan $postingan)
    {
        //
    }
}
