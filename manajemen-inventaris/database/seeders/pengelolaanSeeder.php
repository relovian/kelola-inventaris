<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pengelolaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $persediaan = DB::table('persediaan')->get();
        $peminjaman = DB::table('peminjaman')->get();


        
        foreach($persediaan as $item_persediaan){
                $pengelolaan = [
                    'id_persediaan' => $item_persediaan->id,
                    'kode_barang' => $item_persediaan->kode_barang,
                    'nama_barang' => $item_persediaan->nama_barang,
                    'masuk_stok' => $item_persediaan->jumlah,
                ];
                foreach($peminjaman as $item_peminjaman){
                    $pengelolaan['id_peminjaman'] = $item_peminjaman->id;
                    $pengelolaan['keluar_stok'] = $item_peminjaman->jumlah;
                    $pengelolaan['total_stok'] = $pengelolaan['masuk_stok'] - $pengelolaan['keluar_stok'];
                }
                
            }

        DB::table('pengelolaan')->insert($pengelolaan);
    }
}
