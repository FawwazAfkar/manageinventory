@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ isset($kategori) ? 'Edit Kategori' : 'Tambah Kategori' }}</h2>
    <form action="{{ isset($kategori) ? route('kategoris.update', $kategori->id) : route('kategoris.store') }}" method="POST">
        @csrf
        @if (isset($kategori)) @method('PUT') @endif

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $kategori->nama ?? '') }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($kategori) ? 'Update Kategori' : 'Tambah Kategori' }}</button>
    </form>
</div>
@endsection
