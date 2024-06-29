@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Barang</h2>

    <a href="{{ route('barangs.create') }}" class="btn btn-primary mb-4">Tambah Barang</a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
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
                @foreach ($barangs as $barang)
                <tr>
                    <td>{{ $barang->nama }}</td>
                    <td>{{ $barang->deskripsi }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>Rp {{ number_format($barang->harga, 2, ',', '.') }}</td>
                    <td>{{ $barang->nama_kategori }}</td>
                    <td>{{ $barang->nama_supplier }}</td>
                    <td>
                        <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
