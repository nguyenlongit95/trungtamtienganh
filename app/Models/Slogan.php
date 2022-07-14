<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slogan extends Model
{
    //
    protected $table='slogans';

    protected $fillable = [
        'id',
        'slogan',
    ];
}
