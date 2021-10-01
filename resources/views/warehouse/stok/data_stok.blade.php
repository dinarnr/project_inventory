@extends('layout.master')
@section('title', 'Data stok')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data Stok Barang</h5><br>
                <!-- <a href="/transaksi" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> MASUK</a>
                <a href="/transaksikeluar" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> KELUAR</a> -->
            </div>


            
        </div>
        <!-- Row -->
        <div class="col-lg-12 col-md-12 mt-10">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Stok Barang</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div  class="tab-struct custom-tab-1 ">
							<ul role="tablist" class="nav nav-tabs" id="myTabs_7">
								<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#masuk">Masuk</a></li>
                                <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_7" role="tab" href="#keluar" aria-expanded="false">Keluar</a></li>
								
							</ul>
                            <!-- BARANG GARANSI -->
							<div class="tab-content" id="myTabContent_7">
								<div  id="masuk" class="tab-pane fade active in" role="tabpanel">
								<table id="data_table1" class="table table-bordered display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>No transaksi</th>
                                                <th>Jenis Barang</th>
                                                <th>Tanggal Transaksi</th>
                                                <!-- <th>Pengirim</th>
                                                <th>Penerima</th> -->
                                                <th colspan="3">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- INSTALASI -->
                                <div  id="keluar" class="tab-pane fade" role="tabpanel">
								<table id="data_table1" class="table table-bordered display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>No transaksi</th>
                                                <th>Jenis Barang</th>
                                                <th>Tanggal Instalasi</th>
                                                <th>Pengirim</th>
                                                <th>Penerima</th>
                                                <th colspan="3">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                           
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td> </td>
                                            </tr>
                                            
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
