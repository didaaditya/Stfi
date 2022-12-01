@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Siswa
                    </div>
                    <div class="card-body">
                        <form action="{{ route('absen.update', $ab->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Nama </label>
                                <select name="id_excel_test" id=""
                                    class="form-control @error('id_excel_test') is-invalid @enderror">
                                    @foreach ($excel as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_excel_test')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal masuk</label>
                                <input type="date" class="form-control  @error('tanggal') is-invalid @enderror"
                                    name="tanggal" value="{{ $ab->tanggal }}">
                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jam masuk</label>
                                <input type="text" class="form-control  @error('jam_masuk') is-invalid @enderror"
                                    name="jam_masuk" value="{{ $ab->jam_masuk }}">
                                @error('jam_masuk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                            <div class="mb-3">
                                <label class="form-label">Jam keluar</label>
                                <textarea class="form-control  @error('jam_keluar') is-invalid @enderror" name="jam_keluar"
                                 placeholder="Langsung tekan save saja">{{ $ab->jam_keluar }}</textarea>
                                @error('jam_keluar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
{{-- 
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status">
                                    <option selected></option>
                                    <option value="Hadir" {{ $ab->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                    <option value="Alfa" {{ $ab->status == 'Alfa' ? 'selected' : '' }}>Alfa
                                    </option>
                                    <option value="Sakit" {{ $ab->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                    <option value="Izin" {{ $ab->status == 'Izin' ? 'selected' : '' }}>Izin
                                    </option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}

                            <div class="mb-3">
                                <div class="d-flex justify-content-end align-items-center gap-2">
                                    <button class="btn btn-primary px-3" type="submit">Save</button>
                                    <a href="{{ route('absen.index') }}" class="btn btn-danger px-3">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
