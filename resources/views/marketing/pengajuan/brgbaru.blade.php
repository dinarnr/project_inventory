@extends('layout.master')
@section('title', 'Data Barang Rekomendasi')
@section('content')

        <!-- Main Content -->
        <div class="page-wrapper">
            <div class="container-fluid">

                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark">Data Pengajuan Barang Rekomendasi</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#"><span>Pengajuan</span></a></li>
                            <li class="active"><span>Barang Rekomendasi</span></li>
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
                                    <!-- <a href="addbaru" class="btn btn-success btn-icon-anim">Tambah baru
                                    </a> -->
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
                                                            <th>Nama Barang</th>
                                                            <th>Jumlah</th>
                                                            <th>Keterangan</th>
                                                            <th>Tanggal pengajuan</th>
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
                                                            <td>{{ $data_baru->created_at}}</td> 
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
