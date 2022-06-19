<?php

namespace Vision\Http\Controllers;

use Illuminate\Http\Request;

class NotificationCOntroller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  

    public function __invoke(Request $request)
    {
        //
    }

    public function index(){
      //    Country::all()->pluck('name', 'id')
    //  $items = DB::table('question_category')->pluck('question_cat','id');
      return view('notification.indexnotification');
        //   return view('test.indextest',compact('items'));
   }
}
