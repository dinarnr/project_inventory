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
                                <form action="{{ url('add2') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
    


                                    <div style="text-align: center;">
                                        <h5 class="active">Data Barang</h5>
                                    </div>
                                    <div class="col-md12">
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left">Nama barang</label>
                                            <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                                            <input type="hidden" class="form-control" name="noPO" id="noPO" value="{{$no_PO}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left" for="example-email">Keterangan<span class="help"> </span></label>
                                            <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="">
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
                                                                        <th>Rate</th>
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
                           

                            <div class="col-md-12" style="text-align:right;">
                                <button type="submit" class="btn btn-primary ">Simpan</button>
                            </div>
                            <!-- <div class="col-sm-4 col-xs-4">
                                <div class="form-wrap">
                                    <form class="form-horizontal"> -->

                            <!-- </form> -->
                        </div>
                    </div>
                    </form>
                    @include('po.tambahinstansi')
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

    function ambildata() {
        var noPO = document.getElementById('noPO').value;
        var nama_barang = document.getElementById('nama_barang').value;
        var jumlah = document.getElementById('jumlah').value;
        var rate = document.getElementById('rate').value;
        var amount = document.getElementById('amount').value;
        var keterangan = document.getElementById('keterangan').value;
        addrow(noPO, nama_barang, jumlah, keterangan, rate, amount);
    }
    var i = 0;

    function addrow(noPO, nama_barang, jumlah, keterangan, rate, amount) {
        i++;
        $('#TabelDinamis').append('<tr id="row' + i + '"><td style="display:none;"><input type="text" style="outline:none;border:0;" readonly name="noPO[]" id="noPO" value="' + noPO +
            '"><td><input type="text" style="outline:none;border:0; font-weight: bold;" readonly name="nama_barang[]" id="nama_barang" value="' + nama_barang +
            '"><br><input type="text" style="outline:none;border:0;" name="keterangan[]" id="keterangan" value="    ' + keterangan +
            '"></br ></td><td><input type="text" style="outline:none;border:0;" readonly name="jumlah[]" id="jumlah" value="' + jumlah +
            '"></td><td>Rp <input type="text" style="outline:none;border:0;" readonly name="rate[]" id="rate" value="' + rate +
            '"></td><td>Rp <input type="text" style="outline:none;border:0;" readonly name="amount[]" id="amount" value="' + amount +
            '"></td><td><button type="button" id="' + i + '" class="btn btn-danger btn-small remove_row">&times;</button></td></tr>');
    };
    $(document).on('click', '.remove_row', function() {
        var row_id = $(this).attr("id");
        $('#row' + row_id + '').remove();
    });



    $('#instansi').select2();
</script>
@endsection