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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->unsignedBigInteger('idPetugas');
            $table->foreign('idPetugas')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idPeminjam');
            $table->foreign('idPeminjam')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggalPinjam');
            $table->date('tanggalSelesai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};