<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $fillable = [
        'id',
        'user_id',
        'surname',
        'forename',
        'country',
        'zip',
        'city',
        'address',
        'phone',
        'status',
        'price'
    ];
}
