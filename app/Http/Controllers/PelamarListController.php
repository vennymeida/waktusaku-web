<?php

namespace App\Http\Controllers;

use App\Models\ProfileUser;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PelamarListController extends Controller
{
    public function index()
{
    // Mengambil role "Pencari Kerja"
    $rolePencariKerja = Role::where('name', 'Pencari Kerja')->first();

    // Mengambil data pengguna dengan role "Pencari Kerja" dan memiliki profil terkait
    $pelamar = User::whereHas('profile')
        ->whereHas('roles', function ($query) use ($rolePencariKerja) {
            $query->where('id', $rolePencariKerja->id);
        })
        ->paginate(10);

    return view('pelamar.index', compact('pelamar'));
}

    public function edit(User $pelamar)
    {
        return view('pelamar.edit', compact('pelamar'));
    }

    public function update(Request $request, User $pelamar)
    {
        // Update the user profile data here

        return redirect()->route('pelamar.index')->with('success', 'Profile updated successfully.');
    }

    public function destroy(User $pelamar)
    {
        try {
            // Delete the user and related profile data

            return redirect()->route('pelamar.index')->with('success', 'Profile deleted successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle delete error here

            return redirect()->route('pelamar.index')->with('error', 'Failed to delete profile.');
        }
    }

    public function show(User $pelamar)
    {
        return view('pelamar.show', compact('pelamar'));
    }
}
