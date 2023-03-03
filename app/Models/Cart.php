<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table ='cart';
    protected $fillable = [
        'id',
        'products_id',
        'users_id',
        'quantity',
        'status'
    ];
}
