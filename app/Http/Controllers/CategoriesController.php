<?php

namespace Vision\Http\Controllers;

use Illuminate\Http\Request;
use Vision\TestCategory;
use Vision\VideoCategory;
use Vision\QuestionCategory;
use Vision\QuestionFormat;
use Vision\TestGroup;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)  {
        //
    }

    public function index(){
      //    Country::all()->pluck('name', 'id')
      return view('categoryTab.indexCategory');
        //   return view('test.indextest',compact('items'));
       }

       public function store(Request $request) {
         $tabId = $request->input('id');
         if($tabId == 1){
           $this->validate($request, [
                     'test_cat' => 'required',
                  ]);
              $post = new TestCategory;
              $post->test_cat = $request->input('test_cat');
              $post->admin_id = auth()->user()->id;
              $post->save();

             return redirect('/category')->with('success', 'TestCategory Add Successfully!');
         }else if($tabId == 2) {
           $this->validate($request, [
                     'test_group' => 'required',
                  ]);
              $post = new TestGroup;
              $post->test_group = $request->input('test_group');
              $post->admin_id = auth()->user()->id;
              $post->save();

             return redirect('/category')->with('success', 'Test Group Add Successfully!');
         }else  if($tabId == 3) {
           $this->validate($request, [
                     'question_cat' => 'required',
                  ]);
              $post = new QuestionCategory;
              $post->question_cat = $request->input('question_cat');
              $post->admin_id = auth()->user()->id;
              $post->save();

             return redirect('/category')->with('success', 'QuestionCategory Add Successfully!');
         }else if($tabId == 4){
           $this->validate($request, [
                     'question_cat_f' => 'required',
                  ]);
              $post = new QuestionFormat;
              $post->question_format_cat = $request->input('question_cat_f');
              $post->admin_id = auth()->user()->id;
              $post->save();

             return redirect('/category')->with('success', 'QuestionCategory Add Successfully!');
         }else if($tabId == 5){
           $this->validate($request, [
                     'test_group' => 'required',
                  ]);
                  $post = new TestGroup;
                  $post->test_group = $request->input('test_group');
                  $post->admin_id = auth()->user()->id;
                  $post->save();
                 return redirect('/category')->with('success', 'Test Group Add Successfully!');
         }

     }

     public function storeVideo(Request $request) {



   }

}
