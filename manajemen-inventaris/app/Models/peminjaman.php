<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\pengelolaan;

class peminjaman extends Model
{
    public $timestamps = false;
    protected $table = 'peminjaman';
    protected $fillable = ['id_persediaan', 'kode_barang', 'nama_barang', 'jumlah', 'username', 'tanggal_pinjam', 'tanggal_kembali'];

    // public function persediaan()
    // {
    //     return $this->belongsTo(Persediaan::class, 'id_persediaan');
    // }

    // public function pengelolaan() {
    //     return $this->hasOne(pengelolaan::class, 'pengelolaan');
    // 

    // 1 barang → banyak riwayat pengelolaan stok
    public function pengelolaan()
    {
        return $this->hasMany(Pengelolaan::class, 'id_peminjaman');
    }

    
}
