@extends('template')
@section('content')
<br></br>
<br></br>

{{-- Input Data section begin --}}
<div class="col-md-12">
    <div class="card ">
        <div class="card-header ">
            <center>
                <h4 class="card-title"><strong>Tambah Data Petugas</strong></h4>
            </center>
        </div>
        <div class="card-body ">
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
            <form method="post" action="{{ route('petugas.store') }}" class="form-horizontal">
                @csrf
                <div class="featured__controls">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="nama_lengkap" name="nama_lengkap" class="form-control" id="nama_lengkap" aria-describedby="nama_lengkap" placeholder="masukkan nama lengkap" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nama Pengawas</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <select name="pengawas_id" id="nama_pengawas" class="form-control">
                                    <option selected disabled>pilih pengawas</option>
                                    @foreach($pengawas as $pengawas)
                                    <option value="{{$pengawas->id}}">{{$pengawas->nama_lengkap}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">No. KTP</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="no_ktp" name="no_ktp" class="form-control" id="no_ktp" aria-describedby="no_ktp" placeholder="masukkan no. ktp" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10 checkbox-radios">
                            <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" required>
                                    Laki - Laki
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" required>
                                    Perempuan
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="tempat_tanggal_lahir" name="tempat_tanggal_lahir" class="form-control datepicker" id="tanggal" aria-describedby="tempat_tanggal_lahir" placeholder="masukkan tanggal lahir" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">No. Telepon</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="no_tlp" name="no_tlp" class="form-control" id="no_tlp" aria-describedby="no_tlp" placeholder="masukkan no. telepon" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="alamat" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" placeholder="masukkan alamat" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="nip" name="nip" class="form-control" id="nip" aria-describedby="nip" placeholder="masukkan nip" required>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

{{-- Input Data section end --}}
@endsection