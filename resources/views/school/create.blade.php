@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <form method="POST" action="/dashboard/addKelas">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Kelas:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" value="{{ old('name') }}">

            </div>
            <button type="submit" class="btn btn-primary">Add Data</button>
        </form>
    </div>
@endsection
