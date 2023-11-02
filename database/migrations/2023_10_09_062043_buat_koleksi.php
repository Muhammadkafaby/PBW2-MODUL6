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
       

        Schema::create('koleksi', function (Blueprint $table) {
            $table->id();
            $table->string('namaKoleksi', 100);
            $table->tinyInteger('jenisKoleksi');
            $table->timestamps();
            $table->integer('jumlahKoleksi');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
