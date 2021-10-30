@extends('layout.master')
@section('title', 'Detail Pengajuan Barang Baru')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Detail Pengajuan Barang Baru</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="inventory"></a></li>
                    <li class="active"><span> </span></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="">
                                    <table id="myTable1" class="table table-bordered display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>Kode Pengajuan</th>
                                                <th>No PO</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah Barang</th>
                                                <th>Jenis Barang</th>
                                                <th>Keterangan</th>
                                                <th colspan="3">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_detail as $detail)
                                            <tr>
                                                <td>{{$detail->kode}}</td>
                                                <td>{{$detail->noPO}}</td>
                                                <td>{{$detail->namaBarang}}</td>
                                                <td>{{$detail->jmlBarang}}</td>
                                                <td>{{$detail->jenisBarang}}</td>
                                                <td>{{$detail->keterangan}}</td>
                                                <td>
                                                    <a href="#"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-eye"></i></button></a>
                                                    <a href="#"><button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-edit"></i></button></a>
                                                    <button class="btn btn-danger btn-icon-anim btn-square" data-toggle="modal" data-target="#" action="#"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 mt-20">
                                        <div class="panel panel-default card-view">
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="table-wrap">
                                                        <div class="">
                                                            <table id="myTable1" class="table table-bordered display  pb-30">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Kode Barang </th>
                                                                        <th>Nama Barang</th>
                                                                        <th>Jenis</th>
                                                                        <th>Stok</th>
                                                                        <th>Gambar</th>
                                                                        <th>Status</th>
                                                                        <th colspan="3">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($barang as $brg)
                                                                    <tr>
                                                                        <td>{{$brg->kode_barang}}</td>
                                                                        <td>{{$brg->nama_barang}}</td>
                                                                        <td>{{$brg->jenis_barang}}</td>
                                                                        <td>{{$brg->stok}}</td>
                                                                        <td>
                                                                            @if($brg->gambar)
                                                                            <img src="{{ url('img/logo') }}/{{ $brg->gambar }}" style="width: 150px; height: 150px;">
                                                                            @endif
                                                                        </td>
                                                                        <td>{{$brg->status}}</td>
                                                                        <td>
                                                                            <a href="#"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-eye"></i></button></a>
                                                                            <a href="/databrg/editBarang/{{ $brg->id_master }}"><button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-edit"></i></button></a>
                                                                            <button class="btn btn-danger btn-icon-anim btn-square" data-toggle="modal" data-target="#hapusbrg{{ $brg->id_master }}" action="( {{url('deletebarang')}}/{{ $brg->id_master }})"><i class="fa fa-trash"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                    @include('master.hapusbrg')
                                                                    @endforeach
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-warp">
                                                    <h5 class="txt-dark">Detail Pengajuan Barang Baru</h5>
                                                    <table class="table display">
                                                        @foreach ($data_baru as $data_baru)
                                                        <tr>
                                                            <th width="200px">No PO</th>
                                                            <th width="10px"> : </th>
                                                            <th>{{ $data_baru->noPO }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Nama Barang</th>
                                                            <th> : </th>
                                                            <th>{{ $data_baru->namaBarang }}</th>

                                                        </tr>
                                                        <tr>
                                                            <th>Jenis Barang</th>
                                                            <th> : </th>
                                                            <th>{{ $data_baru->jenisBarang }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Jumlah Barang</th>
                                                            <th> : </th>
                                                            <th>{{ $data_baru->jmlBarang }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th> : </th>
                                                            <th>{{ $data_baru->status }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Keterangan</th>
                                                            <th> : </th>
                                                            <th>{{ $data_baru->keterangan }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>PIC Teknisi</th>
                                                            <th> : </th>
                                                            <th>{{ $data_baru->pic_teknisi }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>PIC Marketing</th>
                                                            <th> : </th>
                                                            <th>{{ $data_baru->pic_marketing }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>PIC Warehouse</th>
                                                            <th> : </th>
                                                            <th>{{ $data_baru->pic_warehouse }}</th>
                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                    <div>
                                                        <a href="/brgbaru"> <button class="btn btn-primary btn-icon-anim btn-square">back<i class="fa-arrow-rotate-left"></i></button></a>
                                                        @if ($data_baru->status >= 1)
                                                        <button class="btn btn-success btn-icon-anim btn-square" disabled><i class="fa fa-check"></i></button>
                                                        <button class="btn btn-danger btn-icon-anim btn-square" disabled><i class="fa fa-times"></i></button>
                                                        @else
                                                        <button class="btn btn-success btn-icon-anim btn-square" data-toggle="modal" data-target="#confirm{{ $data_baru->id_pengajuan }}" action="( {{url('Confirm')}}/{{ $data_baru->id_pengajuan }})"><i class="fa fa-check"></i></button>
                                                        <button class="btn btn-danger btn-icon-anim btn-square" data-toggle="modal" data-target="#reject{{ $data_baru->id_pengajuan }}" action="( {{url('Reject')}}/{{ $data_baru->id_pengajuan }})"><i class="fa fa-times"></i></button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endsection