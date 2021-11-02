@extends('layout.master')
@section('title', 'Data Pengajuan Pembelian')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Detail Pengajuan Pembelian</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Pengajuan Pembelian</a></li>
                    <li class="active"><span>Detail Pengajuan Pembelian</span></li>
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
                                @foreach ($pengajuan as $pengajuan)
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <table>
                                                <div class="text-left">
                                                    <h6 class="txt-dark"><strong>No Pengajuan :</strong></h6>
                                                </div>

                                                <tr>
                                                    <div class="">
                                                        <td class="txt-dark">
                                                            {{$pengajuan->no_pengajuan}}
                                                        </td>
                                                    </div>
                                                </tr>
                                            </table>
                                            <table>
                                                <div class="text-left">
                                                    <h6 class="txt-dark"><strong>Nama Pemohon :</strong></h6>
                                                </div>
                                                <tr>
                                                    <div class="">
                                                        <td class="txt-dark">
                                                            {{$pengajuan->nama_pemohon}}
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
                                                    <h6 class="txt-dark"><strong>Tanggal Pengajuan :</strong></h6>
                                                </div>
                                                <tr>
                                                    <div class="">
                                                        <td class="txt-dark">
                                                            {{ date('d-m-Y',strtotime($pengajuan->tgl_pengajuan))}}
                                                        </td>
                                                    </div>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>
                                    @endforeach


                                    <br>


                                </div>
                                <div class="invoice-bill-table">
                                    <div class="table-responsive">
                                        <table id="myTable1" class="table table display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama barang</th>
                                                    <th>Estimasi harga</th>
                                                    <th>Jumlah</th>
                                                    <th>keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($data_detail as $detail)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $detail->namaBarang}}</td>
                                                    <td>{{ $detail->harga}}</td>
                                                    <td>{{ $detail->jmlBarang}}</td>
                                                    <td>{{ $detail->keterangan}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Footer -->
            <div class="pull-right">
                <!-- <button class="btn btn-primary mr-10" name="konfirmasi" type="submit"  value="proses" id="proses">Konfirmasi</button> -->

                <!-- form tutup -->
            </div>
        </div>
        <!-- /Main Content -->
    </div>
    <!-- /#wrapper -->
    @endsection