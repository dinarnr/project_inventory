@extends('layout.master')
@section('title', 'Detail Purchase Order')
@section('content')
<style type="text/css">
    @media print {
        .hide-from-printer {
            display: none;
        }
    }
</style>

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <!-- <form method="post"> -->
                        <div class="row">

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <div class="form-group">
                                            <div class="">
                                                <h4 text-style="left" class="txt-dark">Nakula Sadewa, CV</h4>
                                            </div>
                                            <table>
                                                <tr>
                                                    <div class="row">
                                                        <td class="txt-dark"> Jl Candi Mendut Utara 1 No. 11 <br>
                                                            Kel. Mojolangu Kec. Lowokwaru Malang - Jawa Timur<br>
                                                            Phone : <br> Email : </td>
                                                    </div>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-xs-4">
                                        <div class="form-group mt-20 ">

                                            <img src="{{asset('template')}}/dist/img/ns.jpg">
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">

                                    <div class="col-xs-8">
                                        <div class="form-group">
                                            <table>
                                                <div class="text-left">
                                                    <h6 class="txt-dark"><strong>TO</strong></h6>
                                                </div>
                                                <tr>
                                                    <div class="">
                                                        <td class="txt-dark"> </td>
                                                    </div>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <table>
                                                <div class="text-left">
                                                    <h6 class="txt-dark"><strong>PENAWARAN</strong></h6>
                                                </div>
                                                <!-- <form action="{{ url('confirmpo/{id_PO}') }}" method="POST" enctype="multipart/form-data"> -->
                                                @foreach ($data_po as $data_po)
                                                <tr>
                                                    <div class="">
                                                        <td class="txt-dark"> Number : <input type="text" id="no_PO" name="no_PO" value="{{$data_po->no_PO}}" style="outline:none;border:0;" readonly> <br>
                                                            Date : {{$data_po->created_at}} <br>
                                                            Note : </td>
                                                    </div>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table id="myTable1" class="table table display pb-30">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>Deskripsi</th>
                                            <th>Keterangan</th>
                                            <th>Qty</th>
                                            <th>√</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @csrf
                                        @foreach ($data_detail as $detail)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Nama barang">{{$detail->nama_barang}}</a><br>&nbsp;&nbsp;- {{$detail->keterangan_barang}}</br>
                                            </td>

                                            <td>
                                                @if(empty($detail->keterangan))
                                                <!-- <a href="#" class="mr-25" data-toggle="modal" data-target="#addket{{ $detail->id_po }}" action="( {{url('addket')}}/{{ $detail->id_po}})"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>  -->
                                                <!-- <button type="button" class="btn btn-primary btn-icon-anim" data-toggle="modal" data-target="#addket{{ $detail->id_po }}" action="( {{url('addket')}}/{{ $detail->id_po}})" name="keterangan" id="keterangan">Tambah Keterangan</button> -->
                                                @else
                                                <a>{{$detail->keterangan}}</a>
                                                @endif
                                                @include('po.addket')
                                            </td>
                                            <td>
                                                <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Jumlah">{{$detail->jumlah}}</a>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="is_active" name="is_active[]" onchange="aktif();" value="{{$detail->id_po}}" />
                                                <input type="hidden" id="non" name="non[]" value="{{$detail->id_po}}">

                                            </td>
                                            <td>
                                                <a href="#" class="mr-25" data-toggle="modal" data-target="#addket{{ $detail->id_po }}" action="( {{url('warehouse/po/tambahketerangan')}}/{{ $detail->id_po}})"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

                                            </td>
                                        </tr>
                                        @endforeach
                            </div>
                            </tbody>
                            </table>
                            <!-- </form> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->

        </div>

        <div class="pull-right hide-from-printer">
            <form action="{{ url('confirmpo/{id_PO}') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="aktif" name="aktif[]">
                <button type="submit" class="btn btn-primary mr-10">
                    Proses
                </button>
            </form>
            <!-- form tutup -->
        </div>
    </div>
    <!-- /#wrapper -->
    @endsection
    @section('scripts')
    <script type="text/javascript">
        function aktif() {
            var aktif = document.getElementByName('is_active[]');
            for (var i = 0; i < aktif.length; i++) {
                console.log(aktif[i].value);
            }
            document.getElementById('aktif').value = aktif.value;
        }
    </script>
    @endsection