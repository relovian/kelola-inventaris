<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class persediaan extends Model
{
    protected $table = 'persediaan';
    protected $fillable = ['kode_barang', 'nama_barang', 'kategori', 'jumlah'];
}
