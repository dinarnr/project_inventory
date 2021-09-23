@extends('layout.master')
@section('title', 'Invoice')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
     
        <div class="col-lg-12 col-md-12 mt-40">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Invoice</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="tab-struct custom-tab-1 ">
                            <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                                <li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab" id="home_tab_7" href="#admin">Lunas</a></li>
                                <li role="presentation" class=""><a data-toggle="tab" id="profile_tab_7" role="tab" href="#admin2" aria-expanded="false">Hutang</a></li>

                            </ul>
                            <!-- BARANG -->
                            <div class="tab-content" id="myTabContent_7">
                                <div id="admin" class="tab-pane fade active in" role="tabpanel">
                                    <table id="datable_1" class="table table-bordered display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>N0 PO </th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Jenis Transaksi</th>
                                                <th>Total Harga</th>
                                                <th>Tanggal Beli</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lunas as $lunas)
                                            <tr>
                                                <td>{{ $lunas->no_PO}}</td>
                                                <td>{{ $lunas->namaBarang}}</td>
                                                <td>{{ $lunas->jumlah}}</td>
                                                <td>{{ $lunas->status}}</td>
                                                <td>Rp {{number_format ($lunas->harga, 0, ',', '.')}}</td>
                                                <td>{{ $lunas->tglBeli}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- aksi -->
                                <div id="admin2" class="tab-pane fade" role="tabpanel">
                                    <table id="data_table1" class="table table-bordered display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>N0 PO </th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Total Harga</th>
                                                <th>Total Bayar</th>
                                                <th>Sisa Bayar</th>
                                                <th>Tanggal Beli</th>
                                                <th>Lunas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($hutang as $hutang)
                                            <tr>
                                                <td>{{ $hutang->no_PO}}</td>
                                                <td>{{ $hutang->namaBarang}}</td>
                                                <td>{{ $hutang->jumlah}}</td>
                                                <td> Rp {{number_format ($hutang->harga, 0, ',', '.') }}</td>
                                                <td> Rp {{number_format ($hutang->totalBayar, 0, ',', '.') }}</td>
                                                <td> Rp {{number_format ($hutang->sisaBayar, 0, ',', '.') }}</td>
                                                <td>{{ $hutang->tglBeli}}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-icon-anim" data-toggle="modal" data-target="#lunas{{ $hutang->id_pembelian }}">Lunasi</button>
                                                </td>
                                                @include('pembelian.lunas')
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
