@extends('layout.master')
@section('title', 'Data Administrator')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">tambah Administrator</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Administrator</a></li>
                    <li class="active"><span>tambah user</span></li>
                </ol>
            </div>
        </div>

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view ">
                    <div class="panel-wrapper collapse in ">
                        <div class="panel-body">
                            <div class="form-wrap mt-3">
                            <form action="{{ url('administrator/tambah/simpan') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" value="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left" for="example-email">Email <span class="help"> </span></label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-10 text-left">Password</label>
                                    <input type="password" class="form-control" id="password" name="pasword" value="">
                                </div>
                                <div class="form-group mt-30 mb-30">
                                    <label class="control-label mb-10 text-left">Level Hak Akses</label>
                                    <select name="divisi" id="divisi"class="form-control select2">   
                                        <option value="">--Pilih Devisi--</option>
                                        <option value="warehouse">Warehouse</option>
                                        <option value="marketing">Marketing</option>
                                        <option value="admin">Admin</option>
                                        <option value="supplier">Supplier</option>
                                        <option value="office">Office</option>
                                        <option value="teknisi">Teknisi</option>
                                    </select>
                                </div>
                                <div class="form-group-justified" style="text-align: right;">
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
</div>
@endsection



