@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/ab') }}" class="btn btn-sm btn-success" style="float: left"> 
                                Export To Excel
                    </a>
                    <a href="{{route('absen.create')}}" class="btn btn-sm btn-primary" style="float: right">
                        Tambah ab
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle" id="dataTable" >
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama Dosen</th>
                                    <th>Nama Wali</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($ab as $data)
                                {{-- @dd($data->excelTest->nama); --}}
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->excelTest->nama}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>
                                        <form action="{{route('absen.destroy',$data->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('absen.show',$data->id)}}" class="btn btn-sm btn-success">Lihat</a> |
                                            <a href="{{route('absen.edit',$data->id)}}" class="btn btn-sm btn-info">Edit</a> |
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin ?')">
                                                Hapus
                                            </button>
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
