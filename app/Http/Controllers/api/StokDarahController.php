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
            if (count($stok_darah) > 0) {
                return response()->json([
                    'status'    => 'success',
                    'message'   => 'Data tersedia',
                    'data'      => $stok_darah
                ]);
            } else {
                return response()->json([
                    'status'    => 'failed',
                    'message'   => 'Data tidak tersedia',
                    'data'      => []
                ]);
            }
        } catch (\Throwable $th) {
            // when error
            return response()->json([
                'status'    => 'error',
                'message'   => $th->getMessage(),
                'data'      => []
            ]);
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
