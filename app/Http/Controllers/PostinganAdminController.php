<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostinganRequest;
use App\Http\Requests\UpdatePostinganRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Postingan;

class PostinganAdminController extends Controller
{
    public function index()
    {
        $postingans = DB::table('postingans')
            ->select('id', 'konteks', 'gambar')
            ->paginate(10);
        return view('postingan.index', compact('postingans'));
    }

    public function create()
    {
        return view('contact');
    }

    public function store(StorePostinganRequest $request)
    {
        Postingan::create([
            'konteks' => $request->konteks,
            'gambar' => $request->gambar,
        ]);
        return redirect('/postinganadmin')->with('success', 'success');
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

    public function destroy($id)
    {
        $postingan = Postingan::findOrFail($id);

        $postingan->delete();

        return redirect()
            ->route('postinganadmin.index')
            ->with('success', 'Data Berhasil Di Hapus');
    }
}
