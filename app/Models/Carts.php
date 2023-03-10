<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
    protected $table ='cart';
    protected $fillable = [
        'id',
        'user_id',
        'prod_id',
        'prod_quantities',
        'status'
    ];
}
