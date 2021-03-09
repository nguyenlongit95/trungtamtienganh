<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    //
    protected $table='giang_vien';

    protected $fillable = [
        'ten',
        'tuoi',
        'dia_chi',
        'ma_mon_hoc',
        'truong_dai_hoc',
        'so_dien_thoai',
    ];
}
