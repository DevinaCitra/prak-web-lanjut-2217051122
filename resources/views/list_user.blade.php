@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #fbc2eb, #a6c1ee);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .table thead {
        background-color: #f8bbd0;
        color: white;
    }

    /* Ensure the Aksi column remains white */
    .aksi-col {
        background-color: white !important;
    }
</style>

<div class="container mt-5 table-container">
    <h2 class="mb-4 text-center" style="color: #d63384;">Daftar Pengguna</h2>
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center">
            <thead class="thead-dark">
            <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user) 
                <tr>
                    <td>{{ $user->id }}</td> 
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->npm }}</td>
                    <td>{{ $user->nama_kelas }}</td>    
                    <td><a href="{{ route('user.show', $user->id) }}" class = "btn btn-warning mb-3">Detail</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
