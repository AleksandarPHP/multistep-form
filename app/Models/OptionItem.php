<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OptionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'image',
        'priority',
        'is_active',
        'option_id'
    ];


    protected $casts = [
        'option_id' => 'array',
    ];

    public function option(): BelongsToMany
    {
        return $this->belongsToMany(Option::class, 'option_option_item');
    }
}
