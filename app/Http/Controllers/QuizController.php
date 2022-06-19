<?php

namespace Vision\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Log;
use Illuminate\Support\Facades\DB;
use Vision\Questions;

class QuizController extends Controller
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
      $category = DB::table('question_category')->pluck('question_cat','id');
      return view('quiztab.indexQuiz',compact('category'));
        //   return view('test.indextest',compact('items'));
       }


       public function store(Request $request) {

                        $post = new Questions;
                        $post->subject_group_id =$request->input('category');
                        $post->question_type = $request->input('question_type');
                        $post->question = $request->input('question');
                      //  $post->description = $request->input('description');
                        $post->option_1 = $request->input('option_1');
                        $post->option_2 = $request->input('option_2');
                        $post->option_3 = $request->input('option_3');
                        $post->option_4 = $request->input('option_4');
                        $post->option_5 = "option_5";
                        if($request->radio == '1'){
                          $post->correct_option = 1;
                        }elseif ($request->radio == '2')   {
                          $post->correct_option = 2;
                        }elseif ($request->radio == '3')   {
                          $post->correct_option= 3;
                        }elseif ($request->radio == '4')   {
                           $post->correct_option = 4;
                        }
                        $post->admin_id = auth()->user()->id;
                        $post->questions_selection_count = 1;
                        $post->save();
                        return redirect('/quiz')->with('success', 'Quiz Created');


           }
}
