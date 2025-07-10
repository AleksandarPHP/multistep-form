<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Apartment;
class Floor extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'image'
    ];

    public $translatable = [
        'title'
    ];

    public function apartment(): HasMany
    {
        return $this->hasMany(Apartment::class)->whereNot('status', 3);
    }
}
