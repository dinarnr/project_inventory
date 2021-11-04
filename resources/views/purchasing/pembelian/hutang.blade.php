@extends('layout.master')
@section('title', 'Detail Invoice')
@section('content')
<style type="text/css">
    @media print {
        .hide-from-printer {
            display: none;
        }
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        @foreach ($data_detail as $id)
                        <form action="{{ url('purchasing/pembelian/hutang/simpan')}}/{{$id->id_pembelian}}" method="post" enctype="multipart/form-data">
                            @endforeach
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-xs-8">
                                            <div class="form-group">
                                                @foreach ($profil as $profil)
                                                <div class="">
                                                    <h4 text-style="left" class="txt-dark">{{$profil->nama}}</h4>
                                                </div>
                                                <table>
                                                    <tr>
                                                        <div class="row">

                                                            <td class="txt-dark"> {{$profil->alamat}} <br>
                                                                Phone : {{$profil->telp}}<br> Email : {{$profil->email}}</td>
                                                            @endforeach
                                                        </div>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-xs-4">
                                            <div class="form-group mt-20 ">

                                                <img src="{{ asset('template') }}/dist/img/ns.jpg">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">

                                        <div class="col-xs-8">
                                            <div class="form-group">
                                                <table>
                                                    @foreach ($pembelian as $pembelian)
                                                    <div class="text-left">
                                                        <h6 class="txt-dark"><strong>NO PENGAJUAN : </strong></h6>
                                                        <div class="">
                                                            <div class="txt-dark">
                                                                {{ $pembelian->no_pengajuan }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </table>

                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <table> 
                                                    <div class="text-left">
                                                        <h6 class="txt-dark"><strong>TANGGAL PEMBELIAN : </strong>
                                                        </h6>
                                                        <div class="">
                                                            <div class="txt-dark"> {{ $pembelian->tgl_beli }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <table id="" class="table display pb-30">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama barang</th>
                                                <th>Supplier</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Total Harga</th>
                                                <th>Total Bayar</th>
                                                <th>Sisa Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($data_detail as $detail)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Nama barang">{{ $detail->namaBarang }}</a>
                                                </td>
                                                <td>
                                                    <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Rate">{{ $detail->supplier }}</a>
                                                </td>
                                                <td>
                                                    <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Jumlah">{{ $detail->jmlBarang }}</a>
                                                </td>
                                                <td>
                                                    Rp {{number_format ($detail->harga, 0, ',', '.') }}
                                                </td>
                                                <td>
                                                    Rp {{number_format ($detail->totalBeli, 0, ',', '.') }}
                                                </td>
                                                <td>
                                                    Rp {{number_format ($detail->harga_beli, 0, ',', '.') }}
                                                </td>
                                                <td>
                                                    Rp {{number_format ($detail->amount, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label mb-10 text-left">Jenis transaksi</label>
                                                <select class="form-control" id="jenisTransaksi" name="jenisTransaksi">
                                                    <option value="angsuran">Angsuran</option>
                                                    <option value="tunai">Tunai</option>
                                                    <option value="transfer">Transfer</option>
                                                </select>
                                            </div>
                                        </div>
                                        @foreach ($data_detail as $data_detail)
                                        <div class="col-md-4">
                                            <div class="form-group" id="info1" name="info1" style="display: none;">
                                                <label class="control-label mb-10 text-left">Info Transfer</label>
                                                <input type="text" id="info" name="info" class="form-control " value="">
                                            </div>
                                            <div class="form-group" id="total2" name="total2">
                                                <label class="control-label mb-10 text-left">Total Bayar</label>
                                                <input type="text" id="harga_beli" name="harga_beli" class="form-control a2" >
                                                <input type="hidden" class="form-control c2" id="totalBayar" name="totalBayar" value="{{$data_detail->harga_beli}}" readonly>
                                                <input type="hidden" class="form-control" id="totalBayar1" name="totalBayar1" readonly>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" id="total" name="total">
                                                <label class="control-label mb-10 text-left"> Sisa Bayar</label>
                                                <input type="hidden" class="form-control b2" id="sisabyr" name="sisabyr" value="{{ $data_detail->amount}}" readonly>
                                                <input type="text" class="form-control " id="sisabayar" name="sisabayar" readonly>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                    </div>

                </div>
            </div>
            <div class="form-group" style="text-align: right;">
                <button class="btn btn-success mr-5" name="submit" type="submit">Simpan</button>
                <!-- <button class="btn btn-danger  " name="reset" type="reset">Batal</button> -->
            </div>

            </form>
        </div>
    </div>

    {{-- <div class="pull-right hide-from-printer">
            <button type="button" class="btn btn-success btn-icon left-icon" onclick="javascript:window.print();">
                <i class="fa fa-print"></i><span> Simpan</span>
            </button>
        </div> --}}

    <!-- /Row -->
    <!-- /Main Content -->
</div>
<!-- /#wrapper -->
<script>
    $('select[name=jenisTransaksi]').on('change', function() {
        if (this.value == 'hutang') {
            $("#total2").show();
            $("#total").show();
            $("#info1").hide();
        } else {
            $("#total2").hide();
            $("#total").hide();
            $("#info1").show();
        }
    });


    $(document).ready(function() {
        $(".a2, .b2, .c2").on("keydown keyup", function(event) {
            var beli = $("#harga_beli").val().split('.').join('');
            var sisa = $("#sisabyr").val().split('.').join('');
            var reverse = (sisa - beli).toString().split('').reverse().join('');
            amount = reverse.match(/\d{1,3}/g);
            amount = amount.join('.').split('').reverse().join('');
            $("#sisabayar").val(amount);

            var totalBayar = $("#totalBayar").val().split('.').join('');
            var reverse1 = (+totalBayar + +beli).toString().split('').reverse().join('');
            amount1 = reverse1.match(/\d{1,3}/g);
            amount1 = amount1.join('.').split('').reverse().join('');
            $("#totalBayar1").val(amount1);


        });
    });
</script>
<script type="text/javascript">
    var tanpa_rupiah = document.getElementById('harga_beli');
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
@endsection