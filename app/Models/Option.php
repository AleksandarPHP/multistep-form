<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'priority',
        'is_active',
        'product_id'
    ];

    protected $casts = [
        'product_id' => 'array',
    ];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(OptionItem::class, 'option_option_item');
    }
}
