<?php

namespace App\Imports;

use App\MobileUnit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JadwalDonorImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MobileUnit([
            'tanggal_donor' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_donor'])->format('Y-m-d'),
            'lokasi_donor' => $row['lokasi_donor'],
            'waktu_mulai' => $row['waktu_mulai'],
            'waktu_selesai' => $row['waktu_selesai'],
            'deskripsi' => $row['deskripsi']
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
