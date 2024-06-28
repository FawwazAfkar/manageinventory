@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Barang</h1>
    <div class="card">
        <div class="card-header">
            {{ $barang->nama }}
        </div>
        <div class="card-body">
            <p><strong>Deskripsi:</strong> {{ $barang->deskripsi }}</p>
            <p><strong>Stok:</strong> {{ $barang->stok }}</p>
            <p><strong>Harga:</strong> {{ $barang->harga }}</p>
            <p><strong>Kategori:</strong> {{ $barang->kategori->nama }}</p>
            <p><strong>Supplier:</strong> {{ $barang->supplier->nama }}</p>
        </div>
    </div>
    <a href="{{ route('barangs.index') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
