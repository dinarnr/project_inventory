@extends('layout.master')
@section('title', 'Detail SO')
@section('content')

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
                                            <th>Confirm</th>
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
                                            <td >
                                                @if ($detail->status === 2)
                                                @elseif ($detail->keterangan =="")
                                                <a href="#" class="mr-25" data-toggle="modal" data-target="#addket{{ $detail->id_po }}" action="( {{url('warehouse/so/tambah/keterangan')}}/{{ $detail->id_po}})"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                @endif
                                                @include('warehouse.so.addket')
                                            </td>
                                            <td>
                                                <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Jumlah">{{$detail->jumlah}}</a>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="is_active" name="is_active[]" onchange="aktif();" value="{{$detail->id_po}}" />
                                                <input type="hidden" id="non" name="non[]" value="{{$detail->id_po}}">

                                            </td>
                                        </tr>
                                        @endforeach
                                        <!-- <tr class="txt-dark">
                                        <td colspan="3"></td>
                                        
                                        <td>Total</td>
                                        <td>#</td>
                                    </tr> -->
                            </div>
                            <!-- <tr class="txt-dark">
                        <td colspan="3"></td>
                        <td>PPn 10%</td>
                        <td>#</td>
                    </tr>
                    <tr class="txt-dark">
                        <td colspan="3"></td>
                        <td>PPh 2.5%</td>
                        <td>#</td>
                    </tr>
                    <tr class="txt-dark">
                        <td colspan="3"></td>
                        <td>Balance Due</td>
                        <td>#</td>
                    </tr> -->
                            </tbody>
                            </table>
                            <!-- </form> -->
                            <!-- @foreach ($data_po as $data_po)
                <div class="col-md-4">
                </div> -->
                            <!-- @endforeach -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="pull-right">
            <form action="{{ url('confirmpo/{id_PO}') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="aktif" name="aktif[]">
                <button type="submit" class="btn btn-primary mr-10">
                    Proses
                </button>
            </form>
            <!-- form tutup -->
        </div>

        <!-- /Row -->
        <!-- /Main Content -->
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