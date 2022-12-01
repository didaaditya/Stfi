@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Tambah history akademik
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
                       
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" name="status">
                                <option value="Hadir">Hadir</option>
                                <option value="Alfa">Alfa</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Izin">Izin</option>
                                <option value="Katolik">Katolik</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control  @error('keterangan') is-invalid @enderror"
                            name="keterangan">
                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
