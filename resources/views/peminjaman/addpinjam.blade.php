@extends('layout.master')
@section('title', 'Tambah Pinjam')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Buat Peminjaman</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="purchasing">Peminjaman</a></li>
                    <li class="active"><span>Tambah Peminjaman</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view ">
                    <!-- <div class="panel-heading">
                                <div class="clearfix"></div>
                            </div> -->
                    <div class="panel-wrapper collapse in ">
                        <div class="panel-body">
                            <div class="form-wrap mt-3">
                                <form action="{{ url('addpinjam2') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- <div class="form-group">
                                        <label class="control-label mb-10 text-left" for="example-email">Nomor PO Barang</label>
                                        <input type="text" id="noPO" name="noPO" class="form-control" readonly>
                                    </div> -->
                                    <div class="row">
                                        @foreach ((array)$no_peminjaman as $no_peminjaman)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">NO Peminjaman</label>
                                                <input type="hidden" id="no_peminjaman2" name="no_peminjaman2" value="{{ $no_peminjaman }}" class="form-control" placeholder="" readonly>
                                                <input type="text" id="no_peminjaman" name="no_peminjaman" value="{{ $no_peminjaman }}" class="form-control" placeholder="" readonly>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Tanggal Pinjam</label>
                                                <input type="date" id="tgl_pinjam" name="tgl_pinjam" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Kebutuhan</label>
                                                <input type="text" id="kebutuhan" name="kebutuhan" value="" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="active">Data Barang</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10 text-left">Nama barang</label>
                                                <input type="text" class="form-control" name="nama_barang" id="nama_barang">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Jumlah</label>
                                                <input type="number" id="jumlah" name="jumlah" class="form-control">
                                                <!-- <span class="help-block"> This is inline help </span>  -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left" for="example-email">keterangan<span class="help"> </span></label>
                                        <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="">

                                        @error('keterangan')
                                        <div class="tulisan">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group" style="text-align:right;">
                                        <button type="button" onclick="ambildata()" class="btn btn-primary ">Tambah Data</button>
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
                                                    <div class="">
                                                        <div class="col">
                                                            <table class="table table-bordered align-items-center">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Nama barang</th>
                                                                        <th>Jumlah</th>
                                                                        <th>keterangan</th>
                                                                        <th>Remove</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="TabelDinamis">
                                                                </tbody>
                                                            </table>
                                                            @error('TabelDinamis')
                                                            <div class="tulisan">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="text-align:right;">
                                        <button type="submit" class="btn btn-primary ">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">

            <!-- Basic Table -->

        </div>
        <!-- /Row -->
        <!-- /Main Content -->
    </div>
    <!-- /#wrapper -->
    @endsection
    @section('scripts')
    <script type="text/javascript">
        function ambildata() {
            var no_peminjaman = document.getElementById('no_peminjaman').value;
            var nama_barang = document.getElementById('nama_barang').value;
            var jumlah = document.getElementById('jumlah').value;
            var keterangan = document.getElementById('keterangan').value;
            addrow(no_peminjaman, nama_barang, jumlah, keterangan);
        }
        var i = 0;

        function addrow(no_peminjaman, nama_barang, jumlah, keterangan) {
            i++;
            $('#TabelDinamis').append('<tr id="row' + i + '"><td><input type="text" style="outline:none;border:0;" readonly value="' + i +
                '"><td><input type="text" style="outline:none;border:0;" readonly name="nama_barang[]" id="nama_barang" value="' + nama_barang +
                '"></td><td><input type="text" style="outline:none;border:0;" name="jumlah[]" id="jumlah" value="' + jumlah +
                '"></td><td><input type="text" style="outline:none;border:0;" name="keterangan[]" id="keterangan" value="' + keterangan +
                '"></td><td style="display:none;"><input type="text" style="outline:none;border:0;" name="no_peminjaman[]" id="no_peminjaman" value="' + no_peminjaman +
                '"></td><td><button type="button" id="' + i + '" class="btn btn-danger btn-small remove_row">&times;</button></td></tr>');
        };
        $(document).on('click', '.remove_row', function() {
            var row_id = $(this).attr("id");
            $('#row' + row_id + '').remove();
        });
    </script>
    @endsection