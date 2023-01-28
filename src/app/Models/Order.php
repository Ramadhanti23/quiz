<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    //
    protected $connection = 'mysql'
    protected $fillable = [
        'user', 'product', 'total', 'status', 'created_at', 'updated_at'
    ];
}
