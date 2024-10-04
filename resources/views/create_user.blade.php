@extends('layouts.app')

@section('content')
<div class="container mt-5" style="background-color: #ffe6f2; border-radius: 10px; padding: 30px;">
    <h2 class="mb-4" style="color: #ff66b3;">Tambah Pengguna</h2>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label" style="color: #ff66b3;">Nama:</label>
            <input type="text" id="nama" name="nama" class="form-control" style="border: 2px solid #ff66b3;" required>
        </div>
        <div class="mb-3">
            <label for="npm" class="form-label" style="color: #ff66b3;">NPM:</label>
            <input type="text" id="npm" name="npm" class="form-control" style="border: 2px solid #ff66b3;" required>
        </div>
        <div class="mb-3">
            <label for="kelas_id" class="form-label" style="color: #ff66b3;">Kelas:</label>
            <select name="kelas_id" id="kelas_id" class="form-select" style="border: 2px solid #ff66b3;" required>
                <option value="" disabled selected>Pilih Kelas</option>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #ff66b3; border-color: #ff66b3;">Submit</button>
    </form>
</div>
@endsection