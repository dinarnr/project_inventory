@extends('layout.master')
@section('title', 'Data Barang')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">tambah data barang</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">master data</a></li>
                    <li><a href="#"><span>jenis barang</span></a></li>
                    <li class="active"><span>tambah data barang</span></li>
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
                                <form action="{{ url('warehouse/barang/simpan') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Kategori</label>
                                        <select name="kode" id="kode" class="form-control select2">
                                            @foreach($kategori as $ktg)
												<option value="{{ $ktg->kode_kategori}}">{{ $ktg->kategori }} | {{ $ktg->kode_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Nama barang <span class="help"> </span></label>
                                        <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                                        @if ($errors->has('nama_barang'))
                                        <div class="tulisan">{{$errors->first('nama_barang')}}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Stok</label>
                                        <input type="number" class="form-control" name="stok" id="stok">
                                        @if ($errors->has('stok'))
                                        <div class="tulisan">{{$errors->first('stok')}}</div>
                                        @endif
                                    </div>
                                    <div class="form-group mb-30">
                                        <label class="control-label mb-10 text-left">File upload</label>
                                        <input type="file" id="gambar" name="gambar">
                                        @if ($errors->has('gambar'))
                                        <div class="tulisan">{{$errors->first('gambar')}}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="aktif">Aktif</option>
                                            <option value="nonaktif">NonAktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="text-align:right;">
                                        <button class="btn btn-success mr-5" name="submit" type="submit">
                                            Simpan
                                        </button>
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