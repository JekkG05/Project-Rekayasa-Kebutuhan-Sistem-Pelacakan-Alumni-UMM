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
