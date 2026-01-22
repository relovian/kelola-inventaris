<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use App\Models\persediaan;
use Illuminate\Http\Request;

class peminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = peminjaman::all();
        return view('inventaris.peminjaman', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('inventaris.formPeminjaman');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required:min3',
            'jumlah' => 'required',
            'username' => 'required'
        ]);

        $persediaan = persediaan::where('kode_barang', $validated['kode_barang'])->firstOrFail();


        $validated = $request->validate([
            'kode_barang' => 'required|exists:persediaan,kode_barang',
            'jumlah' => 'required|integer|min:1',
            'username' => 'required|string|min:3',
            'tanggal_kembali' => 'nullable|date',
        ]);

        $persediaan->peminjaman()->create([
            'kode_barang' => $persediaan->kode_barang,
            'nama_barang' => $persediaan->nama_barang,
            'jumlah' => $validated['jumlah'] ,
            'username' => $validated['username'],
            'tanggal_pinjam' => now()->toDateString(),
        ]);
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
        $peminjaman = peminjaman::all();
        $peminjamanDetail = peminjaman::FindOrFail($id);

        $persediaan = persediaan::all();
        $persediaanDetail = persediaan::FindOrFail($id);
        return view('inventaris.formEditPeminjaman', ['persediaanDetail' => $persediaanDetail, 'peminjamanDetail' => $peminjamanDetail]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
           $validated = $request->validate([
            'kode_barang' => 'required:min3',
            'jumlah' => 'required',
            'username' => 'required'
        ]);

        $persediaan = persediaan::where('kode_barang', $validated['kode_barang'])->firstOrFail();


        $validated = $request->validate([
            'kode_barang' => 'required|exists:persediaan,kode_barang',
            'jumlah' => 'required|integer|min:1',
            'username' => 'required|string|min:3',
            'tanggal_kembali' => 'nullable|date',
        ]);

        peminjaman::where('id', $id)->update([
            'kode_barang' => $persediaan->kode_barang,
            'nama_barang' => $persediaan->nama_barang,
            'jumlah' => $validated['jumlah'] ,
            'username' => $validated['username'],
            'tanggal_kembali' => $validated['tanggal_kembali']
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'peminjaman berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        peminjaman::where('id', $id)->delete();
        return redirect()->route('peminjaman.index')->with('success', 'peminjaman berhasil dihapus');
    }
}
