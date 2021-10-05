@extends('layout.master')
@section('title', 'Data Transaksi')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data Barang keluar</h5><br>
            </div>


            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="inventory">Transaksi</a></li>
                    <li class="active"><span>Data Barang Keluar</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- Row -->
        <div class="col-lg-12 col-md-12 mt-10">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Barang Keluar</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div  class="tab-struct custom-tab-1 ">
							<ul role="tablist" class="nav nav-tabs" id="myTabs_7">
								<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#masuk_baru">Garansi</a></li>
                                <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_7" role="tab" href="#garansi" aria-expanded="false">Instalasi</a></li>
                                <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_7" role="tab" href="#masuk_retur" aria-expanded="false">Retur</a></li>
								
							</ul>

                            <!-- BARANG GARANSI -->
							<div class="tab-content" id="myTabContent_7">
								<div  id="masuk_baru" class="tab-pane fade active in" role="tabpanel">
								<table id="datable_1" class="table table-bordered display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>No transaksi</th>
                                                <th>Jenis Barang</th>
                                                <th>Tanggal Transaksi</th>
                                                <!-- <th>Pengirim</th>
                                                <th>Penerima</th> -->
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($transaksi_garansi as $garansi)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $garansi->no_transaksi}}</td>
                                                <td>{{ $garansi->jns_barang }}</td>
                                                <td>{{ $garansi->tgl_transaksi }}</td>
                                                <td>
                                                    <a href="{{ url('warehouse/transaksi/detailkeluargaransi') }}/{{ $garansi->no_transaksi }}"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                                <!-- INSTALASI -->
                                <div  id="garansi" class="tab-pane fade" role="tabpanel">
								<table id="datable_3" class="table table-bordered display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>No transaksi</th>
                                                <th>Jenis Barang</th>
                                                <th>Tanggal Instalasi</th>
                                                <th>Pengirim</th>
                                                <th>Penerima</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($transaksi_instalasi as $instalasi)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $instalasi->no_transaksi}}</td>
                                                <td>{{ $instalasi->jns_barang}}</td>
                                                <td>{{ date('d-m-Y',strtotime($instalasi->tgl_instalasi))}}</td>
                                                <td>{{ $instalasi->pengirim}}</td>
                                                <td>{{ $instalasi->penerima}}</td>
                                                <td>
                                                    <a href="{{ url('warehouse/transaksi/detailkeluarinstalasi') }}/{{ $garansi->no_transaksi }}"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
								
                                <!-- BARANG RETUR -->
                                <div  id="masuk_retur" class="tab-pane fade" role="tabpanel">
                                <table id="datable_4" class="table table-bordered display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>No transaksi</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Pengirim Ekpedisi</th>
                                                <th>Penerima</th>
                                                <th>Created at</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($transaksi_retur as $transaksi_retur)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $transaksi_retur->no_transaksi}}</td>
                                                <td>{{ $transaksi_retur->tgl_transaksi}}</td>
                                                <td>{{ $transaksi_retur->pengirim}}</td>
                                                <td>{{ $transaksi_retur->penerima}}</td>
                                                <td>{{ $transaksi_retur->created_at }}</td>
                                                <td>
                                                    <a href="{{ url('warehouse/transaksi/detailkeluarretur') }}/{{ $garansi->no_transaksi }}"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
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
        
        <!-- /Row -->
    </div>
</div>
<!-- /Main Content -->
</div>
<!-- /#wrapper -->
@endsection
