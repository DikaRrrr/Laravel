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
            $table->id('PeminjamanID');
            $table->foreignid('UserID');
            $table->foreign('UserID')->references('UserID')->on('users');
            $table->foreignid('BukuID');
            $table->foreign('BukuID')->references('BukuID')->on('buku');
            $table->date('tanggalpeminjaman');
            $table->date('tanggalpengembalian');
            $table->string('statuspeminjaman');
            $table->timestamps();
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