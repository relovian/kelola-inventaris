<?php

namespace App\Models;

use App\Http\Controllers\peminjamanController;
use Illuminate\Database\Eloquent\Model;
use App\Models\pengelolaan;


class persediaan extends Model
{
    public $timestamps = false;
    protected $table = 'persediaan';
    protected $fillable = ['kode_barang', 'nama_barang', 'kategori', 'jumlah'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_persediaan');
    }

    // 1 barang → banyak riwayat pengelolaan stok
    public function pengelolaan()
    {
        return $this->hasMany(Pengelolaan::class, 'id_persediaan');
    }
}
