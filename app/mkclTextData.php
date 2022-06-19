<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class mkclTextData extends Model
{
  use Notifiable;
  protected $table = 'mkcl_text_data';
  protected $primaryKey = 'id';

  protected $fillable = [

   'title','description','createdBy'

];
}
