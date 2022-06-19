<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ReadingStuffData extends Model
{
  use Notifiable;
  protected $table = 'reading_stuff_data';
  protected $primaryKey = 'id';

  protected $fillable = [

   'title','description','createdBy','attachment','type'

];
}
