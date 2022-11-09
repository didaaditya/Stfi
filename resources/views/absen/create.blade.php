@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tambah Data Wali
                </div>
                <div class="card-body">
                    <form action="{{route('absen.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Masukan Nama</label>
                            {{-- <input type="text" name="id_mahasiswa"> --}}
                            <select name="id_excel_test" class="form-control" required>
                                @foreach($excel as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Wali</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <a href="{{ route('absen.index') }}" class="btn btn-danger px-3">Batal</a>
                            <button type="submit" class="btn btn-primary px-3 ms-2">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
