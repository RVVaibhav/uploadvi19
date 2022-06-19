<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Quiz extends Model{

  use Notifiable;
  protected $table = 'questions_in_test';
  protected $primaryKey = 'id';

  protected $fillable = [

   'test_id','question_id'

];


public function question(){
    return $this->belongsTo('Vision\Questions', 'question_id');
}

}
