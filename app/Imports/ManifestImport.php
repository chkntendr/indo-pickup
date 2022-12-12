<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Manifest;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class ManifestImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new Manifest([
            'uploaded_at' => Carbon::now(),
            'barcode'  => $row[0],
        ]);
    }
}
