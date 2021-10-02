@extends('layout.master')
@section('title', 'Detail Pengajuan Retur')
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
                                                <tr>
                                                    <div class="">
                                                        <td class="txt-dark"> Number : <input type="text" id="no_PO" name="no_PO" value="" style="outline:none;border:0;" readonly> <br>
                                                            Date : <br>
                                                            Note : </td>
                                                    </div>
                                                </tr>
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
                                            <th>Nama Barang</th>
                                            <th>Jumah</th>
                                            <th>√</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @csrf
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            @foreach($data_detail as $detail)
                                            <td>
                                                <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Nama barang">{{$detail->namaBarang}}</a><br></br>
                                            </td>

                                            
                                            <td>
                                                <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Jumlah">{{$detail->jmlBarang}}</a>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="is_active" name="is_active[]" onchange="aktif();" value="" />
                                                <input type="hidden" id="non" name="non[]" value="">

                                            </td>
                                            
                                            @endforeach
                                        </tr>
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
            <form action="" method="POST" enctype="multipart/form-data">
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