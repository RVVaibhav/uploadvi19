<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ReadinStuffText extends Model
{
  use Notifiable;
  protected $table = 'reading_stuff_text';
  protected $primaryKey = 'id';

  protected $fillable = [

   'title','description','createdBy'

];
}
