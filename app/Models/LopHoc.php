<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    //
    protected $table='lop_hoc';

    protected $fillable = [
        'ten_lop',
        'ma_lop',
        'thong_tin',
        'ma_mon_hoc',
        'ma_giang_vien',
        'so_hoc_vien',
        'thoi_gian_bat_dau',
        'thoi_gian_ket_thuc',
        'gio_vao_lop',
        'gio_tan_lop',
        'lich_hoc',
        'hoc_phi',
        'so_buoi_hoc'
    ];
}
