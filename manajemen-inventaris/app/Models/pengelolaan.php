<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengelolaan extends Model
{
    public $timestamps = false;
    protected $table = 'pengelolaan';
    protected $fillable = ['id_persediaan', 'id_peminjaman', 'kode_barang', 'nama_barang', 'masuk_stok', 'keluar_stok', 'total_stok'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_persediaan');
    }
}
