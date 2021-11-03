@extends('layout.master')
@section('title', 'Invoice')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Tambah Invoive</h5>
            </div> 
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <form action="{{ url('purchasing/pembelian/invoice/simpan') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <table>
                                                <div class="text-left">
                                                    <h6 class="txt-dark"><strong>No Pengajuan : </strong></h6>
                                                </div>
                                                <tr>
                                                <div class="">
                                                    <td class="txt-dark">
                                                        <input type="text" id="no_pengajuan" name="no_pengajuan" value="{{$data_pembelian->no_pengajuan}}" style="outline:none;border:0;" readonly>
                                                    </td>
                                                </div>
                                            </tr>
                                            </table>
                                            <table>
                                                <div class="text-left">
                                                    <h6 class="txt-dark"><strong>Nama Pemohon :</strong></h6>
                                                </div>
                                            <tr>
                                                <div class="">
                                                    <td class="txt-dark">
                                                        <input type="text" id="nama_pemohon" name="nama_pemohon"  value=" {{$data_pembelian->nama_pemohon}}" style="outline:none;border:0;" readonly>
                                                    </td>
                                                </div>
                                            </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <table>
                                                <div class="text-left">
                                                    <h6 class="txt-dark"><strong>Tanggal Pengajuan :</strong></h6>
                                                </div>
                                                <tr>
                                                    <div class="">
                                                        <td class="txt-dark">
                                                       <input type="text" id="tgl_pengajuan" name="tgl_pengajuan" value="{{$data_pembelian->tgl_pengajuan}}" style="outline:none;border:0;" readonly> 
                                                       <input type="hidden" id="pic_teknisi" name="pic_teknisi" value="{{$data_pembelian->pic_teknisi}}" style="outline:none;border:0;" readonly> 
                                                       <input type="hidden" id="pic_markeing" name="pic_markeing" value="{{$data_pembelian->pic_markeing}}" style="outline:none;border:0;" readonly> 
                                                       <input type="hidden" id="pic_warehouse" name="pic_warehouse" value="{{$data_pembelian->pic_warehouse}}" style="outline:none;border:0;" readonly> 
                                                       <input type="hidden" id="pic_admin" name="pic_admin" value="{{$data_pembelian->pic_admin}}" style="outline:none;border:0;" readonly> 
                                                    </td>
                                                    </div>
                                                </tr>
                                            </table>
                                            
                                        </div>
                                    </div>
                                <!-- end -->
                                
                </div>                
                <div class="invoice-bill-table">
                    <div class="table-responsive">
                        <table id="myTable1" class="table table display pb-30">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama barang</th>
                                    <th>Jumlah</th>
                                    <th>Estimasi Harga</th>
                                    <th>Keterangan</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach ($data_detail as $data_detail) 
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td style="display:none"><input type="text" style="outline:none;border:0;" readonly name="no_peng1[]" id="no_peng1" value="{{ $data_detail->no_pengajuan}}"></td>
                                    <td><input type="text" style="outline:none;border:0;" readonly name="nama_barang1[]" id="nama_barang1" value="{{ $data_detail->namaBarang}}"></td>
                                    <td><input type="text" style="outline:none;border:0;" readonly name="jml_barang1[]" id="jml_barang" value="{{ $data_detail->jmlBarang}}"></td>
                                    <td><input type="text" style="outline:none;border:0;" readonly name="hargaEstimasi[]" id="hargaEstimasi" value="{{ $data_detail->harga}}"></td>
                                    <td><input type="text" style="outline:none;border:0;" readonly name="keterangan1[]" id="keterangan" value="{{ $data_detail->keterangan}}"></td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left" for="example-email">Supplier <span class="help"> </span></label>
                                    <select class="form-control" name="supplier" id="supplier" >
                                        @foreach($supplier as $supp)
											<option value="{{ $supp->nama_supplier}}">{{ $supp->nama_supplier }} </option>
										@endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Tanggal beli<span class="help"> </span></label>
                                    <input type="date" id="tgl_beli" name="tgl_beli" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Nama Barang</label>
                                    
                                    <select name="nama_barang" id="nama_barang" class="form-control">
                                        @foreach ($coba as $coba)
                                            <option value="{{ $coba->namaBarang}}">{{ $coba->namaBarang}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Jumlah</label>
                                    <input class="form-control" type="number" name="jumlah" id="jumlah" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Harga</label>
                                    <input class="form-control" type="text" name="harga" id="harga" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Total Pembelian</label>
                                    <input class="form-control a2" type="text" name="totalBeli" id="totalBeli" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Pembayaran</label>
                                    <select class="form-control" id="jenisTransaksi" name="jenisTransaksi">
                                        <option value="cash">Tunai</option>
                                        <option value="transfer">Transfer</option>
                                        <option value="hutang">Angsuran</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="info1" name="info1" style="display: none;" >
                                    <label class="control-label mb-10 text-left">Info Transfer</label>
                                    <input type="text" id="info" name="info" class="form-control " value="">
                                </div>
                                <div class="form-group" id="total2" name="total" style="display: none;" >
                                    <label class="control-label mb-10 text-left">Total Bayar</label>
                                    <input type="text" id="harga_beli" name="harga_beli" class="form-control b2" value="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="total" name="total" style="display: none;" >
                                    <label class="control-label mb-10 text-left">Sisa Angsuran</label>
                                    <input type="text"  class="form-control c2"  id="amount" name="amount" readonly>
                                </div>
                            </div>
                        </div><div class="col-md-14" style="text-align:right;">
                            <button type="button" onclick="ambildata()" class="btn btn-success ">Tambah Data</button>
                        </div>
                        <div class="col-sm-14 mt-10">
                            <div class="panel panel-default card-view">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">Barang Beli</h6>
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
                                                            <th>Nama Barang</th>
                                                            <th>Jumlah</th>
                                                            <th>Harga</th>
                                                            <th>Total Pembelian</th>
                                                            <th>Supplier</th>
                                                            <th>Remove</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="TabelDinamis">
                                                    </tbody>
                                                </table>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="selesai">
                                                    <label class="form-check-label" for="inlineRadio1">Selesai</label>
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="belumSelesai">
                                                    <label class="form-check-label" for="inlineRadio2">Belum Selesai</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" id="alasan1" name="alasan1" style="display: none;">
                                                        <label class="control-label mb-10 text-left">Alasan</label>
                                                        <input type="text"  class="form-control"  id="alasan" name="alasan"  >
                                                    </div>
                                                </div>

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
        <!-- /Main Content -->
    </div>
    <!-- /#wrapper -->
    <script>
    $('select[name=jenisTransaksi]').on('change', function() {
    if (this.value == 'hutang') {
        $("#total").show();
        $("#total2").show();
        $("#info1").hide();
    } else if (this.value == 'transfer'){
        $("#total").hide();
        $("#total2").hide();
        $("#info1").show();

    } else {
        $("#total").hide();
        $("#total2").hide();
        $("#info1").hide();

    }
        });
    </script>
    <script>
    $('select[type=radio]').on('change', function() {
    if (this.value == 'selesai') {
        $("#alasan").hide();
    } else {
        $("#alasan").show();

    }
        });
        
    
    $(document).ready(function() {
    $(".a2, .b2").on("keydown keyup", function(event) {
    var jual = $("#totalBeli").val().split('.').join('');
    var beli = $("#harga_beli").val().split('.').join('');
    var reverse = (jual - beli).toString().split('').reverse().join('');
    amount = reverse.match(/\d{1,3}/g);
    amount = amount.join('.').split('').reverse().join('');
    $("#amount").val(amount);
    });
    });
    </script>
    @endsection
    @section('scripts')

    <script type="text/javascript">
    
    var tanpa_rupiah = document.getElementById('harga');
    tanpa_rupiah.addEventListener('keyup', function(e) {
    tanpa_rupiah.value = formatRupiah(this.value);
    });

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
    </script>

    <script type="text/javascript">
    
        var tanpa_rupiah1 = document.getElementById('harga_beli');
        tanpa_rupiah1.addEventListener('keyup', function(e) {
        tanpa_rupiah1.value = formatRupiah(this.value);
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
        </script>

    <script type="text/javascript">
    
        var tanpa_rupiah2 = document.getElementById('totalBeli');
        tanpa_rupiah2.addEventListener('keyup', function(e) {
        tanpa_rupiah2.value = formatRupiah(this.value);
        });
    
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
        </script>
    <script type="text/javascript">
        function ambildata() {
            var no_peng = document.getElementById('no_pengajuan').value;
            var supplier = document.getElementById('supplier').value;
            var tgl_beli = document.getElementById('tgl_beli').value;
            var nama_barang = document.getElementById('nama_barang').value;
            var jumlah = document.getElementById('jumlah').value;
            var harga = document.getElementById('harga').value;
            var totalBeli = document.getElementById('totalBeli').value;
            var jenisTransaksi = document.getElementById('jenisTransaksi').value;
            var info = document.getElementById('info').value;
            var harga_beli = document.getElementById('harga_beli').value;
            var amount = document.getElementById('amount').value;

            addrow(no_peng, supplier, totalBeli, tgl_beli, nama_barang, harga, jumlah, jenisTransaksi, info, harga_beli, amount);
        }
        var i = 0;
    
        function addrow(no_peng, supplier, totalBeli, tgl_beli, nama_barang, harga, jumlah, jenisTransaksi, info, harga_beli, amount) {
            i++;
            $('#TabelDinamis').append('<tr id="row' + i + '"></td><td><input type="text" style="outline:none;border:0;"  name="nama_barang[]" id="nama_barang" value="' + nama_barang + 
                                                            '"></td><td><input type="text" style="outline:none;border:0;" readonly name="jumlah[]" id="jumlah" value="' + jumlah + 
                                                            '"></td><td><input type="text" style="outline:none;border:0;" readonly name="harga[]" id="harga" value="' + harga + 
                                                            '"></td><td><input type="text" style="outline:none;border:0;" readonly name="totalBeli[]" id="totalBeli" value="' + totalBeli + 
                                                            '"></td><td style="display:none;"><input type="text" style="outline:none;border:0;"  name="jenisTransaksi[]" id="jenisTransaksi" value="' + jenisTransaksi +
                                                            '"></td><td style="display:none;"><input type="text" style="outline:none;border:0;"  name="no_peng[]" id="no_peng" value="' + no_peng +
                                                            '"></td><td style="display:none;"><input type="text" style="outline:none;border:0;"  name="info[]" id="info" value="' + info +
                                                            '"></td><td style="display:none;"><input type="text" style="outline:none;border:0;"  name="harga_beli[]" id="harga_beli" value="' + harga_beli +
                                                            '"></td><td style="display:none;"><input type="text" style="outline:none;border:0;"  name="amount[]" id="amount" value="' + amount +
                                                            '"><td><input type="text" style="outline:none;border:0;" readonly name="supplier[]" id="supplier" value="' + supplier +
                                                            '"></td><td><button type="button" id="' + i + '" class="btn btn-danger btn-small remove_row">&times;</button></td></tr>');
        };
        $(document).on('click', '.remove_row', function() {
            var row_id = $(this).attr("id");
            $('#row' + row_id + '').remove();
        });

    </script>

    @endsection
