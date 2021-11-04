@extends('layout.master')
@section('title', 'Invoice')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
     
        <div class="col-lg-12 col-md-12 mt-40">
            <div class="panel panel-default card-view">
                {{-- <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Invoice</h6>
                    </div>
                    <div class="clearfix"></div>
                </div> --}}
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="tab-struct custom-tab-1 ">
                            <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                                <li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab" id="home_tab_7" href="#admin">Invoice</a></li>
                                <li role="presentation" class=""><a data-toggle="tab" id="profile_tab_7" role="tab" href="#admin2" aria-expanded="false">Angsuran</a></li>

                            </ul>
                            <!-- BARANG -->
                            <div class="tab-content" id="myTabContent_7">
                                <div id="admin" class="tab-pane fade active in" role="tabpanel">
                                    <table id="datable_1" class="table table-bordered display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>N0 Pengajuan </th>
                                                <th>Nama Pemohon</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>PIC Marketing</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lunas as $lunas)
                                            <tr>
                                                <td>{{ $lunas->no_pengajuan}}</td>
                                                <td>{{ $lunas->nama_pemohon}}</td>
                                                <td>{{ $lunas->tgl_pengajuan}}</td>
                                                <td>{{ $lunas->pic_marketing}}</td>
                                                {{-- <td>{{ $lunas->tglBeli}}</td> --}}
                                                <td>
                                                    <a href="{{url('purchasing/invoice/lunas/detail')}}/{{ $lunas->no_pengajuan }}"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
                                                </td>
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
                                                <th>N0 Pengajuan </th>
                                                <th>Nama Barang</th>
                                                <th>jumlah</th>
                                                <th>Total Harga</th>
                                                <th>Sisa Bayar</th>
                                                <th>Supplier</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($hutang as $hutang)
                                            <tr>
                                                <td>{{ $hutang->no_pengajuan}}</td>
                                                <td>{{ $hutang->namaBarang}}</td>
                                                <td>{{ $hutang->jmlBarang}}</td>
                                                <td> Rp {{number_format ($hutang->totalBeli, 0, ',', '.') }}</td>
                                                <td> Rp {{number_format ($hutang->amount, 0, ',', '.') }}</td>
                                                <td>{{ $hutang->supplier}}</td>
                                                <td>
                                                    <a href="{{url('purchasing/invoice/hutang')}}/{{ $hutang->id_pembelian }}"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-dollar"></i></button></a>

                                                    {{-- <button class="btn btn-primary btn-icon-anim" data-toggle="modal" data-target="#lunas{{ $hutang->id_pembelian }}">Lunasi</button> --}}
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
