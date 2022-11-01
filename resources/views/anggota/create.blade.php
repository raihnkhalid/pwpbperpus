@extends('adminlte::page')

@section('title', 'Tambah Anggota')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Anggota</h1>
@stop

@section('content')
    <form action="{{route('anggota.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputName">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="namalengkap" value="{{old('namalengkap')}}">
                        @error('namalengkap') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">NIS</label>
                        <input type="text" class="form-control @error('nis') is-invalid @enderror" id="exampleInputEmail" placeholder="NIS" name="nis" value="{{old('nis')}}" maxlength="5">
                        @error('nis') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Jenis Kelamin</label>
                        <input type="text" class="form-control @error('jeniskelamin') is-invalid @enderror" id="exampleInputPassword" placeholder="Jenis Kelamin" name="jeniskelamin" value="{{old('jeniskelamin')}}">
                        @error('jeniskelamin') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Jurusan</label>
                        <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="exampleInputPassword" placeholder="Jurusan" name="jurusan" value="{{old('jurusan')}}">
                        @error('jurusan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{route('anggota.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop