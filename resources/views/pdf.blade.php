<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="pdf.css">

    <title>Detail Purchase Order</title>

</head>

<body>
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
                                                <img style="margin-top: 50px"
                                                    src="{{ public_path('template/dist/img/ns.jpg') }}" align="right">

                                                <div class="">
                                                    <h4 text-style="left" class="txt-dark">Nakula Sadewa, CV</h4>
                                                </div>
                                                <table>
                                                    <tr>
                                                        {{-- <div class="row"> --}}
                                                        <td class="txt-dark"> Jl Candi Mendut Utara 1 No. 11
                                                            <br>
                                                            Kel. Mojolangu Kec. Lowokwaru <br>
                                                            Malang - Jawa Timur<br>
                                                            Phone : <br> Email :
                                                        </td>
                                                        {{-- </div> --}}
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <table
                                        style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;'
                                        border='0'>
                                        <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                                            <span style='font-size:12pt'><b>TO</b></span><br>
                                        </td>
                                        <td style='vertical-align:top' width='30%' align='left'>
                                            <b><span style='font-size:10pt'>PENAWARAN</span></b>
                                        </td>
                                    </table>
                                    <table
                                        style='width:550px; font-size:10pt; font-family:calibri; border-collapse: collapse;'
                                        border='0'>
                                        <td width="70%"; align="left"; style='padding-right:80px; vertical-align:top'>
                                           @foreach ($instansi as $instansi)
                                                    {{ $instansi->nama_instansi }} <br>
                                                    {{ $instansi->alamat_instansi }} <br>
                                                    {{ $instansi->telp_instansi }} <br>
                                                    {{ $instansi->email_instansi }} <br>
                                            @endforeach
                                        </td>
                                        <td style='vertical-align:top' width='30%' align='left'>
                                            @foreach ($data_po as $po)
                                                Number : {{ $po->no_PO }} <br>
                                                Date   : {{ $po->created_at->format('d/m/Y') }} <br>
                                                Note   :
                                            @endforeach
                                        </td>
                                    </table>
                                </div>
                                <br>
                                <div class="row">
                                    <table border="1" cellspacing="0" style="width: 100%; align-text:center">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
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
                                            @foreach ($data_detail as $details)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>
                                                        <div id="" data-title="Nama barang"> <span><b>{{ $details->nama_barang }}</b></span>
                                                            <br>&nbsp;&nbsp;- {{ $details->keterangan_barang }}</div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                        <div id="" data-title="Jumlah">{{$details->jumlah}}</a></div>
                                                    </td>
                                                    <td>
                                                        <div id=""  data-title="Rate">{{$details->rate}}</a></div>
                                                    </td>
                                                    <td> <div id=""  data-title="Amount">
                                                            Rp. {{ number_format($details->amount, 2, ',', '.') }}</div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            @foreach ($data_po as $data)
                                                
                                                <tr class="txt-dark" style="font-weight:bold; color:black">
                                                    <td border=0 colspan="4" rowspan="4"></td>
                                                    <td>Total</td>
                                                    <td>  Rp. {{ number_format($data->total, 2, ',', '.') }}</td>
                                                </tr>
                                                <tr class="txt-dark" style="font-weight:bold; color:black">

                                                    <td>PPn (%)</td>
                                                    <td> {{$data->ppn}}</td>
                                                </tr>
                                                <tr class="txt-dark" style="font-weight:bold; color:black">

                                                    <td>PPh (%)</td>
                                                    <td>{{ $data->pph}}</td>
                                                </tr>
                                                <tr class="txt-dark" style="font-weight:bold; color:black">

                                                    <td>Balance Due</td>
                                                    <td>Rp. {{ number_format($data->balance, 2, ',', '.') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <br>
                                <table
                                    style='align: botton;width:700px; font-size:8pt; font-family:calibri; border-collapse: collapse;'
                                    border='0'>
                                    <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>

                                    </td>
                                    <td style='vertical-align:top' width='30%' align='left'>
                                        <b><span style='font-size:10pt'>Malang, <?php echo date("d-m-Y")?></span></b>
                                    </td>
                                </table>
                                <br>
                                <br>
                                <br><br>
                                <table
                                    style='align: botton;width:700px; font-size:8pt; font-family:calibri; border-collapse: collapse;'
                                    border='0'>
                                    <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>

                                    </td>
                                    <td style='vertical-align:top' width='30%' align='left'>
                                        <hr>
                                    </td>
                                </table>
                                <table
                                    style='align: botton;width:700px; font-size:8pt; font-family:calibri; border-collapse: collapse;'
                                    border='0'>
                                    <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                                        {{ Auth::user()->name }}
                                    </td>
                                    <td style='vertical-align:top' width='30%' align='left'>
                                        <b><span style='font-size:10pt'>{{ Auth::user()->name }}</span></b>
                                    </td>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
