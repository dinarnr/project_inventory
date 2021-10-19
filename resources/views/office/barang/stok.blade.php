@extends('layout.master')
@section('title', 'Stok')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="txt-dark">Stok Barang</h4>
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
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">

                                    <table id="datable_1" class="table table-bordered display pb-30">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode barang</th>
                                                <th>Nama Barang</th>
                                                <th>Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no = 1; ?>
                                            @foreach ($stok as $stok)
                                            <tr>
                                                <td> {{ $no++}}</td>
                                                <td> {{$stok->kode_barang}}</td>
                                                <td> {{$stok->nama_barang}}</td>
                                                <td> {{$stok->stok}}</td>
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