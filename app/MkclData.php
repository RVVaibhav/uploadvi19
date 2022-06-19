<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MkclData extends Model
{
  use Notifiable;
  protected $table = 'mkcl_data';
  protected $primaryKey = 'id';

  protected $fillable = [

   'title','description','createdBy','attachment','type'

];
}
