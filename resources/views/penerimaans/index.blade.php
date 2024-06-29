@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Penerimaan</h2>

    <a href="{{ route('penerimaans.create') }}" class="btn btn-primary mb-4">Tambah Penerimaan</a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Penerimaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penerimaans as $penerimaan)
                <tr>
                    <td>{{ $penerimaan->id }}</td>
                    <td>{{ $penerimaan->nama_barang}}</td>
                    <td>{{ $penerimaan->jumlah }}</td>
                    <td>{{ $penerimaan->tanggal}}</td>
                    <td>
                        <a href="{{ route('penerimaans.edit', $penerimaan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('penerimaans.destroy', $penerimaan->id) }}" method="POST" class="d-inline">
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
