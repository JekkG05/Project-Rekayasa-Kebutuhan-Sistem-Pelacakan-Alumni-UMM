<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('nama');
            $table->string('prodi');
            $table->string('fakultas');
            $table->year('tahun_lulus');
            $table->string('kota')->nullable();
            $table->string('bidang')->nullable();
            $table->string('status_pelacakan')->default('Belum Ditemukan');
            $table->timestamps();
        });
    }
};
