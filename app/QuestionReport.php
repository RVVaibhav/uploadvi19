<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class QuestionReport extends Model
{
  use Notifiable;
  protected $table = 'question_report_table';
  protected $primaryKey = 'report_id';

  protected $fillable = [

   'test_id','user_id','adminId','questionId','question_Comment','reference'

];
}
