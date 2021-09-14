@extends('layout.master')
@section('title', 'Data Pengajuan Barang Retur')
@section('content')

@if (auth()->user()->divisi == "teknisi")

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data Pengajuan Barang Retur</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#"><span>Pengajuan</span></a></li>
                    <li class="active"><span>Barang Retur</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <p>
                            <a href="addretur" class="btn btn-success btn-icon-anim">Tambah Pengajuan
                            </a>
                        </p>
                        <div class="clearfix"></div>

                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table id="datable_1" class="table table-bordered display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NO PO</th>
                                                    <th>Nama Pengajuan</th>
                                                    <th>Status</th>
                                                    <th>Tanggal pengajuan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($data_retur as $data_retur)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data_retur->noPO }}</td>
                                                    <td>{{ $data_retur->judul}}</td>
                                                    <td>
                                                        @if($data_retur->status === 1 )
                                                        Pengajuan ditolak Marketing
                                                        @elseif ($data_retur->status === 2 )
                                                        Pengajuan disetujui Marketing
                                                        @elseif ($data_retur->status === 3 )
                                                        Pengajuan ditolak Warehouse
                                                        @elseif ($data_retur->status === 4 )
                                                        Pengajuan disetujui Warehouse dan segera dikirim
                                                        @else
                                                        Pengajuan diproses Marketing
                                                        @endif
                                                    </td>
                                                    <td>{{ $data_retur->created_at}}</td>
                                                    <td>
                                                        <a href="/pengajuan/detailretur/{{$data_retur->kode}}"> <button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
                                                        @if ($data_retur->status >= 1)
                                                        <!-- <a> <button class="btn btn-success btn-icon-anim btn-square" disabled><i class="fa fa-edit"></i></button></a> -->
                                                        <button class="btn btn-danger btn-icon-anim btn-square" disabled><i class="fa fa-trash"></i></></button>
                                                        @else
                                                        <!-- <a href="pengajuan/editBaru/{{ $data_retur->id_pengajuan }}"> <button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-edit"></i></button></a> -->
                                                        <button class="btn btn-danger btn-icon-anim btn-square" data-toggle="modal" data-target="#hapusbaru" action=" {{url('deletebaru', $data_retur->id_pengajuan) }}"><i class="fa fa-trash"></i></></button>
                                                        @endif
                                                </tr>
                                                @include('pengajuan.hapusbrgretur')
                                                @endforeach
                                            </tbody>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Main Content -->
        </div>
        @endif

        @if (auth()->user()->divisi == "warehouse"||auth()->user()->divisi == "marketing")
        <!-- Main Content -->
        <div class="page-wrapper">
            <div class="container-fluid">

                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark">Data Pengajuan Barang Retur</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#"><span>Pengajuan</span></a></li>
                            <li class="active"><span>Barang Retur</span></li>
                        </ol>
                    </div>
                    <!-- /Breadcrumb -->
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default card-view">
                            <div class="panel-heading">
                                <p>
                                    <!-- <a href="addretur" class="btn btn-success btn-icon-anim">Tambah baru
                                    </a> -->
                                </p>
                                <div class="clearfix"></div>

                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="table-wrap">
                                        <div class="">
                                            <table id="datable_1" class="table table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Pengajuan</th>
                                                        <th>Status</th>
                                                        <th>Tanggal pengajuan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <!-------------------------------------------------------------- Warehouse ------------------------------------------------------->
                                                    @foreach ($data_retur as $data_retur)
                                                    <tr>
                                                        @if (auth()->user()->divisi == "warehouse")
                                                        @if($data_retur->status >=2 )
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data_retur->judul}}</td>
                                                        <td>
                                                            @if($data_retur->status === 1 )
                                                            Pengajuan ditolak Marketing
                                                            @elseif ($data_retur->status === 2 )
                                                            Pengajuan disetujui Marketing
                                                            @elseif ($data_retur->status === 3 )
                                                            Pengajuan ditolak Warehouse
                                                            @elseif ($data_retur->status === 4 )
                                                            Pengajuan disetujui Warehouse dan segera dikirim
                                                            @else
                                                            Pengajuan diproses Marketing
                                                            @endif
                                                        </td>
                                                        <td>{{ $data_retur->created_at}}</td>
                                                        <td>
                                                            <!-- <a href="#"> <button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a> -->
                                                            @if ($data_retur->status >= 3)
                                                            <button class="btn btn-success btn-icon-anim btn-square" disabled><i class="fa fa-check"></i></button>
                                                            <button class="btn btn-danger btn-icon-anim btn-square" disabled><i class="fa fa-times"></i></button>
                                                            @else
                                                            <button class="btn btn-success btn-icon-anim btn-square" data-toggle="modal" data-target="#confirm{{ $data_retur->id_pengajuan }}" action="( {{url('Confirm')}}/{{ $data_retur->id_pengajuan }})"><i class="fa fa-check"></i></button>
                                                            <button class="btn btn-danger btn-icon-anim btn-square" data-toggle="modal" data-target="#reject{{ $data_retur->id_pengajuan }}" action="( {{url('Reject')}}/{{ $data_retur->id_pengajuan }})"><i class="fa fa-times"></i></button>
                                                            @endif
                                                            @endif
                                                            <!-------------------------------------------------------------- MARKETING ------------------------------------------------------------>
                                                            @elseif (auth()->user()->divisi == "marketing")
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data_retur->judul}}</td>
                                                        <td>
                                                            @if($data_retur->status === 1 )
                                                            Pengajuan ditolak Marketing
                                                            @elseif ($data_retur->status === 2 )
                                                            Pengajuan disetujui Marketing
                                                            @elseif ($data_retur->status === 3 )
                                                            Pengajuan ditolak Warehouse
                                                            @elseif ($data_retur->status === 4 )
                                                            Pengajuan disetujui Warehouse dan segera dikirim
                                                            @else
                                                            Pengajuan diproses Marketing
                                                            @endif  
                                                        </td>
                                                        <td>{{ $data_retur->created_at}}</td>
                                                        <td>
                                                            <!-- <a href="/pengajuan/detailretur/{{$data_retur->id_pengajuan}}"> <button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a> -->
                                                            @if ($data_retur->status >= 1)
                                                            <button class="btn btn-success btn-icon-anim btn-square" disabled><i class="fa fa-check"></i></button>
                                                            <button class="btn btn-danger btn-icon-anim btn-square" disabled><i class="fa fa-times"></i></button>
                                                            @else
                                                            <button class="btn btn-success btn-icon-anim btn-square" data-toggle="modal" data-target="#confirm{{ $data_retur->id_pengajuan }}" action="( {{url('Confirm')}}/{{ $data_retur->id_pengajuan }})"><i class="fa fa-check"></i></button>
                                                            <button class="btn btn-danger btn-icon-anim btn-square" data-toggle="modal" data-target="#reject{{ $data_retur->id_pengajuan }}" action="( {{url('Reject')}}/{{ $data_retur->id_pengajuan }})"><i class="fa fa-times"></i></button>
                                                            @endif
                                                            @endif
                                                    </tr>
                                                    @include('pengajuan.confirm')
                                                    @include('pengajuan.reject')
                                                    @include('pengajuan.hapusbrgretur')
                                                    @endforeach
                                                </tbody>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Main Content -->
            </div>
            @endif
            <!-- /#wrapper -->
            @endsection
