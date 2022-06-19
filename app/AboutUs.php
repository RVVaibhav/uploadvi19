<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AboutUs extends Model{
  use Notifiable;
  protected $table = 'vision_about_us';
  protected $primaryKey = 'id';



  protected $fillable = [
      'name','description','education','admin_id','attachment','createdBy'
  ];

  public function user()
  {
      return $this->belongsTo('Vision\User', 'user_id');
  }

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
}
