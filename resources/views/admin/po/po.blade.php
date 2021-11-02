@extends('layout.master')
@section('title', 'Data Purchase Order')
@section('content')
 
 <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Data Purchase Order</h5>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li class="active"><span>Data Purchasing</span></li>
                    </ol>
                </div>
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
                                        <div class="table-responsive">
                                            <table id="datable_1" class="table table-bordered display pb-30">
                                                <thead>
                                                    <tr>
                                                        <th>no</th>
                                                        <th>No PO</th>
                                                        <th>Instansi</th>
                                                        <th>Tanggal Pemasangan</th>
                                                        <th>Status</th>
                                                        <th>Tanggal Pembuatan PO</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    @foreach ($data_po_wh as $data_po)
                                                    <tr>
                                                        @if (auth()->user()->divisi == "admin")
                                                        @if($data_po->status >=2 )
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data_po->no_PO}}</td>
                                                        <td>{{ $data_po->instansi}}</td>
                                                        <td>{{ $data_po->tgl_pemasangan}}</td>
                                                        <td>
                                                            @if($data_po->status === 1 )
                                                            Purchase Order diproses Warehouse
                                                            @elseif ($data_po->status === 2 )
                                                            Purchase Order disetujui Warehouse
                                                            @elseif ($data_po->status === 3 )
                                                            Purchase Order ditolak Admin
                                                            @elseif ($data_po->status === 4 )
                                                            Purchase Order disetujui Warehouse dan dalam proses pembelian
                                                            @elseif ($data_po->status === 5 )
                                                            Barang sudah dibeli
                                                            @else
                                                            Draft
                                                            @endif
                                                        </td>
                                                        <td>{{ $data_po->created_at}}</td>
                                                        <td>
                                                            @if($data_po->status >= 3 )
                                                            <a href="po/detail/{{ $data_po->no_PO }}"><button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-edit"></i></button></a>
                                                            <button class="btn btn-primary btn-icon-anim btn-square" data-toggle="modal" data-target="#editpo{{ $data_po->id_PO }}"><i class="fa fa-pencil"></i></button>
                                                            @else
                                                            <a href="po/detail/{{ $data_po->no_PO }}"><button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-edit"></i></button></a>
                                                            <button class="btn btn-primary btn-icon-anim btn-square" data-toggle="modal" data-target="#editpo{{ $data_po->id_PO }}"><i class="fa fa-pencil"></i></button>
                                                            <button class="btn btn-success btn-icon-anim btn-square" data-toggle="modal" data-target="#confirm{{ $data_po->id_PO }}" action="( {{url('confirm')}}/{{ $data_po->id_PO }})"><i class="fa fa-check"></i></button>
                                                            <button class="btn btn-danger btn-icon-anim btn-square" data-toggle="modal" data-target="#reject{{ $data_po->id_PO }}" action="( {{url('reject')}}/{{ $data_po->id_PO }})"><i class="fa fa-times"></i></button>
                                                            @endif
                                                        </td>

                                                        @endif
                                                        @elseif (auth()->user()->divisi == "warehouse")
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $data_po->no_PO}}</td>
                                                        <td>{{ $data_po->instansi}}</td>
                                                        <td>{{ $data_po->tgl_pemasangan}}</td>
                                                        <td>
                                                            @if($data_po->status === 1 )
                                                            Purchase Order diproses Warehouse
                                                            @elseif ($data_po->status === 2 )
                                                            Purchase Order disetujui Warehouse
                                                            @elseif ($data_po->status === 3 )
                                                            Purchase Order ditolak Admin
                                                            @elseif ($data_po->status === 4 )
                                                            Purchase Order disetujui Warehouse dan dalam proses pembelian
                                                            @elseif ($data_po->status === 5 )
                                                            Barang sudah dibeli
                                                            @else
                                                            Draft
                                                            @endif
                                                        </td>
                                                        <td>{{ $data_po->created_at}}</td>
                                                        <td>
                                                            @if($data_po->status >= 1 )
                                                            <a href="po/detail/{{ $data_po->no_PO }}"><button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
                                                            @else
                                                            <a href="po/detail/{{ $data_po->no_PO }}"><button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>

                                                            @endif
                                                        </td>
                                                        @endif
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
        @endsection