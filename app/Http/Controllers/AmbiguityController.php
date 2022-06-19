<?php

namespace Vision\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Vision\Report_solution;
use Vision\QuestionReport;

class AmbiguityController extends Controller
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
      $items = DB::select("select r.report_id,(select user_name from vision_registration v where `user_id` = r.user_id)as username,(select test_name from test_details v where `test_id` = r.test_id)as test,(select name from users v where `id` = r.adminId)as createdBy,r.questionId,r.question_Comment,
         r.reference,q.question,option_1,option_2,option_3,option_4,correct_option,
admin_id,r.created_at,r.updated_at from question_report_table r INNER JOIN question_bank  q ON (r.questionId = q.question_id) GROUP BY r.report_id
             ");
      return view('ambiguity.indexambiguity',compact('items'));
        //   return view('test.indextest',compact('items'));
      }


      public function editCallRate(Request $request, $id)  {
             $this->validate($request, [
              'reference' => 'required',
              'solution' => 'required',
              'names' =>'required',
          ]);
          $post = new Report_solution;
          $post->reference = $request->input('reference');
          $post->solution = $request->input('solution');
          $post->report_id = $id;
          $post->createdBy = $request->input('names');
          $post->adminId = auth()->user()->id;
          $post->save();
          return redirect('/ambiguity')->with('success', 'Data  Created');


      }

      public function destroy($id){
       $gift = QuestionReport::findOrFail($id)->delete();
       return redirect('/ambiguity');
     }

     public function deleteAll(Request $request){

      $ids = $request->report_id;

      DB::table("question_report_table")->whereIn('report_id',explode(",",$ids))->delete();

      return response()->json(['success'=>"Products Deleted successfully."]);

  }
}
