@extends('layout.master')
@section('title', 'Data Pengajuan')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">

        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Edit pengajuan retur barang</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Pengajuan</a></li>
                    <li><a href="#"><span>Barang retur</span></a></li>
                    <li class="active"><span>edit pengajuan retur barang</span></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view ">
                    <div class="panel-wrapper collapse in ">
                        <div class="panel-body">
                            <div class="form-wrap mt-3">
                                <form action="{{ url('teknisi/pengajuan/retur/ubah/simpan') }}" method="post" role="form" autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" value="{{ $data_baru->id_pengajuan }}" name="edit_id_pengajuan">
                                            <label class="control-label mb-10 text-left" for="example-email">No PO <span class="help"> </span></label>
                                            <input type="text" value="{{ $data_baru->noPO }}" name="edit_noPO" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left" for="example-email">Nama Barang <span class="help"> </span></label>
                                            <input type="text" value="{{ $data_baru->namaBarang }}" name="edit_nama" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left" for="example-email">Jumlah Barang <span class="help"> </span></label>
                                            <input type="text" value="{{ $data_baru->jmlBarang }}" name="edit_jumlah" class="form-control" placeholder="">
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
    </div>
    @endsection