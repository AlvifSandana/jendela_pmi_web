<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\StokDarah;
use Illuminate\Http\Request;

class StokDarahController extends Controller
{
    public function __construct()
    {
        $this->middleware('tokencheck');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // get data from model
            $stok_darah = StokDarah::all();
            // data respon
            $data_respon = [
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
                                $data_respon[0]["stok"]["A"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "B") {
                                $data_respon[0]["stok"]["B"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "AB") {
                                $data_respon[0]["stok"]["AB"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "O") {
                                $data_respon[0]["stok"]["O"] += (int)$st->jumlah;
                            }
                            break;

                        case 'PRC':
                            if ($st->jenis_darah == "A") {
                                $data_respon[1]["stok"]["A"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "B") {
                                $data_respon[1]["stok"]["B"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "AB") {
                                $data_respon[1]["stok"]["AB"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "O") {
                                $data_respon[1]["stok"]["O"] += (int)$st->jumlah;
                            }
                            break;

                        case 'TC':
                            if ($st->jenis_darah == "A") {
                                $data_respon[2]["stok"]["A"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "B") {
                                $data_respon[2]["stok"]["B"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "AB") {
                                $data_respon[2]["stok"]["AB"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "O") {
                                $data_respon[2]["stok"]["0"] += (int)$st->jumlah;
                            }
                            break;

                        case 'FFP':
                            if ($st->jenis_darah == "A") {
                                $data_respon[3]["stok"]["A"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "B") {
                                $data_respon[3]["stok"]["B"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "AB") {
                                $data_respon[3]["stok"]["AB"] += (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "O") {
                                $data_respon[3]["stok"]["0"] += (int)$st->jumlah;
                            }
                            break;

                        default:
                            # code...
                            break;
                    }
                }

                for ($i = 0; $i < count($data_respon); $i++) {
                    $data_respon[$i]["stok"]["Total"] = $data_respon[$i]["stok"]["A"] + $data_respon[$i]["stok"]["B"] + $data_respon[$i]["stok"]["AB"] + $data_respon[$i]["stok"]["O"];
                }

                return response()->json([
                    'status'    => 'success',
                    'message'   => 'Data tersedia',
                    'data'      => $data_respon
                ], 200);
            } else {
                return response()->json([
                    'status'    => 'failed',
                    'message'   => 'Data tidak tersedia',
                    'data'      => []
                ], 404);
            }
        } catch (\Throwable $th) {
            // when error
            return response()->json([
                'status'    => 'error',
                'message'   => $th->getMessage(),
                'data'      => []
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
