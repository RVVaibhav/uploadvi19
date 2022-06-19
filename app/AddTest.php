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
       'test_header_3_id','test_header_1_id','test_header_2_id','test_header_4_id',
       'test_category','test_group','test_name','description','duration','start_date',
       'expire_date','attempt_limit','total_marks','num_questions','correct_score','min_percent',
       'is_view_correct_answers_allowed','incorrect_score','admin_id'
   ];

   protected $casts = ['test_group' => 'array'];


   public function setCategoryAttribute($value){

    $this->attributes['test_group'] = json_encode($value);

}


public function getCreatedAtAttribute($value){
   $date = Carbon::parse($value);
   return $date->format('Y-m-d');
}


public function getCategoryAttribute($value){

    return $this->attributes['test_group'] = json_decode($value);

}


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
