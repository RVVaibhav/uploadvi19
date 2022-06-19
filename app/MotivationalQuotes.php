<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MotivationalQuotes extends Model
{
  use Notifiable;
  protected $table = 'motivational_quotes';
  protected $primaryKey = 'motivation_id';


  protected $fillable = [

   'date','special_day','special_image','motivation_txt','motivation_image','admin_id',

];
}
