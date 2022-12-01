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
                        <form action="{{ route('absen.update', $excel->id) }}" method="post">
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
                                <label class="form-label">Status</label>
                                <input type="text" class="form-control  @error('status') is-invalid @enderror"
                                    name="status" value="{{ $ab->status }}">
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea class="form-control  @error('keterangan') is-invalid @enderror" name="keterangan">{{ $ab->keterangan }}</textarea>
                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-end align-items-center gap-2">
                                    <a href="{{ route('excel.index') }}" class="btn btn-danger px-3">Batal</a>
                                    <button class="btn btn-primary px-3" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
