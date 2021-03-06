@extends('layout.master')
@section('title', 'Data stok')
@section('content')

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data Stok Barang</h5><br>
                <!-- <a href="/transaksi" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> MASUK</a>
                <a href="/transaksikeluar" class="btn btn-primary btn-icon-anim"><i class="fa fa succes"></i> KELUAR</a> -->
            </div>


            
        </div>
        <!-- Row -->
        <div class="col-lg-12 col-md-12 mt-10">
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Stok Barang</h6>
					</div>
					<div class="clearfix"></div>
				</div>
                <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="">
                                    <table id="datable_1" class="table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Barang</th>
                                                <th>Stok</th>
                                                <th>Keterangan</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($data_stok as $stok)
                                            <tr>
                                                <td>{{ $no++}}</td>
                                                <td>{{$stok->nama_barang}}</td>
                                                <td>{{$stok->stok}}</td>
                                                <td>{{$stok->keterangan}}</td>
                                                
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
        
        <!-- /Row -->
    </div>
</div>
<!-- /Main Content -->
</div>
<!-- /#wrapper -->
@endsection
