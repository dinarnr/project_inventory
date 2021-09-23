@extends('layout.master')
@section('title', 'Data Pengajuan')
@section('content')


<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Tambah data pembelian</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Pembelian</a></li>
                    <li><a href="#"><span>Barang baru</span></a></li>
                    <li class="active"><span>Tambah data pembelian</span></li>
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
                                <form action="{{ url('updateBaru') }}" method="post" role="form" autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" value="{{ $data_baru->id_pengajuan }}" name="edit_id_pengajuan">
                                            <label class="control-label mb-10 text-left" for="example-email">Nama Barang <span class="help"> </span></label>
                                            <input type="text" value="{{ $data_baru->judul }}" name="edit_nama" class="form-control" placeholder="">
                                            @error('edit_nama')
                                            <div class="tulisan">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left" for="example-email">Jumlah <span class="help"> </span></label>
                                            <input type="text" value="{{ $data_baru->jumlah }}" name="edit_jumlah" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left" for="example-email">Keterangan <span class="help"> </span></label>
                                            <input type="text" value="{{ $data_baru->keterangan }}" name="edit_keterangan" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Simpan</button>
                                        <button class="btn btn-danger  " name="reset" type="reset">Batal
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
        <!-- /Main Content -->
    </div>
    <!-- /#wrapper -->
    @endsection
