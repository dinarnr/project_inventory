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
                    <div class="panel-heading">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        @foreach ($peminjaman as $peminjaman)
                                        <tr>
                                            <td class="txt-dark">No Peminjaman : {{$peminjaman->no_peminjaman}}</td><br>
                                            <td class="txt-dark">Nama Peminjam : {{$peminjaman->pic_teknisi}}</td><br>
                                            <td class="txt-dark">Tanggal Pinjam : {{$peminjaman->tglPinjam}} </td>
                                        </tr>
                                        @endforeach
                                    </div>
                                    <!-- <div class="col-xs-6 text-right">
                                        <tr>
                                            <td class="txt-dark head-font inline-block capitalize-font mb-5">Pengirim : </td><br>
                                            <td class="txt-dark head-font inline-block capitalize-font mb-5">Penerima : </td>
                                        </tr>
                                    </div> -->
                                </div>
                                <br>
                                <div class="invoice-bill-table">
                                    <div class="table-responsive">
                                        <table id="myTable1" class="table table display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($data_detail as $detail)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{$detail->nama_barang}}</td>
                                                    <td>{{$detail->jumlah}}</td>
                                                    <td>
                                                        @if($detail->status === 1 )
                                                        Pengembalian diproses warehouse
                                                        @elseif ($detail->status === 2 )
                                                        Pengembalian telah diverifikasi warehouse
                                                        @else
                                                        Barang dipinjam
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($detail->status < 1 )
                                                        <button class="btn btn-success btn-icon-anim btn-square" data-toggle="modal" data-target="#detailkembali{{ $peminjaman->id_peminjaman }}" action="( {{url('teknisi/peminjaman/detailkembali')}}/{{ $peminjaman->id_peminjaman }})"><i class="fa fa-undo"></i></button>
                                                        @endif
                                                        @include('teknisi.peminjaman.detailkembali')
                                                        <!-- <a href="#" class="mr-25" data-toggle="modal" data-target="#addket{{ $detail->id_po }}" action="( {{url('warehouse/so/tambah/keterangan')}}/{{ $detail->id_po}})"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> -->
                                                    </td>

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