<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configurator extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    public function steps()
    {
        return $this->hasMany(ConfiguratorStep::class);
    }
}
