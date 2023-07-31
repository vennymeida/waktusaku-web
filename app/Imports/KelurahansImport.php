<?php

namespace App\Imports;

use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Throwable;

class KelurahansImport implements ToModel, WithHeadingRow, WithUpserts, SkipsOnError
{
    use Importable, SkipsErrors;

    public function model(array $row)
    {
        if (isset($row['kecamatan']) && isset($row['kelurahan'])) {
            $kecamatan = Kecamatan::where('kecamatan', $row['kecamatan'])->first();
            if (!$kecamatan) {
                throw new \Exception("Kecamatan " . $row['kecamatan'] . " tidak ditemukan di database.");
            }
            $id_kecamatan = $kecamatan->id;

            return new Kelurahan([
                'id_kecamatan' => $id_kecamatan,
                'kelurahan' => $row['kelurahan'],
            ]);
        }
        throw new \Exception("Kolom Kecamatan atau Kelurahan tidak ditemukan dalam file.");
    }

    public function uniqueBy()
    {
        return 'kelurahan';
    }
}