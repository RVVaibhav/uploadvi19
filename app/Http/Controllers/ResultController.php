<?php

namespace Vision\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
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

      return view('resultTab.indexResult');
        //   return view('test.indextest',compact('items'));
       }
}
