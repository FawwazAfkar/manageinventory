<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        Supplier::create($validated);
        return redirect()->route('suppliers.index');
    }

    public function view(Supplier $supplier)
    {
        return view('suppliers.view', compact('supplier'));
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $supplier->update($validated);
        return redirect()->route('suppliers.index');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index');
    }
}
