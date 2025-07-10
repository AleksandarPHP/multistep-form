<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'apt_number',
        'floor_id',
        'pdf',
        'surface',
        'rooms',
        'status',
        'image',
        'image2',
        'postition'
    ];

    public function floor(): BelongsTo
    {
        return $this->belongsTo(Floor::class);
    }

}
