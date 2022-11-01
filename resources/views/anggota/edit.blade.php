@extends('adminlte::page')

@section('title', 'Edit Anggota')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Anggota</h1>
@stop

@section('content')
    <form action="{{route('anggota.update', $anggota)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputName">Nama Lengkap</label>
                        <input type="text" class="form-control @error('namalengkap') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="namalengkap" value="{{$anggota->namalengkap ?? old('namalengkap')}}">
                        @error('namalengkap') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">NIS</label>
                        <input type="text" class="form-control @error('nis') is-invalid @enderror" id="exampleInputEmail" placeholder="NIS" name="nis" value="{{$anggota->nis ?? old('nis')}}" maxlength="5">
                        @error('nis') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Jenis Kelamin</label>
                        <input type="text" class="form-control @error('jeniskelamin') is-invalid @enderror" id="exampleInputPassword" placeholder="Jenis Kelamin" name="jeniskelamin" value="{{$anggota->jeniskelamin ?? old('jeniskelamin')}}">
                        @error('jeniskelamin') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Jurusan</label>
                        <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="exampleInputPassword" placeholder="Jurusan" name="jurusan" value="{{$anggota->jurusan ?? old('jurusan')}}">
                        @error('jurusan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('anggota.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop