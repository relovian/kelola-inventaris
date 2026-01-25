<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use App\Models\pengelolaan;
use App\Models\persediaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pengelolaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $pengelolaan = pengelolaan::all();
        // $persediaan = persediaan::all();
        // $peminjaman = peminjaman::all();

        $pengelolaan = DB::table('persediaan')->leftJoin('pengelolaan', 'pengelolaan.id_persediaan', '=', 'persediaan.id')->leftJoin('peminjaman', 'peminjaman.id', '=', 'pengelolaan.id_peminjaman')->select(
            'persediaan.kode_barang',
            'persediaan.nama_barang',
            'persediaan.jumlah as stok_masuk',
            'peminjaman.jumlah as stok_keluar'
        )->get();


     
        return view('inventaris.pengelolaan', compact('pengelolaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'kode_barang' => 'required|exists:persediaan,kode_barang',
            'jumlah' => 'required|integer|min:1',
            'username' => 'required|string|min:3',
        ]);

          $persediaan = Persediaan::where('kode_barang', $validated['kode_barang'])->firstOrFail();

            // 1️⃣ simpan peminjaman
            $peminjaman = Peminjaman::create([
                'id_persediaan' => $persediaan->id,
                'jumlah' => $validated['jumlah'],
                'username' => $validated['username'],
                'tanggal_pinjam' => now(),
            ]);

            // 2️⃣ kurangi stok persediaan
            // $persediaan->decrement('jumlah', $validated['jumlah']);

            // 3️⃣ CATAT ke pengelolaan (INI YANG KAMU CARI)
            Pengelolaan::create([
                'id_persediaan' => $persediaan->id,
                'id_peminjaman' => $peminjaman->id,
                'stok_keluar'   => $validated['jumlah'],
                'tanggal'       => now(),
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
