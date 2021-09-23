@extends('layout.master')
@section('title', 'Data Barang Rekomendasi')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data Pengajuan Barang Rekomendasi</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#"><span>Pengajuan</span></a></li>
                    <li class="active"><span>Barang Rekomendasi</span></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <p>
                            <a href="{{ url('teknisi/pengajuan/rekomendasi/tambah') }}" class="btn btn-success btn-icon-anim">Tambah Pengajuan
                            </a>
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
                                                    <th>Jumlah</th>
                                                    <th>Keterangan</th>
                                                    <th>Status</th>
                                                    <th>Tanggal pengajuan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($data_baru as $data_baru)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data_baru->judul}}</td>
                                                    <td>{{ $data_baru->jumlah}}</td>
                                                    <td>{{ $data_baru->keterangan}}</td>
                                                    <td>{{ $data_baru->status}}</td>
                                                    <td>{{ $data_baru->created_at}}</td>
                                                    <td>
                                                        <a href="{{ url('teknisi/pengajuan/rekomendasi/ubah') }} / {{ $data_baru->id_pengajuan }}"> <button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-edit"></i></button></a>
                                                    </td>
                                                </tr>
                                                @include('pengajuan.hapusbrgbaru')
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
        @endsection
