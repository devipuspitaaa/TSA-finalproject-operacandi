@extends('template')
@section('content')
<br></br>
<br></br>

{{-- Input Data section begin --}}
<div class="col-md-12">
    <div class="card ">
        <div class="card-header ">
            <center>
                <h4 class="card-title"><strong>Tambah Data Realisasi Target Petugas</strong></h4>
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
            <form method="post" action="{{ route('target.store') }}" class="form-horizontal">
                @csrf
                <div class="featured__controls">
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="nama_petugas">Nama Petugas</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <select name="petugas_id" id="nama_petugas" class="form-control">
                                    <option selected disabled>pilih petugas</option>
                                    @foreach($petugas as $petugas)
                                    <option value="{{$petugas->id}}">{{$petugas->nama_lengkap}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Jumlah Realisasi/hari</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="target" name="target" class="form-control" id="target"
                                    aria-describedby="target" placeholder="masukkan jumlah realisasi/hari" required>
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