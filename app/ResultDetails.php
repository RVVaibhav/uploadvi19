<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ResultDetails extends Model
{
  use Notifiable;
  protected $table = 'result_details';
  protected $primaryKey = 'result_id';

  protected $fillable = [

   'user_id','test_id','result_date','result_time','attempted_questions','unattempted_questions','correct_questions','incorrect_questions','tagged_questions','total_score','result_status'

];
}
