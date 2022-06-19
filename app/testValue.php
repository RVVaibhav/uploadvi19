<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class testValue extends Model
{
    //
    use Notifiable;
    protected $table = 'test_class_value';
    protected $primaryKey = 'id';

    protected $fillable = [

     'test_time','test_marks','test_subject','test_title'

  ];

}
