<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TestCategory extends Model
{
  use Notifiable;
  protected $table = 'test_category';
  protected $primaryKey = 'id';

  protected $fillable = [

   'test_cat','admin_id'

];

    public function user()
    {
        return $this->belongsTo('Vision\User', 'admin_id');
    }
}
