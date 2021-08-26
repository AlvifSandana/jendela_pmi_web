<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokDarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stok_darah')->insert([
            [
                'produk'        => 'WB',
                'jenis_darah'   => 'A',
                'jumlah'        => 8
            ],
            [
                'produk'        => 'WB',
                'jenis_darah'   => 'B',
                'jumlah'        => 3
            ],
            [
                'produk'        => 'WB',
                'jenis_darah'   => 'AB',
                'jumlah'        => 5
            ],
            [
                'produk'        => 'WB',
                'jenis_darah'   => 'O',
                'jumlah'        => 4
            ],
            [
                'produk'        => 'PRC',
                'jenis_darah'   => 'A',
                'jumlah'        => 110
            ],
            [
                'produk'        => 'PRC',
                'jenis_darah'   => 'B',
                'jumlah'        => 45
            ],
            [
                'produk'        => 'PRC',
                'jenis_darah'   => 'AB',
                'jumlah'        => 33
            ],
            [
                'produk'        => 'PRC',
                'jenis_darah'   => 'O',
                'jumlah'        => 55
            ],
            [
                'produk'        => 'TC',
                'jenis_darah'   => 'A',
                'jumlah'        => 33
            ],
            [
                'produk'        => 'TC',
                'jenis_darah'   => 'B',
                'jumlah'        => 66
            ],
            [
                'produk'        => 'TC',
                'jenis_darah'   => 'AB',
                'jumlah'        => 99
            ],
            [
                'produk'        => 'TC',
                'jenis_darah'   => 'O',
                'jumlah'        => 21
            ],
            [
                'produk'        => 'FFP',
                'jenis_darah'   => 'A',
                'jumlah'        => 89
            ],
            [
                'produk'        => 'FFP',
                'jenis_darah'   => 'B',
                'jumlah'        => 31
            ],
            [
                'produk'        => 'FFP',
                'jenis_darah'   => 'AB',
                'jumlah'        => 5
            ],
            [
                'produk'        => 'FFP',
                'jenis_darah'   => 'O',
                'jumlah'        => 9
            ],
            [
                'produk'        => 'AHF',
                'jenis_darah'   => 'A',
                'jumlah'        => 0
            ],
            [
                'produk'        => 'AHF',
                'jenis_darah'   => 'B',
                'jumlah'        => 0
            ],
            [
                'produk'        => 'AHF',
                'jenis_darah'   => 'AB',
                'jumlah'        => 0
            ],
            [
                'produk'        => 'AHF',
                'jenis_darah'   => 'O',
                'jumlah'        => 0
            ],
            [
                'produk'        => 'LP',
                'jenis_darah'   => 'A',
                'jumlah'        =>  0
            ],
            [
                'produk'        => 'LP',
                'jenis_darah'   => 'B',
                'jumlah'        => 0
            ],
            [
                'produk'        => 'LP',
                'jenis_darah'   => 'AB',
                'jumlah'        => 0
            ],
            [
                'produk'        => 'LP',
                'jenis_darah'   => 'O',
                'jumlah'        => 0
            ],
            [
                'produk'        => 'WE',
                'jenis_darah'   => 'A',
                'jumlah'        => 0
            ],
            [
                'produk'        => 'WE',
                'jenis_darah'   => 'B',
                'jumlah'        => 0
            ],
            [
                'produk'        => 'WE',
                'jenis_darah'   => 'AB',
                'jumlah'        => 0
            ],
            [
                'produk'        => 'WE',
                'jenis_darah'   => 'O',
                'jumlah'        => 0
            ],
            [
                'produk'        => 'FP',
                'jenis_darah'   => 'A',
                'jumlah'        =>  0
            ],
            [
                'produk'        => 'FP',
                'jenis_darah'   => 'B',
                'jumlah'        =>  0
            ],
            [
                'produk'        => 'FP',
                'jenis_darah'   => 'AB',
                'jumlah'        => 0
            ],
            [
                'produk'        => 'FP',
                'jenis_darah'   => 'O',
                'jumlah'        => 0
            ],
            [
                'produk'        => 'Leucodeplete',
                'jenis_darah'   => 'A',
                'jumlah'        =>  0
            ],
            [
                'produk'        => 'Leucodeplete',
                'jenis_darah'   => 'B',
                'jumlah'        =>  0
            ],
            [
                'produk'        => 'Leucodeplete',
                'jenis_darah'   => 'AB',
                'jumlah'        => 0
            ],
            [
                'produk'        => 'Leucodeplete',
                'jenis_darah'   => 'O',
                'jumlah'        => 0
            ],
        ]);
    }
}
