<?php

namespace App\Http\Controllers;

use App\Models\Penerimaan;
use App\Models\Barang;
use Illuminate\Http\Request;

class PenerimaanController extends Controller
{
    public function index()
    {
        $penerimaans = Penerimaan::select('penerimaans.*', 'barangs.nama as nama_barang')
                    ->join('barangs', 'penerimaans.id_barang', '=', 'barangs.id')
                    ->get();
        return view('penerimaans.index', compact('penerimaans'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('penerimaans.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        Penerimaan::create($validated);
        return redirect()->route('penerimaans.index')->with('success', 'Penerimaan berhasil ditambahkan.');;;
    }

    public function edit(Penerimaan $penerimaan)
    {
        $barangs = Barang::all();
        return view('penerimaans.edit', compact('penerimaan', 'barangs'));
    }

    public function update(Request $request, Penerimaan $penerimaan)
    {
        $validated = $request->validate([
            'id_barang' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        $penerimaan->update($validated);
        return redirect()->route('penerimaans.index')->with('success', 'Penerimaan berhasil diubah');;;
    }

    public function destroy(Penerimaan $penerimaan)
    {
        $penerimaan->delete();
        return redirect()->route('penerimaans.index')->with('success', 'Penerimaan berhasil dihapus.');;;
    }
}
