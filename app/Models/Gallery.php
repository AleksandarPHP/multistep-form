<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Album;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_id',
        'image'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}
