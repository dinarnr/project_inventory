@extends('layout.master')
@section('title', 'Data Barang')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark">edit data barang</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index.html">master data</a></li>
                            <li><a href="#"><span>data barang</span></a></li>
                            <li class="active"><span>edit data barang</span></li>
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
                                        <form action="{{ url('warehouse/barang/ubah/simpan') }}" method="post" role="form" autocomplete="off" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <div class="form-group">
                                                <input type="hidden" value="{{ $brg->id_master }}" name="edit_id_brg">
                                                <label class="control-label mb-10 text-left">Kode<span class="help"> Kategori</span></label>
                                                <select name="edit_kode_kategori" value="{{ $brg->kode_kategori }}" class="form-control select2">
                                                <option value="{{ $brg->kode_kategori }}">{{ $brg->kode_kategori }}</option>
                                                    [@foreach($kategori as $ktg)
                                                    <option value="{{ $ktg->kode_kategori }}">{{ $ktg->kode_kategori }}</option>
                                                    @endforeach]
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10 text-left">Nama barang <span class="help"> </span></label>
                                                <input type="text" value="{{ $brg->nama_barang }}" class="form-control" name="edit_nama_barang" readonly>
                                                @if ($errors->has('nama_barang'))
                                                <div class="alert alert-danger">{{$errors->first('nama_barang')}}</div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10 text-left">Kode Barang</label>
                                                <input type="text" value="{{ $brg->kode_barang }}" class="form-control" name="edit_kode_barang" readonly>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label mb-10 text-left">Stok</label>
                                                <input type="text" class="form-control" name="edit_stok" value="{{ $brg->stok }}">
                                                
                                            </div>
                                            <div class="form-group mb-30">
                                                <label class="control-label mb-10 text-left">File upload</label>
                                                <input type="file" id="gambar" name="gambar">
                                                <h10>(Kosongkan jika tidak ingin diubah)</h10><br>
                                                <input type="hidden" class="form-control-file" id="hidden_gambar" name="hidden_gambar" value="{{ $brg->gambar }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10 text-left">Status</label>
                                                <select name="edit_status" value="{{ $brg->status }}" class="form-control select2">
                                                    <option value="aktif">Aktif</option>
                                                    <option value="nonaktif">NonAktif</option>
                                                </select>
                                            </div>
                                            <div class="form-group" style="text-align:right;">
                                                <button class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    </form>
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
