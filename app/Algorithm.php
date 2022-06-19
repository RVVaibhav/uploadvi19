<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;

class Algorithm extends Model
{
    public function level()
    {
        return $this->belongsTo('Vision\Level', 'level_id');
    }
}
