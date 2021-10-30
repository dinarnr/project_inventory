@extends('layout.master')
@section('title', 'Data Instansi')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">edit data instansi</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#"><span>data instansi</span></a></li>
                    <li class="active"><span>edit data instansi</span></li>
                </ol>
            </div>
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view ">
                    <div class="panel-wrapper collapse in ">
                        <div class="panel-body">
                            <div class="form-wrap mt-3">
                                <form action="{{ url('marketing/instansi/ubah/simpan') }}" method="post" role="form" autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" value="{{ $data_instansi->id_instansi }}" name="edit_id_ins">
                                            <label class="control-label mb-10 text-left" for="example-email">Kode instansi <span class="help"> </span></label>
                                            <input type="text" value="{{ $data_instansi->kode_instansi }}" name="edit_kode" class="form-control" placeholder="" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left" for="example-email">Nama instansi <span class="help"> </span></label>
                                            <input type="text" value="{{ $data_instansi->nama_instansi }}" name="edit_nama" class="form-control" placeholder="">
                                            @if ($errors->has('nama_instansi'))
                                            <div class="alert alert-danger">{{$errors->first('nama_instansi')}}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left" for="example-email">Email instansi <span class="help"> </span></label>
                                            <input type="email" value="{{ $data_instansi->email_instansi }}" name="edit_email" class="form-control" placeholder="">
                                            @if ($errors->has('email_instansi'))
                                            <div class="alert alert-danger">{{$errors->first('email_instansi')}}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left">Alamat</label>
                                            <textarea type="text" name="edit_alamat" class="form-control" rows="3">{{ $data_instansi->alamat_instansi }}</textarea>
                                            @if ($errors->has('alamat_instansi'))
                                            <div class="alert alert-danger">{{$errors->first('alamat_instansi')}}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left" for="example-email">PIC instansi <span class="help"> </span></label>
                                            <input type="text" value="{{ $data_instansi->pic_instansi }}" name="edit_pic" class="form-control" placeholder="">
                                            @if ($errors->has('pic_instansi'))
                                            <div class="alert alert-danger">{{$errors->first('pic_instansi')}}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left" for="example-email">No HP instansi <span class="help"> </span></label>
                                            <input type="number" value="{{ $data_instansi->telp_instansi }}" name="edit_no" class="form-control" placeholder="">
                                            @if ($errors->has('telp_instansi'))
                                            <div class="alert alert-danger">{{$errors->first('telp_instansi')}}</div>
                                            @endif
                                        </div>
                                        <div class="form-group" style="text-align: right;">
                                            <button class="btn btn-success">Simpan</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection