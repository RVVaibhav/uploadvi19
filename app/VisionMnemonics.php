<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class VisionMnemonics extends Model
{
  use Notifiable;
  protected $table = 'vision_mnemonics';
  protected $primaryKey = 'id';



  protected $fillable = [

   'title','description','admin_id'

];

    public function user()
    {
        return $this->belongsTo('Vision\User', 'admin_id');
    }
}
