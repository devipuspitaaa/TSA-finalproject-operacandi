@extends('template')
@section('content')

<br></br>
<br></br>
<div class="col-md-12">
    <div class="card " style="background-color: #ffc800; padding-top:10px; padding-bottom:15px;">
        <div class="card-header">
            <center>
                <h4 class="card-title"><strong>Edit Data Survei</strong></h4>
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
            <form method="post" action="{{ route('form.update', $data->id) }}" id="myForm">
                @csrf
                @method('PUT')
                <div class="featured__controls">

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nama Survei</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="nama_survei" name="nama_survei" class="form-control" id="nama_survei" value="{{$data->nama_survei}}" aria-describedby="nama_survei" placeholder="masukkan nama survei" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Total Target</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="total_target" name="total_target" class="form-control" id="total_target" value="{{$data->total_target}}" aria-describedby="total_target" placeholder="masukkan total target" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Total Petugas</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="total_petugas" name="total_petugas" class="form-control" id="total_petugas" value="{{$data->total_petugas}}" aria-describedby="total_petugas" placeholder="masukkan total petugas" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Total Pengawas</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="total_pengawas" name="total_pengawas" class="form-control" id="total_pengawas" value="{{$data->total_pengawas}}" aria-describedby="total_pengawas" placeholder="masukkan total pengawas" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Jangka Hari Penyelesaian</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="jh_penyelesaian" name="jh_penyelesaian" class="form-control" id="jh_penyelesaian" value="{{$data->jh_penyelesaian}}" aria-describedby="jh_penyelesaian" placeholder="masukkan jangka hari selesai" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Target Per-Petugas Setiap Hari</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="target_petugas" name="target_petugas" class="form-control" id="target_petugas" value="{{$data->target_petugas}}" aria-describedby="target_petugas" placeholder="masukkan target petugas" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-success" href="{{ route('form.index') }}">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
        // total target / t.petugas / jangka waktu

        function perhitungan() {

            let total_target = $("input[name='total_target']").val();
            let total_petugas = $("input[name='total_petugas']").val();
            let jh_penyelesaian = $("input[name='jh_penyelesaian']").val();

            if ((total_target > 0) && (total_petugas > 0) && (jh_penyelesaian > 0)) {

                let hasil = total_target / total_petugas / jh_penyelesaian;
                $('input[name="target_petugas"]').val(hasil);

                $('#message').fadeOut();

            } else {

                let html = `<div class="alert alert-danger">Pemebritauan<br><small>Harap masukkan nilai yang valid</small></div>`;
                $('#message').html(html).hide().fadeIn(1000);
            }
        }


        $('input[name="total_target"]').keyup(function() {
            perhitungan();
        });
        $('input[name="total_petugas"]').keyup(function() {
            perhitungan();
        });
        $('input[name="jh_penyelesaian"]').keyup(function() {
            perhitungan();
        });


    });
</script>
@endsection