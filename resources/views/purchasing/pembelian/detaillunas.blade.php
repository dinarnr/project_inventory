@extends('layout.master')
@section('title', 'Detail Invoice')
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
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
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
                                            <div class="form-group mt-20 ">

                                                <img src="{{ asset('template') }}/dist/img/ns.jpg">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">

                                        <div class="col-xs-8">
                                            <div class="form-group">
                                                <table>
                                                    @foreach ($pembelian as $pembelian)
                                                        <div class="text-left">
                                                            <h6 class="txt-dark"><strong>NO PENGAJUAN : </strong></h6>
                                                                <div class="">
                                                                    <div class="txt-dark"> {{ $pembelian->no_pengajuan }}</div>
                                                                </div>
                                                        </div>
                                                        <div class="text-left">
                                                            <h6 class="txt-dark"><strong>NAMA PEMOHON : </strong></h6>
                                                            <div class="">
                                                                <div class="txt-dark"> {{ $pembelian->nama_pemohon }}</div>
                                                            </div>
                                                        </div>
                                                </table>

                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <table>
                                                    <div class="text-left">
                                                        <h6 class="txt-dark"><strong>TANGGAL PENGAJUAN</strong></h6>
                                                        <div class="">
                                                            <div class="txt-dark"> {{ $pembelian->tgl_pengajuan }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-left">
                                                        <h6 class="txt-dark"><strong>PIC MARKETING</strong></h6>
                                                        <div class="">
                                                            <div class="txt-dark"> {{ $pembelian->pic_marketing }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <table id="" class="table display pb-30">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama barang</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Pembayaran</th>
                                                <th>supplier</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($lunas as $detail)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $detail->namaBarang }}</td>
                                                    <td>{{ number_format($detail->harga), 2 }}</td>
                                                    <td>{{ $detail->jmlBarang }}</td>
                                                    <td> 
                                                        @if ($detail->jenisTransaksi=== 'transfer')
                                                        {{ $detail->jenisTransaksi}} ({{ $detail->info }})
                                                        @else
                                                        {{ $detail->jenisTransaksi}}
                                                        @endif
                                                    </td>
                                                    <td> {{$detail->supplier}}</td>
                                                </tr>
                                            @endforeach
                                        
                                </div>
                                    {{-- @foreach ($pembelian as $beli) --}}
                                        <tr class="txt-dark">
                                            <td colspan="3"></td>
                                            <td><strong> Total Harga </strong></td>
                                            <td>{{ number_format($lunas->sum('harga')), 2 }}</td>
                                        </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pull-right hide-from-printer">
            <button type="button" class="btn btn-success btn-icon left-icon" onclick="javascript:window.print();">
                <i class="fa fa-print"></i><span> Print</span>
            </button>
        </div>

        <!-- /Row -->
        <!-- /Main Content -->
    </div>
    <!-- /#wrapper -->
@endsection
