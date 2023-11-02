<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Nama     : Muhammad Kafaby
     * NIM      : 6706220149
     * Kelas    : D3IF-4604
     */
    public function up(): void
    {
        Schema::table('koleksi', function (Blueprint $table) {
            $table->integer('jumlahKeluar');
            $table->integer('jumlahSisa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('koleksi', function (Blueprint $table) {
            //
        });
    }
};