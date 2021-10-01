@extends('layout.master')
@section('title', 'Data Transaksi')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid">

		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">barang keluar instalasi</h5><br>
				<a href="{{ url('warehouse/transaksi/keluargaransi/tambah') }}" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> GARANSI</a>
				<a href="{{ url('warehouse/transaksi/keluarinstalasi/tambah') }}" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> INSTALASI</a>
				<a href="{{ url('warehouse/transaksi/keluarretur/tambah') }}" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> RETUR</a>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="#"><span>transaksi</span></a></li>
					<li class="active"><span> barang keluar instalasi </span></li>
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
                                        <form name="myForm" action="{{ url('warehouse/transaksi/keluarinstalasi/simpan') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row" hidden>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">No Transaksi</label>
															<input type="hidden" id="no_transaksi" name="no_transaksi" value="{{ $no_trans }}" class="form-control" placeholder="" readonly>
															<input type="text" id="no_trans" name="no_trans" value="{{ $no_trans }}" class="form-control" placeholder="" readonly>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Jenis Barang</label>
															<input type="hidden" id="jenis_barang" name="jenis_barang" value="instalasi" class="form-control" placeholder="" readonly>
															<input type="hidden" id="jns_barang" name="jns_barang" value="instalasi" class="form-control" placeholder="" readonly>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">NO SO</label>
															<select name="no_SO dynamic2" id="no_SO" class="form-control" data-dependent="TabelDinamis">
																<option value="">Pilih NO SO</option>
																@foreach ($SO as $no_SO)
																	<option value="{{ $no_SO->no_SO }}">{{ $no_SO->no_SO }}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Instansi</label>
															<input type="text" id="instansi" name="instansi" class="form-control" readonly>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label mb-10">Tanggal Instalasi</label>
                                                            <input type="date" id="tgl_instalasi" name="tgl_instalasi" class="form-control" placeholder="">
                                                        </div>
														@if ($errors->has('tgl_transaksi'))
															<div class="alert alert-danger">{{$errors->first('tgl_transaksi')}}</div>
														@endif
													</div>
													{{ csrf_field() }}
													<div class="col-md-4">
														<div class="form-group">
                                                            <label class="control-label mb-10">Pengirim Ekspedisi</label>
                                                            <input type="text" id="pengirim" name="pengirim" class="form-control">
                                                                                                        
                                                        </div>
														@if ($errors->has('pengirim'))
															<div class="alert alert-danger">{{$errors->first('pengirim')}}</div>
														@endif
                                                    </div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label mb-10">Penerima</label>
															<input type="text" id="penerima" name="penerima" class="form-control">
                                                        </div>
														@if ($errors->has('penerima'))
															<div class="alert alert-danger">{{$errors->first('penerima')}}</div>
														@endif
                                                    </div>
												</div>
											</div>
											<!-- <div class="col-md-14" style="text-align:right;">
												<button type="button" onclick="ambildata()" class="btn btn-success ">Tambah Data</button>
											</div> -->
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
																				<!-- <th>No Transaksi</th> -->
																				<th>Nama Barang</th>
																				<th>Jumlah</th>

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
																		<button type="submit" class="btn btn-success ">Simpan</button>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
									</div>
									{{ csrf_field() }}
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
		var no_trans = document.getElementById('no_trans').value;
		// var jns_barang = document.getElementById('jns_barang').value;
		// var no_SO = document.getElementById('no_SO').value;
		// var tgl_instalasi = document.getElementById('tgl_instalasi').value;
		var pengirim = document.getElementById('pengirim').value;
		// var instansi = document.getElementById('instansi').value;
		var penerima = document.getElementById('penerima').value;
		var nama_barang = document.getElementById('nama_barang').value;
		var jumlah = document.getElementById('jumlah').value;
		console.log(instansi);
		addrow(no_trans, pengirim, penerima, nama_barang, jumlah);
	}
	var i = 0;

	function addrow(no_trans, pengirim, penerima, nama_barang, jumlah) {
		i++;
		var instansi = instansi;

		$('#TabelDinamis').append('<tr id="row' + i + '"></td><td style=display:none;"><input type="text" style="outline:none;border:0;"  name="no_trans[]" id="no_trans" value="' + no_trans +
			//  '"></td><td style=display:none;"><input type="text" style="outline:none;border:0;"  name="jns_barang[]" id="jns_barang" value="' + jns_barang + 
			// '"></td><td style=display:none;"><input type="text" style="outline:none;border:0;" readonly name="no_SO[]" id="no_SO" value="' + no_SO + 
			// '"></td><td style=display:none;"><input type="text" style="outline:none;border:0;" readonly name="tgl_transaksi[]" id="tgl_transaksi" value="' + tgl_instalasi + 
			'"></td><td><input type="text" style="outline:none;border:0;" readonly name="pengirim[]" id="pengirim" value="' + pengirim +
			// '"></td><td><input type="text" style="outline:none;border:0;" readonly name="instansi[]" id="instansi" value="' + instansi + 
			'"></td><td><input type="text" style="outline:none;border:0;" readonly name="penerima[]" id="penerima" value="' + penerima +
			'"></td><td><input type="text" style="outline:none;border:0;" readonly name="nama_barang[]" id="nama_barang" value="' + nama_barang +
			'"></td><td><input type="text" style="outline:none;border:0;" readonly name="jumlah[]" id="jumlah" value="' + jumlah +
			'"></td><td><button type="button" id="' + i + '" class="btn btn-danger btn-small remove_row">&times;</button></td></tr>');
	};
	$(document).on('click', '.remove_row', function() {
		var row_id = $(this).attr("id");
		$('#row' + row_id + '').remove();
	});

	$('#nama_supplier').select2();
</script>
<script>
	$('#no_SO').change(function() {
		if ($(this).val() != '') {
			var select = $(this).attr("id");
			var value = $(this).val();
			console.log(value);
			var dependent = $(this).data('dependent');
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url: "{{ route('trkkeluarcontroller.fetch')}}",
				method: "POST",
				data: {
					select: select,
					value: value,
					_token: _token,
					dependent: dependent
				},
				success: function(result) {
					$('#' + dependent).html(result);
				},

			});
			var url = '{{ route("trkkeluarcontroller.instansi", ":no_so") }}';
			url = url.replace(':no_so', value);

			$.ajax({
				url: url,
				type: 'get',
				dataType: 'json',
				success: function(response) {
					if (response != null) {
						$('#instansi').val(response.instansi);
					}
				}
			});
		}
	});
</script>
@endsection