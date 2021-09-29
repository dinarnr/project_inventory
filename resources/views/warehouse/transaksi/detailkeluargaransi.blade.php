@extends('layout.master')
@section('title', 'Detail Keluar Garansi')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Detail Masuk Baru</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Transaksi</a></li>
                    <li><a href="#"><span>Transaksi Keluar Garansi</span></a></li>
                    <li class="active"><span>Detail Keluar Garansi</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                
                                <!-- <div class="seprator-block"></div> -->

                                <div class="invoice-bill-table">
                                    <div class="table-responsive">
                                        <table id="myTable1" class="table table display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama barang</th>
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($detail_keluar as $garansi)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $garansi->nama_barang}}</td>
                                                    <td>{{ $garansi->jumlah}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--  -->
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->
        </div>
        <!-- /Footer -->
    </div>
    <!-- /Main Content -->
</div>
<!-- /#wrapper -->
</div>
</div>
</div>
@endsection