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
                    <li><a href="#"><span>Pengajuan Barang Rekomendasi</span></a></li>
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
                                <form action="{{ url('teknisi/pengajuan/rekomendasi/simpan') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Nama<span class="help"> Barang</span></label>
                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="">
                                        @error('nama_barang')
                                        <div class="tulisan">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Keterangan Barang</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="">
                                        @error('keterangan')
                                        <div class="tulisan">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group" style=" text-align:right;">
                                        <button class="btn btn-success">Simpan</button>
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
<!-- /#wrapper -->
@endsection