<?php

namespace App\Imports;

use App\Models\Kecamatan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Throwable;

class KecamatansImport implements ToModel, WithHeadingRow, WithUpserts, SkipsOnError
{
    use Importable, SkipsErrors;

    public function model(array $row)
    {
        if (isset($row['kecamatan'])) {
            return new Kecamatan([
                'kecamatan' => $row['kecamatan'],
            ]);
        }
        throw new \Exception("Kolom Kecamatan tidak ditemukan dalam file.");

    }

    public function uniqueBy()
    {
        return 'kecamatans';
    }
}