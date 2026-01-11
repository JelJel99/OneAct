<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cerita', function (Blueprint $table) {
            $table->id();
            $table->foreignId('komunitas_id')->constrained('komunitas');
            $table->string('nama');
            $table->longText('cerita');
            $table->enum('peran', ['relawan', 'donatur']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cerita');
    }
};
