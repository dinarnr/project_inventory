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
                                    <td style="display:none"><input type="text" style="outline:none;border:0;" readonly name="no_peng[]" id="no_peng" value="{{ $data_detail->no_pengajuan}}"></td>
                                    <td><input type="text" style="outline:none;border:0;" readonly name="nama_barang[]" id="nama_barang" value="{{ $data_detail->namaBarang}}"></td>
                                    <td><input type="text" style="outline:none;border:0;" readonly name="jml_barang[]" id="jml_barang" value="{{ $data_detail->jmlBarang}}"></td>
                                    <td><input type="text" style="outline:none;border:0;" readonly name="harga[]" id="harga" value="{{ $data_detail->harga}}"></td>
                                    <td><input type="text" style="outline:none;border:0;" readonly name="keterangan[]" id="keterangan" value="{{ $data_detail->keterangan}}"></td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left" for="example-email">Supplier <span class="help"> </span></label>
                                    <select class="form-control" name="supplier" id="supplier" >
                                        @foreach($supplier as $supp)
											<option value="{{ $supp->nama_supplier}}">{{ $supp->nama_supplier }} </option>
										@endforeach
                                    </select>
                                    @if ($errors->has('supplier'))
                                        <div class="tulisan">{{$errors->first('supplier')}}</div>
                                        @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Total Harga</label>
                                    <input type="text" id="harga_jual" name="harga_jual" class="form-control a2" value="">
                                    @if ($errors->has('harga_jual'))
                                        <div class="tulisan">{{$errors->first('harga_jual')}}</div>
                                        @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Tanggal beli<span class="help"> </span></label>
                                    <input type="date" id="tgl_beli" name="tgl_beli" class="form-control" placeholder="">
                                    @if ($errors->has('tgl_beli'))
                                        <div class="tulisan">{{$errors->first('tgl_beli')}}</div>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Jenis transaksi</label>
                                    <select class="form-control" id="jenisTransaksi" name="jenisTransaksi">
                                        <option value="cash">Cash</option>
                                        <option value="transfer">Transfer</option>
                                        <option value="hutang">Hutang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="total2" name="total" style="display: none;" >
                                    <label class="control-label mb-10 text-left">Total Bayar</label>
                                    <input type="text" id="harga_beli" name="harga_beli" class="form-control b2" value="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="total" name="total" style="display: none;" >
                                    <label class="control-label mb-10 text-left"> Total Hutang</label>
                                    <input type="text"  class="form-control c2"  id="amount" name="amount" readonly>
                                </div>
                            </div>
                        </div>
                            <div class="form-group" style="text-align: right;">
                                <button class="btn btn-success mr-5" name="submit" type="submit">Simpan</button>
                                <!-- <button class="btn btn-danger  " name="reset" type="reset">Batal</button> -->
                            </div>



                        </form>
                    </div>
                    <!-- /Row -->
                </div>
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
    } else {
        $("#total").hide();
        $("#total2").hide();
    }
        });

    
    $(document).ready(function() {
    $(".a2, .b2").on("keydown keyup", function(event) {
    var jual = $("#harga_jual").val().split('.').join('');
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
    
    var tanpa_rupiah = document.getElementById('harga_jual');
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



    @endsection
