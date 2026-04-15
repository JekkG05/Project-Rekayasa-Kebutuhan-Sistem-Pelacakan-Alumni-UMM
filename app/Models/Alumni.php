<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni';

    protected $fillable = [
        'nim',
        'nama',
        'tahun_masuk',
        'tahun_lulus',
        'fakultas',
        'program_studi',
        'status'
    ];
}
