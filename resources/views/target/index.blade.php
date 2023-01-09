@extends('template')
@section('content')
<br></br>
<br></br>
<div class="col-md-12">
    <div class="card " style="background-color: #ffc800; padding-top:10px; padding-bottom:15px;">
        <div class="card-header">
            <center>
                <h2 class="card-title"><strong> Data Realisasi Target Petugas</strong> </h2>
            </center>
            </div>
        </div>
            <div class="card" style="padding-top:20px; padding-right:30px;">
                <br>
            @if (Auth::user()->role=='petugas')
                <a class="btn btn-success my-2" href="{{ route('target.create') }}" style="width: 150px; margin-left:20px;"> Tambah Data </a>
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
            @if (Auth::user()->role=='petugas')
            <div class="col-md-12">
            <table class="table" id="datatable">
                <thead class="text-primary">
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Petugas</th>
                    <th>Nama Pengawas</th>
                    <th>Jumlah Realisasi/hari</th>
                    <th>Status Validasi</th>
                    <th width="100x">Action</th>
                </tr>
                </thead>
               
                @foreach ($targets as $data)
                @if ($data->petugas->id == Auth::user()->id)
               <tr>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->petugas->name}}</td>
                    <td>{{ $data->pengawas->name}}</td>
                    <td>{{ $data->target }}</td>

                    @if($data->status == null)
                        <td>
   <span class="badge badge-pill badge-warning text-white"><b style="font-size:12px;">Menunggu Validasi</span>
                        </td>

                    @elseif($data->status == 1)
                        <td>
   <span class="badge badge-pill badge-success text-white"><b style="font-size:12px;">Valid</span>
                        </td>

                    @elseif($data->status == 2)
                        <td>
   <span class="badge badge-pill badge-danger text-white" style="margin-right: 100px"><b style="font-size:12px;">Tidak Valid</span>
                        </td>

                    @endif
                    <td>
                        <form action="{{ route('target.destroy',$data->id) }}" method="POST">
   <a href="{{ route('target.edit',$data->id) }}">
       <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm ">
           <i class="fa fa-edit"></i>
       </button>
   </a>
   @csrf
   @method('DELETE')
   <button type="submit" rel="tooltip" class="btn btn-danger btn-icon btn-sm ">
       <i class="fa fa-times"></i>
   </button>
                        </form>
                    </td>
                @endif

                </tr>
                @endforeach
                
            </table>
        </div>
        @endif

        @if (Auth::user()->role=='pengawas')
            <div class="col-md-12">
            <table class="table" id="datatable">
                <thead class="text-primary">
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Petugas</th>
                    <th>Nama Pengawas</th>
                    <th>Jumlah Realisasi/hari</th>
                    <th>Status Validasi</th>
                </tr>
                </thead>
               
                @foreach ($targets as $data)
                @if ($data->pengawas->id == Auth::user()->id)
               <tr>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->petugas->name}}</td>
                    <td>{{ $data->pengawas->name}}</td>
                    <td>{{ $data->target }}</td>

                    @if($data->status == null)
                        <td>
                            <a href="{{ route('target.valid', $data->id) }}" class="btn btn-primary btn-flat"><i class="fa fa-check"></i><b style="font-size:12px;">Validasi</a>
                        </td>

                    @elseif($data->status == 1)
                    <td>
                            <a href="{{ route('target.tdkvalid', $data->id) }}" class="btn btn-primary btn-flat"><i class="fa fa-check"></i><b style="font-size:12px;">Valid</a>
                        </td>
                        @elseif($data->status == 2)
                        <td>
                            <a href="{{ route('target.valid', $data->id) }}" class="btn btn-danger btn-flat"><i class="fa fa-times"></i><b style="font-size:12px;">Tidak Valid</a>
                        </td>

                    @endif
                   
                @endif

                </tr>
                @endforeach
                
            </table>
        </div>
        @endif
        </div>
    </div>
    @endsection