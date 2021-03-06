@extends('layout.master')
@section('title', 'Detail Pengajuan Pembelian')
@section('content')

<!-- Main Content -->
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
                                                <form action="{{ url('marketing/pengajuan/confirmpembelian/')}}/{{ $no_peng }}" method="POST" enctype="multipart/form-data">

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
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <table>
                                                    @foreach($pengajuan as $pengajuan)

                                                        
                                                    
                                                        <div class="text-left">
                                                            <h6 class="txt-dark"><strong>NO PENGAJUAN : </strong></h6>
                                                                <div class="">
                                                                    <div class="txt-dark">{{ $pengajuan->no_pengajuan }}</div>
                                                                </div>
                                                        </div>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <table>
                                                   
                                                        <div class="text-left">
                                                            <h6 class="txt-dark"><strong>NAMA PEMOHON : </strong></h6>
                                                            <div class="">
                                                                <div class="txt-dark"> {{ $pengajuan->nama_pemohon }}</div>
                                                            </div>
                                                        </div>
                                                       
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <table>
                                                   
                                                        <div class="text-left">
                                                            <h6 class="txt-dark"><strong>TANGGAL PENGAJUAN : </strong></h6>
                                                            <div class="">
                                                                <div class="txt-dark"> {{ date('d M Y',strtotime($pengajuan->tgl_pengajuan)) }}</div>
                                                            </div>
                                                        </div>
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
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th> <input type="checkbox" id='checkall' class="check_all"/></th>
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
                                                    <a href="#" id="" style="font-weight:bold" data-type="text" data-pk="1" data-title="Nama barang">{{$detail->namaBarang}}</a>
                                                </td>
                                                <td> {{ $detail->jmlBarang }}
                                                    <a data-toggle="modal" data-target="#editjumlah{{ $detail->id_detailPengajuan }}" action="( {{url('marketing/pengajuan/edit')}}/{{ $detail->id_detailPengajuan }})"><button class="btn btn-default btn-icon-anim btn-circle" ><i class="fa fa-edit"></i></button></a>   
                                                </td>
                                                <td>
                                                    <input type="checkbox" class="checkbox" id="is_active[]" name="is_active[]" value="{{$detail->id_detailPengajuan}}" 
                                                    @if($detail->status == 2) checked=checked @endif />
                                                    <input type="hidden" id="is_active[]" name="is_active[]" value="{{$detail->id_detailPengajuan}}">        
                                                </td>
                                                
                                               
                                            </tr>
                                            @endforeach
                                           
                                        </div>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pull-right hide-from-printer">
                    <!-- <button class="btn btn-default" name="draft" type="submit" value="draft" id="draft">Draft</button> -->
                    <button class="btn btn-primary mr-10" name="proses" type="submit"  value="proses" id="proses">Proses</button>
                </div>
                
            </form>
            @include('marketing.pengajuan.editjumlah')
           
        </div>
    </div>
</div>

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
