<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MobileUnit;

class MUController extends Controller
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
            $mobile_unit = MobileUnit::all();
            if (count($mobile_unit) > 0) {
                return response()->json([
                    'status'    => 'success',
                    'message'   => 'Data tersedia.',
                    'data'      => $mobile_unit
                ], 200);
            } else {
                return response()->json([
                    'status'    => 'failed',
                    'message'   => 'Data tidak tersedia.',
                    'data'      => $mobile_unit
                ], 200);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'error',
                'message'   => $th->getMessage(),
                'data'      => []
            ], 200);
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
