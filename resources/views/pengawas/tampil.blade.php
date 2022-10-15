@extends('template')
@section('content')
<br></br>
<br></br>
<br></br>
<div class="row g-2">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
        </div>

        <!-- Form Search -->

        <div class="float-left my-3 mx-5">
            <form action="{{route('pengawas.tampil')}}" class="row g-3" method="GET">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="search" placeholder="Cari...">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i> Cari data</button>
                    </span>
                </div>
            </form>
        </div>
        <!-- End Form Search -->

    </div>
</div>
<div class="col-xl-12 col-md-2">

    <table class="table table-bordered">
        <tr>
            <th>Nama Lengkap</th>
            <th>No KTP</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Tanggal lahir</th>
            <th>No Telepon</th>
            <th>Alamat</th>
            <th>NIP</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($pengawas as $data)
        <tr>

            <td>{{ $data->nama_lengkap }}</td>
            <td>{{ $data->no_ktp }}</td>
            <td>{{ $data->jenis_kelamin }}</td>
            <td>{{ $data->tempat_tanggal_lahir }}</td>
            <td>{{ $data->no_tlp }}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->nip }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection