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
                                                        <h6 class="txt-dark"><strong>TANGGAL PEMBELIAN : </strong></h6>
                                                        <div class="">
                                                            <div class="txt-dark"> {{ $pembelian->tglBeli }}
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
                                                <th>#</th>
                                                <th>Nama barang</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
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
                                                            data-title="Nama barang">{{ $detail->namaBarang }}</a>
                                                    </td>
                                                    <td>
                                                        {{ $detail->harga }}
                                                    </td>
                                                    <td>
                                                        <a href="#" id="" style="font-weight:bold" data-type="text"
                                                            data-pk="1" data-title="Jumlah">{{ $detail->jmlBarang }}</a>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="" style="font-weight:bold" data-type="text"
                                                            data-pk="1" data-title="Rate">{{ $detail->keterangan }}</a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        
                                </div>
                                    {{-- @foreach ($pembelian as $beli) --}}
                                        <tr class="txt-dark">
                                            <td colspan="3"></td>
                                            <td><strong> Total Harga </strong></td>
                                            <td>{{ $pembelian->harga }}</td>
                                        </tr>
                                        <tr class="txt-dark">
                                            <td colspan="3"></td>
                                            <td><strong>Status</strong> </td>
                                            <td>{{ $pembelian->status }}</td>
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
