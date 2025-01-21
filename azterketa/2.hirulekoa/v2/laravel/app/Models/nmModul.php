<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nmModul extends Model
{
    protected $fillable = [
        'user_id',
        'modul_id',
        'password',
    ];
}
