<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    use HasFactory;

    protected $fillable = [
        'dimension1',
        'dimension2',
        'product_id',
        'price',
    ];

    protected $casts = [
        'product_id' => 'array',
    ];
}
