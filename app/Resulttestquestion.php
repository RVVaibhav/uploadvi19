<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Resulttestquestion extends Model
{
  use Notifiable;
  protected $table = 'result_test_questions';
  protected $primaryKey = 'result_id';

  protected $fillable = [

   'user_id','selected_option','test_id','is_tagged','question_id','is_attempted'
];
}
