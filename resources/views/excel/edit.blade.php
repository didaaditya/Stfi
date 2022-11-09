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
                        <form action="{{ route('excel.update', $excel->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Foto Wali</label>
                                @if (isset($excel) && $excel->foto)
                                    <p>
                                        <img src="{{ asset('images/excel/' . $excel->foto) }}"
                                            class="img-rounded img-responsive" style="width: 300px; height:350px; object-fit: cover; object-position: center;"
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

                            <div class="input-group mb-3">
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
                                <label class="form-label">Kewarganegaraan</label>
                                <input type="text" class="form-control  @error('kewarganegaraan') is-invalid @enderror"
                                    name="kewarganegaraan" value="{{ $excel->kewarganegaraan }}">
                                @error('kewarganegaraan')
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
                                <label class="form-label">Wilayah (Kec-Kota/Kab - Provinsi-Negara)</label>
                                <textarea class="form-control  @error('wilayah') is-invalid @enderror" name="wilayah">{{ $excel->wilayah }}</textarea>
                                @error('wilayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Ayah</label>
                                <textarea class="form-control  @error('ayah') is-invalid @enderror" name="ayah">{{ $excel->ayah }}</textarea>
                                @error('ayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Ibu</label>
                                <textarea class="form-control  @error('ibu') is-invalid @enderror" name="ibu">{{ $excel->ibu }}</textarea>
                                @error('ibu')
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
