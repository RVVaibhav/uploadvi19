<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class VisionQuestionFormats extends Model
{
    //
    use Notifiable;
    protected $table = 'vision_question_format';
    protected $primaryKey = 'id';



    protected $fillable = [

     'title','question_format','description','admin_id'

  ];

      public function user()
      {
          return $this->belongsTo('Vision\User', 'admin_id');
      }
}
