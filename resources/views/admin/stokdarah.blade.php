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
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
@endsection
