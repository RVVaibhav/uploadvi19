<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class VideoCategory extends Model
{

  use Notifiable;
  protected $table = 'video_category';
  protected $primaryKey = 'id';

  protected $fillable = [

   'video_cat','admin_id'

];

    

}
