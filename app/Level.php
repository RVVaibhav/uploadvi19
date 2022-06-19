<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function algorithms()
    {
        return $this->hasMany('Vision\Algorithm', 'level_id');
    }

    public function slideuser()
    {
        return $this->hasMany('Vision\Slideuser', 'level_id');
    }
}
