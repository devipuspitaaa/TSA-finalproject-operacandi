@extends('template')
@section('content')
<br></br>
<br></br>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <center>
                <h2 class="card-title"><strong> DATA PENGAWAS</strong> </h2>
            </center>
            <br>
            @if (Auth::user()->role=='admin')
            <a class="btn btn-success" href="{{ route('pengawas.create') }}"> Tambah Data</a>
            @endif
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead class="text-primary">
                        <tr>
                            <th>
                                Nama Lengkap
                            </th>
                            <th>
                                Jenis Survei
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
                        @foreach ($pengawas as $data)
                        <tr>
                            <td>{{ $data->nama_lengkap }}</td>
                            <td>{{ $data->survei->nama_survei }}</td>
                            <td>{{ $data->no_ktp }}</td>
                            <td>{{ $data->jenis_kelamin }}</td>
                            <td>{{ $data->tempat_tanggal_lahir }}</td>
                            <td>{{ $data->no_tlp }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->nip }}</td>
                            @if (Auth::user()->role=='admin')
                            <td>
                                <form action="{{ route('pengawas.destroy',$data->id) }}" method="POST">
                                    <a href="{{ route('pengawas.edit',$data->id) }}">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection