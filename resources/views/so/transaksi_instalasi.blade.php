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
				<!-- <a href="/addkeluarbaru" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> BARU</a>
				<a href="/addkeluarretur" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> RETUR</a> -->

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
                                        <form action="{{ url('addkeluarbaru2') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body" >
												<!-- <div class="row" >
													<div class="col-md-6">
															<div class="form-group">
																<label class="control-label mb-10">Jenis Barang</label>
																<select id="jenistransaksi" name="jenistransaksi" onchange=";" class="form-control">
																	<option value='' disabled selected style='display:none;'>Pilih Jenis Transaksi</option>
																	<option value="NO">Barang Instalasi</option>
																	<option value="YES">Barang Garansi</option>
																</select>
															</div>
												    </div>
												</div> -->
												<!-- <div class="" id="box-1" style="display: none;">	 -->
												<div class="row" id=""> 
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">No Transaksi</label>
															<input type="hidden" id="no_transaksi" name="no_transaksi" value="" class="form-control" placeholder="" readonly>
                                                			<input type="text" id="no_trans" name="no_trans" value="" class="form-control" placeholder="" readonly>
														</div>
													</div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">NO SO</label>
                                                            <select name="noSO" id="noSO" class="form-control dynamic1" data-dependent="TabelDinamis">
																<option value="">Pilih No SO</option>
																		<option value=""></option>
															</select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Instansi</label>
                                                            <select name="instansi" id="instansi" class="form-control">
																<option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Penerima</label>
															<input type="text" id="penerima" name="penerima" class="form-control">

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
													
                                                </div>
												<hr>
                                                <table class="table table-nobordered align-items-center">
													<thead class="thead-light">
														<tr>
															<th>Nama Barang</th>
														</tr>
													</thead>
													<tbody id="TabelDinamis">
																				
													</tbody>
												</table>
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
																					<th>Nama barang</th>
																					<th>Jumlah</th>
																					<th>Keterangan</th>
																					<!-- <th>Remove</th> -->

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
														'"></td><td><input type="text" style="outline:none;border:0;" readonly name="nama_barang[]" id="nama_barang" value="' + nama_barang + 
														'"></td><td style=display:none;"><input type="text" style="outline:none;border:0;"  name="kode_barang[]" id="kode_barang" value="' + kode_barang + 
														'"></td><td><input type="text" style="outline:none;border:0;" readonly name="jumlah[]" id="jumlah" value="' + jumlah + 
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
<!-- <script>
	var select = document.getElementById('jenistransaksi');
	var currentOption = 0;

// Add event listener that listens on when you click "select"
	select.addEventListener("click", function() {
    // If one of the other options are selected, then hide it and set it to empty
    // Set current option to be current option
    currentOption = this.selectedIndex;
    // Set box-N to show
    if(currentOption == 1 ){
    	document.getElementById('box-1').style.display = 'block';
      document.getElementById('box-2').style.display = 'block';
    } else if(currentOption == 2){
    	document.getElementById('box-1').style.display = 'none';
		document.getElementById('box-2').style.display = 'block';
    }
});
	$('#nama_barang').select2();
	$('#nama_supplier').select2();
</script> -->
<script>
	$('.dynamic1').change(function(){
		if($(this).val() != ''){
			var select = $(this).attr("id");
			var value = $(this).val();
			console.log(value);
			var dependent = $(this).data('dependent');
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url: "{{ route('fetch')}}",
				method: "POST",
				data: {
					select: select,value: value,_token:_token,dependent: dependent
				},
				success: function(result) {
					$('#'+dependent).html(result);
				}
			});
		}
	});
</script>
@endsection