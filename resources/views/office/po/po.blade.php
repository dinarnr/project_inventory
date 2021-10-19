@extends('layout.master')
@section('title', 'Data PO')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="txt-dark">Data PO</h4>
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
                    <h5 class="txt-dark"> <strong> Filter </strong></h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label mb-10">Start date</label>
                                <input type="date" id="start_date" name="start_date" value="" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label mb-10">End date</label>
                                <input type="date" id="end_date" name="end_date" value="garansi" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4 mt-30">
                            <div class="form-group">
                                <button type="button" onclick="" class="btn btn-primary ">Cek</button>
                            </div>
                        </div>
                    </div>

                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">

                                    <table id="datable_1" class="table table-bordered display pb-30">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>No PO</th>
                                                <th>Instansi</th>
                                                <th>Tanggal PO</th>
                                                <th>Status </th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($data_po as $po)
                                            <tr>
                                                <td> {{ $no++}}</td>
                                                <td> {{$po->no_PO}}</td>
                                                <td> {{$po->instansi}}</td>
                                                <td> {{ date('d-m-Y',strtotime($po->created_at))}}</td>
                                                <td>
                                                    @if($po->status === 1 )
                                                    Purchase Order diproses Warehouse
                                                    @elseif ($po->status === 2 )
                                                    Purchase Order disetujui Warehouse
                                                    @else ($po->status === 5)
                                                    Purchase Order dibatalkan
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('office/po/detail')}}/{{ $po->no_PO }}"><button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
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
    </div>
</div>
<!-- /Main Content -->
</div>
<!-- /#wrapper -->
@endsection