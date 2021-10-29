@extends('layout.master')
@section('title', 'Data Purchase Order')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data Purchasing</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <!-- <li><a href="inventory"></a></li> -->
                    <li class="active"><span>Data Purchasing</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                        @endif
                        <div class="pull-left">
                            <a href="{{url ('marketing/po/tambah')}}"> <button class="btn btn-primary btn-icon-anim"> Tambah Data</button> </a>
                        </div>

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
                                                @foreach ($data_po as $data_po)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data_po->no_PO}}</td>
                                                    <td>{{ $data_po->instansi}}</td>
                                                    <td>
                                                        {{ {{ date('d-m-Y',strtotime($data_po->tgl_pemasangan))}}
                                                        <button class="btn btn-danger btn-icon-anim btn-square" style="float: right;" data-toggle="modal" data-target="#tglpemasangan{{ $data_po->id_PO }}" action="( {{url('marketing/po/tglpemasangan')}}/{{ $data_po->id_PO }})"><i class="fa fa-edit"></i></button>
                                                        @include('marketing.po.tglpemasangan')
                                                    </td>
                                                    <td>
                                                        @if($data_po->status === 1 )
                                                        <span class="label label-warning"> Purchase Order diproses Warehouse</span>
                                                        @elseif ($data_po->status === 2 )
                                                        <span class="label label-success"> Purchase Order disetujui Warehouse</span>
                                                        @elseif ($data_po->status === 5)
                                                        <span class="label label-danger"> Purchase Order dibatalkan</span>
                                                       <br>
                                                        <div class="tulisan">
                                                            Alasan : {{$data_po->alasan}}
                                                        </div>
                                                        @else
                                                        <span class="label label-default"> Draft</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ date('d-m-Y',strtotime($data_po->created_at))}}</td>
                                                    <td>
                                                        <a href="{{url('marketing/po/detail')}}/{{ $data_po->no_PO }}"><button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
                                                        @if (empty($data_po->status))
                                                        <a href="{{url('marketing/po/ubah')}}/{{ $data_po->no_PO }}"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-edit"></i></button></a>
                                                        @endif
                                                        @if ($data_po->status == 5 || $data_po->status >= 2 )
                                                        @else
                                                        <button class="btn btn-danger btn-icon-anim btn-square" data-toggle="modal" data-target="#batal{{ $data_po->id_PO }}" action="( {{url('marketing/po/batal')}}/{{ $data_po->id_PO }})"><i class="fa fa-times"></i></button>
                                                        @endif
                                                    </td>
                                                    @include('marketing.po.batal')
                                                </tr>
                                            </tbody>
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
