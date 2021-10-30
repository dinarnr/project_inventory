@extends('layout.master')
@section('title', 'Data Pengajuan Pembelian')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Pengajuan Pembelian</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">

                        <div class="clearfix"></div>

                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div class="">
                                    <table id="datable_1" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>No Pengajuan</th>
                                                    <th>Tanggal Pengajuan</th>
                                                    <th>Nama Pemohon</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach($pembelian as $pembelian)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $pembelian->no_pengajuan}}</td>
                                                    <td>{{ date('d-m-Y',strtotime($pembelian->tgl_pengajuan)) }}</td>
                                                    <td>{{ $pembelian->nama_pemohon }}</td>
                                                    <td>
                                                            @if($pembelian->status === 1 )
                                                            Pengajuan ditolak Marketing
                                                            @elseif ($pembelian->status === 2 )
                                                            Pengajuan disetujui Marketing
                                                            @elseif ($pembelian->status === 3 )
                                                            Pengajuan ditolak Purchasing
                                                            @elseif ($pembelian->status === 4 )
                                                            Pengajuan disetujui Purchasing dan segera diproses
                                                            @else
                                                            Pengajuan diproses Marketing
                                                            @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{url('marketing/pengajuan/pembelian/detailpembelian') }}/{{$pembelian->no_pengajuan}} "><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
                                                        
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
            </div>
            <!-- /Row -->
        </div>
    </div>
    <!-- /Main Content -->
</div>
<!-- /#wrapper -->
@endsection