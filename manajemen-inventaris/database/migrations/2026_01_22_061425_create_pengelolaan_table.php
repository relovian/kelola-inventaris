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
        Schema::create('pengelolaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_persediaan')->constrained('persediaan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_peminjaman')->constrained('peminjaman')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->integer('masuk_stok');
            $table->integer('keluar_stok');
            $table->integer('total_stok');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengelolaan');
    }
};
