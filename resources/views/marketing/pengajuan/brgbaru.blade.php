@extends('layout.master')
@section('title', 'Data Barang Rekomendasi')
@section('content')
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
                        </p>
                        <div class="clearfix"></div>

                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table id="datable_1" class="table table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Keterangan</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($data_baru as $data_baru)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data_baru->namaBarang}}</td>
                                                    <td>{{ $data_baru->keterangan}}</td>
                                                    <!-- <td>
                                                        <a href="{{ url('marketing/pengajuan/detailrekom') }}/{{ $data_baru->no_pengajuan }}"> <button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
                                                    </td> -->
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
            </div>
            <!-- /Main Content -->
        </div>
    </div>
</div>
@endsection
