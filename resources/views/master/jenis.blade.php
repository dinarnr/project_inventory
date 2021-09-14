@extends('layout.master')
@section('title', 'Data Jenis')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data jenis barang</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#"><span>Master Data</span></a></li>
                    <li class="active"><span>Jenis barang</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    
                    @if(auth()->user()->divisi != "office")
                        <div class="panel-heading">
                            <p>
                                <a href="jenis/addjenis" class="btn btn-success">Tambah baru</a>
                            </p>
                            @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session('success') }}
                                </div>
                            @endif 
                        </div> 
                    @endif
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="">
                                    <table id="datable_1" class="table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Jenis barang</th>
                                                <th>Keterangan</th>
                                                @if(auth()->user()->divisi != "office")
                                                <th>Aksi</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($data_jenis as $data_jenis)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data_jenis->jenis_barang }}</td>
                                                <td>{{ $data_jenis->keterangan }}</td>
                                                @if(auth()->user()->divisi != "office")
                                                <td>
                                                    <a href="/jenis/editJenis/{{ $data_jenis->id_jenis }}"><button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-edit"></i></button></a>
                                                    <button class="btn btn-danger btn-icon-anim btn-square" data-toggle="modal" data-target="#hapusjns{{ $data_jenis->id_jenis }}" action="( {{url('deletejenis')}}/{{ $data_jenis->id_jenis }})"><i class="fa fa-trash"></i></button>
                                                </td>
                                                @endif
                                            </tr>
                                            @include('master.hapusjenis')
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->

        <!-- /Main Content -->
    </div>
    @endsection