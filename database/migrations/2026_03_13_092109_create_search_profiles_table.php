<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('search_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_id')->constrained('alumni')->onDelete('cascade');
            $table->text('variasi_nama')->nullable();
            $table->text('kata_kunci_afiliasi')->nullable();
            $table->text('kata_kunci_konteks')->nullable();
            $table->timestamps();
        });
    }
};
