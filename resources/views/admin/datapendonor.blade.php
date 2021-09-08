{{-- Extends from layouts/master.blade.css --}}
@extends('layouts.master')

@section('title')
  Data Pendonor
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
  Data Pendonor UDD Kab. Banyuwangi
@endsection

@section('content')
  <div class="content mt-3">
    <div class="col-md-12">
      @include('layouts.flash')
      <div class="card">
        <div class="card-header container-fluid">
          <div class="row">
            <div class="col-md-9">
              <h4 class="p-3">Data Pendonor</h4>
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
                <th>Nama</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No Telepon</th>
              </thead>
              <tbody class="text-center">
                @foreach ($pendonor as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_pendonor }}</td>
                    <td>{{ $item->ttl }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->telepon }}</td>
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
              <form action="{{ route('admin.pendonor.import') }}" method="post" enctype="multipart/form-data">
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
              <form action="{{ route('admin.pendonor.create') }}" method="post">
                @csrf
                @method('POST')
                <div class="form-group">
                  <label for="nama_pendonor">Nama Pendonor</label>
                  <input class="form-control" type="text" name="nama_pendonor">
                </div>
                <div class="form-group">
                  <label for="telepon">Telepon Pendonor</label>
                  <input class="form-control" type="tel" name="telepon">
                </div>
                <div class="form-group">
                  <label for="email">Email Pendonor</label>
                  <input class="form-control" type="email" name="email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input class="form-control" type="text" name="password">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat Pendonor</label>
                  <input class="form-control" type="text" name="alamat">
                </div>
                <div class="form-group">
                  <label for="ttl">Tempat, Tanggal Lahir</label>
                  <input class="form-control" type="text" name="ttl">
                </div>
                <div class="form-group">
                  <label for="golongan_darah">Golongan Darah</label>
                  <input class="form-control" type="text" name="golongan_darah">
                </div>
                <div class="form-group">
                  <label for="status">Status Donor</label>
                  <input class="form-control" type="text" name="status">
                </div>
                <button class="btn btn-success float-right" id="btnadd">Tambah</button>
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
        var nama_pendonor = $('input[name="nama_pendonor"]').val();
        var telepon = $('input[name="telepon"]').val();
        var email = $('input[name="email"]').val();
        var password = $('input[name="password"]').val();
        var alamat = $('input[name="alamat"]').val();
        var ttl = $('input[name="ttl"]').val();
        var golongan_darah = $('input[name="golongan_darah"]').val();
        var status = $('input[name="status"]').val();
        if (nama_pendonor != "" && email != "" && password != "" && alamat != "" && ttl != "" && golongan_darah != "") {
          $.ajax({
            url: "{{ route('admin.pendonor.create') }}",
            type: "POST",
            data: {
              _token: {{ Session::token() }},
              nama_pendonor: nama_pendonor,
              telepon: telepon;
              email: email,
              password: password,
              alamat: alamat,
              ttl: ttl,
              golongan_darah: golongan_darah,
              status: status
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
