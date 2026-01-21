<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class peminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $persediaan = DB::table('persediaan')->get();

        foreach ($persediaan as $item){
            $peminjaman = [
                'id_persediaan' => $item->id,
                'kode_barang' => $item->kode_barang,
                'nama_barang' => $item->nama_barang,
                'jumlah' => 50,
                'username' => 'budi',
                'tanggal_pinjam' => now()->toDateString(),
                'tanggal_kembali' => now()->addDays(rand(1, 7))->toDateString()
            ];
        }

        DB::table('peminjaman')->insert($peminjaman);
    }
}
