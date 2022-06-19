<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Questions extends Model
{

  use Notifiable;
  protected $table = 'question_bank';
  protected $primaryKey = 'question_id';
  protected $fillable = [


	'subject_group_id',
	'question_type',
	'question',
	'option_1',
	'option_2',
	'option_3',
	'option_4',
	'option_5',
	'correct_option',
	'questions_selection_count',
	'admin_id'

];

public function user(){
    return $this->belongsTo('Vision\User', 'user_id');
}
}
