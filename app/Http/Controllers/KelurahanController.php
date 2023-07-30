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
        $file = $request->file('import-file');
        $importedData = Excel::toArray(new KelurahansImport, $file);

        if (!array_key_exists('kelurahan', $importedData[0][0]) || !array_key_exists('kecamatan', $importedData[0][0])) {
            return redirect()->route('kelurahan.index')->with('error', 'Column "kelurahan" or "kecamatan" not found in the imported file.');
        }

        $duplicateData = [];
        foreach ($importedData[0] as $row) {
            $kelurahan = Kelurahan::where('kelurahan', $row['kelurahan'])->first();
            if ($kelurahan) {
                $duplicateData[] = $row['kelurahan'];
            }
        }

        if (!empty($duplicateData)) {
            return redirect()->route('kelurahan.index')->with('error', 'Data Kelurahan with names: ' . implode(', ', $duplicateData) . ' already exists in the database.');
        }

        Excel::import(new KelurahansImport, $file->store('import-files'));
        return redirect()->route('kelurahan.index')->with('success', 'Import data Kelurahan successfully');
    }


}