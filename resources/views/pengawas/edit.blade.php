@extends('template')
@section('content')
<br /><br />
<br /><br />

{{-- Input Data section begin --}}
<div class="col-md-12">
    <div class="card ">
        <div class="card-header ">
            <center>
                <h4 class="card-title"><strong>Edit Data Pengawas</strong></h4>
            </center>
        </div>
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
            <form method="post" action="{{ url('pengawas/update/' .$data->id) }}" class="form-horizontal">
                @csrf
                <div class="featured__controls">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="nama_lengkap" name="nama_lengkap" class="form-control" id="nama_lengkap" value="{{ $data->nama_lengkap }}" aria-describedby="nama_lengkap" placeholder="Masukkan nama lengkap" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="pengawas_id">Nama Pengawas</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <select name="survei_id" id="survei_id" class="form-control">
                                    <option selected disabled>pilih survei</option>
                                    @foreach($survei as $survei)
                                    <option value="{{$survei->id}}" @php if ( $survei->id == $data->survei_id ) echo
                                        'selected="selected"'; @endphp>{{$survei->nama_survei}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">No KTP</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="no_ktp" name="no_ktp" class="form-control" id="no_ktp" value="{{ $data->no_ktp }}" aria-describedby="no_ktp" placeholder="Masukkan nomor KTP" required>
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
                                <input type="tempat_tanggal_lahir" name="tempat_tanggal_lahir" class="form-control datepicker" id="tanggal" value="{{ $data->tempat_tanggal_lahir }}" aria-describedby="tempat_tanggal_lahir" placeholder="masukkan tanggal lahir" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="no_tlp" name="no_tlp" class="form-control" id="no_tlp" value="{{ $data->no_tlp }}" aria-describedby="no_tlp" placeholder="Masukkan nomor telepon" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="alamat" name="alamat" class="form-control" id="alamat" value="{{ $data->alamat }}" aria-describedby="alamat" placeholder="Masukkan alamat" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="nip" name="nip" class="form-control" id="nip" value="{{ $data->nip }}" aria-describedby="nip" placeholder="Masukkan NIP" required>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-success" href="{{ route('petugas.index') }}">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection