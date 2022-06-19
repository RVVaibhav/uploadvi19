<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;

class Slideuser extends Model
{
    public function level()
    {
        return $this->belongsTo('Vision\Level', 'level_id');
    }
}
