<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AddTest extends Model{
  use Notifiable;
  protected $table = 'test_details';
  protected $primaryKey = 'test_id';
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'testname', 'description','startdate','enddate','duration','allow_max','min_percent','correctScore','incorrect','ip','allow_view','header_one',
       'header_two','header_three','numQue','totalm'
   ];

   public function user()
   {
       return $this->belongsTo('Vision\User', 'user_id');
   }

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */

}
