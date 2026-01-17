<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\DB;

class persediaan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $persediaan = [
            [
                'kode_barang' => 'ATK-001',
                'nama_barang' => 'kertas HVS',
                'kategori' => 'Alat Tulis Kantor',
                'jumlah' => 30
            ],
            [
                'kode_barang' => 'ELK-001',
                'nama_barang' => 'printer',
                'kategori' => 'Elektronik',
                'jumlah' => 10
            ]
        ];
        
        DB::table('persediaan')->insert($persediaan);
    }
}
