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
        $kelurahan = $request->input('kelurahan');

        $query = Kelurahan::select('kelurahans.id', 'kelurahans.id_kecamatan', 'kelurahans.kelurahan', 'kecamatans.kecamatan')
            ->leftJoin('kecamatans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
            ->when($request->input('kelurahan'), function ($query, $kelurahan) {
                return $query->where('kelurahans.kelurahan', 'like', '%' . $kelurahan . '%');
            })
            ->when($request->input('kecamatan'), function ($query, $kecamatan) {
                return $query->whereIn('kelurahans.id_kecamatan', $kecamatan);
            })
            ->orderBy('kelurahans.id_kecamatan', 'asc')
            ->paginate(10);
        $kecamatanSelected = $request->input('kecamatan');

        $query->appends(['kelurahan' => $kelurahanName, 'kecamatan' => $kecamatanIds]);

        return view('kelurahan.index')->with([
            'kelurahans' => $query,
            'kecamatans' => $kecamatans,
            'kelurahanName' => $kelurahanName,
            'kecamatanIds' => $kecamatanIds,
            'kecamatanSelected' => $kecamatanSelected,
            'kelurahan' => $kelurahan,
        ]);
    }

    public function create()
    {
        $kecamatans = Kecamatan::all();
        return view('   kelurahan.create')->with(['kecamatans' => $kecamatans]);
    }

    public function store(StoreKelurahanRequest $request)
    {
        Kelurahan::create([
            'kelurahan' => $request->kelurahan,
            'id_kecamatan' => $request->id_kecamatan,
        ]);

        return redirect()->route('kelurahan.index')
            ->with('success', 'Create data successfully.');
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
            ->with('success', 'Updated data successfully.');
    }

    public function destroy(Kelurahan $kelurahan)
    {
        try {
            $kelurahan->delete();
            return redirect()->route('kelurahan.index')->with('success', 'Deleted data Kelurahan successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            $error_code = $e->errorInfo[1];
            if ($error_code == 1451) {
                return redirect()->route('kelurahan.index')
                    ->with('error', 'Data kelurahan used in another table');
            } else {
                return redirect()->route('kelurahan.index')->with('success', 'Deleted data Kelurahan successfully');
            }
        }
    }

    public function import(ImportKelurahanRequest $request)
    {
        try {
            Excel::import(new KelurahansImport, $request->file('import-file')->store('import-files'));
            return redirect()->route('kelurahan.index')->with('success', 'Tambahkan Data Kelurahan Sukses diimport');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}