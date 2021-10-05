@extends('layout.master')
@section('title', 'Data Transaksi')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid">

		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">barang keluar retur</h5><br>
				<a href="{{ url('warehouse/transaksi/keluargaransi/tambah') }}" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> GARANSI</a>
				<a href="{{ url('warehouse/transaksi/keluarinstalasi/tambah') }}" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> INSTALASI</a>
				<a href="{{ url('warehouse/transaksi/keluarretur/tambah') }}" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> RETUR</a>

			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="#"><span>transaksi</span></a></li>
					<li class="active"><span> barang keluar retur </span></li>
				</ol>
			</div>
			<!-- /Breadcrumb -->
		</div>

        <div class="row">
			<div class="col-md-12 mt-10">
				<div class="panel panel-default card-view">
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                        <form name="myForm"action="{{ url('warehouse/transaksi/keluarretur/simpan') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
													@foreach ((array)$no_trans as $no_trans)
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">No Transaksi</label>
															<input type="hidden" id="no_transaksi" name="no_transaksi" value="{{ $no_trans }}" class="form-control" placeholder="" readonly>
                                                			<input type="text" id="no_trans" name="no_trans" value="{{ $no_trans }}" class="form-control" placeholder="" readonly>
														</div>
													</div>
													@endforeach
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Supplier</label>
															<select name="nama_supplier" id="nama_supplier" class="form-control">
																@foreach($supplier as $sup)
																<option value="{{ $sup->nama_supplier }}">{{ $sup->nama_supplier }} | {{ $sup->kode_supplier }} </option>
																@endforeach
															</select>
														</div>
													</div>
                                                </div>
                                                <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Pengirim Ekspedisi</label>
															<input type="text" id="pengirim" name="pengirim" class="form-control">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Penerima</label>
															<input type="text" id="penerima" name="penerima" class="form-control">

														</div>
													</div>
                                                </div>
                                                <hr>
                                                <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">NO SO</label>
															<select name="no_PO" id="no_PO" class="form-control">
																@foreach($noPO as $noPO)
																<option value="{{ $noPO->no_PO }}">{{ $noPO->no_PO }}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Tanggal Transaksi</label>
                                                            <input type="date" id="tgl_transaksi" name="tgl_transaksi" class="form-control" placeholder="">
                                                        </div>
													</div>
												</div>
												<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Nama Barang</label>
                                                            <select name="nama_barang" id="nama_barang" class="form-control" data-dependent="kode_barang">
																<option value="">Pilih Nama Barang</option>
																@foreach($barang as $brg)
																	<option value="{{ $brg->nama_barang }}">{{ $brg->nama_barang }} | {{ $brg->kode_barang }} </option>
																@endforeach
                                                            </select>
                                                        </div>
                                                    </div>
													<div class="col-md-4" hidden>
														<div class="form-group">
															<label class="control-label mb-10">Kode Barang</label>
															<select name="kode_barang" id="kode_barang" class="form-control select2">
																
															</select>
															<!-- <div id="id_barang"></div> -->
														</div>
													{{ csrf_field() }}
													</div>
													<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Jumlah</label>
                                                            <input type="number" id="jumlah" name="jumlah" class="form-control">
                                                        </div>
                                                    </div>
													
												</div>
												<div class="row">
													<div class="col-md-12">
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
															<h6 class="panel-title txt-dark">Barang Keluar</h6>
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
																					<th>No Transaksi</th>
																					<th>No PO</th>
																					<!-- <th>Tanggal Transaksi</th> -->
																					<th>Nama barang</th>
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
		var no_PO = document.getElementById('no_PO').value;
		var no_trans = document.getElementById('no_trans').value;
		// var tgl_transaksi = document.getElementById('tgl_transaksi').value;
		var keterangan = document.getElementById('keterangan').value;
		var nama_barang = document.getElementById('nama_barang').value;
		var kode_barang = document.getElementById('kode_barang').value;
		var jumlah = document.getElementById('jumlah').value;

		addrow(no_trans, no_PO, keterangan, nama_barang, kode_barang, jumlah);
	}
	var i = 0;

	function addrow(no_trans,no_PO, keterangan, nama_barang, kode_barang, jumlah) {
		i++;
		$('#TabelDinamis').append('<tr id="row' + i + '"></td><td><input type="text" style="outline:none;border:0;"  name="no_trans[]" id="no_trans" value="' + no_trans + 
														'"></td><td><input type="text" style="outline:none;border:0;" readonly name="no_PO[]" id="no_PO" value="' + no_PO + 
														// '"></td><td style=display:none;"><input type="text" style="outline:none;border:0;" readonly name="tgl_transaksi[]" id="tgl_transaksi" value="' + tgl_transaksi + 
														'"></td><td><input type="text" style="outline:none;border:0;" readonly name="nama_barang1[]" id="nama_barang1" value="' + nama_barang + 
														'"></td><td style=display:none;"><input type="text" style="outline:none;border:0;"  name="kode_barang1[]" id="kode_barang1" value="' + kode_barang + 
														'"></td><td><input type="text" style="outline:none;border:0;" readonly name="jumlah1[]" id="jumlah1" value="' + jumlah + 
														'"><td><input type="text" style="outline:none;border:0;" readonly name="keterangan[]" id="keterangan" value="' + keterangan + 
														'"></td><td><button type="button" id="' + i + '" class="btn btn-danger btn-small remove_row">&times;</button></td></tr>');
	};
	$(document).on('click', '.remove_row', function() {
		var row_id = $(this).attr("id");
		$('#row' + row_id + '').remove();
	});

		$('#nama_barang').select2();
		$('#nama_supplier').select2();
</script>
<script>
	$('#nama_barang').change(function(){
		if($(this).val() != ''){
			var select = $(this).attr("id");
			var value = $(this).val();
			
			// $('#id_barang').val(value);
			var dependent = $(this).data('dependent');
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url: "{{ route('trkkeluarcontroller.kode')}}",
				method: "POST",
				data: {
					select: select,value: value,_token:_token,dependent: dependent
				},
				success: function(result) {
					console.log(result);
					$('#'+dependent).html(result);
				},
		
			});
			
		}
	});
</script>
@endsection