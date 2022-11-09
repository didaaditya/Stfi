@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                       <a href="{{ url('/export') }}" class="btn btn-sm btn-success" style="float: left"> 
                                Export To Excel
                            </a>
                        <a href="{{ route('excel.create') }}" class="btn btn-sm btn-primary" style="float: right">
                            Tambah Data
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle" id="dataTable" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>foto</th>
                                        <th>Nama</th>
                                        <th>Tempat,Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Kewarganegaraan</th>
                                        <th>Alamat</th>
                                        <th>Wilayah</th>
                                        <th>Nama Ayah</th>
                                        <th>Nama Ibu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($excel as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <img src="{{ $data->image() }}" style="width: 100px; height: 100px;" alt="">
                                            </td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->tempat_lahir }},{{ date('d M Y', strtotime($data->tanggal_lahir)) }}</td>
                                            <td>{{ $data->jk }}</td>
                                            <td>{{ $data->agama }}</td>
                                            <td>{{ $data->kewarganegaraan }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>{{ $data->wilayah }}</td>
                                            <td>{{ $data->ayah }}</td>
                                            <td>{{ $data->ibu }}</td>
                                            <td>
                                                <form action="{{ route('excel.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href= " {{ route('excel.show', $data->id) }} " class="btn btn-sm btn-success " > Show </a> |
                                                    <a href= " {{ route('excel.edit', $data->id) }} " class="btn btn-sm btn-info " > Edit </a> |
                                                    <button type="submit" class="btn btn-sm btn-danger"onclick="return confirm('Apakah Anda Yakin?')"> Delete </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
