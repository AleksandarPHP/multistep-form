<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;
use App\Models\Gallery;

class Album extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'type',
        'is_active'
    ];

    public $translatable = [
        'title'
    ];

    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }
}
