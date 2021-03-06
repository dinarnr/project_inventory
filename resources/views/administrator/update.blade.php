@extends('layout.master')
@section('title', 'Edit User')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Edit User</h5>
            </div>
        </div>
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
                                            <option value="{{ $users->divisi }}">{{ $users->divisi }}</option>
                                            <option value="warehouse">Warehouse</option>
                                            <option value="administrator">Administrator</option>
                                            <option value="teknisi">Teknisi</option>
                                            <option value="marketing">Marketing</option>
                                            <option value="office">Office</option>
                                            <option value="purchasing">Purchasing</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">Status</label>
                                        <select name="edit_status" value="{{ $users->status }}" class="form-control select2">
                                            <option value="">Pilih Status</option>
                                            <option value="2">Aktif</option>
                                            <option value="1">Non Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="text-align:right;">
                                        <button class="btn btn-primary">Simpan</button>
                                        </button>
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#resetpassword{{ $users->id}}">Reset Password</button>
                                        </a>
                                            @include('administrator.resetpassword')
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
@endsection