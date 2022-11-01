@extends('adminlte::page')

@section('title', 'List Anggota')

@section('content_header')
    <h1 class="m-0 text-dark">List Anggota</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('anggota.create')}}" class="btn btn-primary mb-2">
                        Tambah Anggota
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Jenis Kelamin</th>
                            <th>Jurusan</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($anggota as $key => $anggota)
                            <tr>
                                <td>{{$anggota->namalengkap}}</td>
                                <td>{{$anggota->nis}}</td>
                                <td>{{$anggota->jeniskelamin}}</td>
                                <td>{{$anggota->jurusan}}</td>
                                <td>
                                    <a href="{{route('anggota.edit', $anggota)}}" class="btn btn-primary btn-sm">
                                        Edit
                                    </a>
                                    <a href="{{route('anggota.destroy', $anggota)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-sm">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus anggota ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush