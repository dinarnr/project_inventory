@extends('layout.master')
@section('title', 'Data Peminjaman')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data peminjaman</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li class="active"><span>Data peminjaman</span></li>
                </ol>
            </div>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                       
                        <div class="clearfix"></div>

                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table id="datable_1" class="table table-bordered display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>No Peminjaman</th>
                                                    <th>Nama Peminjam</th>
                                                    <th>Kebutuhan</th>
                                                    <th>Tanggal Pinjam</th>
                                                    <th>Tanggal kembali</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach($peminjaman as $peminjaman)
                                                <tr>
                                                    <td>{{ $peminjaman->no_peminjaman }}</td>
                                                    <td>{{ $peminjaman->pic_teknisi }}</td>
                                                    <td>{{ $peminjaman->kebutuhan }}</td>
                                                    <td>{{ date('d-m-Y',strtotime($peminjaman->tglPinjam)) }}</td>

                                                    <td>@if (empty($peminjaman->tglKembali))
                                                        @else
                                                        {{ date('d-m-Y',strtotime($peminjaman->tglKembali)) }}
                                                        @endif
                                                    </td>

                                                    <td style="text-align:center;">
                                                        @if(empty($peminjaman->status))
                                                        <button class="btn btn-primary btn-sm btn-rounded">Pinjam</button>
                                                        @elseif($peminjaman->status = 1 )
                                                        <button class="btn btn-warning btn-sm btn-rounded">Diproses Warehouse</button>
                                                        @else
                                                        <button class="btn btn-success btn-sm btn-rounded">Dikembalikan</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                    
                                                        <a href="{{url('warehouse/peminjaman/detail')}}/{{ $peminjaman->no_peminjaman}}"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
                                                    
                                                        <!-- <a href="/peminjaman/{{ $peminjaman->no_peminjaman }}"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-edit"></i></button></a> -->
                                                        <!-- <button class="btn btn-success btn-icon-anim btn-square" data-toggle="modal" data-target="#confirm{{ $peminjaman->no_peminjaman}}" action="( {{url('warehouse/peminjaman/confirm')}}/{{ $peminjaman->no_peminjaman}})"><i class="fa fa-check"></i></button> -->
                                                        @include('warehouse.peminjaman.confirm')
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