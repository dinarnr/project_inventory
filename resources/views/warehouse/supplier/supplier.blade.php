@extends('layout.master')
@section('title', 'Data Supplier')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data supplier</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li class="active"><span>Data supplier</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </div>
                @endif
                    <div class="panel-heading">
                        <p>
                            <a href="{{ url('warehouse/supplier/tambah') }}" class="btn btn-success"> Tambah Data</a>
                        </p>
                       

                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div class="">
                                        <table id="datable_1" class="table table-bordered display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kode supplier</th>
                                                    <th>Nama Supplier</th>
                                                    <th>Email supplier</th>
                                                    <th>Alamat supplier</th>
                                                    <th>PIC supplier</th>
                                                    <th>No HP supplier</th>
                                                    @if(auth()->user()->divisi != "office")
                                                    <th>Aksi</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach($data_supplier as $data_supplier)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data_supplier->kode_supplier }}</td>
                                                    <td>{{ $data_supplier->nama_supplier }}</td>
                                                    <td>{{ $data_supplier->email_supplier }}</td>
                                                    <td>{{ $data_supplier->alamat_supplier }}</td>
                                                    <td>{{ $data_supplier->pic_supplier }}</td>
                                                    <td>{{ $data_supplier->telp_supplier }}</td>
                                                    @if(auth()->user()->divisi != "office")
                                                    <td>
                                                        <a href="{{ url('warehouse/supplier/ubah') }}/{{ $data_supplier->id_supplier }}"><button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-edit"></i></button></a>
                                                        <!-- <button class="btn btn-danger btn-icon-anim btn-square" data-toggle="modal" data-target="#hapussup{{ $data_supplier->id_supplier }}" action="( {{url('deletesupplier')}}/{{ $data_supplier->id_supplier }})"><i class="fa fa-trash"></i></button> -->
                                                    </td>
                                                    @endif
                                                </tr>
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
        <!-- /#wrapper -->
        @endsection