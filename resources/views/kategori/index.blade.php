@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Kategori</h1>
    <a href="{{ route('kategoris.create') }}" class="btn btn-primary">Tambah Kategori</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->nama }}</td>
                    <td>
                        <a href="{{ route('kategoris.show', $kategori) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('kategoris.edit', $kategori) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('kategoris.destroy', $kategori) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
