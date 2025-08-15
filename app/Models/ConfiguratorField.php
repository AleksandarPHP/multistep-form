<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfiguratorField extends Model
{
    protected $fillable = ['step_id', 'label', 'name', 'type', 'required', 'order'];

    public function step()
    {
        return $this->belongsTo(ConfiguratorStep::class);
    }

    public function options()
    {
        return $this->hasMany(FieldOption::class, 'field_id');
    }

    public function conditions()
    {
        return $this->hasMany(FieldCondition::class, 'field_id');
    }
}
