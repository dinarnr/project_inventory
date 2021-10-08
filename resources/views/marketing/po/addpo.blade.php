@extends('layout.master')
@section('title', 'Tambah Purchase Order')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Buat Purchase Order Baru</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="purchasing">Purchase Order</a></li>
                    <li class="active"><span>Buat Purchase Order Baru</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view ">
                    <!-- <div class="panel-heading">
                                <div class="clearfix"></div>
                            </div> -->
                    <div class="panel-wrapper collapse in ">
                        <div class="panel-body">
                            <div class="form-wrap mt-3">
                                <form action="{{ url('marketing/po/simpan') }}" method="POST" enctype="multipart/form-data" name="myForm">
                                    @csrf
                                    <!-- <div class="form-group">
                                        <label class="control-label mb-10 text-left" for="example-email">Nomor PO Barang</label>
                                        <input type="text" id="noPO" name="noPO" class="form-control" readonly>
                                    </div> -->
                                    <div class="row">
                                        @foreach ((array)$noSO as $noSO)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10 text-left" for="example-email">No SO</label>
                                                <input type="hidden" id="no_SO" name="no_SO" value="{{ $noSO }}" class="form-control" placeholder="" readonly>
                                                <input type="text" id="noSO" name="noSO" value="{{ $noSO }}" class="form-control" placeholder="" readonly>
                                            </div>
                                        </div>
                                        @endforeach
                                        @foreach ((array)$noPO as $noPO)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10 text-left" for="example-email">No Purchase Order</label>
                                                <input type="hidden" id="no_PO" name="no_PO" value="{{ $noPO }}" class="form-control" placeholder="" readonly>
                                                <input type="text" id="noPO" name="noPO" value="{{ $noPO }}" class="form-control" placeholder="" readonly>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Tanggal Pemasangan</label>
                                                <input type="date" name="tgl_transaksi" id="tgl_transaksi" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label mb-10 text-left" for="example-email">Instansi<span class="help"> </span></label>
                                                <!-- <input type="text" id="instansi" name="instansi" class="form-control" placeholder=""> -->
                                                <select name="instansi" id="instansi" class="form-control" data-dependent="kode_instansi">
                                                    <option value="">pilih nama instansi</option>
                                                    @foreach($data_instansi as $data_int)
                                                    <option value="{{ $data_int->nama_instansi}}">{{ $data_int->kode_instansi }} | {{ $data_int->nama_instansi }}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                            
                                        <div class="col-md-6" hidden>
                                            <div class="form-group">
												<label class="control-label mb-10">Kode Instansi</label>
													<select name="kode_instansi" id="kode_instansi" class="form-control select2">
                                                        <!-- <option selected value="dawdawd">awdawd</option> -->
												    </select>
											</div>
												{{ csrf_field() }}
                                        </div>

                                        </div>
                                        <div class="col-md-2 mt-30">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#tambahinstansi">Tambah Instansi</button>
                                            </div>
                                        </div>
                                        

                                    </div>
                                    <hr>
                                    <div>
                                        <h5 class="active text-center">Data Barang</h5>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10 text-left" for="example-email">Keterangan<span class="help"> </span></label>
                                                <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="">
                                            </div>
                                        </div>
										<div class="col-md-4" hidden>
											<div class="form-group">
												<label class="control-label mb-10">Kode Barang</label>
													<select name="kode_barang" id="kode_barang" class="form-control select2" disabled>
																
												    </select>
											</div>
											{{ csrf_field() }}
										</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="control-label mb-10">Quantity</label>
                                            <input type="text" id="jumlah" name="jumlah" class="form-control a2" value="">
                                            <!-- <span class="help-block"> This is inline help </span>  -->
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label mb-10">Rate</label>
                                            <input type="text" id="rate" name="rate" class="form-control b2" value="">
                                            <!-- <span class="help-block"> This is inline help </span>  -->
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label mb-10">Amount</label>
                                            <input type="text" id="amount" name="amount" class="form-control" value="" readonly>
                                            <!-- <span class="help-block"> This is inline help </span>  -->
                                        </div>
                                    </div>
                                    <div class="form-group mt-20" style="text-align:right;">
                                        <button type="button" onclick="ambildata()" class="btn btn-primary ">Tambah Data</button>
                                    </div>

                                    <div class="col-sm-14">
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
                                                        <div class="col">
                                                            <table class="table table-bordered align-items-center">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th>Nama barang</th>
                                                                        <th>Quantity</th>
                                                                        <th>Rate (Rp)</th>
                                                                        <th>Amount</th>
                                                                        <th>Remove</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="TabelDinamis">
                                                                </tbody>
                                                            </table>
                                                            @error('TabelDinamis')
                                                            <div class="tulisan">{{$message}}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="total" class="col-sm-4 control-label">Total (Rp)</label>
                                    <div class="">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="total" name='total' placeholder="" readonly>
                                            <input type="hidden" class="form-control" id="total1" name='total' placeholder="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ppn" class="col-sm-4 control-label">PPn (%)</label>
                                    <div class="">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="ppn" name="ppn" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pph" class="col-sm-4 control-label">PPh (%)</label>
                                    <div class="">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="pph" name="pph" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="balance" class="col-sm-4 control-label">Balance Due (Rp)</label>
                                    <div class="">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="balance" name="balance" placeholder="" readonly>
                                            <input type="hidden" class="form-control" id="balance1" name="balance1" placeholder="" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group" style="text-align:right;">
                                    <button class="btn btn-default" name="draft" type="submit" value="draft" id="draft">Draft</button>
                                    <button class="btn btn-success mr-5" name="proses" type="submit" value="proses" id="proses">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    @include('marketing.po.tambahinstansi')
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="">

    <!-- Basic Table -->

