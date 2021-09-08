{{-- Extends from layouts/master.blade.css --}}
@extends('layouts.master')

@section('title')
  Stok Darah
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
  Data Stok Darah
@endsection

@section('content')
  <div class="content mt-3">
    <div class="col-md-12">
      @include('layouts.flash')
      <div class="card">
        <div class="card-header container-fluid">
          <div class="row">
            <div class="col-md-9">
              <h4 class="p-3">Stok Darah</h4>
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
                  @foreach ($data[0]['stok'] as $item)
                    <td>{{ $item }}</td>
                  @endforeach
                </tr>
                <tr>
                  <td>2</td>
                  <td>PRC</td>
                  @foreach ($data[1]['stok'] as $item)
                    <td>{{ $item }}</td>
                  @endforeach
                </tr>
                <tr>
                  <td>3</td>
                  <td>TC</td>
                  @foreach ($data[2]['stok'] as $item)
                    <td>{{ $item }}</td>
                  @endforeach
                </tr>
                <tr>
                  <td>4</td>
                  <td>FFP</td>
                  @foreach ($data[3]['stok'] as $item)
                    <td>{{ $item }}</td>
                  @endforeach
                </tr>
                <tr>
                  <td>5</td>
                  <td>AHF</td>
                  @foreach ($data[4]['stok'] as $item)
                    <td>{{ $item }}</td>
                  @endforeach
                </tr>
                <tr>
                  <td>6</td>
                  <td>LP</td>
                  @foreach ($data[5]['stok'] as $item)
                    <td>{{ $item }}</td>
                  @endforeach
                </tr>
                <tr>
                  <td>7</td>
                  <td>WE</td>
                  @foreach ($data[6]['stok'] as $item)
                    <td>{{ $item }}</td>
                  @endforeach
                </tr>
                <tr>
                  <td>8</td>
                  <td>FP</td>
                  @foreach ($data[7]['stok'] as $item)
                    <td>{{ $item }}</td>
                  @endforeach
                </tr>
                <tr>
                  <td>9</td>
                  <td>Leucodeplete</td>
                  @foreach ($data[8]['stok'] as $item)
                    <td>{{ $item }}</td>
                  @endforeach
                </tr>
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
              <form action="{{ route('admin.stokdarah.import') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                  <input type="file" class="form-control-file" name="file">
                </div>
                <button type="submit" class="btn btn-danger float-right">Import</button>
              </form>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col">
              <form action="{{ route('admin.stokdarah.create') }}" method="post">
                @csrf
                @method('POST')
                <div class="form-group">
                  <label for="produk">Produk Darah</label>
                  <select name="produk" class="form-control">
                    <option value="" selected>pilih...</option>
                    <option value="WB">WB</option>
                    <option value="PRC">PRC</option>
                    <option value="TC">TC</option>
                    <option value="FFP">FFP</option>
                    <option value="AHF">AHF</option>
                    <option value="LP">LP</option>
                    <option value="WE">WE</option>
                    <option value="FP">FP</option>
                    <option value="Leucodeplete">Leucodeplete</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="jenis_darah">Jenis Darah</label>
                  <select name="jenis_darah" class="form-control">
                    <option value="">pilih...</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input type="number" name="jumlah" class="form-control">
                </div>
                <button id="btnadd" onclick="addStokDarah()" class="btn btn-success float-right">Tambah</button>
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
          var produk = $('select[name="produk"] option').filter(':selected').val()
          var jenis_darah = $('select[name="jenis_darah"] option').filter(':selected').val()
          var jumlah = $('input['
            name = "jumlah"]).val() if (produk != "" && jenis_darah != "" && jumlah != undefined) {
          $.ajax({
            url: "{{ route('admin.stokdarah.create') }}",
            type: "POST",
            data: {
              _token: {{ Session::token() }},
              produk: produk,
              jenis_darah: jenis_darah,
              jumlah: jumlah
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
          alert('Field tidak boleh kosong!');
        }
      });
    });
  </script>
@endsection
