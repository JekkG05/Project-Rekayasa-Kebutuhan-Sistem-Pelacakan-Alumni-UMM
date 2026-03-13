<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingResult extends Model
{
    protected $fillable = [
        'alumni_id',
        'sumber',
        'link',
        'judul',
        'ringkasan',
        'confidence_score',
        'status_verifikasi',
        'tanggal_ditemukan',
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}
