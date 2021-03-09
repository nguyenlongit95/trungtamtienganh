<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HocPhi extends Model
{
    //
    protected $table='hoc_phi';

    protected $fillable = [
        'ma_hoc_vien',
        'ma_lop_hoc',
        'hoc_phi',
        'tinh_trang_nop_hoc_phi', // 1: da nop 0: chua nop
        'ngay_nop_hoc_phi',
    ];
}
