<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Vision\HeaderOne;
use Vision\HeaderTwo;
use Vision\HeadersThree;


class AddHeders extends Model
{
    //
      use Notifiable;
      protected $table = 'test_header_4';
      protected $primaryKey = 'test_header_4_id';


      protected $fillable = [
          'test_header_1_id','test_header_2_id','test_header_3_id','test_header_4'
      ];


    public function headerOne() {
       return $this->belongsTo('Vision\HeaderOne','test_header_1_id');
     }


     public function headerTwo() {
        return $this->belongsTo('Vision\HeaderTwo', 'test_header_2_id');
      }
      public function headerThree() {
         return $this->belongsTo('Vision\HeadersThree', 'test_header_3_id');
       }








}
