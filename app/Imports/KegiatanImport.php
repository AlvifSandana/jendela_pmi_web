<?php

namespace App\Imports;

use App\InformasiKegiatan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KegiatanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new InformasiKegiatan([
            'nama_kegiatan' => $row['kegiatan'],
            'tanggal_kegiatan' => $row['tanggal'],
            'lokasi_kegiatan' => $row['lokasi'],
            'user_id' => 1,
            'foto' => $row['foto']
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
