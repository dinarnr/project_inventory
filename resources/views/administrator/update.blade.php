@extends('layout.master')
@section('title', 'Edit User')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Edit User</h5>
            </div>
            
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view ">
                    <div class="panel-wrapper collapse in ">
                        <div class="panel-body">
                            <div class="form-wrap mt-3">
                                <form action="{{ url('administrator/edit/simpan') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input name="edit_id" type="hidden" class="form-control" value="{{ $users->id }}">
                                        <label class="control-label mb-10 text-left">Nama</label>
                                        <input name="edit_nama" type="text" class="form-control" value="{{ $users->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Email</label>
                                        <input name="edit_email" type="text" class="form-control" value="{{ $users->email }}">
                                    </div>
                                    
                                    <div class="form-group mt-30 mb-30">
                                        <label class="control-label mb-10 text-left">Level Hak Akses</label>
                                        <select name="edit_divisi" value="{{ $users->divisi }}" class="form-control">
                                            <option>Warehouse</option>
                                            <option>Admin</option>
                                            <option>Teknisi</option>
                                            <option>Marketing</option>
                                            <option>Office</option>
                                            <option>Purchasing</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Status</label>
                                        <select name="edit_status" value="{{ $users->status }}" class="form-control select2">
                                            <option value="Aktif">Aktif</option>
                                            <option value="Non Aktif">Non Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="text-align:right;">
                                        <button class="btn btn-primary">Simpan</button>
                                        </button>
                                    </div>
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