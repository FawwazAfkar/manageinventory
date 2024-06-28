@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Penerimaan</h1>
    <a href="{{ route('penerimaans.create') }}" class="btn btn-primary">Tambah Penerimaan</a>
    <table class="table">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penerimaans as $penerimaan)
                <tr>
                    <td>{{ $penerimaan->barang->nama }}</td>
                    <td>{{ $penerimaan->jumlah }}</td>
                    <td>{{ $penerimaan->tanggal }}</td>
                    <td>
                        <a href="{{ route('penerimaans.show', $penerimaan) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('penerimaans.edit', $penerimaan) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('penerimaans.destroy', $penerimaan) }}" method="POST" style="display:inline-block;">
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
