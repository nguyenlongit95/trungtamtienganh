<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    //
    protected $table='voucher';

    protected $fillable = [
        'ten',
        'ma_voucher',
        'giam_gia',
        'thoi_gian_het_han',
        'trang_thai_su_dung', // 1: chua su dung 0: da su dung
    ];
}
