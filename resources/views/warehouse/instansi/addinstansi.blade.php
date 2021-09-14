@extends('layout.master')
@section('title', 'Data Instansi')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Tambah Data Instansi</h5>
            </div>
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <form action="{{ url('warehouse/instansi/simpan') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="control-label mb-10 text-left" for="example-email">Nama <span class="help"> </span></label>
                                <input type="text" id="nama_instansi" name="nama_instansi" class="form-control" placeholder="">
                                @error('nama_instansi')
                                <div class="tulisan">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left" for="example-email">Email <span class="help"> </span></label>
                                <input type="email" id="email_instansi" name="email_instansi" class="form-control" placeholder="">
                                @error('email_instansi')
                                <div class="tulisan">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">PIC Instansi</label>
                                <input type="text" id="pic_instansi" name="pic_instansi" class="form-control" value="">
                                @error('pic_instansi')
                                <div class="tulisan">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Alamat</label>
                                <textarea id="alamat_instansi" name="alamat_instansi" class="form-control" rows="3"></textarea>
                                @error('alamat_instansi')
                                <div class="tulisan">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left"> No HP <span class="help"> </span></label>
                                <input type="number" id="telp_instansi" name="telp_instansi" class="form-control" placeholder="">
                                @error('telp_instansi')
                                <div class="tulisan">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group" style="text-align:right;">
                                <button class="btn btn-success mr-5" name="submit" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Row -->
                </div>
            </div>
        </div>
        <!-- /Main Content -->
    </div>
    <!-- /#wrapper -->
    @endsection