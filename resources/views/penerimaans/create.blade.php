@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Penerimaan</h1>
    <form action="{{ route('penerimaans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_barang">Barang</label>
            <select class="form-control" id="id_barang" name="id_barang" required>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
