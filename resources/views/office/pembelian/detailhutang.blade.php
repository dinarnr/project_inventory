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
                        @foreach ($data_detail as $id)
                        <form action="{{ url('purchasing/pembelian/hutang/simpan')}}/{{$id->id_pembelian}}" method="post" enctype="multipart/form-data">
                            @endforeach
                            {{ csrf_field() }}
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
                                    
                                        <div class="col-xs-4">
                                        </div>
                                        <div class="col-xs-6">
                                            <h4 class="txt-dark"><strong>Detail Hutang/Angsuran</strong></h4>
                                        </div>
                                </div>
                                <br><br>
                                <div class="col-md-12 mt-20">
                                    <table id="" class="table display pb-30">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>No Pengajuan</th>
                                                <th>Nama barang</th>
                                                <th>Supplier</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Total Harga</th>
                                                <th>Total Bayar</th>
                                                <th>Sisa Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($data_detail as $detail)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    <a href="#" id="" data-type="text" data-pk="1" data-title="Nama barang">{{ $detail->no_pengajuan }}</a>
                                                </td>
                                                <td>
                                                    <a href="#" id="" data-type="text" data-pk="1" data-title="Nama barang">{{ $detail->namaBarang }}</a>
                                                </td>
                                                <td>
                                                    <a href="#" id="" data-type="text" data-pk="1" data-title="Rate">{{ $detail->supplier }}</a>
                                                </td>
                                                <td>
                                                    <a href="#" id="" data-type="text" data-pk="1" data-title="Jumlah">{{ $detail->jmlBarang }}</a>
                                                </td>
                                                <td>
                                                    <a href="#" id="" data-type="text" data-pk="1" data-title="Jumlah">Rp {{number_format ($detail->harga, 0, ',', '.') }}</a>
                                                </td>
                                                <td>
                                                    <a href="#" id="" data-type="text" data-pk="1" data-title="Jumlah"> Rp {{number_format ($detail->totalBeli, 0, ',', '.') }}</a>
                                                </td>
                                                <td>
                                                    <a href="#" id="" data-type="text" data-pk="1" data-title="Jumlah"> Rp {{number_format ($detail->harga_beli, 0, ',', '.') }}</a>
                                                </td>
                                                <td>
                                                    <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Jumlah">Rp {{number_format ($detail->amount, 0, ',', '.') }}</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

            </form>
        </div>
    </div>

    {{-- <div class="pull-right hide-from-printer">
            <button type="button" class="btn btn-success btn-icon left-icon" onclick="javascript:window.print();">
                <i class="fa fa-print"></i><span> Simpan</span>
            </button>
        </div> --}}

    <!-- /Row -->
    <!-- /Main Content -->
</div>
<!-- /#wrapper -->

@endsection