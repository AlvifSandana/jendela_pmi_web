<?php

namespace App\Imports;

use App\MobileUnit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JadwalDonor implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MobileUnit([
            'tanggal_donor' => $row[1],
            'lokasi_donor' => $row[2],
            'waktu_mulai' => $row[3],
            'waktu_selesai' => $row[4],
            'deskripsi' => $row[5]
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
