<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surface extends Model
{
    use HasFactory;

    protected $fillable = [
            'title',
            'is_active',
            'priority',
            'default_value',
            'value_from',
            'value_to',
            'product_id',
    ];

    protected $casts = [
        'product_id' => 'array',
    ];
}
