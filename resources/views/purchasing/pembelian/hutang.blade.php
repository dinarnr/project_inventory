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
                            @foreach ($no_pengajuan as $no_pengajuan)
                            <form  action="{{ url('purchasing/pembelian/hutang/simpan')}}/{{$no_pengajuan->no_pengajuan}}" method="post" enctype="multipart/form-data">    
                            @endforeach
                                {{ csrf_field() }}                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-xs-8">
                                                <div class="form-group">
                                                    <div class="">
                                                        <h4 text-style="left" class="txt-dark">Nakula Sadewa, CV</h4>
                                                    </div>
                                                    <table>
                                                        <tr>
                                                            <div class="row">
                                                                @foreach ($profil as $profil)
                                                                    <td class="txt-dark"> Jl Candi Mendut Utara 1 No. 11
                                                                        <br>
                                                                        Kel. Mojolangu Kec. Lowokwaru Malang - Jawa Timur<br>
                                                                        Phone : {{ $profil->telp }}<br> Email :
                                                                        {{ $profil->email }}
                                                                    </td>
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
                                                                        {{ $pembelian->no_pengajuan }}</div>
                                                                </div>
                                                            </div>
                                                            <div class="text-left">
                                                                <h6 class="txt-dark"><strong>NAMA PEMOHON : </strong></h6>
                                                                <div class="">
                                                                    <div class="txt-dark">
                                                                        {{ $pembelian->nama_pemohon }}</div>
                                                                </div>
                                                            </div>
                                                    </table>

                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="form-group">
                                                    <table>
                                                        <div class="text-left">
                                                            <h6 class="txt-dark"><strong>TANGGAL PENGAJUAN</strong></h6>
                                                            <div class="">
                                                                <div class="txt-dark"> {{ $pembelian->tgl_pengajuan }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-left">
                                                            <h6 class="txt-dark"><strong>TANGGAL PEMBELIAN : </strong>
                                                            </h6>
                                                            <div class="">
                                                                <div class="txt-dark"> {{ $pembelian->tglBeli }}
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
                                                    <th>Keterangan</th>
                                                    <th>Jumlah</th>
                                                    <th>Estimasi Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($data_detail as $detail)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>
                                                            <a href="#" id="" style="font-weight:bold" data-type="text"
                                                                data-pk="1"
                                                                data-title="Nama barang">{{ $detail->namaBarang }}</a>
                                                        </td>
                                                        <td>
                                                            <a href="#" id="" style="font-weight:bold" data-type="text"
                                                                data-pk="1" data-title="Rate">{{ $detail->keterangan }}</a>
                                                        </td>
                                                        <td>
                                                            <a href="#" id="" style="font-weight:bold" data-type="text"
                                                                data-pk="1" data-title="Jumlah">{{ $detail->jmlBarang }}</a>
                                                        </td>
                                                        <td>
                                                            Rp {{number_format ($detail->harga, 0, ',', '.') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr class="txt-dark">
                                                    <td colspan="3"></td>
                                                    <td><strong> Total Harga </strong></td>
                                                    <td>Rp {{number_format ($pembelian->harga, 0, ',', '.') }}</td>
                                                </tr>
                                                <tr class="txt-dark">
                                                    <td colspan="3"></td>
                                                    <td><strong> Bayar </strong></td>
                                                    <td>Rp {{number_format ($pembelian->totalBayar, 0, ',', '.') }}</td>
                                                </tr>
                                                <tr class="txt-dark">
                                                    <td colspan="3"></td>
                                                    <td><strong> Sisa Bayar </strong></td>
                                                    <td>Rp {{number_format ($pembelian->sisaBayar, 0, ',', '.') }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label mb-10 text-left">Jenis transaksi</label>
                                                        <select class="form-control" id="jenisTransaksi"
                                                            name="jenisTransaksi">
                                                            <option value="hutang">Hutang</option>
                                                            <option value="cash">Cash (lunas)</option>
                                                            <option value="transfer">Transfer (lunas)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" id="total2" name="total2">
                                                        <label class="control-label mb-10 text-left">Total Bayar</label>
                                                        <input type="text" id="harga_beli" name="harga_beli"
                                                            class="form-control a2" value="">
                                                        <input type="hidden" class="form-control c2" id="totalBayar" name="totalBayar" readonly>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group" id="total" name="total">
                                                        <label class="control-label mb-10 text-left"> Sisa Bayar</label>
                                                        <input type="hidden" class="form-control b2" id="sisabyr" name="sisabyr" value="{{ $pembelian->sisaBayar}}"readonly>
                                                        <input type="hidden" class="form-control c2" id="totalBayar1" name="totalBayar1" value="{{ $pembelian->totalBayar}}"readonly>
                                                        <input type="text" class="form-control " id="sisabayar" name="sisabayar"  readonly>
                                                    </div>
                                                </div>
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
            } else {
                $("#total2").hide();
                $("#total").hide();
            }
        });


        $(document).ready(function() {
            $(".a2, .b2, .c2").on("keydown keyup", function(event) {
                var beli = $("#harga_beli").val().split('.').join('');
                var totalBayar1 = $("#totalBayar1").val();
                var sisa = $("#sisabyr").val().split('.').join('');
                totalBayar = +beli + +totalBayar1;
                var reverse = (sisa - beli).toString().split('').reverse().join('');
                amount1 = reverse.match(/\d{1,3}/g);
                amount = amount1.join('.').split('').reverse().join('');
                $("#sisabayar").val(amount);
                $("#totalBayar").val(totalBayar);

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
