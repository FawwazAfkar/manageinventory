@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Supplier</h1>
    <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Tambah Supplier</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->nama }}</td>
                    <td>{{ $supplier->alamat }}</td>
                    <td>{{ $supplier->telepon }}</td>
                    <td>
                        <a href="{{ route('suppliers.show', $supplier) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display:inline-block;">
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
