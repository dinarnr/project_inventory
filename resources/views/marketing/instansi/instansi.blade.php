@extends('layout.master')
@section('title', 'Data Instansi')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data Instansi</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li class="active"><span>Data Instansi</span></li>
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
                            <a href="{{ url('marketing/instansi/tambah')}}" class="btn btn-success"> Tambah Data</a>
                        </p>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div class="">
                                        <table id="datable_1" class="table table-bordered display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kode Instansi</th>
                                                    <th>Nama Instansi</th>
                                                    <th>Email Instansi</th>
                                                    <th>Alamat Instansi</th>
                                                    <th>PIC Instansi</th>
                                                    <th>No HP Instansi</th>
                                                   
                                                    <th>Aksi</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach($data_instansi as $data_int)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data_int->kode_instansi }}</td>
                                                    <td>{{ $data_int->nama_instansi }}</td>
                                                    <td>{{ $data_int->email_instansi }}</td>
                                                    <td>{{ $data_int->alamat_instansi }}</td>
                                                    <td>{{ $data_int->pic_instansi }}</td>
                                                    <td>{{ $data_int->telp_instansi }}</td>
                                                    
                                                    <td>
                                                        <a href="{{url('marketing/instansi/ubah')}}/{{ $data_int->id_instansi }}"><button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-edit"></i></button></a>
                                                        <!-- <button class="btn btn-danger btn-icon-anim btn-square" data-toggle="modal" data-target="#hapusins{{ $data_int->id_instansi }}" action="( {{url('deleteinstansi')}}/{{ $data_int->id_instansi }})"><i class="fa fa-trash"></i></button> -->
                                                    </td>
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