{{-- Extends from layouts/master.blade.css --}}
@extends('layouts.master')

@section('title')
  Kegiatan
@endsection

@section('css')
  <style>
    .bg-pink {
      background-color: #e7c2c2;
      color: #000000;
    }

  </style>
@endsection

@section('header_text')
  Agenda Markas PMI Kab. Banyuwangi
@endsection

@section('content')
  <div class="content mt-3">
    <div class="col-md-12">
      @include('layouts.flash')
      <div class="card">
        <div class="card-header container-fluid">
          <div class="row">
            <div class="col-md-9">
              <h4 class="p-3">Agenda kegiatan</h4>
            </div>
            <div class="col-md-3 float-right">
              <button class="btn rounded shadow bg-pink text-black mt-2 float-right" data-toggle="modal"
                data-target="#importModal">Update</button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive table-bordered">
            <table class="table">
              <thead class="text-center">
                <th>No</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
              </thead>
              <tbody class="text-center">
                @foreach ($kegiatan as $item)
                  <tr>
                    <td>{{ $item->id_kegiatan }}</td>
                    <td>{{ $item->nama_kegiatan }}</td>
                    <td>{{ $item->tanggal_kegiatan }}</td>
                    <td>{{ $item->lokasi_kegiatan }}</td>
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
  <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="importModalLabel">Import .xls .xlsx</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <form action="{{ route('admin.kegiatan.import') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                  <input type="file" name="file">
                </div>
                <button type="submit" class="btn btn-danger float-right">Import</button>
              </form>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <form action="{{ route('admin.kegiatan.create') }}" method="post">
                @csrf
                @method('POST')
                <div class="form-group">
                  <label for="nama_kegiatan">Nama Kegiatan</label>
                  <input type="text" name="nama_kegiatan" class="form-control">
                  <label for="tanggal_kegiatan">Tanggal</label>
                  <input type="text" name="tanggal_kegiatan" class="form-control">
                  <label for="lokasi_kegiatan">Lokasi</label>
                  <input type="text" name="lokasi_kegiatan" class="form-control">
                </div>
                <button id="btnadd" class="btn btn-success float-right">Tambah</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
    $(document).ready(function() {
      $('#btnadd').on('click', function() {
        var nama_kegiatan = $('input[name="nama_kegiatan"]').val()
        var tanggal_kegiatan = $('input[name="tanggal_kegiatan"]').val()
        var lokasi_kegiatan = $('input[name="lokasi_kegiatan"]').val()
        if (nama_kegiatan != "" && tanggal_kegiatan != "" && lokasi_kegiatan != "") {
          $.ajax({
            url: "{{ route('admin.kegiatan.create') }}",
            type: "POST",
            data: {
              _token: {{ Session::token() }},
              nama_kegiatan: nama_kegiatan,
              tanggal_kegiatan: tanggal_kegiatan,
              lokasi_kegiatan: lokasi_kegiatan,
            },
            cache: false,
            success: function(result) {
              var res = JSON.parse(result);
              if (res.statusCode == 200) {
                alert("Data berhasil ditambahkan.");
              } else {
                alert("Error happened :(");
              }
            }
          });
        } else {
          alert('Mohon lengkapi field!');
        }
      });
    });
  </script>
@endsection
