<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Text extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'meta_title',
        'meta_description',
        'parent_id',
        'title',
        'subtitle',
        'description',
        'image',
        'image2',
        'image3',
        'image4',
    ];

    public $translatable = [
        'meta_title',
        'meta_description',
        'title',
        'subtitle',
        'description',
        'description2'
    ];
}
