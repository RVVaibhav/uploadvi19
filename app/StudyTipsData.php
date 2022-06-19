<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class StudyTipsData extends Model
{
  use Notifiable;
  protected $table = 'study_tips_data';
  protected $primaryKey = 'id';

  protected $fillable = [

   'title','description','createdBy','attachment','type'

];
}
