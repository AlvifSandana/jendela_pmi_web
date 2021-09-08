{{-- Extends from layouts/master.blade.css --}}
@extends('layouts.master')

@section('title')
  Jadwal Donor
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
              <form action="{{ route('admin.jadwaldonor.import') }}" method="post" enctype="multipart/form-data">
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
              <form action="{{ route('admin.jadwaldonor.create') }}" method="post">
                @csrf
                @method('POST')
                <div class="form-group">
                  <label for="tanggal_donor">Tanggal</label>
                  <input type="date" name="tanggal_donor" class="form-control">
                </div>
                <div class="form-group">
                  <label for="lokasi_donor">Instansi</label>
                  <input type="text" name="lokasi_donor" class="form-control">
                </div>
                <div class="form-group">
                  <label for="waktu_mulai">Jam mulai</label>
                  <input type="time" name="waktu_mulai" class="form-control">
                </div>
                <div class="form-group">
                  <label for="waktu_selesai">Jam selesai</label>
                  <input type="time" name="waktu_selesai" class="form-control">
                </div>
                <div class="form-group">
                  <label for="deskripsi">Tempat</label>
                  <input type="text" name="deskripsi" class="form-control">
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
        var tanggal_donor = $('input[name="tanggal_donor"]').val();
        var lokasi_donor = $('input[name="lokasi_donor"]').val();
        var waktu_mulai = $('input[name="waktu_mulai"]').val();
        var waktu_selesai = $('input[name="waktu_selesai"]').val();
        var deskripsi = $('input[name="deskripsi"]').val();
        if (tanggal_donor != "" && lokasi_donor != "" && waktu_mulai != "" && waktu_selesai != "" && deskripsi !=
          "") {
          $.ajax({
            url: "{{ route('admin.jadwaldonor.create') }}",
            type: "POST",
            data: {
              _token: {{ Session::token() }},
              tanggal_donor: tanggal_donor,
              lokasi_donor: lokasi_donor,
              waktu_mulai: waktu_mulai,
              waktu_selesai: waktu_selesai,
              deskripsi: deskripsi
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
