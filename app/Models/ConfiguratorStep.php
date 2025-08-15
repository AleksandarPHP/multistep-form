<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfiguratorStep extends Model
{
    protected $fillable = ['configurator_id', 'step_number', 'title', 'description'];

    public function configurator()
    {
        return $this->belongsTo(Configurator::class);
    }

    public function fields()
    {
        return $this->hasMany(ConfiguratorField::class, 'step_id');
    }
}
