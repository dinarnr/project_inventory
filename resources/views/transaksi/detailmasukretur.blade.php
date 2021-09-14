@extends('layout.master')
@section('title', 'Detail Masuk Retur')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Detail Masuk Retur</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Transaksi</a></li>
                    <li><a href="#"><span>Transaksi Masuk Retur</span></a></li>
                    <li class="active"><span>Detail Masuk Retur</span></li>
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
                        <!-- <div class="pull-left">
										<h6 class="panel-title txt-dark">Invoice</h6>
									</div>
									<div class="pull-right">
										<h6 class="txt-dark">Order # 12345</h6>
									</div>
									<div class="clearfix"></div>
								</div> -->
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        @foreach ($data_detail as $detail_masukretur)
                                        <tr>
                                            <td class="txt-dark">No Transaksi : {{ $detail_masukretur->no_transaksi}}</td><br>
                                            <td class="txt-dark">Instansi : {{ $detail_masukretur->instansi}}</td><br>
                                            <td class="txt-dark">PIC Warehouse : {{ $detail_masukretur->pic_warehouse}} </td>
                                        </tr>
                                        @endforeach
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <tr>
                                            <td class="txt-dark head-font inline-block capitalize-font mb-5">Pengirim : </td><br>
                                            <td class="txt-dark head-font inline-block capitalize-font mb-5">Penerima : </td>
                                        </tr>
                                    </div>
                                </div>
                                <br>

                    <div class="invoice-bill-table">
                        <div class="table-responsive">
                            <table id="myTable1" class="table table display pb-30">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No PO</th>
                                        <th>Nama barang</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($transaksi_retur as $transaksi_retur)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $transaksi_retur->no_PO}}</td>
                                        <td>{{ $transaksi_retur->nama_barang}}</td>
                                        <td>{{ $transaksi_retur->jumlah}}</td>
                                        <td>{{ $transaksi_retur->keterangan}}</td>
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



</div>
<!-- /Main Content -->

</div>
<!-- /#wrapper -->

<!-- /Row -->

</div>

</div>
<!-- /Main Content -->

</div>
<!-- /#wrapper -->

@endsection