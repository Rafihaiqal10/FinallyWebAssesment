@extends('layouts.main')

@section('content')
    <h1>Ini adalah halaman Kelas!</h1>

    <a href="/school/tambah">
        <button class="btn btn-success" >Tambah</button>
    </a>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{session ('success')}}
        </div>
    @endif

    <div class="container mt-5">

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($kelas as $data)

                <tr>
                    <td>{{$no}}</td>
                    <td>{{ $data->name }}</td>
                    <td class="d-flex justify-content-evenly">
                        <a href="/school/edit/{{ $data->id }}">
                            <button class="btn btn-warning">Edit</button>
                        </a>

                        <form  method="POST" action="/school/delete/{{ $data->id }}" class="inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')">Delete</button>
                        </form>

                        <a href="">
                            <button class="btn btn-primary">Detail</button>
                        </a>
                    </td>

                </tr>

                @php
                    $no++;
                @endphp
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
