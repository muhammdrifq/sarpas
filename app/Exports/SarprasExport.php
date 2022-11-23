<?php

namespace App\Exports;

use App\Models\Inventaris;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SarprasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inventaris::all();
    }


    public function headings(): array 
    {
        return [
            'No',
            'Kode',
            'Nama Barang',
            'Merek',
            'Jumlah',
            'Harga Satuan',
            'Lokasi',
            'Tahun Pembuatan',
            'Tahun Beli',
            'Harga Keseluruhan',
            'Kondisi',
            'Aksi',
        ];
    }

}
