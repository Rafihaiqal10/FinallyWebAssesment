@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <form method="POST" action="/dashboard/add">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}">

            </div>
            <div class="form-group">
                <label for="nis">NIS:</label>
                <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" value="{{ old('nis') }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Kelas</label>
                <select class="form-select" name="kelass_id" id="">
                    @foreach($kelas as $data)
                        <option name="kelass_id" value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach
                </select>
                {{--            <input type="text" class="form-control" id="kelas" name="kelas" value="{{old('kelas')}}">--}}
            </div>
            <div class="form-group">
                <label for="kelas">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
            </div>
            <div class="form-group">
                <label for="kelas">tanggal lahir:</label>
                <input type="Date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal lahir" value="{{ old('tgl_lahir') }}">
            </div>
            <button type="submit" class="btn btn-primary">Add Data</button>
        </form>
    </div>
@endsection
