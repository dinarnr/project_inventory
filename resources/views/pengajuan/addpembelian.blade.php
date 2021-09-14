@extends('layout.master')
@section('title', 'Tambah Pengajuan Pembelian')
@section('content')

<div class="page-wrapper">
	<div class="container-fluid">

		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Pengajuan Pembelian</h5><br>
				<!-- <a href="/addmasukbaru" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> BARU</a> -->
				<!-- <a href="/addmasukretur" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> RETUR</a> -->

			</div> 
			<!-- Breadcrumb
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="#"><span>Pengajuan</span></a></li>
					<li class="active"><span> Pengajuan Pembelian </span></li>
				</ol>
			</div>
			/Breadcrumb -->
		</div>

		<div class="row">
			<div class="col-md-12 mt-10">
				<div class="panel panel-default card-view">
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 col-xs-12">
									<div class="form-wrap">
										<form action="{{ url('addmasuk2') }}" method="POST" enctype="multipart/form-data">
											@csrf
											<div class="form-body">
												<div class="row">
													<div class="col-md-6">
														@foreach ((Array) $no_peng as $no_pengajuan)
														<div class="form-group">
															<label class="control-label mb-10">No Pengajuan</label>
															<input type="hidden" id="no_pengajuan" name="no_pengajuan" value="{{$no_pengajuan }} " class="form-control" placeholder="" readonly>
                                                			<input type="text" id="no_peng" name="no_peng" value="{{$no_pengajuan }} " class="form-control" placeholder="" readonly>
														</div>
														@endforeach
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Tanggal Pengajuan</label>
															<input type="date" id="tgl_pengajuan" name="tgl_pengajuan" value="" class="form-control" >
														</div>
													</div>
													
												</div>
												<div class="row">
												<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Nama Pemohon</label>
															<input type="text" id="nama_pemohon" name="nama_pemohon" class="form-control">
														</div>
													</div>
													<!-- <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Penerima</label>
															<input type="text" id="penerima" name="penerima" class="form-control">
														</div>
													</div> -->
												</div>
												<hr>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															
															<label class="control-label mb-10">Nama Barang</label>
															<input type="text" id="nama_barang" name="nama_barang" class="form-control">
															
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Jumlah</label>
															<input type="number" id="jumlah" name="jumlah" class="form-control">
															<input  id="kode_barang" name="kode_barang" value="" hidden>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Estimasi Harga</label>
															<input type="text" id="harga" name="harga" class="form-control">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Keterangan</label>
															<input type="text" id="keterangan" name="keterangan" class="form-control">
														</div>
													</div>

												</div>
											</div>
											<div class="col-md-14" style="text-align:right;">
												<button type="button" onclick="ambildata()" class="btn btn-success ">Tambah Data</button>
											</div>
											<div class="col-md-12 mt-10">
												<div class="panel panel-default card-view">
													<div class="panel-heading">
														<div class="pull-left">
															<h6 class="panel-title txt-dark">Barang Masuk</h6>
														</div>
														<div class="clearfix"></div>
													</div>
													<div class="panel-wrapper collapse in">
														<div class="panel-body">
																<div class="">
																	<div classs="col">
																		<table class="table table-bordered align-items-center">
																			<thead class="thead-light">
																				<tr>
																					<th>No Pengajuan</th>
																					<th>Nama barang</th>
																					<th>Estimasi Harga</th>
																					<th>Jumlah</th>
																					<th>Keterangan</th>
																					<th>Remove</th>

																				</tr>
																			</thead>
																			<tbody id="TabelDinamis">
																				<!-- <tr>
																					<td><a name="tgl_transaksi[]" id="tgl_transaksi"></a></td>
																					<td><a name="nama_supplier[]" id="nama_supplier"></a></td>
																					<td><a name="nama_barang[]" id="nama_barang"></a></td>
																					<td><a name="jumlah[]" id="jumlah"></a></td>
																					<td><button type="button" class="btn btn-danger btn-small">&times;</button></td>
																				</tr> -->
																			</tbody>
																		</table>

																		<div class="col-md-12" style="text-align:right;">
																			<button type="submit" class="btn btn-primary ">Simpan</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
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
@endsection
@section('scripts')
<script type="text/javascript">
	function ambildata() {
		var no_peng = document.getElementById('no_peng').value;
		var keterangan = document.getElementById('keterangan').value;
		var nama_barang = document.getElementById('nama_barang').value;
		var kode_barang = document.getElementById('kode_barang').value;
		var jumlah = document.getElementById('jumlah').value;
		var harga = document.getElementById('harga').value;

		addrow(no_peng, keterangan, nama_barang, kode_barang, jumlah, harga);
	}
	var i = 0;

	function addrow(no_peng, keterangan, nama_barang, kode_barang, jumlah, harga) {
		i++;
		$('#TabelDinamis').append('<tr id="row' + i + '"></td><td><input type="text" style="outline:none;border:0;" readonly name="no_peng[]" id="no_peng" value="' + no_peng + 
													 '"></td><td><input type="text" style="outline:none;border:0;" readonly name="nama_barang[]" id="nama_barang" value="' + nama_barang + 
													 '"></td><td style=display:none;"><input type="text" style="outline:none;border:0;"  name="kode_barang[]" id="kode_barang" value="' + kode_barang + 
														'"></td><td><input type="text" style="outline:none;border:0;" readonly name="harga[]" id="harga" value="' + harga + 
														'"></td><td><input type="text" style="outline:none;border:0;" readonly name="jumlah[]" id="jumlah" value="' + jumlah + 
														'"><td><input type="text" style="outline:none;border:0;" readonly name="keterangan[]" id="keterangan" value="' + keterangan + 
														'"></td><td><button type="button" id="' + i + '" class="btn btn-danger btn-small remove_row">&times;</button></td></tr>');
	};
	$(document).on('click', '.remove_row', function() {
		var row_id = $(this).attr("id");
		$('#row' + row_id + '').remove();
	});
</script>
@endsection