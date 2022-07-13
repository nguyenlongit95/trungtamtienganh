<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    protected $table = 'bai_viet';

    protected $fillable = [
        'id',
        'title',
        'info',
        'description',
        'display',
        'image',
    ];
}
