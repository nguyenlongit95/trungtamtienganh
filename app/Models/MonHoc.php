<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    //
    protected $table='mon_hoc';

    protected $fillable = [
        'ten',
        'ma_mon_hoc',
        'thong_tin',
    ];
}
