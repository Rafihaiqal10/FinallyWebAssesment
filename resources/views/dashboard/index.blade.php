@extends('layouts.mainDashboard')

@section('content')
    <h1>
        Selamat Datang, {{ auth()->user()->name }}
    </h1>
    <a href="/dashboard/tambah">
        <button class="btn btn-success" >Tambah</button>
    </a>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{session ('success')}}
        </div>
    @endif

    @if (session()->has('loginEror'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{session ('loginEror')}}
        </div>
    @endif

    <div class="container mt-5">

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Nis</th>
                <th scope="col">Kelas</th>
                <th scope="col">Alamat</th>
                <th scope="col">Ttl</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($students as $student )

                <tr>
                    <td>{{$no}}</td>
                    <td>{{ $student->nama }}</td>
                    <td>{{ $student->nis }}</td>
                    <td>
                        @if ($student->school)
                            {{ $student->school->name }}
                        @else
                            No Class
                        @endif
                    </td>
                    <td>{{ $student->alamat }}</td>
                    <td>{{ $student->tgl_lahir }}</td>
                    <td class="d-flex gap-2">

                        <a href="/dashboard/edit/{{ $student->id }}">
                            <button class="btn btn-warning">Edit</button>
                        </a>


                        <form  method="POST" action="/dashboard/delete/{{ $student->id }}" class="inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')">Delete</button>
                        </form>

                        <button type="button" class="detail btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$student->id}}">Detail</button>
                        {{-- Detail --}}
                        <div class="modal fade" id="staticBackdrop{{$student->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-hover table-bordered caption-top table-responsive table align-middle">
                                            <thead>
                                            <tr class="table-dark">,
                                                <th scope="col">Nama</th>
                                                <th scope="col">NIS</th>
                                                <th scope="col">Kelas</th>
                                                <th scope="col">Ttl</th>
                                                <th scope="col">Alamat</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{ $student->nama }}</td>
                                                <td>{{ $student->nis }}</td>
                                                <td>{{ $student->school->name ?? "Class Not Found" }}</td>
                                                <td>{{ $student->tgl_lahir }}</td>
                                                <td>{{ $student->alamat }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                </tr>

                @php
                    $no++;
                @endphp
            @endforeach
            </tbody>
        </table>
                <div class="d-flex justify-content-end bg-red">
                    {{$students->links()}}
                </div>
    </div>
@endsection
