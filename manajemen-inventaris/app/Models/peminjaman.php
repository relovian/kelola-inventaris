<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    public $timestamps = false;
    protected $table = 'peminjaman';
    protected $fillable = ['id_persediaan', 'kode_barang', 'nama_barang', 'jumlah', 'username', 'tanggal_pinjam', 'tanggal_kembali'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_persediaan');
    }
}
