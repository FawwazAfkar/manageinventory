@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ isset($supplier) ? 'Edit Supplier' : 'Tambah Supplier' }}</h2>
    <form action="{{ isset($supplier) ? route('suppliers.update', $supplier->id) : route('suppliers.store') }}" method="POST">
        @csrf
        @if (isset($supplier)) @method('PUT') @endif

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $supplier->nama ?? '') }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat', $supplier->alamat ?? '') }}</textarea>
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($supplier) ? 'Update Supplier' : 'Tambah Supplier' }}</button>
    </form>
</div>
@endsection
