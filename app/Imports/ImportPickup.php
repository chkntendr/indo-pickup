<?php

namespace App\Imports;

use App\Models\Pickup;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportPickup implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new Pickup([
            'tipe'      => $row[0],
            'client'    => $row[1],
            'luar_kota' => $row[2],
            'dalam_kota'=> $row[3],
            'sp1'       => $row[4],
            'sp2'       => $row[5],
            'sp3'       => $row[6],
            'jumlah'    => $row[2] + $row[3] + $row[4] + $row[5] + $row[6],
            'berat'     => $row[7],
            'tanggal'   => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[8])->format('y-m-d'),
            'driver'    => $row[9],
            'description' => $row[10]
        ]);
    }
}
