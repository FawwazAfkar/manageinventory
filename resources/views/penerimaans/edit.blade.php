@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Penerimaan</h1>
    <form action="{{ route('penerimaans.update', $penerimaan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_barang">Barang</label>
            <select class="form-control" id="id_barang" name="id_barang" required>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}" @if($penerimaan->id_barang == $barang->id) selected @endif>{{ $barang->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $penerimaan->jumlah }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $penerimaan->tanggal }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
