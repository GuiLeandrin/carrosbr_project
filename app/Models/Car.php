<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = [
        'photo1_url',
        'photo2_url',
        'photo3_url',
        'brand',
        'model',
        'color',
        'year',
        'mileage',
        'price',
        'details',
    ];
}