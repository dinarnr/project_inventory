@extends('layout.master')
@section('title', 'Data Administrator')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data Administrator</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <!-- <li><a href="inventory">Warehouse</a></li> -->
                    <li class="active"><span>Data Administrator</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <p>
                          <a href="administrator/addadmin" class="btn btn-success">Tambah baru</a>
                        </p>    
                        <div class="clearfix"></div>
                        <div id="myTable1_wrapper" class="dataTables_wrapper">
                            <div class="dataTables_length" id="myTable1_length"><label>Show <select name="myTable1_length" aria-controls="myTable1" class="">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                            <div id="myTable1_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="myTable1"></label></div>
                            <table id="myTable1" class="table table-hover display dataTable dtr-inline" role="grid" aria-describedby="myTable1_info" style="width: 1253px;">
                        </div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="">
                                    <table id="myTable1" class="table table-bordered display  pb-30">
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
                                                    <!-- <button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-edit"></i></button> -->
                                                    <!-- <button class="btn btn-success btn-icon-anim" data-toggle="modal" data-target="#exampleModal"> Aktif</button> -->
                                                    @if($users->status == 'Aktif')
                                                    <button class="btn btn-success btn-sm  btn-rounded" data-toggle="modal" data-target="#exampleModal">Aktif</button>
                                                    @else
                                                    <button class="btn btn-danger btn-sm  btn-rounded" data-toggle="modal" data-target="#exampleModal">Non Aktif</button>
                                                    @endif
                                                    @include('administrator.status')
                                                </td>
                                                <td>
                                                    <!-- <button class="btn btn-success btn-icon-anim btn-square"><i class="fa fa-info"></i></button> -->
                                                   
                                                    <button class="btn btn-primary btn-icon-anim btn-square" data-toggle="modal" data-target="#edit"><i class=" fa fa-pencil"></i></button>
                                                   
                                                    <button class="btn btn-danger btn-icon-anim btn-square" data-toggle="modal" data-target="#hapus"><i class=" fa fa-trash"></i></button>
                                                    
                                                    @include('administrator.edit')

                                                    <!-- <div class="btn btn-round btn-danger btn-sm btn-icon"><i class="fa fa-trash"></i></div> -->
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
<!-- /Main Content -->
</div>
<!-- /#wrapper -->
@endsection
