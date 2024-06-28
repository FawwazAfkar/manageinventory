<?php

namespace App\Http\Controllers;

use App\Models\Penerimaan;
use App\Models\Barang;
use Illuminate\Http\Request;

class PenerimaanController extends Controller
{
    public function index()
    {
        $penerimaans = Penerimaan::all();
        return view('penerimaan.index', compact('penerimaans'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('penerimaan.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        Penerimaan::create($validated);
        return redirect()->route('penerimaan.index');
    }

    public function show(Penerimaan $penerimaan)
    {
        return view('penerimaan.show', compact('penerimaan'));
    }

    public function edit(Penerimaan $penerimaan)
    {
        $barangs = Barang::all();
        return view('penerimaan.edit', compact('penerimaan', 'barangs'));
    }

    public function update(Request $request, Penerimaan $penerimaan)
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        $penerimaan->update($validated);
        return redirect()->route('penerimaan.index');
    }

    public function destroy(Penerimaan $penerimaan)
    {
        $penerimaan->delete();
        return redirect()->route('penerimaan.index');
    }
}
