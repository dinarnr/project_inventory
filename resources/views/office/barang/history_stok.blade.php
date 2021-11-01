@extends('layout.master')
@section('title', 'History stok')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
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
                                            <th>#</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                            <th>Stok Akhir</th>
                                        </tr>
                                    </thead>
                                    @foreach($data_stok as $stok)
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <tr>
                                            <td>{{ $no++}}</td>
                                            <td>{{$stok->nama_barang}}</td>
                                            <td>{{$stok->stok}}</td>
                                            <td>{{$stok->keterangan}}</td>
                                            <td>{{date('d-m-Y',strtotime($stok->created_at))}}</td>
                                            <td>{{$stok->stok_akhir}}</td>
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
@endsection