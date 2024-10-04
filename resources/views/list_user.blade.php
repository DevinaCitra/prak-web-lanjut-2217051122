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
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Kelas</th>
                    <th class="aksi-col">Aksi</th> <!-- Assign class here -->
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user) 
                <tr>
                    <td>{{ $user->id }}</td> 
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->npm }}</td>
                    <td>{{ $user->nama_kelas }}</td>    
                    <td class="aksi-col">
                        <!-- Add your action buttons or icons here -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
