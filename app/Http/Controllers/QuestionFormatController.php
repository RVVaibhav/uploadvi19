<?php

namespace Vision\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Log;
use Illuminate\Support\Facades\DB;
use Vision\VisionQuestionFormats;

class QuestionFormatController extends Controller
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
      $category = DB::table('question_format_category')->pluck('question_format_cat','id');
      return view('questionformat.indexQuestionFormat',compact('category'));
      //  return view('quiztab.indexQuiz',compact('category'));
        //   return view('test.indextest',compact('items'));
       }

       public function store(Request $request) {

                        $post = new VisionQuestionFormats;
                        $post->title =$request->input('title');
                        $post->question_format = $request->input('category');
                        $post->description = $request->input('description');
                        $post->admin_id = auth()->user()->id;
                        $post->save();
                        return redirect('/questionformat')->with('success', 'Question Format Created!');


           }

}
