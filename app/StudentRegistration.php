<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class StudentRegistration extends Model
{
    //

    use Notifiable;
    protected $table = 'vision_registration';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_name','user_email','user_mobile','ug_college','city','state','user_password'
    ];

    protected $hidden = [
        'user_password'
    ];
}
