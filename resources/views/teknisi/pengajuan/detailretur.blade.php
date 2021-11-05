@extends('layout.master')
@section('title', 'Detail Pengajuan Retur')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
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
                                                    @foreach ($profil as $profil)
                                                    <td class="txt-dark"> Jl Candi Mendut Utara 1 No. 11 <br>
                                                    Kel. Mojolangu Kec. Lowokwaru Malang - Jawa Timur<br>
                                                    Phone : {{$profil->telp}}<br> Email : {{$profil->email}}</td>
                                                    @endforeach
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
                                                @foreach ($pengajuan_retur as $detail)
                                                    <div class="text-left">
                                                        <h6 class="txt-dark"><strong>NO PENGAJUAN : </strong></h6>
                                                            <div class="">
                                                                <div class="txt-dark"> {{ $detail->no_pengajuan }}</div>
                                                            </div>
                                                    </div>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <table>
                                                @foreach ($pengajuan_retur as $detail)
                                                    <div class="text-left">
                                                        <h6 class="txt-dark"><strong>TANGGAL PENGAJUAN : </strong></h6>
                                                        <div class="">
                                                            <div class="txt-dark"> {{ date('d M Y',strtotime($detail->created_at)) }}</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </table>
                                        </div>
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
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @csrf
                                        @foreach ($data_detail as $detail)
                                        <input type="hidden"  id="no_peng" name="no_peng" value="{{$detail->no_pengajuan}}" />
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <a href="#" id="" style="" data-type="text" data-pk="1" data-title="Nama barang">{{$detail->namaBarang}}</a>
                                            </td>
                                            <td>
                                                <a href="#" id="" style="" data-type="text" data-pk="1" data-title="Jumlah">{{$detail->jmlBarang}}</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </div>
                                </tbody>
                            </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="form-group">
                            <table>
                                @foreach ($pengajuan_retur as $detail)
                                    <div class="text-left">
                                        <h6 class="txt-dark"><strong>Keterangan : </strong></h6>
                                            <div class="">
                                                <div class="txt-dark"> {{ $detail->keterangan }}</div>
                                            </div>
                                    </div>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
    <!-- /#wrapper -->

    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous">
    </script>


    <script type='text/javascript'>
    $(document).ready(function(){
   // Check or Uncheck All checkboxes
    $("#checkall").change(function(){
        var checked = $(this).is(':checked');
        if(checked){
        $(".checkbox").each(function(){
            $(this).prop("checked",true);
        });
        }else{
        $(".checkbox").each(function(){
            $(this).prop("checked",false);
        });
        }
    });
    
    // Changing state of CheckAll checkbox 
    $(".checkbox").click(function(){
    
        if($(".checkbox").length == $(".checkbox:checked").length) {
        $("#checkall").prop("checked", true);
        } else {
        $("#checkall").prop("checked", false);
        }
 
    });
    });
    </script>
@endsection
