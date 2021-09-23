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
                        <form action="{{ url('addpembelian2') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label mb-10 text-left" for="example-email">No PO <span class="help"> </span></label>
                                <input type="text" id="no_PO" name="no_PO" class="form-control" placeholder="" readonly value = "{{ $data_pembelian->no_PO }}">
                                <input type="hidden" id="id_PO" name="id_PO" class="form-control" placeholder="" readonly value = "{{ $data_pembelian->id_PO }}" >
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left" for="example-email">Nama barang <span class="help"> </span></label>
                                <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="" readonly value="{{ $data_pembelian->namaBarang }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Jumlah</label>
                                <input type="number" id="jumlah" name="jumlah" class="form-control" rows="3" readonly value="{{ $data_pembelian->jumlah }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left" for="example-email">Supplier <span class="help"> </span></label>
                                <input type="text" id="supplier" name="supplier" class="form-control" placeholder="" >
                                @if ($errors->has('supplier'))
                                    <div class="tulisan">{{$errors->first('supplier')}}</div>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Total Harga</label>
                                <input type="number" id="harga_jual" name="harga_jual" class="form-control a2" value="">
                                @if ($errors->has('harga_jual'))
                                    <div class="tulisan">{{$errors->first('harga_jual')}}</div>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Tanggal beli<span class="help"> </span></label>
                                <input type="date" id="tgl_beli" name="tgl_beli" class="form-control" placeholder="">
                                @if ($errors->has('tgl_beli'))
                                    <div class="tulisan">{{$errors->first('tgl_beli')}}</div>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Jenis transaksi</label>
                                <select class="form-control" id="jenisTransaksi" name="jenisTransaksi">
                                    <option value="cash">Cash</option>
                                    <option value="transfer">Transfer</option>
                                    <option value="hutang">Hutang</option>
                                </select>
                            </div>
                            <div class="form-group" id="total2" name="total" style="display: none;" >
                                <label class="control-label mb-10 text-left">Total Bayar</label>
                                <input type="number" id="harga_beli" name="harga_beli" class="form-control b2" value="">
                            </div>
                            <div class="form-group" id="total" name="total" style="display: none;" >
                                <label class="control-label mb-10 text-left"> Total Hutang</label>
                                <input type="text"  class="form-control c2"  id="amount" name="amount" readonly>
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
        $("#total2").show();
    }
        });

    
    $(document).ready(function() {
    $(".a2, .b2").on("keydown keyup", function(event) {
    var jual = $("#harga_jual");
    var beli = $("#harga_beli");
    $("#amount").val(Number(jual.val()) - Number(beli.val()));
    });
    });
    </script>

    @endsection
