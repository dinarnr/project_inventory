@extends('layout.master')
@section('title', 'Report')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid pt-25">
		<!-- <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5 class="txt-light">Selamat datang, <strong>{{ Auth::user()->name }}</strong>, anda sebagai <strong>{{ Auth::user()->divisi }}</strong> </h5>
        </div> -->
		<!-- Row -->
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box bg-red">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block counter"><span class="counter-anim">{{$master_data}}</span></span>
											<span class="weight-500 uppercase-font txt-light block font-13">Produk</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
											<i class="fa fa-shopping-bag txt-light data-right-rep-icon"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box bg-yellow">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block counter"><span class="counter-anim">{{$supplier}}</span></span>
											<span class="weight-500 uppercase-font txt-light block">Supplier</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
											<i class="fa fa-users txt-light data-right-rep-icon"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box bg-green">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block counter"><span class="counter-anim">{{$instansi}}</span></span>
											<span class="weight-500 uppercase-font txt-light block">Instansi</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
											<i class="fa fa-university txt-light data-right-rep-icon"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box bg-blue">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
											<span class="txt-light block counter"><span class="counter-anim">{{$user}}</span></span>
											<span class="weight-500 uppercase-font txt-light block">User</span>
										</div>
										<div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
											<i class="fa fa-user txt-light data-right-rep-icon"></i>

											<div id="sparkline_4" style="width: 100px; overflow: hidden; margin: 0px auto;"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Row -->
		<!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-7 col-sm-12 col-xs-12">
				<div class="panel panel-default card-view panel-refresh">
					<div class="refresh-container">
						<div class="la-anim-1"></div>
					</div>
					<div class="panel-heading">
						<div class="pull-left">
							<h5 class="panel-title txt-dark">Status PO</h5>
						</div>
						<div class="pull-right">
							<a href="#" class="pull-left inline-block refresh mr-15">
								<i class="zmdi zmdi-replay"></i>
							</a>
							<a href="#" class="pull-left inline-block full-screen mr-15">
								<i class="zmdi zmdi-fullscreen"></i>
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-0">
							<div class="table-wrap">
								<div class="table-responsive">
									<table class="table table-hover mb-0">
										<thead>
											<tr>
												<th>#</th>
												<th>No PO</th>
												<th>No SO</th>
												<th>Instansi</th>
												<th>Tanggal PO</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; ?>
											@foreach ($data_po as $data_po)
											<tr>
												<td>{{ $no++ }}</td>
												<td>{{$data_po->no_PO}}</span></td>
												<td>{{$data_po->no_SO}}</td>
												<td>{{$data_po->instansi}}</td>
												<td>{{ date('d-m-Y',strtotime($data_po->tgl_pemasangan))}}</td>
												<td>
													
														@if($data_po->status === 1 )
														<span class="label label-primary">	Purchase Order diproses Warehouse </span>
														@elseif ($data_po->status === 2 )
														<span class="label label-success">Purchase Order disetujui Warehouse </span>
														@elseif ($data_po->status === 5)
														<span class="label label-danger">Purchase Order dibatalkan </span>
														
														@else
														<span class="label label-default">Draft </span>
														@endif
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
		<!-- Row -->
	</div>
</div>
<!-- /Main Content -->
</div>
<!-- /#wrapper -->
@endsection