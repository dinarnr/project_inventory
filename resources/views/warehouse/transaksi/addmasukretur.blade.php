@extends('layout.master')
@section('title', 'Data Transaksi')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">barang masuk retur</h5><br>
                <a href="{{ url('warehouse/transaksi/masukbaru/tambah') }}" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> BARU</a>
                <a href="{{ url('warehouse/transaksi/masukretur/tambah') }}" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> RETUR</a>

            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#"><span>transaksi</span></a></li>
                    <li class="active"><span> barang masuk retur </span></li>
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
                                        <form name="myForm" action="{{ url('warehouse/transaksi/masukretur/simpan') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    @foreach ((array)$no_retur as $no_trans)
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">No Transaksi</label>
                                                            <input type="hidden" id="no_transaksi" name="no_transaksi" value="{{ $no_retur }}" class="form-control" placeholder="" readonly>
                                                            <input type="text" id="no_retur" name="no_retur" value="{{ $no_retur }}" class="form-control" placeholder="" readonly>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">No PO</label>
                                                            <select name="no_PO" id="no_PO" class="form-control">
                                                                <option value="">Pilih No PO</option>
                                                                @foreach($noPO as $noPO)
                                                                <option value="{{ $noPO->no_PO }}">{{ $noPO->no_PO }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Pengirim Ekspedisi</label>
                                                            <input type="text" id="pengirim" name="pengirim" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Penerima</label>
                                                            <input type="text" id="penerima" name="penerima" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Tanggal Terima</label>
                                                            <input type="date" id="tgl_transaksi" name="tgl_transaksi" class="form-control">
                                                        </div>
                                                    </div>

                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">

                                                            <label class="control-label mb-10">Nama Barang</label>
                                                            <select name="nama_barang" id="nama_barang" class="form-control select2" data-dependent="kode_barang">
                                                                <option value="">Pilih Nama barang</option>
                                                                @foreach($barang as $brg)
                                                                <option value="{{ $brg->nama_barang }}">{{ $brg->nama_barang }} | {{ $brg->kode_barang }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4" hidden>
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Kode Barang</label>
                                                            <select name="kode_barang" id="kode_barang" class="form-control select2" disabled>

                                                            </select>
                                                            <!-- <div id="id_barang"></div> -->
                                                        </div>
                                                        {{ csrf_field() }}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Instansi</label>
                                                            <select name="instansi" id="instansi" class="form-control select2">
                                                                <option value="">Pilih Nama Instansi</option>
                                                                @foreach($data_instansi as $instansi)
                                                                <option value="{{ $instansi->nama_instansi }}">{{ $instansi->nama_instansi }} | {{ $instansi->kode_instansi }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Jumlah</label>
                                                            <input type="number" id="jumlah" name="jumlah" class="form-control">
                                                            @foreach($barang as $brg)
                                                            <input id="kode_barang" name="kode_barang" value="{{$brg->kode_barang}}" hidden>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10">Keterangan</label>
                                                            <input type="text" id="keterangan" name="keterangan" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-14" style="text-align:right;">
                                                <button type="button" onclick="ambildata()" class="btn btn-success ">Tambah Data</button>
                                            </div>
                                            <div class="col-md-12 mt-10">
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
                                                                <div classs="col">
                                                                    <table class="table table-bordered align-items-center">
                                                                        <thead class="thead-light">
                                                                            <tr>
                                                                                <th>No Transaksi</th>
                                                                                <th>No PO</th>
                                                                                <th>Nama barang</th>
                                                                                <th>Jumlah</th>
                                                                                <th>Keterangan</th>
                                                                                <th>Remove</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="TabelDinamis">
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
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    function ambildata() {
        var no_PO = document.getElementById("no_PO").value;
        var pengirim = document.getElementById("pengirim").value;
        var penerima = document.getElementById("penerima").value;
        var keterangan = document.getElementById("keterangan").value;
        var tanggal = document.getElementById("tgl_transaksi").value;
        var jumlah = document.getElementById("jumlah").value;

        if (no_PO == "") {
            alert("No PO tidak boleh kosong");
            return false;
        }else if (pengirim == "") {
            alert("Nama Pengirim tidak boleh kosong");
            return false;
        } 
        else if (penerima == "") {
            alert("Nama penerima tidak boleh kosong");
            return false;
        }
         else if (tanggal == "") {
            alert("Tanggal tidak boleh kosong");
            return false;
        } else if (jumlah == "") {
            alert("Jumlah tidak boleh kosong");
            return false;
        } else if (keterangan == "") {
            alert("Keterangan tidak boleh kosong");
            return false;
        }

        var no_retur = document.getElementById('no_retur').value;
        var no_PO = document.getElementById('no_PO').value;
        var nama_barang = document.getElementById('nama_barang').value;
        var kode_barang = document.getElementById('kode_barang').value;
        var keterangan = document.getElementById('keterangan').value;
        var jumlah = document.getElementById('jumlah').value;
        addrow(no_retur, no_PO, nama_barang, kode_barang, keterangan, jumlah);
    }
    var i = 0;

    function addrow(no_retur, no_PO, nama_barang, kode_barang, keterangan, jumlah) {
        i++;
        instansi
        $('#TabelDinamis').append('<tr id="row' + i + '"><td><input type="text" style="outline:none;border:0;" readonly name="no_retur[]" id="no_retur" value="' + no_retur +
            '"></td><td><input type="text" style="outline:none;border:0;" readonly name="no_PO[]" id="no_PO" value="' + no_PO +
            '"></td><td><input type="text" style="outline:none;border:0;" readonly name="nama_barang1[]" id="nama_barang1" value="' + nama_barang +
            '"></td><td style="display:none;"><input type="text" style="outline:none;border:0;" readonly name="kode_barang1[]" id="kode_barang1" value="' + kode_barang +
            '"></td><td><input type="text" style="outline:none;border:0;" readonly name="jumlah1[]" id="jumlah1" value="' + jumlah +
            '"></td><td><input type="text" style="outline:none;border:0;" readonly name="keterangan[]" id="keterangan" value="' + keterangan +
            '"></td><td><button type="button" id="' + i + '" class="btn btn-danger btn-small remove_row">&times;</button></td></tr>');
    };
    $(document).on('click', '.remove_row', function() {
        var row_id = $(this).attr("id");
        $('#row' + row_id + '').remove();
    });
    $('#nama_barang').select2();
	$('#no_PO').select2();
	$('#instansi').select2();
</script>
<script>
    $('#nama_barang').change(function() {
        if ($(this).val() != '') {
            var select = $(this).attr("id");
            var value = $(this).val();

            // $('#id_barang').val(value);
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('trkmasukcontroller.fetch')}}",
                method: "POST",
                data: {
                    select: select,
                    value: value,
                    _token: _token,
                    dependent: dependent
                },
                success: function(result) {
                    console.log(result);
                    $('#' + dependent).html(result);
                },

            });

        }
    });
</script>
@endsection