<?php

namespace App\Http\Controllers;

use App\Imports\StokDarahImport;
use Illuminate\Http\Request;
use App\StokDarah;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StokDarahController extends Controller
{
    /**
     * show Stok Darah page
     */
    public function index()
    {
        try {
            // get data from model
            $stok_darah = StokDarah::all();
            // data respon
            $data = [
                [
                    "produk" => "WB",
                    "stok"   => [
                        "A"     => 0,
                        "B"     => 0,
                        "AB"    => 0,
                        "O"     => 0,
                        "Total" => 0
                    ]
                ],
                [
                    "produk" => "PRC",
                    "stok"   => [
                        "A"     => 0,
                        "B"     => 0,
                        "AB"    => 0,
                        "O"     => 0,
                        "Total" => 0
                    ]
                ],
                [
                    "produk" => "TC",
                    "stok"   => [
                        "A"     => 0,
                        "B"     => 0,
                        "AB"    => 0,
                        "O"     => 0,
                        "Total" => 0
                    ]
                ],
                [
                    "produk" => "FFP",
                    "stok"   => [
                        "A"     => 0,
                        "B"     => 0,
                        "AB"    => 0,
                        "O"     => 0,
                        "Total" => 0
                    ]
                ],
                [
                    "produk" => "AHF",
                    "stok"   => [
                        "A"     => 0,
                        "B"     => 0,
                        "AB"    => 0,
                        "O"     => 0,
                        "Total" => 0
                    ]
                ],
                [
                    "produk" => "LP",
                    "stok"   => [
                        "A"     => 0,
                        "B"     => 0,
                        "AB"    => 0,
                        "O"     => 0,
                        "Total" => 0
                    ]
                ],
                [
                    "produk" => "WE",
                    "stok"   => [
                        "A"     => 0,
                        "B"     => 0,
                        "AB"    => 0,
                        "O"     => 0,
                        "Total" => 0
                    ]
                ],
                [
                    "produk" => "FP",
                    "stok"   => [
                        "A"     => 0,
                        "B"     => 0,
                        "AB"    => 0,
                        "O"     => 0,
                        "Total" => 0
                    ]
                ],
                [
                    "produk" => "Leucodeplete",
                    "stok"   => [
                        "A"     => 0,
                        "B"     => 0,
                        "AB"    => 0,
                        "O"     => 0,
                    ]
                ],
            ];

            if (count($stok_darah) > 0) {
                // mengelompokkan data
                foreach ($stok_darah as $st) {
                    switch ($st->produk) {
                        case 'WB':
                            if ($st->jenis_darah == "A") {
                                $data[0]["stok"]["A"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "B") {
                                $data[0]["stok"]["B"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "AB") {
                                $data[0]["stok"]["AB"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "O") {
                                $data[0]["stok"]["O"] += (int)$st->jumlah;
                            }
                            break;

                        case 'PRC':
                            if ($st->jenis_darah == "A") {
                                $data[1]["stok"]["A"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "B") {
                                $data[1]["stok"]["B"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "AB") {
                                $data[1]["stok"]["AB"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "O") {
                                $data[1]["stok"]["O"] += (int)$st->jumlah;
                            }
                            break;

                        case 'TC':
                            if ($st->jenis_darah == "A") {
                                $data[2]["stok"]["A"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "B") {
                                $data[2]["stok"]["B"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "AB") {
                                $data[2]["stok"]["AB"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "O") {
                                $data[2]["stok"]["0"] += (int)$st->jumlah;
                            }
                            break;

                        case 'FFP':
                            if ($st->jenis_darah == "A") {
                                $data[3]["stok"]["A"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "B") {
                                $data[3]["stok"]["B"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "AB") {
                                $data[3]["stok"]["AB"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "O") {
                                $data[3]["stok"]["0"] += (int)$st->jumlah;
                            }
                            break;

                        default:
                            # code...
                            break;
                    }
                }

                for ($i = 0; $i < count($data); $i++) {
                    $data[$i]["stok"]["Total"] = $data[$i]["stok"]["A"] + $data[$i]["stok"]["B"] + $data[$i]["stok"]["AB"] + $data[$i]["stok"]["O"];
                }

                return view('admin.stokdarah', compact('data'))->with('success', 'Data Tersedia');
            } else {
                return view('admin.stokdarah')->withErrors('Data Kosong');
            }
        } catch (\Throwable $th) {
            // tangkap error dan tampilkan berupa flash message
            return redirect()->route('admin.stokdarah.index')->withErrors($th->getMessage());
        }
    }

    /**
     * import data stok darah
     * from .xls .xlsx
     */
    public function importExcel(Request $request)
    {
        // try {
            // validate uploaded file
            $this->validate(
                $request,
                [
                    'file' => 'required'
                ],
                [
                    'required' => ':atttribute tidak boleh kosong!',
                ]
            );
            // get file and filename
            $file = $request->file('file');
            $filename = rand().$file->getClientOriginalName();
            // save file to public folder
            $file->move('uploaded', $filename);
            // import file to database
            Excel::import(new StokDarahImport, public_path('/uploaded/'.$filename));
            // redirect to stok darah index page
            return redirect()->route('admin.stokdarah.index')->with('success', 'Berhasil import data ke database.');
        // } catch (\Throwable $th) {
        //     return redirect()->route('admin.stokdarah.index')->withErrors($th->getMessage());
        // }
    }
}
