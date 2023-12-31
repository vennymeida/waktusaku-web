<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportKelurahanRequest;
use App\Imports\KelurahansImport;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Http\Requests\StoreKelurahanRequest;
use App\Http\Requests\UpdateKelurahanRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KelurahanController extends Controller
{
    public function index(Request $request)
    {
        $kecamatans = Kecamatan::all();
        $kelurahanName = $request->input('kelurahan');
        $kecamatanIds = $request->input('kecamatan');
        $kecamatanSelected = $request->input('filter_kecamatan');

        $query = Kelurahan::select('kelurahans.id', 'kelurahans.id_kecamatan', 'kelurahans.kelurahan', 'kecamatans.kecamatan')
            ->leftJoin('kecamatans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
            ->when($kelurahanName, function ($query, $kelurahan) {
                return $query->where('kelurahans.kelurahan', 'like', '%' . $kelurahan . '%');
            })
            ->when($kecamatanSelected, function ($query, $selectedKecamatan) {
                return $query->where('kelurahans.id_kecamatan', $selectedKecamatan);
            })
            ->orderBy('kelurahans.id_kecamatan', 'asc')
            ->paginate(10);
        $query->appends(['kelurahan' => $kelurahanName, 'kecamatan' => $kecamatanIds, 'filter_kecamatan' => $kecamatanSelected]);

        return view('kelurahan.index')->with([
            'kelurahans' => $query,
            'kecamatans' => $kecamatans,
            'kelurahanName' => $kelurahanName,
            'kecamatanIds' => $kecamatanIds,
            'kecamatanSelected' => $kecamatanSelected,
        ]);
    }

    public function create()
    {
        $kecamatans = Kecamatan::all();
        return view('kelurahan.create')->with(['kecamatans' => $kecamatans]);
    }

    public function store(StoreKelurahanRequest $request)
    {
        Kelurahan::create([
            'kelurahan' => $request->kelurahan,
            'id_kecamatan' => $request->id_kecamatan,
        ]);

        return redirect()->route('kelurahan.index')
            ->with('success', 'Data Kelurahan dan Kecamatan berhasil ditambahkan.');
    }

    public function show(Kelurahan $kelurahan)
    {
        //
    }

    public function edit(Kelurahan $kelurahan)
    {
        $kecamatans = Kecamatan::all();
        return view('kelurahan.edit')->with(
            [
                'kelurahan' => $kelurahan,
                'kecamatans' => $kecamatans
            ]
        );
    }

    public function update(UpdateKelurahanRequest $request, Kelurahan $kelurahan)
    {
        $kelurahan->update($request->all());

        return redirect()->route('kelurahan.index')
            ->with('success', 'Data Kelurahan atau Kecamatan berhasil diperbarui.');
    }

    public function destroy(Kelurahan $kelurahan)
    {
        try {
            $kelurahan->delete();
            return redirect()->route('kelurahan.index')->with('success', 'Data Kelurahan dan Kecamatan berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            $error_code = $e->errorInfo[1];
            if ($error_code == 1451) {
                return redirect()->route('kelurahan.index')
                    ->with('error', 'Data Kelurahan sedang digunakan ditabel lain.');
            } else {
                return redirect()->route('kelurahan.index')->with('success', 'Data Kelurahan dan Kecamatan berhasil dihapus.');
            }
        }
    }

    public function import(ImportKelurahanRequest $request)
    {
        try {
            $file = $request->file('import-file');
            Excel::import(new KelurahansImport, $file);
            return redirect()->route('kelurahan.index')->with('success', 'File data Kelurahan dan Kecamatan berhasil diimport.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}