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
                        <form action="{{ route('excel.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                    name="foto">
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text">Tempat,Tanggal Lahir</span>
                                 <input type="text" class="form-control @error('tempat_lahir') is invalid @enderror"
                                    name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="date" class="form-control @error('tanggal_lahir') is invalid @enderror"
                                    name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Jenis kelamin</label>
                                <select class="form-select @error('jk') is-invalid @enderror" name="jk">
                                    <option selected>Pilih Salah Satu</option>
                                    <option value="laki-laki">Laki - laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                                @error('jk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                            <div class="mb-3">
                                <label class="form-label">Agama</label>
                                <select class="form-select @error('agama') is-invalid @enderror" name="agama">
                                    <option selected>Pilih Salah Satu</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                    <option value="Katolik">Katolik</option>
                                </select>
                                @error('agama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Keawarganegaraan</label>
                            <input type="text" class="form-control  @error('kewarganegaraan') is-invalid @enderror"
                                name="kewarganegaraan" value="{{ old('kewarganegaraan') }}">
                            @error('kewarganegaraan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control  @error('alamat') is-invalid @enderror"
                                name="alamat" value="{{ old('alamat') }}">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Wilayah (Kec-Kota/Kab - Provinsi-Negara)</label>
                            <input type="text" class="form-control  @error('wilayah') is-invalid @enderror"
                                name="wilayah" value="{{ old('wilayah') }}">
                            @error('wilayah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Ayah</label>
                            <input type="text" class="form-control  @error('ayah') is-invalid @enderror"
                                name="ayah" value="{{ old('ayah') }}">
                            @error('ayah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control  @error('ibu') is-invalid @enderror"
                                name="ibu" value="{{ old('ibu') }}">
                            @error('ibu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-end align-items-center gap-2">
                                    <button class="btn btn-primary px-3" type="submit">Save</button>
                                    <a href="{{ route('excel.index') }}" class="btn btn-danger px-3">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
