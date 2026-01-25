<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_persediaan')->constrained('persediaan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('kode_barang', 10);
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->string('username');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
