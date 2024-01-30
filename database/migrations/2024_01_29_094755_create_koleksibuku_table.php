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
        Schema::create('koleksibuku', function (Blueprint $table) {
            $table->id('KoleksiID');
            $table->foreignid('UserID');
            $table->foreign('UserID')->references('UserID')->on('users');
            $table->foreignid('BukuID');
            $table->foreign('BukuID')->references('BukuID')->on('buku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koleksibuku');
    }
};
