<!DOCTYPE html>
<html>
<head>
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/bps.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    OPERA CANDI | BPS KOTA MADIUN
  </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Survei Kelurahan Josenan</h4>
		<h6><a target="_blank" href="">OPERA CANDI</a></h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
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
                    <td>{{ $kolom['infopengawas']->nama_lengkap }}</td>
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
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </td>
            </tr>
    </body>
 </html>