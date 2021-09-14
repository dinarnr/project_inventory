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
        <!-------------------------------------------------------------- Marketing ------------------------------------------------------->
        @if (auth()->user()->divisi == "marketing")
        <!-- Row -->
        <!-- Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
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
                                                @foreach ($data_po as $detailpo)
                                                <tr>
                                                    <div class="">
                                                        <td class="txt-dark"> {{$detailpo->instansi}} <br>
                                                        </td>
                                                    </div>
                                                </tr>
                                                @endforeach
                                            </table>

                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <table>
                                                <div class="text-left">
                                                    <h6 class="txt-dark"><strong>PENAWARAN</strong></h6>
                                                </div>
                                                @foreach ($data_po as $data_po)
                                                <tr>
                                                    <div class="">
                                                        <td class="txt-dark"> Number : {{$data_po->no_PO}}<br>
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
                                            <th>Rate (Rp)</th>
                                            <th>Amount (Rp)</th>
                                            <!-- <th colspan="3">Aksi</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($data_detail as $detail)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Nama barang">{{$detail->nama_barang}}</a><br>&nbsp;&nbsp;- {{$detail->keterangan_barang}}</br>
                                            </td>
                                            <td>
                                                <a href="#" id="username2" style="font-weight:bold" data-type="text" data-pk="1" data-title="Keterangan">{{$detail->keterangan}}</a>
                                            </td>
                                            <td>
                                                <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Jumlah">{{$detail->jumlah}}</a>
                                            </td>
                                            <td>
                                                <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Rate">{{$detail->rate}}</a>
                                            </td>
                                            <td> <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Amount">{{$detail->amount}}</a></td>
                                        </tr>
                                        @endforeach
                                        <tr class="txt-dark">
                                            <td colspan="4"></td>

                                            <td>Total</td>
                                            <td>{{$detail->total}}</td>
                                        </tr>
                            </div>
                            <tr class="txt-dark">
                                <td colspan="4"></td>
                                <td>PPn 10%</td>
                                <td>{{$detail->ppn}}</td>
                            </tr>
                            <tr class="txt-dark">
                                <td colspan="4"></td>
                                <td>PPh 2.5%</td>
                                <td></td>
                            </tr>
                            <tr class="txt-dark">
                                <td colspan="4"></td>
                                <td>Balance Due</td>
                                <td>{{$detail->balance}}</td>
                            </tr>
                            </tbody>
                            </table>
                            <div class="row">
                                <div class="col-xs-8">

                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <table>
                                            <div class="text-center">
                                                <h6 class="txt-dark">Malang, {{ $tanggal->format('d M Y')}}</h6>
                                            </div><br><br><br><br><br>

                                            <div class="text-center">
                                                <h6 class="txt-dark">{{ Auth::user()->name }}</h6>
                                            </div>

                                            <hr>
                                            <div class=" text-center mt-2">
                                                <h6 class="txt-dark">{{ Auth::user()->divisi }}</h6>
                                            </div>

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
        <!-- Row -->

    </div>
    @endif

    <!-------------------------------------------------------------- Warehouse ------------------------------------------------------->
    @if (auth()->user()->divisi == "warehouse")
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
                                            <!-- <th colspan="3">Aksi</th> -->
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
                                            <!-- <button type="button" class="btn btn-primary btn-icon-anim" data-toggle="modal" data-target="#addket{{ $detail->id_po }}" action="( {{url('addket')}}/{{ $detail->id_po}})" name="keterangan" id="keterangan"><i class="fa fa-pencil"></i></button> -->
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
                                            <a href="#" class="mr-25" data-toggle="modal" data-target="#addket{{ $detail->id_po }}" action="( {{url('addket')}}/{{ $detail->id_po}})"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

                                            <!-- <button type="button" class="btn btn-primary btn-icon-anim" data-toggle="modal" data-target="#addket{{ $detail->id_po }}" action="( {{url('addket')}}/{{ $detail->id_po}})" name="keterangan" id="keterangan"><i class="fa fa-pencil"></i></button> -->
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
                    <!-- <div class="col-xs-4">
                    <div class="form-group">
                        <table>
                            <div class="text-center">
                                <h6 class="txt-dark">Malang,26 Agustus 2021</h6>
                            </div><br><br><br><br><br>
                            <div class="text-center">
                                <h6 class="txt-dark">YUDHA PRAYOGO A.</h6>
                            </div>
                            <hr ">
                                            <div class=" text-center mt-2">
                            <h6 class="txt-dark">IT Marketing</h6>
                    </div>

                    </table>
                </div>
            </div> -->
                </div>
            </div>
        </div>
        <!-- /Row -->
        <!-- Row -->

    </div>
    @endif

    <div class="pull-right hide-from-printer">
        @if (auth()->user()->divisi == "warehouse")
        <form action="{{ url('confirmpo/{id_PO}') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="aktif" name="aktif[]">
            <button type="submit" class="btn btn-primary mr-10">
                Proses
            </button>
        </form>
        <!-- form tutup -->
        @endif

        @if (auth()->user()->divisi == "marketing")
        <button type="button" class="btn btn-success btn-icon left-icon" onclick="javascript:window.print();">
            <i class="fa fa-print"></i><span> Print</span>
        </button>
        @endif
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