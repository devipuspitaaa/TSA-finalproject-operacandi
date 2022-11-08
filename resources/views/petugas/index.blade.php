@extends('template')
@section('content')
<br></br>
<br></br>

<div class="col-md-12">
    <div class="card " style="background-color: #ffc800; padding-top:10px; padding-bottom:15px;">
        <div class="card-header">
            <center>
                <h2 class="card-title"><strong> Data Petugas</strong> </h2>
            </center>
            </div>
        </div>
            <div class="card" style="padding-top:20px; padding-right:30px;">
                <br>
            @if (Auth::user()->role=='admin')
            <a class="btn btn-success my-2" href="{{ route('petugas.create') }}" style="width: 150px; margin-left:20px;"> Tambah Data</a>
            @endif
            
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="">
                <table class="table" id="datatable">
                    <thead class="text-primary">
                        <tr>
                            <th>
                                Nama Lengkap
                            </th>
                            <th>
                                Nama Pengawas
                            </th>
                            <th>
                                No KTP
                            </th>
                            <th>
                                Jenis Kelamin
                            </th>
                            <th>
                                Tanggal Lahir
                            </th>
                            <th>
                                No. Telepon
                            </th>
                            <th>
                                Alamat
                            </th>
                            <th>
                                NIP
                            </th>
                            @if (Auth::user()->role=='admin')
                            <th class="text-right">
                                Actions
                            </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($petugas as $data)
                        <tr>
                            <td>{{ $data->nama_lengkap }}</td>
                            <td>{{ $data->pengawas->name }}</td>
                            <td>{{ $data->no_ktp }}</td>
                            <td>{{ $data->jenis_kelamin }}</td>
                            <td>{{ $data->tempat_tanggal_lahir }}</td>
                            <td>{{ $data->no_tlp }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->nip }}</td>
                            @if (Auth::user()->role=='admin')
                            <td>
                                <!-- <form action="{{ route('petugas.destroy',$data->id) }}" method="POST">
                                    <a href="{{ route('petugas.edit',$data->id) }}">
                                        <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm ">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" rel="tooltip" class="btn btn-danger btn-icon btn-sm ">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form> -->
                                <a href="{{ route('petugas.edit',$data->id) }}">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm ">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                                <a href="{{ url('petugas/hapus/'. $data->id) }}" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-danger btn-icon btn-sm "><i class="fa fa-times"></i></a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection