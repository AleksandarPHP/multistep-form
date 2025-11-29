<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Accessory extends Model
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
        return $this->belongsToMany(AccessoryItem::class, 'accessory_accessory_item');
    }
}
