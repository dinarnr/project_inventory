@extends('layout.master')
@section('title', 'Data Administrator')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data Administrator</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li class="active"><span>Data Administrator</span></li>
                </ol>
            </div>
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <p>
                            <a href="{{ url('administrator/tambah') }}" class="btn btn-success">Tambah baru</a>
                        </p>
                        <div class="clearfix"></div>

                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="">
                                    <table id="datable_1" class="table table-bordered display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Divisi</th>
                                                <th>last login</th>
                                                <th>last login IP</th>
                                                <th>Status</th>
                                                <th colspan="3">Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($users as $users)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $users->name }}</td>
                                                <td>{{ $users->email }}</td>
                                                <td>{{ $users->divisi }}</td>
                                                <td>{{ $users->lastLogin }}</td>
                                                <td>{{ $users->lastIP }}</td>
                                                <td>
                                                    @if($users->status == '2')
                                                    <button class="btn btn-success btn-sm  btn-rounded" data-toggle="modal" data-target="#exampleModal">Aktif</button>
                                                    @else
                                                    <button class="btn btn-danger btn-sm  btn-rounded" data-toggle="modal" data-target="#exampleModal">Non Aktif</button>
                                                    @endif
                                                    @include('administrator.status')
                                                </td>
                                                <td>
                                                    <a href="{{ url('administrator/edit') }}/{{ $users->id}}"><button class="btn btn-primary btn-icon-anim btn-square"><i class="fa fa-pencil"></i></button></a>
                                                </td>
                                                @include('administrator.hapus')
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
</div>
</div>
@endsection