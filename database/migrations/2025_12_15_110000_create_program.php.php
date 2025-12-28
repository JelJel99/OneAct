<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organisasi_id');  // juga harus unsignedBigInteger
            $table->string('judul');
            $table->enum('type', ['relawan', 'donasi']);
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->dateTime('tenggat')->nullable();
            $table->timestamps();

            $table->foreign('organisasi_id')->references('id')->on('organisasi')->onDelete('cascade');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
