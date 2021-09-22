@extends('layout.master')
@section('title', 'Log sistem')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <!-- <div class="row heading-bg">
            <div class="col-lg-9 col-md-4 col-sm-4 col-xs-5"> -->
                <!-- <h5 class="txt-dark">Log Aktivitas</h5> -->
            <!-- </div> -->
            <!-- Breadcrumb -->
            <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li class="active"><span>Log Aktivitas</span></li>
                </ol>
            </div> -->
            <!-- /Breadcrumb -->
        <!-- </div> -->
        <!-- Row -->
        <div class="col-lg-12 col-md-12 mt-40">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Log Aktivitas</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div  class="tab-struct custom-tab-1 ">
							<ul role="tablist" class="nav nav-tabs" id="myTabs_7">
								<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#admin">Login & Logout</a></li>
								<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_7" role="tab" href="#admin2" aria-expanded="false">Aksi</a></li>
								
							</ul>
                            <!-- BARANG -->
							<div class="tab-content" id="myTabContent_7">
								<div  id="admin" class="tab-pane fade active in" role="tabpanel">
								<table id="datable_1" class="table table-bordered display  pb-30">
                                <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>Nama </th>
                                                <th>Email</th>
                                                <th>Divisi</th>
                                                <th>IP Address</th>
                                                <th>Deskripsi</th>
                                                <th>Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($log as $log)
                                            <tr>    
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $log->name}}</td>
                                                <td>{{ $log->email}}</td>
                                                <td>{{ $log->divisi}}</td>
                                                <td>{{ $log->ip}}</td>
                                                <td>{{ $log->deskripsi}}</td>
                                                <td>{{ $log->created_at}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
								
                                <!-- aksi -->
                                <div  id="admin2" class="tab-pane fade" role="tabpanel">
                                    <table id="datable_1" class="table table-bordered display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>Nama </th>
                                                <th>Email</th>
                                                <th>Divisi</th>
                                                <th>IP Address</th>
                                                <th>Deskripsi</th>
                                                <th>Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($log2 as $log)
                                            <tr>
                                                <td>{{ $no++ }}</td>    
                                                <td>{{ $log->name}}</td>
                                                <td>{{ $log->email}}</td>
                                                <td>{{ $log->divisi}}</td>
                                                <td>{{ $log->ip}}</td>
                                                <td>{{ $log->deskripsi}}</td>
                                                <td>{{ $log->created_at}}</td>
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
    </div>
    <!-- /Row -->
</div>
</div>
<!-- /Main Content -->
</div>
<!-- /#wrapper -->
@endsection
