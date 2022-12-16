<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Manifest;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class ManifestImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    /**
     * @return int
     */
    public function startRow(): int {
        return 2;
    }

    public function model(array $row) {
        return new Manifest([
            'uploaded_at' => Carbon::now(),
            'barcode'  => $row[0],
        ]);
    }
}
