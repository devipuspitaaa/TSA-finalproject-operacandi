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
		<h5>DATA TARGET PETUGAS</h4>
		<h6><a target="_blank" href="">OPERA CANDI</a></h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
                <th>Tanggal</th>
                <th>Nama Petugas</th>
                <th>Jumlah Realisasi/hari</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
            @foreach ($targets as $data)
			<tr>
				<td>{{ $i++ }}</td>
                <td>{{ $data->tanggal }}</td>
                <td>{{ $data->petugas->nama_lengkap}}</td>
                <td>{{ $data->target }}</td>
			@endforeach
    </tr>
		</tbody>
	</table>
 
</body>
</html>