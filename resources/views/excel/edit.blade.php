@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        data dosen
                    </div>
                    <div class="card-body">
                            <div class="mb-3">
                                    <label class="form-label">Foto Wali</label>
                                    @if (isset($excel) && $excel->foto)
                                        <p>
                                            <img src="{{ asset('images/excel/' . $excel->foto) }}"
                                                class="img-rounded img-responsive" style="width: 300px; height:350px;"
                                                alt="">
                                        </p>
                                    @endif
                                    <input type="file" class="form-control  @error('foto') is-invalid @enderror"
                                        name="foto" value="{{ $excel->nama }}">
                                    @error('foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        <form action="{{ route('excel.update', $excel->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ $excel->nama }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Tempat,Tanggal Lahir</span>
                                 <input type="text" class="form-control @error('tempat_lahir') is invalid @enderror"
                                    name="tempat_lahir" value="{{ $excel->tempat_lahir }}">
                                @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="date" class="form-control @error('tanggal_lahir') is invalid @enderror"
                                    name="tanggal_lahir" value="{{ $excel->tanggal_lahir }}">
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                            <div class="mb-3">
                                <label class="form-label">Agama</label>
                                <select class="form-select @error('agama') is-invalid @enderror" name="agama">
                                    <option selected>Pilih Salah Satu</option>
                                    <option value="Islam" {{ $excel->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ $excel->agama == 'Kristen' ? 'selected' : '' }}>Kristen
                                    </option>
                                    <option value="Budha" {{ $excel->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                                    <option value="Konghucu" {{ $excel->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu
                                    </option>
                                    <option value="Katolik" {{ $excel->agama == 'Katolik' ? 'selected' : '' }}>Katolik
                                    </option>
                                </select>
                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis kelamin</label>
                                <select class="form-select @error('jk') is-invalid @enderror" name="jk">
                                    <option selected>Pilih Salah Satu</option>
                                    <option value="laki-laki" {{ $excel->jk == 'laki-laki' ? 'selected' : '' }}>Laki - laki</option>
                                    <option value="perempuan" {{ $excel->jk == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control  @error('nik') is-invalid @enderror"
                                    name="nik" value="{{ $excel->nik }}">
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pendidikan</label>
                                <input type="text" class="form-control  @error('pendidikan') is-invalid @enderror"
                                    name="pendidikan" value="{{ $excel->pendidikan }}">
                                @error('pendidikan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control  @error('alamat') is-invalid @enderror" name="alamat">{{ $excel->alamat }}</textarea>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection