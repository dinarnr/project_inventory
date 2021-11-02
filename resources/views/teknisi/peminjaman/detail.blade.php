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