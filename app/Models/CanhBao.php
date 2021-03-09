<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CanhBao extends Model
{
    //
    protected $table='canh_bao';

    protected $fillable = [
        'ma_hoc_vien', 
        'loai_canh_bao',  // 1: Nghỉ học, 2: Điểm thấp 3: Không làm bài tập 4: Không tập trung
        'noi_dung_canh_bao', 
        'thoi_gian_canh_bao',
        'tinh_trang_canh_bao', // 0: chua canh bao 1: da canh bao
    ];
}
