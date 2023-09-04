<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pelatihan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePelatihanRequest;
use App\Http\Requests\UpdatePelatihanRequest;

class PelatihanController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $pelatihan = Pelatihan::where('user_id', $userId)->get();
        return view('profile.pelatihan', compact('pelatihan'));
    }

    public function create()
    {
        return view('profile.index');
    }

    public function store(StorePelatihanRequest $request)
    {
        $userId = Auth::user()->id;

        $pelatihan = new Pelatihan($request->validated());
        $pelatihan->user_id = $userId;

        if ($request->hasFile('sertifikat')) {
            $sertifikat = $request->file('sertifikat');
            $filename = time() . '_' . $sertifikat->getClientOriginalName();
            $path = $sertifikat->storeAs('sertifikat', $filename, 'public');
            $pelatihan->sertifikat = $path;
        }

        $pelatihan->save();

        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);
        return response()->json($pelatihan);
    }

    public function update(UpdatePelatihanRequest $request, Pelatihan $pelatihan)
    {
        try {
            $pelatihan->update($request->all());

            if ($request->hasFile('sertifikat')) {
                $sertifikat = $request->file('sertifikat');
                $filename = time() . '_' . $sertifikat->getClientOriginalName();
                $path = $sertifikat->storeAs('sertifikat', $filename, 'public');
                $pelatihan->sertifikat = $path;
                $pelatihan->save();
            }

            return response()->json(['success' => true, 'message' => 'Pelatihan berhasil diperbarui.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function destroy(Pelatihan $pelatihan)
    {
        $pelatihan->delete();
        return redirect()->route('pelatihan.delete')->with('success', 'Pelatihan berhasil dihapus.');
    }
}