<?php

namespace App\Http\Controllers;

use App\Models\ProfileUser;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PerusahaanListController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil role "Perusahaan"
        $rolePerusahaan = Role::where('name', 'Perusahaan')->first();

        // Mengambil data perusahaan dengan role "Perusahaan"
        $query = User::with('profile') // Eager-load the "users" relation
            ->whereHas('roles', function ($query) use ($rolePerusahaan) {
                $query->where('id', $rolePerusahaan->id);
            });

        // Lakukan pencarian berdasarkan nama perusahaan jika parameter "name" ada
        if ($request->has('name')) {
            $name = $request->input('name');
            $query->where('name', 'like', "%$name%");
        }

        // Paginasi hasil query
        $perusahaanData = $query->paginate(10);

        return view('perusahaan.index', compact('perusahaanData'));
    }

    public function edit(User $perusahaan)
    {
        return view('perusahaan.edit', compact('perusahaan'));
    }

    public function update(Request $request, User $perusahaan)
    {
        $this->validate($request, [
            // Add validation rules for profile data if needed
        ]);

        // Update the user profile data
        $perusahaan->profile->update([
            'alamat' => $request->input('alamat'),
            // Add other profile fields for perusahaan
        ]);

        return redirect()->route('perusahaan.index')->with('success', 'Profile updated successfully.');
    }

    public function destroy(User $perusahaan)
    {
        try {
            // Delete the user and related profile data
            $perusahaan->profile->delete();
            $perusahaan->delete();

            return redirect()->route('perusahaan.index')->with('success', 'Profile deleted successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle delete error here

            return redirect()->route('perusahaan.index')->with('error', 'Failed to delete profile.');
        }
    }

    public function show(User $perusahaan)
    {
        return view('perusahaan.view', compact('perusahaan'));
    }
}
