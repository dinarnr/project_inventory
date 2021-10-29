@extends('layout.master')
@section('title', 'Profil Perusahaan')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Profil Perusahaan</h5>
            </div>
            <!-- Breadcrumb -->
            <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#"><span>data instansi</span></a></li>
                    <li class="active"><span>edit data instansi</span></li>
                </ol>
            </div> -->
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
                                <form action="{{ url('warehouse/pengaturan/profil/simpan') }}" method="post" role="form" autocomplete="off">
                                    {{ csrf_field() }}
                                    @foreach($profil as $profil)
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" value="{{$profil->id}}" name="edit_id_profil">
                                            <label class="control-label mb-10 text-left" for="example-email">Nama Perusahaan <span class="help"> </span></label>
                                            <input type="text" value="{{$profil->nama}}" name="edit_nama" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left" for="example-email">Alamat <span class="help"> </span></label>
                                            <textarea type="text" name="edit_alamat" id="alamat" class="form-control" placeholder=""> {{$profil->alamat}} </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left" for="example-email">No HP <span class="help"> </span></label>
                                            <input type="number" value="{{$profil->telp}}" name="edit_no" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10 text-left" for="example-email">Email <span class="help"> </span></label>
                                            <input type="email" value="{{$profil->email}}" name="edit_email" class="form-control" placeholder="">
                                        </div>

                                        <div class="form-group" style="text-align: right;">
                                            <button class="btn btn-success">Simpan</button>
                                        </div>
                                        @endforeach
                                </form>

                            </div>
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