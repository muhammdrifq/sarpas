<?php

namespace App\Imports;

use App\Models\Inventaris;
use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;


class SarprasImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    // public function collection(Collection $collection)
    // {
    //     //
    // }

    public function model(array $row)
    {
        return new Inventaris([
            // 'No' => $row[1],
            'kode' => $row[0],
            'namaBarang' => $row[1],
            'merk' => $row[2],
            'jumlah' => $row[3],
            'hargaSatuan' => $row[4],
            'lokasi' => $row[5],
            'tahunPembuatan' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6]),
            'tahunBeli' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7]),
            'hargaKeseluruhan' => $row[8],
            'kondisi' => $row[9],
            // 'Aksi' => $row[11],
        ]);
    }
}
