@extends('layout.master')
@section('title', 'Detail Peminjaman')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Detail Peminjaman</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Peminjaman</a></li>
                    <li class="active"><span>Detail Peminjaman</span></li>
                </ol>
            </div>
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <tr>
                                            <td class="txt-dark">No Peminjaman : </td><br>
                                            <td class="txt-dark">Nama peminjam : </td><br>
                                            <td class="txt-dark">Tanggal Pinjam : </td>
                                        </tr>
                                    </div>
                                    <!-- <div class="col-xs-6 text-right">
                                        <tr>
                                            <td class="txt-dark head-font inline-block capitalize-font mb-5">Pengirim : </td><br>
                                            <td class="txt-dark head-font inline-block capitalize-font mb-5">Penerima : </td>
                                        </tr>
                                    </div> -->
                                </div>
                                <br>
                                <div class="invoice-bill-table">
                                    <div class="table-responsive">
                                        <table id="myTable1" class="table table display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
</div>
</div>
</div>
<!-- /#wrapper -->
@endsection