@extends('layout.master')
@section('title', 'Data Transaksi')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data Barang Masuk</h5><br>
                <a href="#" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> BARU</a>
                <a href="#" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> RETUR</a>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="inventory">Transaksi</a></li>
                    <li class="active"><span>Data Barang Masuk</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <!-- <h6 class="panel-title txt-dark">DataTable</h6> -->
                            <!-- <button data-toggle="modal" data-target="#myModal" class="btn btn-success col-mr-2" >Tambah Barang</button> -->
                            <a href="brgmasuk/addmasuk" class="btn btn-success float-right col-mr-3"><i class="fa fa succes"></i>
                                Tambah Data
                            </a>
                            <!-- <button class="btn btn-primary btn-sm btn-icon mb-3"><i class="fa fa-plus fa-sm"></i> Tambah Data</button> -->
                        </div>
                        <div class="clearfix"></div>
                        <div id="myTable1_wrapper" class="dataTables_wrapper">
                            <div class="dataTables_length" id="myTable1_length"><label>Show <select name="myTable1_length" aria-controls="myTable1" class="">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                            <div id="myTable1_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="myTable1"></label></div>
                            <table id="myTable1" class="table table-hover display dataTable dtr-inline" role="grid" aria-describedby="myTable1_info" style="width: 1253px;">
                        </div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="">
                                    <table id="myTable1" class="table table-bordered display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>No transaksi</th>
                                                <th>Supplier</th>
                                                <th>Jenis transaksi</th>
                                                <th>Tanggal terima</th>
                                                <th>Created at</th>
                                                <!-- <th>Pengirim</th> -->
                                                <!-- <th>Penerima</th>/ -->
                                                <!-- <th>Ekspedisi</th> -->
                                                <!-- <th>Kondisi</th> -->
                                                <th colspan="3">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($transaksi_masuk as $transaksi_masuk)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $transaksi_masuk->no_transaksi}}</td>
                                                <td>{{ $transaksi_masuk->nama_supplier }}</td>
                                                <td>{{ $transaksi_masuk->jns_transaksi }}</td>
                                                <td>{{ $transaksi_masuk->tgl_transaksi->format('d/m/y')}}</td>
                                                <td>{{ $transaksi_masuk->created_at }}</td>
                                                <!-- <td>{{ $transaksi_masuk->pengirim }}</td> -->
                                                <!-- <td>{{ $transaksi_masuk->penerima }}</td> -->
                                                <!-- <td>{{ $transaksi_masuk->ekspedisi }}</td> -->
                                                <!-- <td>{{ $transaksi_masuk->kondisi }}</td> -->
                                                <td>
                                                    <a href="#"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-eye"></i></button></a>
                                                    <a href="#"><button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-edit"></i></button></a>
                                                    <button class="btn btn-danger btn-icon-anim btn-square" data-toggle="modal" data-target="#" action="#"><i class="fa fa-trash"></i></button>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        @include('transaksi.editbrgmasuk')
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
        @include('transaksi.hapusbrngmasuk')
    </div>
</div>
<!-- /Main Content -->
</div>
<!-- /#wrapper -->
@endsection