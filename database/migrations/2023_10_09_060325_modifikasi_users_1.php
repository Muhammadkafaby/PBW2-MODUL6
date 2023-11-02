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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 100);
            $table->string('address', 1000);
            $table->string('phoneNumber', 20);
            $table->date('birthdate')->nullable();
            $table->string('religion', 20);
            $table->tinyInteger('gender');
            
            $table->renameColumn('name', 'fullname');
            $table->string('email')->nullable()->change();
        });

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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
