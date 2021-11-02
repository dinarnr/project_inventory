@extends('layout.master')
@section('title', 'Detail SO')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <!-- <form method="post"> -->
                        <div class="row">

                            <div class="col-md-12">
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
                                        <div class="form-group mt-10 ">

                                            <img src="{{asset('template')}}/dist/img/ns.jpg">
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    @foreach ($data_po as $data_po)
                                    <div class="col-xs-8">
                                        <div class="form-group">
                                            <table>
                                                <div class="text-left">
                                                    <h6 class="txt-dark"><strong>FROM</strong></h6>
                                                </div>
                                                
                                                <tr>
                                                    <div class="">
                                                        <td class="txt-dark"> 
                                                            {{ $data_po->pic_marketing }}
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
                                                    <h6 class="txt-dark"><strong>TO</strong></h6>
                                                </div>                                                   
                                                    <tr>
                                                        <div class="">
                                                            <td class="txt-dark"> 
                                                                {{ $data_po->pic_warehouse }}
                                                            </td>
                                                        </div>  
                                                    </tr>
                                                    
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table id="myTable1" class="table table display pb-30">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>Deskripsi</th>
                                            <th>Keterangan</th>
                                            <th>Jumlah</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1; ?>
                                        @csrf
                                        @foreach ($data_detail as $detail)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Nama barang">{{$detail->nama_barang}}</a><br>&nbsp;&nbsp;- {{$detail->keterangan_barang}}</br>
                                            </td>
                                            <td>
                                                {{$detail -> keterangan}}
                                            </td>
                                            <td>
                                                <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Jumlah">{{$detail->jumlah}}</a>
                                            </td>
                                        </tr>
                                        @endforeach

                            </div>
                            </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <table>
                                    <div class="text-center">
                                        <h6 class="txt-dark">Malang, {{ $tanggal->format('d M Y')}} </h6>
                                    </div><br><br><br><br><br>
                                    <div class="text-center">
                                        <h6 class="txt-dark">{{ $data_po->pic_warehouse }}</h6>
                                    </div>
                                    <hr>
                                    <div class=" text-center">
                                        <h6 class="txt-dark">Warehouse</h6>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="pull-right hide-from-printer">
                    <button type="button" class="btn btn-success btn-icon left-icon" onclick="javascript:window.print();">
                        <i class="fa fa-print"></i><span> Print</span>
                    </button>
                </div>
                

            </div>


            <!-- /Row -->
            <!-- /Main Content -->
        </div>
        <!-- /#wrapper -->

        @endsection