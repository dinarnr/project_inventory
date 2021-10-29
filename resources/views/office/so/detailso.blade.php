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

                                <div class="row">

                                    <div class="col-xs-8">
                                        <div class="form-group">
                                            <table>
                                                <div class="text-left">
                                                    <h6 class="txt-dark"><strong>TO</strong></h6>
                                                </div>
                                               @foreach ($instansi as $instansi)
                                        <tr>
                                            <div class="">
                                                <td class="txt-dark"> {{$instansi->nama_instansi}} <br>
                                                                {{$instansi->alamat_instansi}} <br>
                                                                {{$instansi->telp_instansi}} <br>
                                                                {{$instansi->email_instansi}} <br>
                                                </td>
                                            </div>
                                        </tr>
                                        @endforeach
                                            </table>

                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <table>
                                                <div class="text-left">
                                                    <h6 class="txt-dark"><strong>PENAWARAN</strong></h6>
                                                </div>
                                                
                                                <form action="{{ url('warehouse/so/confirmpo/{id_po') }}" method="POST" enctype="multipart/form-data">
                                                @foreach ($data_po as $data_po)
                                                <tr>
                                                    <div class="">
                                                        <td class="txt-dark"> No PO : <input type="text" id="no_PO" name="no_PO" value="{{$data_po->no_PO}}" style="outline:none;border:0;" readonly> <br>
                                                        No SO : {{$data_po->no_SO}} <br>
                                                        Date : {{$data_po->created_at->format('d M Y')}} <br>
                                                         </td>
                                                    </div>
                                                </tr>
                                                @endforeach
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
                                            <td >
                                                {{$detail -> keterangan}}</td>
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
                                    <h6 class="txt-dark">{{ Auth::user()->name }}</h6>
                                </div>
                                <hr>
                                <div class=" text-center">
                                        <h6 class="txt-dark">{{ Auth::user()->divisi }}</h6>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="pull-right hide-from-printer">
                <button type="button" class="btn btn-success btn-icon left-icon" onclick="javascript:window.print();">
                    <i class="fa fa-print"></i><span> Print</span>
                </button>
            </div>
        </form>
        @include('warehouse.so.addket')
        
        </div>
        
        
        <!-- /Row -->
        <!-- /Main Content -->
    </div>
    <!-- /#wrapper -->

    @endsection
