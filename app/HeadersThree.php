<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class HeadersThree extends Model
{
  use Notifiable;
  protected $table = 'test_header_3';
  protected $primaryKey = 'test_header_3_id';



  public function addheders()  {

      return $this->belongsTo('Vision\AddHeders','test_header_3_id');

  }
}
