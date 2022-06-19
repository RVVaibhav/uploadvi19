<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TestGroup extends Model{
  use Notifiable;
  protected $table = 'vision_group_test';
  protected $primaryKey = 'id';

  protected $fillable = [
   'test_group','admin_id'

];

    public function user()
    {
        return $this->belongsTo('Vision\User', 'admin_id');
    }
}
