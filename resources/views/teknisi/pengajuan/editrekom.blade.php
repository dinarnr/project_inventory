@extends('layout.master')
@section('title', 'Data Pengajuan')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">

        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Edit data pengajuan rekomendasi</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#"><span>Barang rekomendasi</span></a></li>
                    <li class="active"><span>edit barang rekomendasi</span></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view ">
                    <div class="panel-wrapper collapse in ">
                        <div class="panel-body">
                            <div class="form-wrap mt-3">
                                <form action="{{ url('teknisi/pengajuan/rekomendasi/ubah/simpan') }}" method="post" role="form" autocomplete="off">
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
