<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Vision\AddHeders;

class HeaderOne extends Model{

  use Notifiable;
  protected $table = 'test_header_1';
  protected $primaryKey = 'test_header_1_id';






  public function addheders()  {

      return $this->belongsTo('Vision\AddHeders','test_header_1_id');

  }

}
