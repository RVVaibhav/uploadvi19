<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class StudyTipsTest extends Model
{
  use Notifiable;
  protected $table = 'study_tips_text';
  protected $primaryKey = 'id';

  protected $fillable = [

   'title','description','createdBy'

];
}
