@extends('layout.master')
@section('title', 'Data Pembelian')
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="txt-dark">Data Pembelian</h4>
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
                                                        <a href="{{url('office/invoice/lunas/detail')}}/{{ $lunas->no_pengajuan }}"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
    
                                    <!-- aksi -->
                                    <div id="admin2" class="tab-pane fade" role="tabpanel">
                                        <p class="pull-right">
                                            <a href="{{url('office/invoice/detailhutang')}}" class="btn btn-primary">VIEW DETAIL</a>
                                        </p>
                                        <table id="datable_4" class="table table-bordered display  pb-30">
                                            <thead>
                                                <tr>
                                                    <th>N0 Pengajuan </th>
                                                    <th>Tanggal Pembelian</th>
                                                    <th>Nama Barang</th>
                                                    <th>jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Total Harga</th>
                                                    <th>Total Bayar</th>
                                                    <th>Sisa Bayar</th>
                                                    <th>Supplier</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hutang as $hutang)
                                                <tr>
                                                    <td>{{ $hutang->no_pengajuan}}</td>
                                                    <td>{{ $hutang->tgl_beli }}</td>
                                                    <td>{{ $hutang->namaBarang}}</td>
                                                    <td>{{ $hutang->jmlBarang}}</td>
                                                    <td> Rp {{number_format ($hutang->harga, 0, ',', '.')}}</td>
                                                    <td> Rp {{number_format ($hutang->totalBeli, 0, ',', '.') }}</td>
                                                    <td> Rp {{number_format ($hutang->harga_beli, 0, ',', '.') }}</td>
                                                    <td> Rp {{number_format ($hutang->amount, 0, ',', '.') }}</td>
                                                    <td>{{ $hutang->supplier}}</td>
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
</div>
<!-- /Main Content -->
</div>
@endsection