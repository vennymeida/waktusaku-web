<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Keahlian;
use App\Models\ProfileKeahlian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfileKeahlianController extends Controller
{
    public function edit()
    {
        $keahlians = Keahlian::all();

        $selectedKeahlians = auth()->user()->keahlians->pluck('id')->toArray();

        return view('profile.keahlian', compact('keahlians', 'selectedKeahlians'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'keahlian_ids' => 'required|array',
            'keahlian_ids.*' => 'exists:keahlians,id',
        ]);

        auth()->user()->keahlians()->sync($request->keahlian_ids);

        return redirect()->route('profile.keahlian.edit')
            ->with('success', 'Keahlian berhasil disimpan.');
    }

    public function deleteKeahlian(Request $request)
    {
        $request->validate([
            'keahlian_id' => 'required|exists:keahlians,id',
        ]);

        auth()->user()->keahlians()->detach($request->keahlian_id);

        return redirect()->route('profile.keahlian.edit')
            ->with('success', 'Keahlian berhasil dihapus.');
    }
}
