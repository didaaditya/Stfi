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
                         @if (isset($data) && $data->foto)
                         <p>
                         <img src="{{ asset('images/excel/' . $data->foto) }}" class="img-rounded img-responsive" style="width: 300px; height:350px;" alt="">
                         </p>
                         @endif
                     </div>
                    <div class="form-group">
                        <label for="">Nama Panjang</label>
                        <input type="text" name="a" value="{{$data->nama}}" class="form-control" readonly>
                    </div> 
                     <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir" value="{{$data->tanggal_lahir}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Agama</label>
                        <input type="text" name="a" value="{{$data->agama}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <input type="text" name="b" value="{{$data->jk}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">NIK</label>
                        <input type="text" name="a" value="{{$data->nik}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Pendidikan</label>
                        <input type="text" name="b" value="{{$data->pendidikan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="b" value="{{$data->alamat}}" class="form-control" readonly>
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