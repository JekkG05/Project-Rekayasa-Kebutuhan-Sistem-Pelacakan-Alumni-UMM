<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('alumni', function (Blueprint $table) {
            $table->string('tahun_masuk')->nullable()->after('nim');
            $table->date('tanggal_lulus')->nullable()->after('tahun_masuk');

            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('tiktok')->nullable();

            $table->string('email_kontak')->nullable();
            $table->string('no_hp')->nullable();

            $table->string('tempat_bekerja')->nullable();
            $table->text('alamat_bekerja')->nullable();
            $table->string('posisi')->nullable();
            $table->enum('status_pekerjaan', ['PNS', 'Swasta', 'Wirausaha'])->nullable();
            $table->string('sosial_media_tempat_kerja')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('alumni', function (Blueprint $table) {
            $table->dropColumn([
                'tahun_masuk',
                'tanggal_lulus',
                'linkedin',
                'instagram',
                'facebook',
                'tiktok',
                'email_kontak',
                'no_hp',
                'tempat_bekerja',
                'alamat_bekerja',
                'posisi',
                'status_pekerjaan',
                'sosial_media_tempat_kerja',
            ]);
        });
    }
};
