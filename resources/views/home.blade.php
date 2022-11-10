    @extends('template')
    @section('content')
<br /><br /><br /><br />
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card " style="background-color: #ffc800;">
                <div class="card-header ">
                    <h2 class="card-title text-center"><strong>Dashboard Survei Kelurahan Josenan</strong></h2>
                    
                </div>
                <div class="card-body ">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="margin-left:8px;">Tabel Komulatif</h3>
                </div>
                
                <div class="card-body">
                    <div class="toolbar">
                        <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                        </div>
                        <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <table id="dataTableHover1" class="table table-condensed table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>NAMA PENGAWAS</th>
                                                <th>TARGET</th>
                                                <th>REALISASI</th>
                                                <th>PERSENTASE</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php 
                                                $total_keseluruhan = 0
                                            @endphp
                                            @foreach ( $dt_entry AS $kolom )
                                            <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                                                <td><i class="nc-icon nc-simple-add"></i></td>
                                                <td>{{ $kolom['infopengawas']->name }}</td>
                                                <td>
                                                    @php

                                                    $survey = 0;
                                                    $total = 0;

                                                    foreach ( $kolom['infopetugas'] AS $nomor => $kolom_petugas ) {

                                                    if ( $dt_survey ) {

                                                    $survey += ($dt_survey->jh_penyelesaian *
                                                    $dt_survey->target_petugas);
                                                    }



                                                    foreach ( $kolom_petugas['target'] AS $kolom_target ) {

                                                    $total += $kolom_target->target;
                                                    }
                                                    }

                                                    // if ( $dt_survey ) {

                                                    // $survey = $dt_survey->jh_penyelesaian *
                                                    $dt_survey->target_petugas;
                                                    // }

                                                    $total_keseluruhan += $total

                                                    @endphp
                                                    {{ $survey }}
                                                </td>
                                                <td>{{ $total }}</td>
                                                <td>
                                                    @php
                                                    $persen = 0;
                                                    $progress = 0;
                                                    $color = "warning";
                                                    if ( $survey != 0 && $total != 0 ) {

                                                    $persen = $total / $survey * 100;

                                                    if ( $persen == 100 ) {

                                                    $progress = $persen;
                                                    $color = "info";
                                                    } else {

                                                    $progress = $persen + 20;
                                                    }
                                                    }
                                                    @endphp
                                                    <div class="progress">
                                                        {{-- <div class="progress-bar <strong>bg-success</strong>"
                                                            role="progressbar" style="width: 100%" aria-valuenow="100"
                                                            aria-valuemin="0" aria-valuemax="100">

                                                        </div> --}}
                                                        <div class="progress-bar  progress-bar-animated bg-{{ $color }}" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{ $progress }}%">
                                                            <b>{{ number_format($persen, 2).' %' }}</b>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="12" class="hiddenRow">
                                                    <div class="accordian-body collapse" id="demo1">
                                                        <table class="table table-borderless">
                                                            <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                                                                <td>NO</td>
                                                                <td><b>NAMA PETUGAS<b></td>
                                                                <td><b>TARGET<b></td>
                                                                <td><b>REALISASI<b></td>
                                                                <td><b>PERSENTASE<b></td>

                                                            </tr>

                                                            @foreach ( $kolom['infopetugas'] AS $nomor => $kolom_petugas
                                                            )
                                                            <tbody>
                                                                <td>{{ $nomor + 1 }}</td>
                                                                <td>{{ $kolom_petugas['petugas']->name }}</td>
                                                                <td>
                                                                    @php

                                                                    $survey = 0;

                                                                    if ( $dt_survey ) {

                                                                    $survey = $dt_survey->jh_penyelesaian *
                                                                    $dt_survey->target_petugas;
                                                                    }

                                                                    @endphp
                                                                    {{ $survey }}
                                                                </td>

                                                                @php

                                                                $total = 0;
                                                                foreach ( $kolom_petugas['target'] AS $kolom_target ) {

                                                                $total += $kolom_target->target;
                                                                }
                                                                @endphp
                                                                <td>{{ $total }}</td>
                                                                <td>

                                                                    @php
                                                                    $persen = 0;
                                                                    $progress = 0;
                                                                    $color = "bg-warning";
                                                                    if ( $survey != 0 && $total != 0 ) {

                                                                    $persen = $total / $survey * 100;

                                                                    if ( $persen == 100 ) {

                                                                    $progress = $persen;
                                                                    $color = "";
                                                                    } else {

                                                                    $progress = $persen + 20;
                                                                    }
                                                                    }
                                                                    @endphp
                                                                    <div class="progress">
                                                                        <div class="progress-bar  progress-bar-animated {{ $color }}" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{ $progress }}%">
                                                                            <b>{{ number_format($persen, 2).' %' }}</b>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tbody>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                <div class="float-left my-2 text-center">
                                    <a class="btn btn-danger mt-3" href="{{route('dashboard.cetaksurvey')}}" style="padding-left:10px; padding-right:10px; padding-bottom:10px; padding-top:10px;">Cetak PDF</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Entry Realisasi</h3>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                        </div>
                        <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="dataTableHover1" class="table table-condensed table-striped">
                                        @php 
                                            $arrTotalRealisasi = array();
                                        @endphp
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>NAMA PENGAWAS</th>

                                                @foreach ( $kolomTable AS $isi_kolom )
                                                <th>{{ $isi_kolom->tanggal }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $dt_entry AS $kolom )
                                            <tr data-toggle="collapse" data-target="#demo-{{ $kolom['infopengawas']->id }}" class="accordion-toggle">
                                                <td><i class="nc-icon nc-simple-add"></i></td>
                                                <td>{{ $kolom['infopengawas']->name }}</td>

                                                @foreach ( $kolomTable AS $isi_kolom )

                                                @php
                                                $total = 0;
                                                @endphp
                                                @foreach ( $kolom['infopetugas'] AS $nomor => $kolom_petugas )

                                                @php
                                                foreach ( $kolom_petugas['target'] AS $kolom_target ) {

                                                if ( $isi_kolom->tanggal == $kolom_target->tanggal ) {

                                                $total += $kolom_target->target;
                                                }
                                                }

                                                @endphp



                                                @endforeach
                                                <td><b>{{ $total }}</b></td>
                                                @endforeach

                                            </tr>
                                            <tr>
                                                <td colspan="12" class="hiddenRow">
                                                    <div class="accordian-body collapse" id="demo-{{ $kolom['infopengawas']->id }}">
                                                        <table class="table table-borderless">
                                                            <tr data-toggle="collapse" data-target="#demo-{{ $kolom['infopengawas']->id }}" class="accordion-toggle">
                                                                <td>NO</td>
                                                                <td><b>NAMA PETUGAS<b></td>

                                                                @foreach ( $kolomTable AS $isi_kolom )
                                                                <td><b>{{ date('l', strtotime($isi_kolom->tanggal))[0]
                                                                        }}</b></td>
                                                                @endforeach


                                                            </tr>
                                                            
                                                            

                                                            @foreach ( $kolom['infopetugas'] AS $nomor => $kolom_petugas )
                                                            <tbody>
                                                                <td>{{ $nomor + 1 }}</td>
                                                                <td>{{ $kolom_petugas['petugas']->name }}</td>

                                                                @foreach ( $kolomTable AS $isi_kolom )


                                                                @php

                                                                $target = 0;
                                                                foreach ( $kolom_petugas['target'] AS $kolom_target ) {

                                                                    if ( $isi_kolom->tanggal == $kolom_target->tanggal ) {

                                                                        $target = $kolom_target->target;

                                                                        if ( array_key_exists($kolom_target->tanggal, $arrTotalRealisasi) ) {

                                                                            $arrTotalRealisasi[ $kolom_target->tanggal ] += $target;
                                                                        } else {

                                                                            $arrTotalRealisasi[ $kolom_target->tanggal ] = $target;
                                                                        }

                                                                        
                                                                    }
                                                                }


                                                                

                                                                @endphp

                                                                <td><b>{{ $target }}</b></td>





                                                                @endforeach
                                                            </tbody>
                                                            @endforeach

                                                        </table>
                                                    </div>
                                                </td>
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
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-header ">
                    <center><h6>Grafik Ketercapaian Survey</h6></center>
                </div>
                <div class="card-body ">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="pie-chart" class="ct-chart ct-perfect-fourth chartjs-render-monitor" width="370" height="200" style="display: block; width: 185px; height: 121px;"></canvas>
                </div>
                <div class="card-footer ">
                    <div class="legend">
                        <i class="fa fa-circle text-primary"></i> Total realisasi : {{ $total_keseluruhan }}</h8>
                        <br>
                        <i class="fa fa-circle text-danger"></i>  Target belum terealisasi : {{ $dt_survey->total_target - $total_keseluruhan  }}
                    </div>

                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i>Total Target = {{ $dt_survey->total_target}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header ">
                    <center><h6>Grafik Komulatif</h6></center>
                    <p class="card-category">Realisasi per-hari dari petugas</p>
                </div>
                <div class="card-body ">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="bar-chart" width="858" height="218" style="display: block; width: 429px; height: 107px;" class="chartjs-render-monitor"></canvas>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar"></i> Total Target = {{ $dt_survey->total_target}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
<script>

    $(function() {

        // pie chart
        ctx = document.getElementById('pie-chart').getContext("2d");

        myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [1, 2],
                datasets: [{
                    label: "Emails",
                    pointRadius: 0,
                    pointHoverRadius: 0,
                    backgroundColor: [
                        '#4acccd',
                        '#ef8157'
                    ],
                    borderWidth: 0,
                    data: [{{ $total_keseluruhan }}, {{ $dt_survey->total_target }}]
                }]
            },

            options: {

                legend: {
                    display: false
                },

                pieceLabel: {
                    render: 'percentage',
                    fontColor: ['white'],
                    precision: 2
                },

                tooltips: {
                    enabled: false
                },

                scales: {
                    yAxes: [{

                        ticks: {
                            display: false
                        },
                        gridLines: {
                            drawBorder: false,
                            zeroLineColor: "transparent",
                            color: 'rgba(255,255,255,0.05)'
                        }

                    }],

                    xAxes: [{
                        barPercentage: 1.6,
                        gridLines: {
                            drawBorder: false,
                            color: 'rgba(255,255,255,0.1)',
                            zeroLineColor: "transparent"
                        },
                        ticks: {
                            display: false,
                        }
                    }]
                },
            }
        });



        // - - - - 
        // kumulatif
        // ctx = document.getElementById('chartHours').getContext("2d");
        let chartColor = "#FFFFFF";
        ctx = document.getElementById('bar-chart').getContext("2d");
        gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
        gradientStroke.addColorStop(0, '#80b6f4');
        gradientStroke.addColorStop(1, chartColor);
        gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
        gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
        gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");
        myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [

                    @php
                        foreach( $dt_statistik AS $isi ) {

                            echo "'".date('d-m-Y', strtotime($isi['tanggal']))."',";
                        }
                    @endphp
                ],
                datasets: [{
                    label: "Target",
                    borderColor: '#fcc468',
                    fill: true,
                    backgroundColor: '#fcc468',
                    hoverBorderColor: '#fcc468',
                    borderWidth: 8,
                    data: [

                        @php
                        foreach( $dt_statistik AS $isi ) {

                            echo "'".($isi['target'])."',";
                        }
                        @endphp
                    ],
                }, {
                    label: "Realisasi",
                    borderColor: '#4cbdd7',
                    fill: true,
                    backgroundColor: '#4cbdd7',
                    hoverBorderColor: '#4cbdd7',
                    borderWidth: 8,
                    data: [

                        @php
                        foreach( $dt_statistik AS $isi ) {

                            echo "'".$isi['realisasi']."',";
                        }
                        @endphp
                    ],
                }]
            },
            options: {
                tooltips: {
                    tooltipFillColor: "rgba(0,0,0,0.5)",
                    tooltipFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                    tooltipFontSize: 14,
                    tooltipFontStyle: "normal",
                    tooltipFontColor: "#fff",
                    tooltipTitleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                    tooltipTitleFontSize: 14,
                    tooltipTitleFontStyle: "bold",
                    tooltipTitleFontColor: "#fff",
                    tooltipYPadding: 6,
                    tooltipXPadding: 6,
                    tooltipCaretSize: 8,
                    tooltipCornerRadius: 6,
                    tooltipXOffset: 10,
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: "#9f9f9f",
                            fontStyle: "bold",
                            beginAtZero: true,
                            maxTicksLimit: 5,
                            padding: 20
                        },
                        gridLines: {
                            zeroLineColor: "#9f9f9f",
                            display: true,
                            drawBorder: false,
                            color: '#9f9f9f',
                        }
                    }],
                    xAxes: [{
                        barPercentage: 0.4,
                        gridLines: {
                            zeroLineColor: "white",
                            display: false,
                            drawBorder: false,
                            color: 'transparent',
                        },
                        ticks: {
                            padding: 20,
                            fontColor: "#9f9f9f",
                            fontStyle: "bold"
                        }
                    }]
                }
            }
        });



    })
</script>

@endsection