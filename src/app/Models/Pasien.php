<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    //
    protected $connection = 'mysql';
    protected $fillable = [
        'nama', 'keluhan', 'status', 'created_at', 'updated_at'
    ]
}
