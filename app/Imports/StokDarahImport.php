<?php

namespace App\Imports;

use App\StokDarah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

// no heading row format
HeadingRowFormatter::default('none');

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
            'jenis_darah' => $row["Gol Darah"],
            'produk' => $row["Produk"],
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
