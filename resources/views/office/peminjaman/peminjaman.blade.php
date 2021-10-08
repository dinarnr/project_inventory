@extends('layout.master')
@section('title', 'Data Peminjaman')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="txt-dark">Data Peminjaman</h4>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">

                                    <table id="datable_1" class="table table-bordered display pb-30">
                                        <!-- <div class="col md-4">
                                            <select id="filter-namabarang" class="form-control">
                                                <option value="1">All</option>
                                                <option value="2"></option>
                                            </select>
                                        </div> -->
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>No Peminjaman</th>
                                                <th>Kebutuhan</th>
                                                <th>Tgl Peminjaman</th>
                                                <th>Tgl Kembali</th>
                                                <th>Status </th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($peminjaman as $peminjaman)
                                            <tr>
                                                <td> {{ $no++}}</td>
                                                <td> {{$peminjaman->no_peminjaman}}</td>
                                                <td> {{$peminjaman->kebutuhan}}</td>
                                                <td> {{ date('d-m-Y',strtotime($peminjaman->tglPinjam))}}</td>
                                                <td> @if (empty($peminjaman->tglKembali))
                                                @else
                                                {{ date('d-m-Y',strtotime($peminjaman->tglKembali)) }}
                                                @endif
                                                </td>
                                                <td>
                                                    @if($peminjaman->status == "pinjam")
                                                    <button class="btn btn-primary btn-sm btn-rounded">Pinjam</button>
                                                    @elseif($peminjaman->status == "di proses warehouse" )
                                                    <button class="btn btn-warning btn-sm btn-rounded">Diproses Warehouse</button>
                                                    @else
                                                    <button class="btn btn-success btn-sm btn-rounded">Dikembalikan</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="#"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
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
</div>
<!-- /Main Content -->
</div>
<!-- /#wrapper -->
@endsection