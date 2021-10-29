@extends('layout.master')
@section('title', 'Data SO')
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data SO</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <!-- <li><a href="inventory"></a></li> -->
                    <li class="active"><span>Data SO</span></li>
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
                                    <div class="table-responsive">
                                        <table id="datable_1" class="table table-bordered display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>no</th>
                                                    <th>No PO</th>
                                                    <th>No SO</th>
                                                    <th>Instansi</th>
                                                    <th>Status</th>
                                                    <th>Tanggal Pengajuan PO</th>
                                                    <th>Tanggal Check List</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($data_po_wh as $data_po)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data_po->no_PO}}</td>
                                                    <td>{{ $data_po->no_SO}}</td>
                                                    <td>{{ $data_po->instansi}}</td>
                                                    <td>
                                                        @if($data_po->status === 1 )
                                                        <span class="label label-warning"> Diproses warehouse</span>
                                                        <!-- Purchase Order <strong> DIPROSES </strong>Warehouse -->
                                                        @elseif ($data_po->status === 2 )
                                                        <span class="label label-success"> Disetujui warehouse</span>
                                                        <!-- Purchase Order <strong>DISETUJUI</strong> Warehouse  -->
                                                        @elseif ($data_po->status === 5)
                                                        <span class="label label-danger"> Dibatalkan</span>
                                                        <br>
                                                        <div class="tulisan">
                                                            Alasan : {{$data_po->alasan}}
                                                        </div>
                                                        <!-- Purchase Order dibatalkan  -->
                                                        @else
                                                        <span class="label label-default"> Draft</span>
                                                        <!-- Draft -->
                                                        @endif
                                                    <td>{{ date('d-m-Y',strtotime($data_po->created_at))}}</td>
                                                    <td>
                                                        @if($data_po->status === 2 )
                                                        {{ date('d-m-Y',strtotime($data_po->updated_at))}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($data_po->status == 5 )
                                                        @else
                                                        <a href="{{ url('warehouse/so/detail') }}/{{ $data_po->no_PO }}"><button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
                                                        @endif
                                                        <!-- <a href="{{ url('warehouse/so/draft') }}/{{ $data_po->no_PO }}"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-book"></i></button></a> -->

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
</div>
</div>
</div>

@endsection