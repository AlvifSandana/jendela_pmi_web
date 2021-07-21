<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\StokDarah;
use Illuminate\Http\Request;

class StokDarahController extends Controller
{
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
            $data = [
                "WB" => [
                    "A"  => 0,
                    "B"  => 0,
                    "AB"  => 0,
                    "O"  => 0,
                ],
                "PRC" => [
                    "A"  => 0,
                    "B"  => 0,
                    "AB"  => 0,
                    "O"  => 0,
                ],
                "TC" => [
                    "A"  => 0,
                    "B"  => 0,
                    "AB"  => 0,
                    "O"  => 0,
                ],
                "FFP" => [
                    "A"  => 0,
                    "B"  => 0,
                    "AB"  => 0,
                    "O"  => 0,
                ],
                "AHF" => [
                    "A"  => 0,
                    "B"  => 0,
                    "AB"  => 0,
                    "O"  => 0,
                ],
                "LP" => [
                    "A"  => 0,
                    "B"  => 0,
                    "AB"  => 0,
                    "O"  => 0,
                ],
                "WE" => [
                    "A"  => 0,
                    "B"  => 0,
                    "AB"  => 0,
                    "O"  => 0,
                ],
                "FP" => [
                    "A"  => 0,
                    "B"  => 0,
                    "AB"  => 0,
                    "O"  => 0,
                ],
                "Leucodeplete" => [
                    "A"  => 0,
                    "B"  => 0,
                    "AB"  => 0,
                    "O"  => 0,
                ],
            ];

            if (count($stok_darah) > 0) {
                foreach ($stok_darah as $st) {
                    switch ($st->produk) {
                        case 'WB':
                            if ($st->jenis_darah == "A") {
                                $data["WB"]["A"] = (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "B") {
                                $data["WB"]["B"] = (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "AB") {
                                $data["WB"]["AB"] = (int)$st->jumlah;
                            } elseif ($st->jenis_darah == "O") {
                                $data["WB"]["O"] = (int)$st->jumlah;
                            }
                            break;
                        case 'PRC':
                            if ($st->jenis_darah == "A") {
                                $data["PRC"]["A"] = (int) $st->jumlah;
                            } elseif ($st->jenis_darah == "B") {
                                $data["PRC"]["B"] = (int) $st->jumlah;
                            } elseif ($st->jenis_darah == "AB") {
                                $data["PRC"]["AB"] = (int) $st->jumlah;
                            } elseif ($st->jenis_darah == "O") {
                                $data["PRC"]["O"] = (int) $st->jumlah;
                            }
                            break;
                        case 'TC':
                            if ($st->jenis_darah == "A") {
                                $data["TC"]["A"] = (int) $st->jumlah;
                            } elseif ($st->jenis_darah == "B") {
                                $data["TC"]["B"] = (int) $st->jumlah;
                            } elseif ($st->jenis_darah == "AB") {
                                $data["TC"]["AB"] = (int) $st->jumlah;
                            } elseif ($st->jenis_darah == "O") {
                                $data["TC"]["O"] = (int) $st->jumlah;
                            }
                            break;
                        case 'FFP':
                            if ($st->jenis_darah == "A") {
                                $data["FFP"]["A"] = (int) $st->jumlah;
                            } elseif ($st->jenis_darah == "B") {
                                $data["FFP"]["B"] = (int) $st->jumlah;
                            } elseif ($st->jenis_darah == "AB") {
                                $data["FFP"]["AB"] = (int) $st->jumlah;
                            } elseif ($st->jenis_darah == "O") {
                                $data["FFP"]["O"] = (int) $st->jumlah;
                            }
                            break;

                        default:
                            # code...
                            break;
                    }
                }

                return response()->json([
                    'status'    => 'success',
                    'message'   => 'Data tersedia',
                    'data'      => $data
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
