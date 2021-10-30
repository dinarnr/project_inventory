@extends('layout.master')
@section('title', 'Transaksi Masuk Baru')
@section('content')
<style type="text/css">
    @media print {
        .hide-from-printer {
            display: none;
        }
    }
</style>


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
                    <li><a href="#"><span>Transaksi Masuk Baru</span></a></li>
                    <li class="active"><span>Detail Masuk Baru</span></li>
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

                                <div class="row">
                                    <div class="col-xs-8">
                                        <div class="form-group">
                                            @foreach ($profil as $profil)
                                            <div class="">
                                                <h4 text-style="left" class="txt-dark">{{$profil->nama}}</h4>
                                            </div>
                                            <table>
                                                <tr>
                                                    <div class="row">

                                                        <td class="txt-dark"> {{$profil->alamat}} <br>
                                                            Phone : {{$profil->telp}}<br> Email : {{$profil->email}}</td>
                                                        @endforeach
                                                    </div>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-xs-4">
                                        <div class="form-group mt-20 ">

                                            <img src="{{asset('template')}}/dist/img/ns.jpg">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @foreach($transaksi_masuk as $trk_masuk)
                                <div class="row">
                                    <div class="col-xs-8">
                                        <div class="form-group">
                                            <table>
                                                <div class="text-left">
                                                    <h6 class="txt-dark"><strong>No Transaksi</strong></h6>
                                                </div>
                                                <tr>
                                                    <div class="">
                                                        <td class="txt-dark">
                                                            {{$trk_masuk->no_transaksi}}
                                                        </td>
                                                    </div>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <table>
                                                <div class="text-left">
                                                    <h6 class="txt-dark"><strong>Tanggal Transaksi</strong></h6>
                                                </div>
                                                <tr>
                                                    <div class="">
                                                        <td class="txt-dark">{{ date('d M Y',strtotime($trk_masuk->tgl_transaksi)) }} </td>
                                                    </div>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="seprator-block"></div> -->

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
                                                @foreach ($data_detail as $data_detail)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $data_detail->nama_barang}}</td>
                                                    <td>{{ $data_detail->jumlah}} </td>
                                                    <td>{{ $data_detail->keterangan}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--  -->
                                    <div class="clearfix"></div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->
        </div>
        <!-- /Footer -->
    </div>
    <div class="pull-right hide-from-printer">
        <button type="button" class="btn btn-success btn-icon left-icon" onclick="javascript:window.print();">
            <i class="fa fa-print"></i><span> Print</span>
        </button>
    </div>
    <!-- /Main Content -->
</div>
<!-- /#wrapper -->
</div>
</div>
</div>
@endsection