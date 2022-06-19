<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscription extends Model
{
  use Notifiable;
  protected $table = 'subscription_vision';
  protected $primaryKey = 'id';

  protected $fillable = [

   'description','subsription','tab1','tab2','tab3','tab4','admin_i','createdBy','complete'

];

  
}
