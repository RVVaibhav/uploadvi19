<?php

namespace Vision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Headers extends Model{
    //
    public static function getHeaders(){
      //  $items = DB::table('test_header_1')->pluck('header_1');

     $value=DB::table('test_header_1')->pluck('header_1','test_header_1_id');
     return $value;
   }
}
