<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pendidikan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePendidikanRequest;
use App\Http\Requests\UpdatePendidikanRequest;

class PendidikanController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $pendidikan = Pendidikan::where('user_id', $userId)->get();
        return view('profile.pendidikan', compact('pendidikan'));
    }

    public function create()
    {
        return view('profile.index');
    }

    public function store(StorePendidikanRequest $request)
    {
        $userId = Auth::user()->id;

        $pendidikan = new Pendidikan($request->validated());
        $pendidikan->user_id = $userId;
        $pendidikan->save();

        return redirect()->route('pendidikan.index')->with('success', 'Pendidikan berhasil ditambahkan.');
    }

    public function edit(Pendidikan $pendidikan)
    {
        return view('profile.pendidikan', compact('pendidikan'));
    }

    public function update(UpdatePendidikanRequest $request, Pendidikan $pendidikan)
    {
        $pendidikan->update($request->all());
        return redirect()->route('pendidikan.edit')->with('success', 'Pendidikan berhasil diperbarui.');
    }

    public function destroy(Pendidikan $pendidikan)
    {
        $pendidikan->delete();
        return redirect()->route('pendidikan.delete')->with('success', 'Pendidikan berhasil dihapus.');
    }
}
