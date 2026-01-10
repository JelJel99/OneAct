<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('komunitas_followers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('komunitas_id')->unsigned();
            $table->string('user_identifier')->comment('Username or email'); // Since no auth, use string identifier
            $table->timestamps();
            
            $table->foreign('komunitas_id')->references('id')->on('komunitas')->onDelete('cascade');
            $table->unique(['komunitas_id', 'user_identifier']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komunitas_followers');
    }
};
