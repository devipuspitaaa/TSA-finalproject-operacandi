@extends('layouts.app')

@section('content')
<br></br><br></br><br></br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h5 class="form-title">LOGIN</h5>
                    </center>
                </div>
                <br>
                <div class="container">
                    <div class="sign-up-content">
                    <br>
                        <center>
                            <div class="form-group">
                                <input type="button" class="btn btn-info btn-lg" id="btn_admin" onclick="changeLogin('login')" value="Admin">&nbsp;&nbsp;&nbsp;
                                <input type="button" class="btn btn-info btn-lg" id="btn_pengawas" onclick="changeLogin('login')" value="Pengawas">&nbsp;&nbsp;&nbsp;
                                <input type="button" class="btn btn-info btn-lg" id="btn_petugas" onclick="changeLogin('login')" value="Petugas">&nbsp;&nbsp;&nbsp;
                                <input type="button" class="btn btn-info btn-lg" id="btn_lurah" onclick="changeLogin('login')" value="Lurah">
                            </div>
                        </center>
                    </div>
                    <br>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" id="form-login">
                            @csrf
                            <div class="row mb-3">
                                <input type="hidden" name="level" />
                                <label for="username" class="col-md-4 col-form-label text-md-end" style="margin-left: -30px;">{{ __('Username')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="username"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" autocomplete="username">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end" style="margin-left: -30px;">{{ __('Password')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check" style="margin-left: -30px;">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                            old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-warning" style="margin-left: -120px; width: 100px;">
                                        {{ __('Login') }}
                                    </button>
                                    &nbsp;&nbsp; Petugas belum memiliki akun? Silakan
                                    <a href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <div class="toast bg-danger text-white fade" id="myToast" style="position: absolute; top: 10px; right: 10px;" >
        <div class="toast-body">
            Harap pilih level login yang tersedia
        </div>
    </div>


    <script>
        $(function() {
            // inisialisasi input
            var level = $('input[name="level"]');
            
            var btnAdmin = $('#btn_admin');
            var btnPengawas = $('#btn_pengawas');
            var btnPetugas = $('#btn_petugas');
            var btnLurah = $('#btn_lurah');
            // btn admin dipencet
            $('#btn_admin').click(function() {
                level.val("admin");
                if ( $(this).hasClass("btn-info") ){
                    $(this).removeClass("btn-info");
                    $(this).addClass("btn-warning");
                }
                if ( btnPengawas.hasClass("btn-warning") ) {
                    btnPengawas.removeClass("btn-warning");
                    btnPengawas.addClass("btn-info");
                }
                if ( btnPetugas.hasClass("btn-warning") ) {
                    btnPetugas.removeClass("btn-warning");
                    btnPetugas.addClass("btn-info");
                }
                if ( btnLurah.hasClass("btn-warning") ) {
                    btnLurah.removeClass("btn-warning");
                    btnLurah.addClass("btn-info");
                }
            });

            $('#btn_pengawas').click(function() {
                level.val("pengawas");
                if ( $(this).hasClass("btn-info") ){
                    $(this).removeClass("btn-info");
                    $(this).addClass("btn-warning");
                }
                if ( btnAdmin.hasClass("btn-warning") ) {
                        btnAdmin.removeClass("btn-warning");
                        btnAdmin.addClass("btn-info");
                }
                if ( btnPetugas.hasClass("btn-warning") ) {
                        btnPetugas.removeClass("btn-warning");
                        btnPetugas.addClass("btn-info");
                }
                if ( btnLurah.hasClass("btn-warning") ) {
                        btnLurah.removeClass("btn-warning");
                        btnLurah.addClass("btn-info");
                }
            });

            $('#btn_lurah').click(function() {
                level.val("lurah");
                if ( $(this).hasClass("btn-info") ){
                    $(this).removeClass("btn-info");
                    $(this).addClass("btn-warning");
                }
                if ( btnAdmin.hasClass("btn-warning") ) {
                        btnAdmin.removeClass("btn-warning");
                        btnAdmin.addClass("btn-info");
                }
                if ( btnPengawas.hasClass("btn-warning") ) {
                        btnPengawas.removeClass("btn-warning");
                        btnPengawas.addClass("btn-info");
                }
                if ( btnPetugas.hasClass("btn-warning") ) {
                        btnPetugas.removeClass("btn-warning");
                        btnPetugas.addClass("btn-info");
                }
            });

            $('#btn_petugas').click(function() {
                level.val("petugas");
                if ( $(this).hasClass("btn-info") ){
                    $(this).removeClass("btn-info");
                    $(this).addClass("btn-warning");
                }
                if ( btnAdmin.hasClass("btn-warning") ) {
                        btnAdmin.removeClass("btn-warning");
                        btnAdmin.addClass("btn-info");
                }
                if ( btnPengawas.hasClass("btn-warning") ) {
                        btnPengawas.removeClass("btn-warning");
                        btnPengawas.addClass("btn-info");
                }
                if ( btnLurah.hasClass("btn-warning") ) {
                        btnLurah.removeClass("btn-warning");
                        btnLurah.addClass("btn-info");
                }
            });

            $('#form-login').submit(function( e ){
                if ( level.val().length > 0 ) {
                    $(this).submit();
                } else {
                    $("#myToast").toast("show");
                }
                e.preventDefault();
            });
        });
    </script>
    @endsection