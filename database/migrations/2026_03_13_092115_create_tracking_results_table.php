<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tracking_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_id')->constrained('alumni')->onDelete('cascade');
            $table->string('sumber');
            $table->text('link')->nullable();
            $table->string('judul');
            $table->text('ringkasan')->nullable();
            $table->integer('confidence_score')->default(0);
            $table->string('status_verifikasi')->default('Perlu Verifikasi');
            $table->date('tanggal_ditemukan')->nullable();
            $table->timestamps();
        });
    }
};
