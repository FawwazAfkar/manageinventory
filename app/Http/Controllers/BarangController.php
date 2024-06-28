<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::select('barangs.*', 'kategoris.nama as nama_kategori', 'suppliers.nama as nama_supplier')
                    ->join('suppliers', 'barangs.id_supplier', '=', 'suppliers.id')
                    ->join('kategoris', 'barangs.id_kategori', '=', 'kategoris.id')
                    ->get();
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
            'id_kategori' => 'required|exists:kategoris,id',
            'id_supplier' => 'required|exists:suppliers,id',
        ]);

        Barang::create($validated);
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan.');;
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
            'id_kategori' => 'required|exists:kategoris,id',
            'id_supplier' => 'required|exists:suppliers,id',
        ]);

        $barang->update($validated);
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil diubah.');;
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus.');;
    }
}

