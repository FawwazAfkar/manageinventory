@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Kategori</h2>

    <a href="{{ route('kategoris.create') }}" class="btn btn-primary mb-4">Tambah Kategori</a>
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
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
</div>
@endsection
