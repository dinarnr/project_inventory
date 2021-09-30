@extends('layout.master')
@section('title', 'Detail Peminjaman')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Detail Peminjaman</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Peminjaman</a></li>
                    <li class="active"><span>Detail Peminjaman</span></li>
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
                                            <div class="">
                                                <h4 text-style="left" class="txt-dark">Nakula Sadewa, CV</h4>
                                            </div>
                                            <table>
                                                <tr>
                                                    <div class="row">
                                                        @foreach ($profil as $profil)
                                                    <td class="txt-dark"> Jl Candi Mendut Utara 1 No. 11 <br>
                                                    Kel. Mojolangu Kec. Lowokwaru Malang - Jawa Timur<br>
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
                                @foreach ($peminjaman as $peminjaman)
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <table>
                                                <div class="text-left">
                                                    <h6 class="txt-dark"><strong>No Peminjaman :</strong></h6>
                                                </div>
                                                
                                                <tr>
                                                <div class="">
                                                    <td class="txt-dark">
                                                    {{$peminjaman->no_peminjaman}}
                                                    </td>
                                                </div>
                                            </tr>
                                            </table>
                                            <table>
                                                <div class="text-left">
                                                    <h6 class="txt-dark"><strong>Nama Peminjaman :</strong></h6>
                                                </div>
                                            <tr>
                                                <div class="">
                                                    <td class="txt-dark">
                                                    {{$peminjaman->pic_teknisi}}
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
                                                    <h6 class="txt-dark"><strong>Tanggal Pinjam :</strong></h6>
                                                </div>
                                                <tr>
                                                    <div class="">
                                                        <td class="txt-dark">
                                                        {{$peminjaman->tglPinjam}}
                                                      </td>
                                                    </div>
                                                </tr>
                                            </table>
                                            <table>
                                                <div class="text-left">
                                                    <h6 class="txt-dark"><strong>Kebutuhan :</strong></h6>
                                                </div>
                                            <tr>
                                                <div class="">
                                                    <td class="txt-dark">
                                                    {{$peminjaman->kebutuhan}}
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
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($data_detail as $detail)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{$detail->nama_barang}}</td>
                                                    <td>{{$detail->jumlah}}</td>
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
                @if($peminjaman->status == "di proses warehouse")   
                <button class="btn btn-success btn-icon-anim" data-toggle="modal" data-target="#confirm{{ $peminjaman->no_peminjaman}}" action="( {{url('warehouse/peminjaman/confirm')}}/{{ $peminjaman->no_peminjaman}})"><i class=""></i>Konfirmasi</button>
                @include('warehouse.peminjaman.confirm')
                @endif
                <!-- form tutup -->
            </div>
    </div>
    <!-- /Main Content -->
</div>
<!-- /#wrapper -->
@endsection