</div>
<!-- /Row -->
<!-- /Main Content -->
</div>
<!-- /#wrapper -->
<script>
    $(document).ready(function() {
        $(".a2, .b2").on("keydown keyup", function(event) {
            var jumlah = $("#jumlah").val();
            var rate = $("#rate").val().split('.').join('');
            var reverse = (jumlah * rate).toString().split('').reverse().join('');
            amount = reverse.match(/\d{1,3}/g);
            amount = amount.join('.').split('').reverse().join('');
            $("#amount").val(amount);
        });

    });
</script>
@endsection
@section('scripts')
<script type="text/javascript">
    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('rate');
    tanpa_rupiah.addEventListener('keyup', function(e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });

    /* Dengan Rupiah */
    //  var dengan_rupiah = document.getElementById('rate');
    //  dengan_rupiah.addEventListener('keyup', function(e)
    //  {
    // dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    //  });

    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    };

    function ambildata(prefix) {
        var tanggal_pasang = document.forms["myForm"]["tgl_transaksi"].value;
		var instansi = document.forms["myForm"]["instansi"].value;
		var nama_barang = document.forms["myForm"]["nama_barang"].value;
		var keterangan = document.forms["myForm"]["keterangan"].value;
        var qty = document.forms["myForm"]["jumlah"].value;
		var rate = document.forms["myForm"]["rate"].value;
			if (tanggal_pasang == "") {
				alert("Tanggal tidak boleh kosong");
				return false;
			}else if(instansi == ""){
				alert("Nama instansi tidak boleh kosong");
				return false;
			}else if(nama_barang == ""){
				alert("Nama barang tidak boleh kosong");
				return false;
            }else if(keterangan == ""){
				alert("Keterangan tidak boleh kosong");
				return false;
			}else if(qty == ""){
				alert("Jumlah tidak boleh kosong");
				return false;
			}else if(rate == ""){
				alert("Rate tidak boleh kosong");
				return false;
			}

        var noPO = document.getElementById('noPO').value;
        var noSO = document.getElementById('noSO').value;
        var instansi = document.getElementById('instansi').value;
        var nama_barang = document.getElementById('nama_barang').value;
        var kode_barang = document.getElementById('kode_barang').value;
        var jumlah = document.getElementById('jumlah').value;
        var rate1 = document.getElementById('rate').value.replace(/[^,\d]/g, '').toString();
        var amount1 = document.getElementById('amount').value.replace(/[^,\d]/g, '').toString();
        var rate = document.getElementById('rate').value;
        var amount = document.getElementById('amount').value;
        var keterangan = document.getElementById('keterangan').value;
        var total = document.getElementById('total').value;
        addrow(noPO, noSO, nama_barang, kode_barang, jumlah, keterangan, rate, amount, rate1, amount1, instansi);

    }
    var i = 0;
    var total = 0;

    function pecah(bilangan) {
        var number_string = bilangan.toString(),
            sisa = number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return rupiah;
    }

    function addrow(noPO, noSO, nama_barang, kode_barang, jumlah, keterangan, rate, amount, rate1, amount1, instansi) {
        i++;
        $('#TabelDinamis').append('<tr id="row' + i + '"><td style="display:none;"><input type="text" style="outline:none;border:0;" readonly name="noPO[]" id="noPO" value="' + noPO +
            '"><td style="display:none;"><input type="text" style="outline:none;border:0; font-weight: bold;" readonly name="noSO[]" id="noSO" value="' + noSO +
            '"><td style="display:none;"><input type="text" style="outline:none;border:0; font-weight: bold;" readonly name="instansi1[]" id="instansi1" value="' + instansi +
            '"><td><input type="text" style="outline:none;border:0; font-weight: bold;" readonly name="nama_barang[]" id="nama_barang" value="' + nama_barang +
            '"><td style="display:none;"><input type="text" style="outline:none;border:0; font-weight: bold;" readonly name="kode_barang[]" id="kode_barang" value="' + kode_barang +
            '"><br><input type="text" style="outline:none;border:0;" name="keterangan[]" id="keterangan" value="    ' + keterangan +
            '"></br ></td><td><input type="text" style="outline:none;border:0;" readonly name="jumlah[]" id="jumlah" value="' + jumlah +
            '"></td><td>Rp <input type="text" style="outline:none;border:0;" readonly name="rate[]" id="rate" value="' + rate +
            '"></td><td>Rp <input type="text" style="outline:none;border:0;" readonly name="rate1[]" id="rate" value="' + rate1 +
            '"></td><td>Rp <input type="text" style="outline:none;border:0;" readonly name="amount[]" id="amount' + i + '" value="' + amount +
            '"></td><td style="display:none;">Rp <input type="text" style="outline:none;border:0;" readonly name="amount1[]" id="amount' + i + '" value="' + amount1 +
            '"></td><td><button type="button" id="' + i + '" class="btn btn-danger btn-small remove_row">&times;</button></td></tr>');
        total = (parseInt(total) + parseInt(amount.split('.').join(''))).toString().split('').join('');
        $("#total").val(pecah(total));
        $("#total1").val(total);

    };

    $("#ppn, #pph").keyup(function() {
        update();
    });

    function update() {
        var ppn = $('#ppn').val();
        var pph = $('#pph').val();
        $("#balance").val(pecah(parseInt(total) + ((ppn / 100) * parseInt(total)) + ((pph / 100) * parseInt(total))));
        var balance = $("#balance").val();
        $("#balance1").val(balance.replace(/[^,\d]/g, '').toString());
    }


    $(document).on('click', '.remove_row', function() {
        var row_id = $(this).attr("id");
        total = (parseInt(total) - parseInt($('#amount' + row_id + '').val().split('.').join(''))).toString().split('').join('');
        $("#total").val(pecah(total));
        $("#total1").val(total);

        var pph = $('#pph').val();
        $("#balance").val(pecah(parseInt(total) + ((ppn / 100) * parseInt(total)) + ((pph / 100) * parseInt(total))));
        var balance = $("#balance").val();
        $("#balance1").val(balance.replace(/[^,\d]/g, '').toString());

        $('#row' + row_id + '').remove();
    });



    $('#instansi').select2();
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
				url: "{{ route('pomktcontroller.fetch')}}",
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
    $('#instansi').change(function(){
		if($(this).val() != ''){
			var select = $(this).attr("id");
			var value = $(this).val();
			
			// $('#id_barang').val(value);
			var dependent = $(this).data('dependent');
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url: "{{ route('pomktcontroller.instansi')}}",
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
