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
        Schema::create('programrelawan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_id');  // harus unsignedBigInteger
            $table->string('kategori');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->string('komitmen');
            $table->string('keahlian');
            $table->text('tanggung_jawab');
            $table->text('persyaratan');
            $table->text('benefit');
            $table->string('foto');
            $table->integer('kuota');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programrelawan');
    }
};
