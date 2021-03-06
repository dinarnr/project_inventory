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
                    <form action="{{ url('office/po/datapo2') }}" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="filter_status" id="filter_status" class="form-control" required>
                                        <option value="">Select Status</option>
                                        <option value="all">All</option>
                                        <option value="1">Diproses warehouse</option>
                                        <option value="2">Disetujui warehouse</option>
                                        <option value="5">Dibatalkan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Cek</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                                    <span class="label label-warning"> Diproses Warehouse </span>
                                                    @elseif ($po->status === 2 )
                                                    <span class="label label-success"> Disetujui Warehouse </span>
                                                    @else ($po->status === 5)
                                                    <span class="label label-danger"> Dibatalkan </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('office/po/detail')}}/{{ $po->no_PO }}"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
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
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
<!-- /Main Content -->
</div>
<!-- /#wrapper -->

@endsection