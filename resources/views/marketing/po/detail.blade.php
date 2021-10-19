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
                                                            @foreach ($profil as $profil)
                                                                <td class="txt-dark"> Jl Candi Mendut Utara 1 No. 11
                                                                    <br>
                                                                    Kel. Mojolangu Kec. Lowokwaru Malang - Jawa Timur<br>
                                                                    Phone : {{ $profil->telp }}<br> Email :
                                                                    {{ $profil->email }}
                                                                </td>
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
                                                    <div class="text-left">
                                                        <h6 class="txt-dark"><strong>TO</strong></h6>
                                                    </div>
                                                    @foreach ($instansi as $instansi)
                                                        <tr>
                                                            <div class="">
                                                                <td class="txt-dark"> {{ $instansi->nama_instansi }}
                                                                    <br>
                                                                    {{ $instansi->alamat_instansi }} <br>
                                                                    {{ $instansi->telp_instansi }} <br>
                                                                    {{ $instansi->email_instansi }} <br>
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
                                                                <td class="txt-dark"> Number :
                                                                    {{ $data_po->no_PO }}<br>
                                                                    Date : {{ $data_po->created_at->format('d/m/Y') }}
                                                                    <br>
                                                                    Note :
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

                                    <table id="datable_1" class="table display pb-30">
                                        <thead class="table-dark">
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
                                                        <a href="#" id="" style="font-weight:bold" data-type="text"
                                                            data-pk="1"
                                                            data-title="Nama barang">{{ $detail->nama_barang }}</a><br>&nbsp;&nbsp;-
                                                        {{ $detail->keterangan_barang }}</br>
                                                    </td>
                                                    <td>
                                                        {{ $detail->keterangan }}
                                                    </td>
                                                    <td>
                                                        <a href="#" id="" style="font-weight:bold" data-type="text"
                                                            data-pk="1" data-title="Jumlah">{{ $detail->jumlah }}</a>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="" style="font-weight:bold" data-type="text"
                                                            data-pk="1"
                                                            data-title="Rate">{{ number_format($detail->rate), 2 }}</a>
                                                    </td>
                                                    <td> <a href="#" id="" style="font-weight:bold" data-type="text"
                                                            data-pk="1"
                                                            data-title="Amount">{{ number_format($detail->amount), 2 }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr class="txt-dark">
                                                <td colspan="4"></td>

                                                <td>Total</td>
                                                <td>{{ number_format($total), 2 }}</td>
                                            </tr>
                                </div>
                                <tr class="txt-dark">
                                    <td colspan="4"></td>
                                    <td>PPn (%)</td>
                                    <td>{{ $data_po->ppn }}</td>
                                </tr>
                                <tr class="txt-dark">
                                    <td colspan="4"></td>
                                    <td>PPh (%)</td>
                                    <td>{{ $data_po->pph }}</td>
                                </tr>
                                <tr class="txt-dark">
                                    <td colspan="4"></td>
                                    <td>Balance Due</td>
                                    <td>{{ number_format($total + ($data_po->ppn / 100) * $total + ($data_po->pph / 100) * $total) }}
                                    </td>
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
                                                    <h6 class="txt-dark">Malang, {{ $tanggal->format('d M Y') }}
                                                    </h6>
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
        </div>

        <div class="pull-right hide-from-printer">
            <a href="{{ route('cetak_pdf', $no_PO)}}"><button type="button"
                    class="btn btn-success btn-icon left-icon">
                    <i class="fa fa-print"></i><span> Print</span></button></a>

            <!-- <a href="{{ url('marketing/po/sendemail') }}"><button type="button" class="btn btn-primary btn-icon"><i class="fa  fa-send-o "></i><span>Tes</span></button> </a> -->


            <button type="button" class="btn btn-primary btn-icon" data-toggle="modal" data-target="#email"> <i
                    class="fa  fa-send-o "></i><span>Email</span></button>
            @include('marketing.po.email')
        </div>

        <!-- /Row -->
        <!-- /Main Content -->
    </div>
    <!-- /#wrapper -->
@endsection
