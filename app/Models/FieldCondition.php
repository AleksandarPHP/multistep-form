<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldCondition extends Model
{
    protected $fillable = ['field_id', 'depends_on_field', 'depends_on_value'];

    public function field()
    {
        return $this->belongsTo(ConfiguratorField::class);
    }
}
