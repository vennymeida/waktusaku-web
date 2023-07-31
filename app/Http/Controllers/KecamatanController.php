<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportKecamatanRequest;
use App\Imports\KecamatansImport;
use App\Models\Kecamatan;
use App\Http\Requests\StoreKecamatanRequest;
use App\Http\Requests\UpdateKecamatanRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:kecamatan.index')->only('index');
        $this->middleware('permission:kecamatan.create')->only('create', 'store');
        $this->middleware('permission:kecamatan.edit')->only('edit', 'update');
        $this->middleware('permission:kecamatan.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
        $query = DB::table('kecamatans');

        if ($request->has('kecamatans')) {
            $kecamatans = $request->input('kecamatans');
            $query->whereIn('kecamatan', $kecamatans);
        }

        $allKecamatans = $query->get();

        $kecamatans = $query->paginate(10);

        return view('kecamatan.index', compact('kecamatans', 'allKecamatans'));
    }


    public function create()
    {
        return view('kecamatan.create');
    }

    public function store(StoreKecamatanRequest $request)
    {
        Kecamatan::create([
            'kecamatan' => $request->kecamatan,
        ]);
        return redirect()->route('kecamatan.index')->with('success', 'Data Kecamatan berhasil ditambahkan.');
    }

    public function show(Kecamatan $kecamatan)
    {
        //
    }

    public function edit(Kecamatan $kecamatan)
    {
        return view('kecamatan.edit', compact('kecamatan'));
    }

    public function update(UpdateKecamatanRequest $request, Kecamatan $kecamatan)
    {
        $request->validate([
            'kecamatan' => 'required|unique:kecamatans,kecamatan,' . $kecamatan->id,
        ]);

        $kecamatan->update($request->all());

        return redirect()->route('kecamatan.index')
            ->with('success', 'Data Kecamatan berhasil diperbarui.');
    }

    public function destroy(Kecamatan $kecamatan)
    {
        try {
            $kecamatan->delete();
            return redirect()->route('kecamatan.index')->with('success', 'Data Kecamatan berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            $error_code = $e->errorInfo[1];
            if ($error_code == 1451) {
                return redirect()->route('kecamatan.index')
                    ->with('error', 'Data Kecamatan sedang digunakan ditabel lain.');
            } else {
                return redirect()->route('kecamatan.index')->with('success', 'Data Kecamatan berhasil dihapus.');
            }
        }
    }

    public function import(ImportKecamatanRequest $request)
    {
        try {
            Excel::import(new KecamatansImport, $request->file('import-file')->store('import-files'));
            return redirect()->route('kecamatan.index')->with('success', 'File data Kecamatan berhasil diimport.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}