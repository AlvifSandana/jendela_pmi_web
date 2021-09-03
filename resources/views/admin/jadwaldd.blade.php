{{-- Extends from layouts/master.blade.css --}}
@extends('layouts.master')

@section('title')
  Jadwal Donor
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
  Jadwal Mobil Unit
@endsection

@section('content')
  <div class="content mt-3">
    <div class="col-md-12">
      @include('layouts.flash')
      <div class="card">
        <div class="card-header container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <h4 class="p-3">Jadwal Donor</h4>
                </div>
                <div class="col-md-3 float-right">
                    <button class="btn rounded shadow bg-pink text-black mt-2 float-right" data-toggle="modal" data-target="#importModal">Update</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive table-bordered">
                <table class="table">
                    <thead class="text-center">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Instansi</th>
                        <th>Tempat</th>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($jadwal_donor as $item)
                        <tr class="text-center">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->tanggal_donor }}</td>
                            <td>{{ $item->waktu_mulai }}</td>
                            <td>{{ $item->lokasi_donor }}</td>
                            <td>{{ $item->deskripsi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
  {{-- import excel modal --}}
  <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="importModalLabel">Import .xls .xlsx</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.jadwaldonor.import') }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <div class="form-group">
                  <input type="file" name="file">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Import</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('js')
@endsection
