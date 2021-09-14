@extends('layout.master')
@section('title', 'Data Kategori')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">edit kategori barang</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">master data</a></li>
                    <li><a href="#"><span>data kategori</span></a></li>
                    <li class="active"><span>edit kategori</span></li>
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
                                <form action="{{ url('updateKategori') }}" method="post" role="form" autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $data_kategori->id_kategori }}" name="edit_id_ktg">
                                        <label class="control-label mb-10 text-left">Kode<span class="help"> Kategori</span></label>
                                        <input type="text" class="form-control" value="{{ $data_kategori->kode_kategori }}" name="edit_kode" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Nama<span class="help"> Kategori</span></label>
                                        <input type="text" class="form-control" value="{{ $data_kategori->kategori }}" name="edit_kategori" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Keterangan</label>
                                        <input type="text" class="form-control" value="{{ $data_kategori->keterangan }}" name="edit_keterangan">
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