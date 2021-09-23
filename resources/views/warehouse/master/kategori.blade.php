@extends('layout.master')
@section('title', 'Data Kategori')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data kategori</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#"><span>Master Data</span></a></li>
                    <li class="active"><span>Data kategori</span></li>
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
                            <a href="{{ url('warehouse/kategori/tambah') }}" class="btn btn-success">Tambah baru
                            </a>
                        </p>
                        <div class="clearfix"></div>
                    </div>

                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="">
                                    <table id="datable_1" class="table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Kode kategori</th>
                                                <th>Kategori</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($data_kategori as $data_kategori)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data_kategori->kode_kategori }}</td>
                                                <td>{{ $data_kategori->kategori }}</td>
                                                <td>{{ $data_kategori->keterangan }}</td>
                                                <td>
                                                    <a href="{{ url('warehouse/kategori/ubah') }}/{{ $data_kategori->id_kategori }}"class="text-inverse pr-10" title="Edit" data-toggle="tooltip"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-edit"></i></button></a>
                                                    <!-- <button class="btn btn-danger btn-icon-anim btn-square " data-toggle="modal" data-target="#hapusktg{{ $data_kategori->id_kategori }}" action="( {{url('deletekategori')}}/{{ $data_kategori->id_kategori }})"><i class="fa fa-trash"></i></button> -->
                                                </td>
                                            </tr>
                                            
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Main Content -->
        </div>
        @endsection