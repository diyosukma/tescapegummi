<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nama');
            $table->integer('tahun');
            $table->unsignedBigInteger('prodi_id');
            $table->unsignedBigInteger('jenjang_id');
            $table->unsignedBigInteger('kelas_id');
            $table->integer('semester');
            $table->timestamps();

            $table->foreign('prodi_id')->references('id')->on('prodi')->onDelete('cascade');
            $table->foreign('jenjang_id')->references('id')->on('jenjang')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
};
