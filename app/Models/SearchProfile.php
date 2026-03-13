<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchProfile extends Model
{
    protected $fillable = [
        'alumni_id',
        'variasi_nama',
        'kata_kunci_afiliasi',
        'kata_kunci_konteks',
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}
