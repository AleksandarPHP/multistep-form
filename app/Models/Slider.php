<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'subtitle',
        'text',
        'image1',
        'image2',
        'image3',
        'image4',
        'is_active'
    ];

    public $translatable = [
        'title',
        'subtitle',
        'text'
    ];

}
