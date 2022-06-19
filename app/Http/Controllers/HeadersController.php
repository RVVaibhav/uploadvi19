<?php

namespace Vision\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Vision\AddHeders;

class HeadersController extends Controller{
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
  $items = DB::table('test_header_1')->pluck('header_1','test_header_1_id');
  $posts = AddHeders::paginate(15);
  return view('headersTab.indexheaders',compact('items','posts'));
    //   return view('test.indextest',compact('items'));
   }

   public function store(Request $request) {
     $this->validate($request, [
               'country_id' => 'required',
               'city' => 'required',
               'three' => 'required',
               'title' => 'required',
            ]);
        $post = new AddHeders;
        $post->test_header_1_id = $request->input('country_id');
        $post->test_header_2_id = $request->input('city');
        $post->test_header_3_id = $request->input('three');
        $post->test_header_4 = $request->input('title');
        $post->save();

      return redirect('/headers')->with('success', 'Heders Add Successfully!');


       }

       public function update(Request $request, $id)
          {
            $this->validate($request, [
                      'country_id' => 'required',
                      'city' => 'required',
                      'three' => 'required',
                      'title' => 'required',
                   ]);
      	      	$post = AddHeders::findOrFail($id);
               // Handle File Upload
               $post->test_header_1_id = $request->input('country_id');
               $post->test_header_2_id = $request->input('city');
               $post->test_header_3_id = $request->input('three');
               $post->test_header_4 = $request->input('title');
               $post->save();

               return redirect('/headers')->with('success', 'Heders update Successfully!');
          }



       public function destroy($id){
         $gift = AddHeders::findOrFail($id)->delete();
         return redirect('/headers');
       }
}
