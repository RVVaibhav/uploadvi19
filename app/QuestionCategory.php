<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class QuestionCategory extends Model
{
  use Notifiable;
  protected $table = 'question_category';
  protected $primaryKey = 'id';

  protected $fillable = [

   'question_cat','admin_id'

];

    public function user()
    {
        return $this->belongsTo('Vision\User', 'admin_id');
    }
}
