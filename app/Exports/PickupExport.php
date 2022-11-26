<?php

namespace App\Exports;

use App\Models\Pickup;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PickupExport implements WithHeadings, FromCollection, WithMapping
{
    protected $pickup;

    public function collection() {
        return $pickup = Pickup::all();
    }

    public function map($pickup): array {
        return [
            $pickup->id,
            $pickup->tipe,
            $pickup->driver,
            $pickup->client,
            $pickup->tanggal,
            $pickup->luar_kota,
            $pickup->dalam_kota,
            $pickup->jumlah,
            $pickup->berat
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array {
        return [
            '#',
            'Barang',
            'Driver',
            'Client',
            'Tanggal',
            'Luar Kota',
            'Dalam Kota',
            'Jumlah',
            'Berat'
        ];
    }
}
