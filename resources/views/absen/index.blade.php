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
                    ab Wali
                    <a href="{{route('absen.create')}}" class="float-right">
                        Tambah ab
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama Wali</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($ab as $ab)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$ab->nama}}</td>
                                    <td>{{$ab->excel->nama}}</td>
                                    <td>
                                        <form action="{{route('absen.destroy',$ab->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('absen.show',$ab->id)}}" class="btn btn-sm btn-success">Lihat</a> |
                                            <a href="{{route('absen.edit',$ab->id)}}" class="btn btn-sm btn-info">Edit</a> |
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