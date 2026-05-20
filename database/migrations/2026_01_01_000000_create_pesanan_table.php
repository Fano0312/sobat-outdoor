<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('no_pesanan')->unique();
            $table->string('nama');
            $table->string('telepon', 20);
            $table->text('alamat');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('lokasi');
            $table->enum('paket', ['A', 'B', 'C', 'D', 'E']);
            $table->integer('jumlah_hari');
            $table->integer('harga_satuan');
            $table->integer('total');
            $table->string('foto_ktp');
            $table->text('catatan')->nullable();
            $table->enum('status', ['pending', 'dikonfirmasi', 'selesai', 'batal'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
