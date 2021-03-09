<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HocVien extends Model
{
    //
    protected $table='hoc_vien';

    protected $fillable = [
        'ten', 
        'tuoi',
        'email',
        'dia_chi',
        'thong_tin',
        'so_dien_thoai',
        'ten_phu_huynh',
        'truong_hoc',
        'trang_thai', // 0: da nghi hoc, 1: dang theo hoc
    ];
}
