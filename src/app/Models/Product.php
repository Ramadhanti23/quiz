<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class product extends Model
{
    //
    protected $connection = 'mysql'
    protected $fillable = [
        'name_product', 'quantity', 'price', 'created_at', 'updated_at'
    ];
}
