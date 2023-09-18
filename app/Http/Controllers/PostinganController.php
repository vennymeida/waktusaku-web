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

    public function edit($id)
    {
        $postingan = Postingan::findOrFail($id);
        return response()->json($postingan);
    }

    public function update(UpdatePostinganRequest $request, Postingan $postingan)
    {
        try {
            $postingan->update($request->all());
            return response()->json(['success' => true, 'message' => 'Postingan berhasil diperbarui.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function destroy(Postingan $postingan)
    {
        //
    }
}
