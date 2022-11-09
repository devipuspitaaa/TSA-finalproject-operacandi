@extends('template')
@section('content')
<br></br>
<br></br>

{{-- Input Data section begin --}}
<div class="col-md-12">

    <div id="message"></div>

    <div class="card " style="background-color: #ffc800; padding-top:10px; padding-bottom:15px;">
        <div class="card-header">
            <center>
                <h2 class="card-title"><strong> Tambah Data User</strong> </h2>
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
            @endif
            <form method="post" action="{{ route('admin.user.create') }}" class="form-horizontal">
                @csrf
                <div class="featured__controls">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="username" name="username" class="form-control" id="username"
                                    aria-describedby="username" placeholder="masukkan username" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="name" name="name" class="form-control" id="name"
                                    aria-describedby="name" placeholder="masukkan nama lengkap" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="email"
                                    aria-describedby="email" placeholder="masukkan email" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Role User</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                            <select id="role" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus class="form-control" >
                                <option value="lurah">Lurah</option>
                                <option value="pengawas">Pengawas</option>
                            </select>
                            <span class="form-bar"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control"
                                    id="password" aria-describedby="password"
                                    placeholder="masukkan password" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation" aria-describedby="password_confirmation"
                                    placeholder="masukkan konfirmasi password" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-5">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Simpan</button>
                    <a href="/home" class="btn btn-secondary">
                        <i class="fa fa-reply"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>

    {{-- Input Data section end --}}


    <script>
        $(function() {
            // total target / t.petugas / jangka waktu

            function perhitungan() {

                let nama   = $("input[name='nama']").val();
                let email  = $("input[name='email']").val();
                let password = $("input[name='password']").val();

                if ( (nama > 0) && (email > 0) && (password > 0) ) {

                    let hasil = nama / email / password;
                    $('input[name="password_confirmation"]').val( hasil );

                    $('#message').fadeOut();

                } else {

                    let html = `<div class="alert alert-danger">Pemebritauan<br><small>Harap masukkan nilai yang valid</small></div>`;
                    $('#message').html(html).hide().fadeIn(1000);
                }
            }


            $('input[name="nama"]').keyup(function() { perhitungan(); });
            $('input[name="email"]').keyup(function() { perhitungan(); });
            $('input[name="password"]').keyup(function() { perhitungan(); });

            
        });
    </script>
    @endsection