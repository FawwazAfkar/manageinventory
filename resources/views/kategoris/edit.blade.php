@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kategori</h1>
    <form action="{{ route('kategoris.update', $kategori) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $kategori->nama }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
