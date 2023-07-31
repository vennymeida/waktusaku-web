<?php

namespace App\Imports;

use App\Models\Kelurahan;
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
            return new Kelurahan([
                'id_kecamatan' => $row['kecamatan'],
                'kelurahan' => $row['kelurahan'],
            ]);
        }
        throw new \Exception("Column kecamatan or kelurahan not found in file.");
    }

    public function uniqueBy()
    {
        return 'kelurahan';
    }
}