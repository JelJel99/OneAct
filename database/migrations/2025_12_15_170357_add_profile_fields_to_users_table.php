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
            $table->string('nik')->nullable();
            $table->string('tempatlahir')->nullable();
            $table->date('tanggallahir')->nullable();
            $table->string('jeniskelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('golongandarah')->nullable();
            $table->string('nohp')->nullable();

            $table->string('provinsiktp')->nullable();
            $table->string('kabupatenkotaktp')->nullable();
            $table->string('kecamatanktp')->nullable();
            $table->string('kelurahanktp')->nullable();

            $table->string('provinsidomisili')->nullable();
            $table->string('kabupatenkotadomisili')->nullable();
            $table->string('kecamatandomisili')->nullable();
            $table->string('kelurahandomisili')->nullable();

            $table->string('role')->default('Relawan');
            $table->string('status')->default('active');
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
