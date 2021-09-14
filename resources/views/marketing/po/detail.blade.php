@extends('layout.master')
@section('title', 'Detail Purchase Order')
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
        <!-- Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
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
                                                        <td class="txt-dark"> Jl Candi Mendut Utara 1 No. 11 <br>
                                                            Kel. Mojolangu Kec. Lowokwaru Malang - Jawa Timur<br>
                                                            Phone : <br> Email : </td>
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
                                                @foreach ($data_po as $detailpo)
                                                <tr>
                                                    <div class="">
                                                        <td class="txt-dark"> {{$detailpo->instansi}} <br>
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
                                                @foreach ($data_po as $data_po)
                                                <tr>
                                                    <div class="">
                                                        <td class="txt-dark"> Number : {{$data_po->no_PO}}<br>
                                                            Date : {{$data_po->created_at}} <br>
                                                            Note : </td>
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
                                            <th>Qty</th>
                                            <th>Rate (Rp)</th>
                                            <th>Amount (Rp)</th>
                                            <!-- <th colspan="3">Aksi</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($data_detail as $detail)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Nama barang">{{$detail->nama_barang}}</a><br>&nbsp;&nbsp;- {{$detail->keterangan_barang}}</br>
                                            </td>
                                            <td>
                                                <a href="#" id="username2" style="font-weight:bold" data-type="text" data-pk="1" data-title="Keterangan">{{$detail->keterangan}}</a>
                                            </td>
                                            <td>
                                                <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Jumlah">{{$detail->jumlah}}</a>
                                            </td>
                                            <td>
                                                <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Rate">{{$detail->rate}}</a>
                                            </td>
                                            <td> <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Amount">{{$detail->amount}}</a></td>
                                        </tr>
                                        @endforeach
                                        <tr class="txt-dark">
                                            <td colspan="4"></td>
                                            <td>Total</td>
                                            <td>{{$detail->total}}</td>
                                        </tr>
                            </div>
                            <tr class="txt-dark">
                                <td colspan="4"></td>
                                <td>PPn 10%</td>
                                <td>{{$detail->ppn}}</td>
                            </tr>
                            <tr class="txt-dark">
                                <td colspan="4"></td>
                                <td>PPh 2.5%</td>
                                <td></td>
                            </tr>
                            <tr class="txt-dark">
                                <td colspan="4"></td>
                                <td>Balance Due</td>
                                <td>{{$detail->balance}}</td>
                            </tr>
                            </tbody>
                            </table>
                            <div class="row">
                                <div class="col-xs-8">
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <table>
                                            <div class="text-center">
                                                <h6 class="txt-dark">Malang, {{ $tanggal->format('d M Y')}}</h6>
                                            </div><br><br><br><br><br>

                                            <div class="text-center">
                                                <h6 class="txt-dark">{{ Auth::user()->name }}</h6>
                                            </div>
                                            <hr>
                                            <div class=" text-center mt-2">
                                                <h6 class="txt-dark">{{ Auth::user()->divisi }}</h6>
                                            </div>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /Row -->
    </div>
    <div class="pull-right hide-from-printer">
        <button type="button" class="btn btn-success btn-icon left-icon" onclick="javascript:window.print();">
            <i class="fa fa-print"></i><span> Print</span>
        </button>
    </div>
</div>
@endsection