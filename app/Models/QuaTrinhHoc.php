<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuaTrinhHoc extends Model
{
    //
    protected $table='qua_trinh_hoc';

    protected $fillable = [
        'ma_mon_hoc',
        'ma_lop_hoc',
        'ma_hoc_vien',
        'thoi_gian_hoc',
        'diem_so',
        'thong_tin', // Các lưu ý của giảng viên với học viên này
        'tinh_trang_hoc', // 1: tốt 2: trung bình 3: không tốt
        'hoc_phi',
    ];
}
