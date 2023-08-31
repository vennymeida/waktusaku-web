<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\LowonganPekerjaan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookmarkController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $query = $user->bookmarks()->with('lowonganPekerjaan.perusahaan', 'lowonganPekerjaan.kategori');

        // Apply search filters if provided
        if ($request->has('posisi')) {
            $query->whereHas('lowonganPekerjaan', function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->input('posisi') . '%');
            });
        }

        if ($request->has('lokasi')) {
            $query->whereHas('lowonganPekerjaan', function ($q) use ($request) {
                $q->where('lokasi', 'like', '%' . $request->input('lokasi') . '%');
            });
        }

        if ($request->has('kategori')) {
            $query->whereHas('lowonganPekerjaan.kategori', function ($q) use ($request) {
                $q->where('kategori', 'like', '%' . $request->input('kategori') . '%');
            });
        }

        $bookmarks = $query->paginate(10);

        return view('bookmark.index', [
            'bookmarks' => $bookmarks,
        ]);
    }

    public function toggleBookmark(Request $request)
    {
        $lokerId = $request->input('loker_id');
        $user = Auth::user();

        $bookmarked = false;

        // Check if the user has already bookmarked the job
        if ($user->bookmarks()->where('lowongan_pekerjaan_id', $lokerId)->exists()) {
            // Remove the bookmark
            $user->bookmarks()->where('lowongan_pekerjaan_id', $lokerId)->delete();
        } else {
            // Add the bookmark
            $user->bookmarks()->create(['lowongan_pekerjaan_id' => $lokerId]);
            $bookmarked = true;
        }

        return response()->json(['bookmarked' => $bookmarked]);
    }
}
