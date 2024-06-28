@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Barang</h1>
    <a href="{{ route('barangs.create') }}" class="btn btn-primary">Tambah Barang</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Supplier</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $barang)
                <tr>
                    <td>{{ $barang->nama }}</td>
                    <td>{{ $barang->deskripsi }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>{{ $barang->harga }}</td>
                    <td>{{ $barang->kategori->nama }}</td>
                    <td>{{ $barang->supplier->nama }}</td>
                    <td>
                        <a href="{{ route('barangs.view', $barang) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('barangs.edit', $barang) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('barangs.destroy', $barang) }}" method="POST" style="display:inline-block;">
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
