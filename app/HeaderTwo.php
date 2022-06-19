<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class HeaderTwo extends Model
{
  use Notifiable;
  protected $table = 'test_header_2';
  protected $primaryKey = 'test_header_2_id';



  public function addheders()  {

      return $this->belongsTo('Vision\AddHeders','test_header_2_id');

  }



}
