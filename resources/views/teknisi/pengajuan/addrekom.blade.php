@extends('layout.master')
@section('title', 'Data Pengajuan')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Tambah Pengajuan Barang Rekomendasi</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Pengajuan</a></li>
                    <li><a href="/brgretur"><span>Pengajuan Barang Rekomendasi</span></a></li>
                    <li class="active"><span>Tambah Pengajuan Barang Rekomendasi</span></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view ">
                    <div class="panel-wrapper collapse in ">
                        <div class="panel-body">
                            <div class="form-wrap mt-3">
                                <form action="{{ url('teknisi/pengajuan/rekomendasi/simpan') }}" method="POST" enctype="multipart/form-data" name="myForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
											@foreach ((Array) $no_peng as $no_pengajuan)
											<div class="form-group">
												<label class="control-label mb-10">No Pengajuan</label>
												<input type="hidden" id="no_pengajuan" name="no_pengajuan" value="{{$no_pengajuan }} " class="form-control" placeholder="" readonly>
                                                <input type="text" id="no_peng" name="no_peng" value="{{$no_pengajuan }} " class="form-control" placeholder="" readonly>
											</div>
											@endforeach
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Nama Barang</label>
                                                <input name="nama_barang" id="nama_barang" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6" hidden>
											<div class="form-group">
												<label class="control-label mb-10">Jenis</label>
                                                <input type="text" name="jns_brg" id="jns_brg" value="Rekomendasi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Jumlah</label>
                                                <input type="number" id="jumlah" name="jumlah" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 "> 
                                            <div class="form-group">
                                                <label class="control-label mb-10 text-left" for="example-email">Keterangan<span class="help"> </span></label>
                                                <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">

                                        <div class="col-md-6 "> 
                                            <div class="form-group">
                                                <label class="control-label mb-10 text-left" for="example-email">Tanggal Pengajuan</label>
                                                <input type="date" id="tgl_pengajuan" name="tgl_pengajuan" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="form-group" style="text-align:right;">
                                        <button type="button" onclick="ambildata()" class="btn btn-success ">Tambah Data</button>
                                    </div>

                                    <div class="col-sm-14">
                                        <div class="panel panel-default card-view">
                                            <div class="panel-heading">
                                                <div class="pull-left">
                                                    <h6 class="panel-title txt-dark">Barang Masuk</h6>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                        @csrf
                                                        <div class="">
                                                            <div class="col">
                                                                <table class="table table-bordered align-items-center">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th>No Pengajuan</th>
                                                                            <th>Nama barang</th>
                                                                            <th>Jumlah</th>
                                                                            <th>Remove</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="TabelDinamis">
                                                                        </tbody>
                                                                    </table>
                                                                    <div class="col-md-12" style="text-align:right;">
																		<button type="submit" class="btn btn-primary ">Simpan</button>
																	</div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        function ambildata() {
            
            var nama = document.forms["myForm"]["nama_barang"].value;
            var jumlah = document.forms["myForm"]["jumlah"].value;
            var keterangan = document.forms["myForm"]["keterangan"].value;

            if (nama == "") {
                alert("Nama Barang tidak boleh kosong");
                return false;
            } else if (jumlah == "") {
                alert("Jumlah tidak boleh kosong");
                return false;
            } else if (keterangan == "") {
                alert("Keterangan tidak boleh kosong");
                return false;
            } 


            var no_peng = document.getElementById('no_peng').value;
            var nama_barang = document.getElementById('nama_barang').value;
            var jumlah = document.getElementById('jumlah').value;
           
            addrow(no_peng, nama_barang, jumlah);
        }
        var i = 0;

        function addrow(no_peng, nama_barang, jumlah) {
            i++;
            $('#TabelDinamis').append('<tr id="row' + i + '"><td><input type="text" style="outline:none;border:0;" readonly name="no_peng[]" id="no_peng" value="' + no_peng + 
            '"></td><td><input type="text" style="outline:none;border:0;" readonly name="nama_barang[]" id="nama_barang" value="' + nama_barang + 
            '"></td><td><input type="text" style="outline:none;border:0;" name="jumlah[]" id="jumlah" value="' + jumlah + 
            '"></td><td><button type="button" id="' + i + '" class="btn btn-danger btn-small remove_row">&times;</button></td></tr>');
        };
        $(document).on('click', '.remove_row', function() {
            var row_id = $(this).attr("id");
            $('#row' + row_id + '').remove();
        });

    </script>
@endsection