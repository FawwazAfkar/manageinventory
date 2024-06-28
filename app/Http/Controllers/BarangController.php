<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barangs.index', compact('barangs'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $suppliers = Supplier::all();
        return view('barangs.create', compact('kategoris', 'suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'id_kategori' => 'required|exists:suppliers,id_kategori',
        ]);

        Barang::create($validated);
        return redirect()->route('barangs.index');
    }

    public function view(Barang $barang)
    {
        return view('barangs.view', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        $kategoris = Kategori::all();
        $suppliers = Supplier::all();
        return view('barangs.edit', compact('barang', 'kategoris', 'suppliers'));
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'id_supplier' => 'required|exists:suppliers,id_supplier',
        ]);

        $barang->update($validated);
        return redirect()->route('barangs.index');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barangs.index');
    }
}
