<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class QuestionFormat extends Model
{
    //

    use Notifiable;
    protected $table = 'question_format_category';
    protected $primaryKey = 'id';

    protected $fillable = [

     'question_format_cat','admin_id'

  ];

      public function user()
      {
          return $this->belongsTo('Vision\User', 'admin_id');
      }
}
