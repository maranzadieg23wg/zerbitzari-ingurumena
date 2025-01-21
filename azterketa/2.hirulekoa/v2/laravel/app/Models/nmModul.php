<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nmModul extends Model
{
    protected $table = 'nm_moduls';

    protected $fillable = [
        'userID',
        'modulID',
        'password',
    ];
}
