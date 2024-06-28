<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategoris.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategoris.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        Kategori::create($validated);
        return redirect()->route('kategoris.index');
    }

    public function view(Kategori $kategori)
    {
        return view('kategoris.view', compact('kategori'));
    }

    public function edit(Kategori $kategori)
    {
        return view('kategoris.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        $kategori->update($validated);
        return redirect()->route('kategoris.index');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategoris.index');
    }
}
