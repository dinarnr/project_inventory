@extends('layout.master')
@section('title', 'Data Pengajuan')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Tambah Pengajuan Barang Retur</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Pengajuan</a></li>
                    <li><a href="/brgbaru"><span>Pengajuan Barang Retur</span></a></li>
                    <li class="active"><span>Tambah Pengajuan Barang Retur</span></li>
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
                                <form action="{{ url('addretur2') }}" method="POST" id="form1" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10 text-left" for="example-email">Nama pengajuan<span class="help"> </span></label>
                                                <input type="text" id="nama_pengajuan" name="nama_pengajuan" class="form-control" placeholder="">
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-6">
											<div class="form-group">
												<label class="control-label mb-10">No PO</label>
                                                <select name="no_PO" id="no_PO" class="form-control select2">
													@foreach($noPO as $noPO)
													<option value="{{ $noPO->no_PO }}">{{ $noPO->no_PO }}</option>
													@endforeach
												</select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
											<div class="form-group">
												<label class="control-label mb-10">Nama Barang</label>
												<select name="nama_barang" id="nama_barang" class="form-control">
													@foreach($barang as $brg)
														<option value="{{ $brg->nama_barang }}">{{ $brg->nama_barang }} | {{ $brg->kode_barang }} </option>
													@endforeach
												</select>
											</div>
										</div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Jumlah</label>
                                                <input type="number" id="jumlah" name="jumlah" class="form-control">
                                                <!-- <span class="help-block"> This is inline help </span>  -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left" for="example-email">Keterangan<span class="help"> </span></label>
                                        <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group" style="text-align:right;">
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
                                                        @csrf
                                                        <div class="">
                                                            <div class="col">
                                                                <table class="table table-bordered align-items-center">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th>Nama Pengajuan</th>
                                                                            <th>Nama barang</th>
                                                                            <th>Jumlah</th>
                                                                            <th>Keterangan</th>
                                                                            <th>Remove</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="TabelDinamis">
<<<<<<< HEAD
                                                                    </tbody>
                                                                </table>
                                                                    
=======
                                                                        </tbody>
                                                                    </table>
>>>>>>> 03fcbdf9394928f0e8a279cc2858802f4b12a7a9
                                                                <div class="col-md-12" style="text-align:right;">
                                                                    <button type="button" onclick="submitForm()" class="btn btn-primary ">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </div>
<<<<<<< HEAD
                                                
=======
>>>>>>> 03fcbdf9394928f0e8a279cc2858802f4b12a7a9
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
       
        <!-- /Row -->
        <!-- /Main Content -->
    </div>
    <!-- /#wrapper -->
    @endsection
    @section('scripts')
    <script type="text/javascript">
        function ambildata() {
            var nama_pengajuan = document.getElementById('nama_pengajuan').value;
            var nama_barang = document.getElementById('nama_barang').value;
            var jumlah = document.getElementById('jumlah').value;
            var keterangan = document.getElementById('keterangan').value;
            var no_PO = document.getElementById('no_PO').value;
            addrow(nama_pengajuan, nama_barang, jumlah, keterangan, no_PO);
        }
        var i = 0;

        function addrow(nama_pengajuan, nama_barang, jumlah, keterangan, no_PO) {
            i++;
            $('#TabelDinamis').append('<tr id="row' + i + '"><td><input type="text" style="outline:none;border:0;" readonly name="nama_pengajuan[]" id="nama_pengajuan" value="' + nama_pengajuan + 
            '"></td><td><input type="text" style="outline:none;border:0;" readonly name="nama_barang[]" id="nama_barang" value="' + nama_barang + 
            '"></td><td><input type="text" style="outline:none;border:0;" name="jumlah[]" id="jumlah" value="' + jumlah + 
            '"></td><td><input type="text" style="outline:none;border:0;" name="keterangan[]" id="keterangan" value="' + keterangan + 
            '"></td><td style="display:none;"><input type="text" style="outline:none;border:0;" readonly name="no_PO[]" id="no_PO" value="' + no_PO + 
            '"></td><td><button type="button" id="' + i + '" class="btn btn-danger btn-small remove_row">&times;</button></td></tr>');
        };
        $(document).on('click', '.remove_row', function() {
            var row_id = $(this).attr("id");
            $('#row' + row_id + '').remove();
        });

        submitForm = function submitForm() {
            document.getElementById("form1").submit();
            // document.getElementById("form2").submit();
        }
        $('#no_PO').select2()
        $('#nama_barang').select2()

    </script>
    @endsection
