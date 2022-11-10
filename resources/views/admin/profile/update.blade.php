@extends('template')
@section('content')
<br /><br />
<br /><br />

{{-- Input Data section begin --}}
<div class="col-md-12">
    <div class="card " style="background-color: #ffc800; padding-top:10px; padding-bottom:15px;">
        <div class="card-header">
            <center>
                <h2 class="card-title"><strong> Update Profile Lurah</strong> </h2>
            </center>
            </div>
        </div>
            <div class="card" style="padding-top:20px; padding-right:30px;">
                <br>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="{{route('profileadmin.update')}}">
            {{csrf_field()}}
                <div class="featured__controls">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" value="{{ Auth::user()->name }}" aria-describedby="name" placeholder="Masukkan nama lengkap" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">No KTP</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="no_ktp" name="no_ktp" class="form-control" id="no_ktp" value="{{ Auth::user()->no_ktp }}" aria-describedby="no_ktp" placeholder="Masukkan nomor KTP" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10 checkbox-radios">
                            <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" required {{Auth::user()->jenis_kelamin == 'Laki-laki'? 'checked' : ''}} >Laki-Laki
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" required {{Auth::user()->jenis_kelamin == 'Perempuan'? 'checked' : ''}} >Perempuan
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="tempat_tanggal_lahir" name="tempat_tanggal_lahir" class="form-control datepicker" id="tanggal" value="{{ Auth::user()->tempat_tanggal_lahir }}" aria-describedby="tempat_tanggal_lahir" placeholder="masukkan tanggal lahir" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="no_tlp" name="no_tlp" class="form-control" id="no_tlp" value="{{ Auth::user()->no_tlp }}" aria-describedby="no_tlp" placeholder="Masukkan nomor telepon" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="email" value="{{ Auth::user()->email }}" aria-describedby="email" placeholder="Masukkan email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="alamat" name="alamat" class="form-control" id="alamat" value="{{ Auth::user()->alamat }}" aria-describedby="alamat" placeholder="Masukkan alamat" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="nip" name="nip" class="form-control" id="nip" value="{{ Auth::user()->nip }}" aria-describedby="nip" placeholder="Masukkan NIP" required>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-success" href="/home">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection