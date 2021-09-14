@extends('layout.master')
@section('title', 'Data Peminjaman')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">edit data Peminjaman</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Data Peminjaman</a></li>
                    <li class="active"><span>edit Peminjaman</span></li>
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
                                <form action="{{ url('updatePinjam') }}" method="post" role="form" autocomplete="off">
                                    {{ csrf_field() }}
                                    
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">No<span class="help"> Peminjaman</span></label>
                                        <input type="text" class="form-control" value="{{ $peminjaman->no_peminjaman }}" name="edit_no" readonly >
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Nama Peminjam<span class="help"> </span></label>
                                        <input type="text" class="form-control" value="{{ $peminjaman->pic_teknisi }}" name="edit_nama" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Kebutuhan</label>
                                        <input type="text" class="form-control" value="{{ $peminjaman->kebutuhan }}" name="edit_kebutuhan" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Tanggal Pinjam</label>
                                        <input type="date" class="form-control" value="{{ $peminjaman->tglPinjam }}" name="edit_tgl_pinjam"  readonly>
                                    </div>
                                    <div class="form-group"> 
                                        <label class="control-label mb-10 text-left">Tanggal Kembali</label>
                                        <input type="date" class="form-control" value="{{ $peminjaman->tglKembali }}" name="edit_tgl_kembali">
                                    </div>
                                    <div class="form-group" style="text-align:right;">
                                        <button class="btn btn-success">Simpan</button>
                                        <!-- <button class="btn btn-danger  " name="reset" type="reset">Batal
                                        </button> -->
                                    </div>
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