@extends('layout.master')
@section('title', 'Data Barang')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">edit draft</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">purchase order</a></li>
                    <li><a href="#"><span>edit draft</span></a></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view ">


                    <div class="panel-wrapper collapse in ">
                        <div class="panel-body">
                            <div class="form-wrap mt-3">
                                <form action="{{ url('marketing/po/ubah/draft/simpan') }}" method="post" role="form" autocomplete="off" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="form-group">
                                        @foreach($data_detail as $data_detail)
                                        <input type="hidden" value="{{ $data_detail->no_PO}}" class="form-control" name="edit_id">
                                        <label class="control-label mb-10 text-left">Nama barang <span class="help"> </span></label>
                                        <input type="text" value="{{ $data_detail->nama_barang}}" class="form-control" name="edit_nama">
                                        <!-- @if ($errors->has('nama_barang'))
                                                <div class="alert alert-danger">{{$errors->first('nama_barang')}}</div>
                                                @endif -->
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Keterangan</label>
                                        <input type="text" value="{{ $data_detail->keterangan_barang}}" class="form-control" name="edit_keterangan">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Quantity</label>
                                        <input type="text" value="{{ $data_detail->jumlah}}" class="form-control a1" name="edit_jumlah">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Rate</label>
                                        <input type="text" value="{{ number_format($data_detail->rate), 2}}" class="form-control b1" name="edit_rate" id='edit_rate'>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Amount</label>
                                        <input type="text" value="{{ number_format($data_detail->amount), 2}}" class="form-control c1" name="edit_amount" id='edit_amount' readonly>
                                    </div>
                                    <div class="form-group" style="text-align:right;">
                                        <button class="btn btn-success">Simpan</button>
                                    </div>
                                    @endforeach
                                </form>
                            </div>
                            <!-- </form>
                                    </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
    <!-- /Main Content -->
</div>
<!-- /#wrapper -->
<script>
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
    var tanpa_rupiah = document.getElementById('edit_rate');
    tanpa_rupiah.addEventListener('keyup', function(e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });
    $(document).ready(function() {
        $(".a1, .b1, .c1, .d1").on("keydown keyup", function(event) {
            var jumlah = $("#edit_jumlah").val();
            var rate = $("#edit_rate").val().split('.').join('');
            var reverse = (jumlah * rate).toString().split('').reverse().join('');
            amount = reverse.match(/\d{1,3}/g);
            amount = amount.join('.').split('').reverse().join('');
            $("#edit_amount").val(amount);
            $("#edit_amount1").val(amount.replace(/[^,\d]/g, '').toString());
        });
    });
</script>
@endsection