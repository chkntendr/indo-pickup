<?php

namespace App\Imports;

use App\Models\Pickup;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportPickup implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $setStartRow = 2;
   
    public function setStartRow($setStartRow){
        $this->setStartRow = $setStartRow;
    }

    public function startRow() : int{
        return $setStartRow;
    }

    public function model(array $row)
    {
        return new Pickup([
            'tipe' => $row[0],
            'client' => $row[1],
            'jumlah' => $row[2],
            'berat' => $row[3],
            'tanggal' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4])->format('y-m-d'),
            'driver' => $row[5],
        ]);
    }
}
