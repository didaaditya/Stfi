@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                   <a href="{{ route('absen.create') }}" class="btn btn-sm btn-primary" style="float: right">
                               Tambah Data
                    </a>
                    <a href="{{ url('/ab') }}" class="btn btn-sm btn-success" style="float: left">
                                Export To Excel
                    </a>
                </div>
                <div class="card-body" >
                    <div class="table-responsive">
                        <table class="table align-middle" id="dataTable" border="1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal masuk</th>
                                    <th>Jam masuk</th>
                                    <th>Jam keluar</th>
                                    <th>Total Jam Kerja</th>
                                    <th>Rekap</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($ab as $data)
                                {{-- @dd($data->excelTest->nama); --}}
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->ExcelTest->nama}}</td>
                                    <td>{{$data->tanggal}}</td>
                                    <td>{{$data->jam_masuk}}</td>
                                    <td>{{$data->jam_keluar}}</td>
                                    <td>{{$data->status}}</td>
                                    <td></td>
                                    
                                    <td >
                                        <form action="{{route('absen.destroy',$data->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('absen.show',$data->id)}}" 
                                                class="btn btn-sm btn-outline-success">
                                                Lihat
                                            </a> |
                                            <a href="{{route('absen.edit',$data->id)}}"
                                                 class="btn btn-sm btn-outline-warning">
                                                 Edit
                                                </a> |
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                             onclick="return confirm('Apakah Anda Yakin ?')">
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
