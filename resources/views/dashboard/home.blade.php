@extends('layout.master')
@section('title', 'Home')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid pt-25">
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5 class="txt-light">Selamat datang, <strong>{{ Auth::user()->name }}</strong>, anda sebagai <strong>{{ Auth::user()->divisi }}</strong> </h5>
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                <div class="panel panel-default card-view panel-refresh">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Data Barang</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div id="piechart"></div>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        // Load google charts
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);


                        // Draw the chart and set the chart values
                        function drawChart() {
                            const nama_barang = @json($nama_barang);
                            const stok = @json($stok);
                            var value = [
                                ['Task', 'Speakers'],
                            ];
                            for (let i = 0; i < stok.length; i++) {
                                value.push([nama_barang[i], stok[i]]);
                            };
                            var data = google.visualization.arrayToDataTable(value);

                            // Optional; add a title and set the width and height of the chart
                            var options = {
                                'title': '',
                                'width': 550,
                                'height': 400
                            };
                            // Optional; add a title and set the width and height of the chart
                            var options = {
                                'title': '',
                                'width': 550,
                                'height': 400
                            };

                            // Display the chart inside the <div> element with id="piechart"
                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                            chart.draw(data, options);
                        }
                    </script>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Data Pengajuan</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div id="morris_bar_chart" class="morris-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
    </div>
    <!-- /Row -->
</div>
</div>
</div>
@endsection