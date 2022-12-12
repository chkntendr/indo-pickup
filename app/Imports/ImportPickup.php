<?php

namespace App\Imports;

use App\Models\Pickup;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportPickup implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

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
            'tanggal'   => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[9])->format('y-m-d'),
            'tanggal_pic' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[8])->format('y-m-d'),
            'driver'    => $row[10],
            'description' => $row[11]
        ]);
    }
}
