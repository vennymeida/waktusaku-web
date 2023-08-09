<?php

namespace App\Http\Controllers;

use App\Models\ProfileUser;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PelamarController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil role "Pencari Kerja"
        $rolePencariKerja = Role::where('name', 'Pencari Kerja')->first();

        // Mengambil data pengguna dengan role "Pencari Kerja" dan memiliki profil terkait
        $query = User::with('profile') // Eager-load the "profile" relation
            ->whereHas('roles', function ($query) use ($rolePencariKerja) {
                $query->where('id', $rolePencariKerja->id);
            });

        // Lakukan pencarian berdasarkan nama pengguna jika parameter "name" ada
        if ($request->has('name')) {
            $name = $request->input('name');
            $query->where('name', 'like', "%$name%");
        }

        // Paginasi hasil query
        $pelamar = $query->paginate(10);

        return view('pelamar.index', compact('pelamar'));
    }

    public function edit(User $pelamar)
    {
        return view('pelamar.edit', compact('pelamar'));
    }

    public function update(Request $request, User $pelamar)
    {
        $this->validate($request, [
            // Add validation rules for profile data if needed
        ]);

        // Update the user profile data
        $pelamar->profile->update([
            'alamat' => $request->input('alamat'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'no_hp' => $request->input('no_hp'),
            // Add other profile fields
        ]);

        return redirect()->route('pelamar.index')->with('success', 'Profile updated successfully.');
    }

    public function destroy(User $pelamar)
    {
        try {
            // Delete the user and related profile data
            $pelamar->profile->delete();
            $pelamar->delete();

            return redirect()->route('pelamar.index')->with('success', 'Profile deleted successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle delete error here

            return redirect()->route('pelamar.index')->with('error', 'Failed to delete profile.');
        }
    }

    public function show(User $pelamar)
    {
        return view('pelamar.view', compact('pelamar'));
    }
}
