@extends('layout.master')
@section('title', 'Data stok')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data Stok Barang</h5><br>
            </div>



        </div>
        <!-- Row -->
        <div class="col-lg-12 col-md-12 mt-10">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Stok Barang</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="">
                                <table id="datable_1" class="table table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">#</th>
                                            <th style="text-align:center;">Nama Barang</th>
                                            <th style="text-align:center;">Stok</th>
                                            <th style="text-align:center;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach($data_stok as $data_stok)
                                        <tr>
                                            <td style="text-align:center;">{{ $no++}}</td>
                                            <td style="text-align:center;">{{$data_stok->nama_barang}}</td>
                                            <td style="text-align:center;">
                                                <a href="{{ url('office/historystok') }}/{{ $data_stok->kode_barang }}"><button class="btn btn-primary btn-icon-anim btn-square">{{ $data_stok->stok }}</button></a>
                                            </td>
                                            <td style="text-align:center;">
                                                @if ($data_stok->status == 'aktif')
                                                <button class="btn btn-success btn-sm  btn-rounded">Aktif</button>
                                                @else
                                                <button class="btn btn-danger btn-sm  btn-rounded">Non
                                                    Aktif</button>
                                                @endif
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

        <!-- /Row -->
    </div>
</div>
<!-- /Main Content -->
</div>
<!-- /#wrapper -->
@endsection