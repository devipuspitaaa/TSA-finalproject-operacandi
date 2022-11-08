@extends('template')
@section('content')
<br></br>
<br></br>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <center>
                <h2 class="card-title"><strong> LAPORAN DATA REALISASI PETUGAS </strong> </h2>
            </center>
            <br>
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="col-sm-12 ">
            <form action="" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                             <label for="">Tanggal Awal</label>
                                 <input type="date" class="form-control" required="" placeholder="Tanggal Awal" name="tglAwal" id="tglAwal">
                                 <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                             <label for="">Tanggal Akhir</label>
                                 <input type="date" class="form-control" required="" placeholder="Tanggal Akhir" name="tglAkhir" id="tglAkhir">
                                 <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                             </div>
                         </div>
                         </div>
                         <br>
                        
                        <div class="action-buttons justify-content-between bg-white pt-2 pb-2">
                            <!-- <button type="submit" class="btn btn-success col-md-12">
                                <i class="fas fa-check"></i> Cetak Laporan</button> -->
                            <a href="" onclick="this.href='/laporan-realisasi/'+ document.getElementById('tglAwal').value +
                            '/'+ document.getElementById('tglAkhir').value " target="_blank"class="btn btn-success">
                                <i class="fa fa-print"></i> Cetak Laporan</a>

            </div>
        </div>
@endsection