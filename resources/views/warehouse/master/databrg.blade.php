@extends('layout.master')
@section('title', 'Data Barang')
@section('content')

    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Data Barang</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="inventory">Warehouse</a></li>
                        <li class="active"><span>Data Barang</span></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->
            </div>
            <!-- Row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default card-view">

                        <div class="panel-heading">
                            <div class="pull-left">
                                <a href="{{ url('warehouse/barang/tambah') }}" class="btn btn-success"> Tambah Data</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @foreach ($barang as $barangs)
                            @if ($barangs->stok <= 5)

                                <div class="alert alert-danger" role="alert">
                                    Stok {{ $barangs->nama_barang }} Hampir Habis
                                </div>

                            @endif

                        @endforeach
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table id="datable_1" class="table table-bordered display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>Kode Barang </th>
                                                    <th>Kode Kategori </th>
                                                    <th>Nama Barang</th>
                                                    <!-- <th>Jenis</th> -->
                                                    <th>Stok</th>
                                                    <th>Gambar</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($barang as $brg)
                                                    <tr>
                                                        <td>{{ $brg->kode_barang }}</td>
                                                        <td>{{ $brg->kode_kategori }}</td>
                                                        <td>{{ $brg->nama_barang }}</td>
                                                        <!-- <td>{{ $brg->jenis_barang }}</td> -->
                                                        <td>
                                                            <a
                                                                href="{{ url('warehouse/stok') }}/{{ $brg->kode_barang }}"><button
                                                                    class="btn btn-primary btn-icon-anim btn-square">{{ $brg->stok }}</button></a>

                                                        </td>
                                                        <td>
                                                            @if ($brg->gambar)
                                                                <img src="{{ url('img/logo') }}/{{ $brg->gambar }}"
                                                                    style="width: 150px; height: 150px;">
                                                            @endif
                                                        </td>
                                                        <td style="text-align:center;">
                                                            @if ($brg->status == 'aktif')
                                                                <button
                                                                    class="btn btn-primary btn-sm  btn-rounded">Aktif</button>
                                                            @else
                                                                <button class="btn btn-danger btn-sm  btn-rounded">Non
                                                                    Aktif</button>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a
                                                                href="{{ url('warehouse/barang/ubah') }}/{{ $brg->id_master }}"><button
                                                                    class="btn btn-success btn-icon-anim btn-square"><i
                                                                        class="fa fa-edit"></i></button></a>
                                                            <!-- <button class="btn btn-danger btn-icon-anim btn-square" data-toggle="modal" data-target="#hapusbrg{{ $brg->id_master }}" action="( {{ url('deletebarang') }}/{{ $brg->id_master }})"><i class="fa fa-trash"></i></button> -->
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
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
    </div>
    <!-- /Main Content -->
    </div>
    <!-- /#wrapper -->
@endsection
