<?php
namespace Vision\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Storage;
use Vision\Questions;
use Vision\Quiz;
use Log;
use Vision\Headers;
use Illuminate\Support\Facades\DB;
use Vision\AddTest;
use Carbon\Carbon;

class TestController extends Controller{


    public function create(){
    $items = Headers::getHeaders();
    $post = DB::table('question_category')->pluck('question_cat','id');
    return view('test.indextest',compact('post','items'));

 }

 public function store(Request $request) {

   $this->validate($request, [
             'testgroup' => 'required',
             'testname' => 'required',
             'description' => 'required',
             'startdate' => 'required',
             'enddate' => 'required',
             'duration' => 'required',
             'allow_max' => 'required',
             'min_percent' => 'required',
             'correctScore' => 'required',
             'incorrect' => 'required',
             'category' => 'required',
             'country_id' => 'required',
             'incorrect' => 'required',
             'category' => 'required',
             'country_id' => 'required',
             'city' => 'required',
             'setting' => 'required',
          ]);



                  $post = new AddTest;
                  if($request->radio == 'YES'){
                    $post->is_view_correct_answers_allowed = 1;
                  }elseif ($request->radio == 'NO')   {
                    $post->is_view_correct_answers_allowed = 0;
                  }
                  $post->test_group = $request->input('testgroup');
                //  $post->is_view_correct_answers_allowed = $post->allow_view;
                  $post->test_name = $request->input('testname');
                  $post->description = $request->input('description');
                  $post->start_date = $request->input('startdate');
                  $post->expire_date = $request->input('enddate');
                  $post->duration = $request->input('duration');
                  $post->attempt_limit = $request->input('allow_max');
                  $post->min_percent = $request->input('min_percent');
                  $post->correct_score = $request->input('correctScore');
                  $post->incorrect_score = $request->input('incorrect');
                  $post->test_category = $request->input('category');
                  $post->admin_id = auth()->user()->id;
                  $post->total_marks ="1";
                  $post->num_questions = "0";
                  $post->test_header_1_id = $request->input('country_id');
                  $post->test_header_2_id = $request->input('city');
                  $post->test_header_3_id = $request->input('setting');
                  $post->test_header_4_id = $request->input('setting');
                  if ($post->save()) {
                        $postsss = DB::table('question_category')->pluck('question_cat','id');
                        $category = DB::table('test_category')->pluck('test_cat','id');
                        $items = DB::table('test_header_1')->pluck('header_1','test_header_1_id');
                        $testgroup = DB::table('vision_group_test')->pluck('test_group','id');
                        $posts = Questions::get();
                      //  dd($post->test_id);
                        $gift =DB::table('test_details')->where('test_id', '=', $post->test_id)->get();
                        //DB::table('test_details')->select('name', 'email as user_email')->get()//AddTest::where('test_id', $post->test_id)->first(); //AddTest::firstOrFail()->where('test_id', $post->test_id);


                        return view('test.edit', compact('gift','items','category','testgroup','posts','postsss'));

                //  return Response::json(array('success' => true,'inserted_id'=>$data->id), 200);
                   }
                //  $post->save();
                //  $invoice = $post->test_id;

                //    $gift = Gift::findOrFail($id);
                //  dd($post->test_id);
//
                //  return redirect('/test.edit')->with('success', 'Test Created');
     }


 public function multipleInsert(Request $request) {
   $data = $request->except('_token');
   $subject_count = count($data['subject_id']);
   $co;
   for($i=0; $i < $subject_count; $i++){
     $tss = new Quiz;
     $tss->question_id = $data['subject_id'][$i];
     $tss->test_id = $data['custId'];
     $tss->save();
   }

   $gift =DB::table('test_details')->where('test_id', '=', $data['student_id'])->get();
   foreach ($gift as $p) {
    $co =$p->correct_score;
    }

   DB::table('test_details')->update([
                   'num_questions' => $subject_count,
                   'total_marks' => $co * $subject_count,
               ]);
               return back()->withInput();

 }


     public function getCreatedAtAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d');
    }


    public function importFileIntoDBS(Request $request){
      $tabId = $request->input('stred');
      if($request->hasFile('sample_file')){
      $path = $request->file('sample_file')->getRealPath();
      $data = \Excel::load($path)->get();

      if($data->count()){
        $de_test_id;
        $de_ques_id;
          foreach ($data as $key => $value) {
            $post = new Questions;
            $post->subject_group_id="3";
            $post->question_type=$request->input('names');
            $post->question=$value->question;
            $post->option_1=$value->option_1;
            $post->option_2=$value->option_2;
            $post->option_3=$value->option_3;
            $post->option_4=$value->option_4;
            $post->option_5="ffff";
            $post->correct_option=$value->correct_option;
            $post->questions_selection_count=$value->questions_selection_count;
            $post->admin_id=$value->admin_id;
            $post->save();
            $de_ques_id = $post->question_id;

            $posts = new Quiz;
            $posts->test_id=$tabId;
            $posts->question_id = $de_ques_id;
            $posts->save();
            //  dd('Insert Record successfully.');



          //    $arr[] = ['subject_group_id' =>"1",'question_type' => "2",'question' => $value->question,
          //  'option_1' => $value->option_1,'option_2' => $value->option_2,'option_3' => $value->option_3,'option_4' => $value->option_4,'option_5' => $value->option_5,
        //  'correct_option' => $value->correct_option,'questions_selection_count' => $value->questions_selection_count,'admin_id' =>auth()->user()->id];
          }
          $gift =DB::table('test_details')->where('test_id', '=',$tabId)->get();
          foreach ($gift as $p) {
           $co =$p->correct_score;
           }

          DB::table('test_details')->where('test_id', $tabId)->update([
                          'num_questions' => $data->count(),
                          'total_marks' => $co * $data->count(),
                      ]);

                      return back()->withInput();




      }
   }
//   dd('Request data does not have any files to import.');
   }


  public function destroy($question_id){

    $algorithm = Questions::where("question_id", $question_id)->delete();

    return back()->withInput();

}




  public function index(){
//    Country::all()->pluck('name', 'id')
     $category = DB::table('test_category')->pluck('test_cat','id');
     $items = DB::table('test_header_1')->pluck('header_1','test_header_1_id');
     $testgroup = DB::table('vision_group_test')->pluck('test_group','id');
     return view('test.indextest',compact('items','category','testgroup'));
 }

   public function myformAjax($id){
       $cities = DB::table("test_header_2")
                   ->where("test_header_1_id",$id)
                   ->get();
       return json_encode($cities);
   }

   public function myformAjaxs($id){
       $cities = DB::table("test_header_3")
                   ->where("test_header_2_id",$id)
                   ->get();
       return json_encode($cities);
   }

   public function myformAjaxsI($id){
       $cities = DB::table("test_header_3")
                   ->where("test_header_2_id",$id)
                   ->get();
       return json_encode($cities);
   }


   public function myformajaxsIT($id){
       $cities = DB::table("test_header_4")
                   ->where("test_header_2_id",$id)
                   ->get();
       return json_encode($cities);
   }








/**
 * Show the application dashboard.
 *
 * @return \Illuminate\Http\Response
 */






    //return response()->json(['html' => $html]);
}
