<?php

namespace App\Imports;

use App\StokDarah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StokDarahImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StokDarah([
            'produk' => $row[2],
            'jenis_darah' => $row[1],
            'jumlah' => 1,
        ]);
    }

    /**
     * define heading row
     *
     * @return int
     */
    public function headingRow(): int
    {
        return 1;
    }
}
