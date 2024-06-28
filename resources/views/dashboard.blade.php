@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('barangs.index') }}" class="btn btn-primary btn-block">Manajemen Barang</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('suppliers.index') }}" class="btn btn-primary btn-block">Manajemen Supplier</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('penerimaans.index') }}" class="btn btn-primary btn-block">Manajemen Penerimaan</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('kategoris.index') }}" class="btn btn-primary btn-block">Manajemen Kategori</a>
        </div>
    </div>
</div>
@endsection
