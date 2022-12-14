@extends('template')
@section('content')
<br></br>
<br></br>
<div class="col-md-12">
    <div class="card " style="background-color: #ffc800; padding-top:10px; padding-bottom:15px;">
        <div class="card-header">
            <center>
                <h2 class="card-title"><strong> Data Survei</strong> </h2>
            </center>
            </div>
        </div>
            <div class="card" style="padding-top:20px; padding-right:30px;">
                <br>
            @if (Auth::user()->role=='admin')
            <a class="btn btn-success my-2" href="{{ route('form.create') }}" style="width: 150px; margin-left:20px;"> Tambah Data</a>
            @endif

        <div class="card-body">
        @if(Session::has('success'))
                                    <div class="btn btn-success" style="width:100%; height:50px">
                                        <p>{{Session::get('success')}}</p>
                                    </div>
                                @endif

                                @if(Session::has('delete'))
                                    <div class="btn btn-warning" style="width:100%; height:50px">
                                        <p>{{Session::get('delete')}}</p>
                                    </div>
                                @endif

                                @if(Session::has('update'))
                                    <div class="btn btn-info" style="width:100%; height:50px">
                                        <p>{{Session::get('update')}}</p>
                                    </div>
                                @endif

                                @if(Session::has('failed'))
                                    <div class="btn btn-danger" style="width:100%; height:50px">
                                        <p>{{Session::get('delete')}}</p>
                                    </div>
                                @endif

            <div class="">
                <table class="table" id="basic-datatables">
                    <thead class="text-primary">
                        <tr>
                            <th>
                                Nama Survei
                            </th>
                            <th>
                                Total Target
                            </th>
                            <th>
                                Total Petugas
                            </th>
                            <th>
                                Total Pengawas
                            </th>
                            <th>
                                Jangka Hari Penyelesaian
                            </th>
                            <th>
                                Target Per-Petugas Setiap Hari
                            </th>
                            @if (Auth::user()->role=='admin')
                            <th class="text-right">
                                Actions
                            </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($form as $data)
                        <tr>
                            <td>{{ $data->nama_survei }}</td>
                            <td>{{ $data->total_target }}</td>
                            <td>{{ $data->total_petugas }}</td>
                            <td>{{ $data->total_pengawas }}</td>
                            <td>{{ $data->jh_penyelesaian }}</td>
                            <td>{{ $data->target_petugas }}</td>
                            @if (Auth::user()->role=='admin')
                            <td>
                                <form action="{{ route('form.destroy',$data->id) }}" method="POST">
                                    <a href="{{ route('form.edit',$data->id) }}">
                                        <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm ">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                </form>

                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endsection