@extends('layout.master')
@section('title', 'Data Transaksi')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data Barang Masuk</h5><br>
            </div>


            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="inventory">Transaksi</a></li>
                    <li class="active"><span>Data Barang Masuk</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- Row -->
        <div class="col-lg-12 col-md-12 mt-10">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Barang Masuk</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div  class="tab-struct custom-tab-1 ">
							<ul role="tablist" class="nav nav-tabs" id="myTabs_7">
								<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#masuk_baru">Baru</a></li>
								<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_7" role="tab" href="#masuk_retur" aria-expanded="false">Retur</a></li>
								
							</ul>


                            
                            <!-- BARU -->
							<div class="tab-content" id="myTabContent_7">
								<div  id="masuk_baru" class="tab-pane fade active in" role="tabpanel">
								<table id="data_table1" class="table table-bordered display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>No transaksi</th>
                                                <th>Supplier</th>
                                                <th>Pengirim Ekspedisi</th>
                                                <th>Penerima</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($transaksi_masuk as $transaksi_masuk)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $transaksi_masuk->no_transaksi}}</td>
                                                <td>{{ $transaksi_masuk->nama_supplier }}</td>
                                                <td>{{ $transaksi_masuk->pengirim }}</td>
                                                <td>{{ $transaksi_masuk->penerima }}</td>
                                                <td>
                                                    <a href="transaksi/detailmasuk/{{ $transaksi_masuk->no_transaksi }}"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
                                                    <a href="#"><button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-edit"></i></button></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        @include('transaksi.editbrgmasuk')
                                    </table>
                                </div>
								
                                <!-- BARANG RETUR -->
                                <div  id="masuk_retur" class="tab-pane fade" role="tabpanel">
                                <table id="data_table1" class="table table-bordered display  pb-30">
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                                <th>No transaksi</th>
                                                <th>Instansi</th>
                                                <th>Pengirim Ekspedisi</th>
                                                <th>Penerima</th>
                                                <th>Created at</th>
                                                <th colspan="3">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($transaksi_retur as $transaksi_retur)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $transaksi_retur->no_transaksi}}</td>
                                                <td>{{ $transaksi_retur->instansi}}</td>
                                                <td>{{ $transaksi_retur->pengirim }}</td>
                                                <td>{{ $transaksi_retur->penerima }}</td>
                                                <td>{{ $transaksi_retur->created_at }}</td>
                                                <td>
                                                    <a href="transaksi/detailmasukretur/{{ $transaksi_retur->no_transaksi }}"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-info"></i></button></a>
                                                    <a href="#"><button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-edit"></i></button></a>
                                                </td>
                                            </tr>
                                            @include('transaksi.hapusbrngmasuk')
                                            @endforeach
                                        </tbody>
                                        @include('transaksi.editbrgmasuk')
                                    </table>
								</div>
								
							</div>
						</div>
					</div>
				</div>
            </div>
		</div>
        
        <!-- /Row -->
        @include('transaksi.hapusbrngmasuk')
    </div>
</div>
<!-- /Main Content -->
</div>
<!-- /#wrapper -->
@endsection
