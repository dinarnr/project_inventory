@extends('layout.master')
@section('title', 'Home')
@section('content')

<div class="page-wrapper">
	<div class="container-fluid pt-25">
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h5 class="txt-light">Selamat datang, <strong>{{ Auth::user()->name }}</strong>, anda sebagai <strong>{{ Auth::user()->divisi }}</strong> </h5>
		</div>
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
		<!-- Row -->

		@if (auth()->user()->divisi == "warehouse")
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark"><strong> Data SO </strong></h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-0">
							<div class="table-wrap">
								<div class="table-responsive">
									<table class="table table-hover">
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
											@if($data_po->status === 1 )
											<tr>
												<td>{{ $no++ }}</td>
												<td>{{$data_po->no_PO}}</span></td>
												<td>{{$data_po->no_SO}}</td>
												<td>{{$data_po->instansi}}</td>
												<td>{{ date('d M Y',strtotime($data_po->tgl_pemasangan))}}</td>
												<td>
													<span class="label label-warning"> Purchase Order diproses Warehouse </span>
												</td>
											</tr>
											@endif
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

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark"><strong> Data Peminjaman </strong></h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-0">
							<div class="table-wrap">
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>No Peminjaman</th>
												<th>Nama Peminjam</th>
												<th>Kebutuhan</th>
												<th>Tanggal Pinjam</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; ?>
											@foreach($peminjaman as $peminjaman)
											@if($peminjaman->status == "1" || $peminjaman->status == "3")
											<tr>
												<td>{{ $no++ }}</td>
												<td>{{$peminjaman->no_peminjaman}}</span></td>
												<td>{{$peminjaman->pic_teknisi}}</td>
												<td>{{$peminjaman->kebutuhan}}</td>
												<td>{{ date('d M Y',strtotime($peminjaman->tglPinjam))}}</td>
												<td>
													@if($peminjaman->status == "1")
													<span class="label label-default">Menunggu persetujuan peminjaman</span>
													@elseif($peminjaman->status == "3" )
													<span class="label label-warning">Diproses Warehouse</span>
													@endif
												</td>
											</tr>
											@endif
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
		@endif

		@if (auth()->user()->divisi == "teknisi")
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark"><strong> Data Peminjaman </strong></h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-0">
							<div class="table-wrap">
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>No Peminjaman</th>
												<th>Nama Peminjam</th>
												<th>Kebutuhan</th>
												<th>Tanggal Pinjam</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; ?>
											@foreach($peminjaman as $peminjaman)
											@if($peminjaman->status == "1" || $peminjaman->status == "2" || $peminjaman->status == "3")
											<tr>
												<td>{{ $no++ }}</td>
												<td>{{$peminjaman->no_peminjaman}}</span></td>
												<td>{{$peminjaman->pic_teknisi}}</td>
												<td>{{$peminjaman->kebutuhan}}</td>
												<td>{{ date('d M Y',strtotime($peminjaman->tglPinjam))}}</td>
												<td>
													@if($peminjaman->status == "1")
													<span class="label label-default">Menunggu Persetujuan Peminjaman</span>
													@elseif($peminjaman->status == "2")
													<span class="label label-primary">Pinjam</span>
													@else($peminjaman->status == "3")
													<span class="label label-warning">Diproses Warehouse</span>
													@endif
												</td>
											</tr>
											@endif
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
		@endif

		@if (auth()->user()->divisi == "marketing")
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark"><strong> Data PO </strong></h6>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-0">
							<div class="table-wrap">
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>No PO</th>
												<th>Instansi</th>
												<th>Tanggal Pemasangan</th>
												<th>Status</th>
												<th>Tanggal Pembuatan PO</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; ?>
											@foreach ($data_po as $data_po)
											@if($data_po->status == "1")
											<tr>
												<td>{{ $no++ }}</td>
												<td>{{ $data_po->no_PO}}</td>
												<td>{{ $data_po->instansi}}</td>
												<td>
													{{ date('d M Y',strtotime($data_po->tgl_pemasangan))}}
												</td>
												<td>
													@if($data_po->status === 1 )
													<span class="label label-warning"> Purchase Order diproses Warehouse</span>
													@endif
												</td>
												<td>{{ date('d M Y',strtotime($data_po->created_at))}}</td>
											</tr>
											@endif
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
		@endif


		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
				<div class="panel panel-default card-view panel-refresh">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark"><strong> Data Barang </strong></h6>
						</div>
						<div class="clearfix"></div>
					</div>

					<div id="piechart"></div>
					<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
					<script type="text/javascript">
						// Load google charts
						google.charts.load('current', {
							'packages': ['corechart']
						});
						google.charts.setOnLoadCallback(drawChart);


						// Draw the chart and set the chart values
						function drawChart() {
							const nama_barang = @json($nama_barang);
							const stok = @json($stok);
							var value = [
								['Task', 'Speakers'],
							];
							for (let i = 0; i < stok.length; i++) {
								value.push([nama_barang[i], stok[i]]);
							};
							var data = google.visualization.arrayToDataTable(value);

							// Optional; add a title and set the width and height of the chart
							var options = {
								'title': '',
								'width': 550,
								'height': 400
							};
							// Optional; add a title and set the width and height of the chart
							var options = {
								'title': '',
								'width': 550,
								'height': 400
							};

							// Display the chart inside the <div> element with id="piechart"
							var chart = new google.visualization.PieChart(document.getElementById('piechart'));
							chart.draw(data, options);
						}
					</script>
				</div>
			</div>
		</div>
	</div>
	<!-- /Row -->

</div>
</div>
</div>
@endsection