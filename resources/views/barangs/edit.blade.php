@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Barang</h1>
    <form action="{{ route('barangs.update', $barang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $barang->nama }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $barang->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="{{ $barang->stok }}" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" step="0.01" class="form-control" id="harga" name="harga" value="{{ $barang->harga }}" required>
        </div>
        <div class="form-group">
            <label for="id_kategori">Kategori</label>
            <select class="form-control" id="id_kategori" name="id_kategori" required>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" @if($barang->id_kategori == $kategori->id) selected @endif>{{ $kategori->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_supplier">Supplier</label>
            <select class="form-control" id="id_supplier" name="id_supplier" required>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" @if($barang->id_supplier == $supplier->id) selected @endif>{{ $supplier->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
