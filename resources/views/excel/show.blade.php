@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                     Data Dosen
                </div>
                <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label">Foto</label>
                         @if (isset($excel) && $excel->foto)
                         <p>
                         <img src="{{ asset('images/excel/' . $excel->foto) }}" class="img-rounded img-responsive" style="width: 300px; height:350px;" alt="">
                         </p>
                         @endif
                     </div>
                    <div class="form-group">
                        <label for="">Nama Panjang</label>
                        <input type="text" name="a" value="{{$excel->nama}}" class="form-control" readonly>
                    </div> 
                     <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{$excel->tempat_lahir}},{{ date('d M Y', strtotime($excel->tanggal_lahir)) }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Agama</label>
                        <input type="text" name="a" value="{{$excel->agama}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <input type="text" name="b" value="{{$excel->jk}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">NIK</label>
                        <input type="text" name="a" value="{{$excel->nik}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Pendidikan</label>
                        <input type="text" name="b" value="{{$excel->pendidikan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="b" value="{{$excel->alamat}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection