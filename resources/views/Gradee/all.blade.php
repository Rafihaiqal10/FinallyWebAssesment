@extends('layouts.main')

@section('content')
    <h1>{{$title}}</h1>

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
        @foreach ($grade as $kelas)

            <tr>
                <td>{{$no}}</td>
                <td>{{ $kelas->nama_kelas }}</td>
                <td class="d-flex justify-content-evenly">
                    <a href="/edit/{{ $kelas->id }}">
                        <button class="btn btn-warning">Edit</button>
                    </a>

                    <form  method="POST" action="/delete/{{ $kelas->id }}" class="inline">
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
@endsection
