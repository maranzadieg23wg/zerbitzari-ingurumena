<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class moduluak extends Model
{
    protected $table = 'moduluak';

    protected $fillable = [
        'id',
        'izena',
        'gela',
        'password',
    ];  

    public function users()
    {
        return $this->belongsToMany(Moduluak::class, 'nm_moduls', 'modulID', 'userID');
    }
}
