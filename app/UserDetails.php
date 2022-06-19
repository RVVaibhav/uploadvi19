<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    public function user()
    {
        return $this->belongsTo('Vision\User', 'user_id');
    }
}
