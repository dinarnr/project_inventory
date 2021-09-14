@extends('layout.master')
@section('title', 'Data Transaksi')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data Barang Keluar</h5><br>
                <a href="transaksi/addmasukbaru" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> BARU</a>
                <a href="transaksi/addmasukretur" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> RETUR</a>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="inventory">Transaksi</a></li>
                    <li class="active"><span>Data Barang Keluar</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12 mt-10">
                <div class="panel panel-default card-view">
                    
                    
                </div>
            </div>
        </div>
        <!-- /Row -->
        @include('transaksi.hapusbrngkeluar')
    </div>
</div>
<!-- /Main Content -->
</div>
<!-- /#wrapper -->
@endsection