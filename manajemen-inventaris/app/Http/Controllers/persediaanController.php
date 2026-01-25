<?php

namespace App\Http\Controllers;

use App\Models\pengelolaan;
use App\Models\persediaan;
use Illuminate\Http\Request;

class persediaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persediaan = persediaan::all();

        return view('inventaris.index', compact('persediaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventaris.formPersediaan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validated = $request->validate([
                'kode_barang' => 'required|min:3',
                'nama_barang' => 'required|min:3',
                'kategori' => 'required',
                'jumlah' => 'nullable'
            ]);

            // $persediaan = Persediaan::where('kode_barang', $validated['kode_barang'])->firstOrFail();
            $persediaan = persediaan::create($validated);

            pengelolaan::create(
                [
                    'id_persediaan' => $persediaan->id,
                    'kode_barang' => $persediaan->kode_barang,
                    'nama_barang' => $persediaan->nama_barang,
                    'masuk_stok' => $persediaan->jumlah,
                ]
            );

            return redirect()->route('persediaan.index')->with('success', 'data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('persediaan.index')->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $persediaan = persediaan::all();
        $persediaanDetail = persediaan::findOrFail($id);
        return view('inventaris.formEditPersediaan', compact('persediaan', 'persediaanDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $validated = $request->validate([
            'kode_barang' => 'required|min:3',
            'nama_barang' => 'required|min:3',
            'kategori' => 'required',
            'jumlah' => 'nullable'
        ]);

        persediaan::where('id', $id)->update($validated);
        return redirect()->route('persediaan.index')->with('success', 'data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //   $validated = $request->validate([
        //         'kode_barang' => 'required|min:3',
        //         'nama_barang' => 'required|min:3',
        //         'kategori' => 'required',
        //         'jumlah' => 'nullable'
        // ]);

        persediaan::where('id', $id)->delete();
        return redirect()->route('persediaan.index')->with('success', 'data berhasil dihapus');
    }
}
