@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">{{ isset($barang) ? 'Edit Barang' : 'Tambah Barang' }}</h2>
    <form action="{{ isset($barang) ? route('barangs.update', $barang->id) : route('barangs.store') }}" method="POST">
        @csrf
        @if (isset($barang)) @method('PUT') @endif

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $barang->nama ?? '') }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi">{{ old('deskripsi', $barang->deskripsi ?? '') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok', $barang->stok ?? '') }}">
            @error('stok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" step="0.01" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $barang->harga ?? '') }}">
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select class="form-select @error('id_kategori') is-invalid @enderror" id="id_kategori" name="id_kategori">
                <option value="">Pilih Kategori</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ (old('id_kategori', $barang->id_kategori ?? '') == $kategori->id) ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
            @error('id_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_supplier" class="form-label">Supplier</label>
            <select class="form-select @error('id_supplier') is-invalid @enderror" id="id_supplier" name="id_supplier">
                <option value="">Pilih Supplier</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ (old('id_supplier', $barang->id_supplier ?? '') == $supplier->id) ? 'selected' : '' }}>
                        {{ $supplier->nama }}
                    </option>
                @endforeach
            </select>
            @error('id_supplier')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($barang) ? 'Update Barang' : 'Tambah Barang' }}</button>
    </form>
</div>
@endsection
