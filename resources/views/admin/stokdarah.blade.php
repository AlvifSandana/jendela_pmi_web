{{-- Extends from layouts/master.blade.css --}}
@extends('layouts.master')

@section('title')
  Stok Darah
@endsection

@section('css')
<style>
    .bg-pink{
        background-color: #e7c2c2;
        color: #000000;
    }
</style>
@endsection

@section('header_text')
  Data Stok Darah
@endsection

@section('content')
  <div class="content mt-3">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <h4 class="p-3">Stok Darah</h4>
                </div>
                <div class="col-md-3 float-right">
                    <button class="btn rounded shadow bg-pink text-black mt-2 float-right">Update</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive table-bordered">
                <table class="table">
                    <thead class="text-center">
                        <th>No</th>
                        <th>Produk</th>
                        <th>A</th>
                        <th>B</th>
                        <th>AB</th>
                        <th>O</th>
                        <th>Jumlah</th>
                    </thead>
                    <tbody class="text-center">
                        <?php
                            $n_wb = 0;
                            $n_prc = 0;
                            $n_tc = 0;
                            $n_ffp = 0;
                            $n_ahf = 0;
                            $n_lp = 0;
                            $n_we = 0;
                            $n_fp = 0;
                            $n_leucodeplete = 0;
                        ?>
                        <tr>
                            <td>1</td>
                            <td>WB</td>
                            @foreach ($wb as $item)
                                <td>{{ $item->jumlah }}<?php $n_wb += $item->jumlah?></td>
                            @endforeach
                            <td>{{ $n_wb }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>PRC</td>
                            @foreach ($prc as $item)
                                <td>{{ $item->jumlah }}<?php $n_prc += $item->jumlah?></td>
                            @endforeach
                            <td>{{ $n_prc }}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>TC</td>
                            @foreach ($tc as $item)
                                <td>{{ $item->jumlah }}<?php $n_tc += $item->jumlah?></td>
                            @endforeach
                            <td>{{ $n_tc }}</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>FFP</td>
                            @foreach ($ffp as $item)
                                <td>{{ $item->jumlah }}<?php $n_ffp += $item->jumlah?></td>
                            @endforeach
                            <td>{{ $n_ffp }}</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>AHF</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>LP</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>WE</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>FP</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Leucodeplete</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
@endsection
