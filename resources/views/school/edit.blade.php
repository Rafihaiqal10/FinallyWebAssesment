@extends('layouts.main')

@section('content')

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Formulir Data Siswa</title>
</head>

<body>
<div class="container mt-5">
    <form method="POST" action="/dashboard/updateKelas/{{$kelas->id}}">
        @csrf
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="name" placeholder="Masukkan Nama" value="{{ $kelas->name }}">
        </div>
        <button type="submit" class="btn btn-primary">edit</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
@endsection
