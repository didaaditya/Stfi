@extends('layouts.master')
@section('content')
<div class="container">
        <div class="row">
            <div class="col">
                <table>
                    <div class="mb-3">
                            <label class="form-label">Foto</label>
                             @if (isset($excel) && $excel->foto)
                             <p>
                             <img src="{{ asset('images/excel/' . $excel->foto) }}" class="img-rounded img-responsive" style="width: 300px; height:350px; object-fit: cover; object-position: center;" alt="">
                             </p>
                             @endif
                         </div>
                        </table>
            </div>
            <div class="col">
                <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                     Data Dosen
                </div>
                <div class="card-body">
                     
                    <div class="form-group">
                        <label for="">Nama Panjang</label>
                        <input type="text" name="a" value="{{$excel->nama}}" class="form-control" readonly>
                    </div>
                     <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{$excel->tempat_lahir}},{{ date('d M Y', strtotime($excel->tanggal_lahir)) }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <input type="text" name="b" value="{{$excel->jk}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Agama</label>
                        <input type="text" name="a" value="{{$excel->agama}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Kewarganegaraan</label>
                        <input type="text" name="a" value="{{$excel->kewarganegaraan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="b" value="{{$excel->alamat}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Wilayah (Kec-Kota/Kab - Provinsi-Negara)</label>
                        <input type="text" name="b" value="{{$excel->wilayah}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Ayah</label>
                        <input type="text" name="b" value="{{$excel->ayah}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Ibu</label>
                        <input type="text" name="b" value="{{$excel->ibu}}" class="form-control" readonly>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
@endsection
