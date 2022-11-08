@extends('template')
@section('content')
<br></br>
<br></br>

<div class="col-md-12">
    <div class="card " style="background-color: #ffc800; padding-top:10px; padding-bottom:15px;">
        <div class="card-header">
            <center>
                <h2 class="card-title"><strong> Laporan Data Realisasi Petugas</strong> </h2>
            </center>
            </div>
        </div>
            <div class="card" style="padding-top:20px; padding-right:30px;">
                <br>
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