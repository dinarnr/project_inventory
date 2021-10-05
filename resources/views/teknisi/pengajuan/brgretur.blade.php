@extends('layout.master')
@section('title', 'Data Pengajuan Barang Retur')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">

        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data Pengajuan Barang Retur</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#"><span>Pengajuan</span></a></li>
                    <li class="active"><span>Barang Retur</span></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <p>
                            <a href="{{ url('teknisi/pengajuan/retur/tambah')}}" class="btn btn-success btn-icon-anim">Tambah Pengajuan
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
                                                    <th>Keterangan</th>
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
                                                    <td>{{ $data_retur->keterangan}}</td>
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
                                                    <td>{{ date('d-m-Y',strtotime($data_retur->tgl_pengajuan))}}</td>
                                                    <td>
                                                        <a href="{{ url('teknisi/pengajuan/retur/detail') }}/{{ $data_retur->no_pengajuan }}"> <button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
                                                        
                                                @endforeach
                                            </tbody>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection