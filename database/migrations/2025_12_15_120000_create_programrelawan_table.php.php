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
            $table->string('kategori')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('komitmen')->nullable();
            $table->string('keahlian')->nullable();
            $table->string('foto')->nullable();
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
