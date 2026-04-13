<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni';

    protected $fillable = [
        'nim',
        'nama',
        'prodi',
        'fakultas',
        'tahun_lulus',
        'kota',
        'bidang',
        'status_pelacakan',
        'tahun_masuk',
        'tahun_lulus',
        'tanggal_lulus',
        'fakultas',
        'prodi',
        'status',
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
    ];

    public function searchProfile()
    {
        return $this->hasOne(SearchProfile::class);
    }

    public function trackingResults()
    {
        return $this->hasMany(TrackingResult::class);
    }
}
