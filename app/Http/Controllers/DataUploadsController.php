<?php

namespace Vision\Http\Controllers;

use Illuminate\Http\Request;

use Vision\Questions;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Vision\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Vision\PdfPost;
use Vision\AddTest;
use Vision\Quiz;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\Style\TablePosition;
use Vision\testValue;
use Illuminate\Support\Str;

class DataUploadsController extends Controller{
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
      $items = DB::table('question_category')->pluck('question_cat','id');
      return view('uploads.indexUploads',compact('items'));
        //   return view('test.indextest',compact('items'));
   }


  public function importFileIntoDB(Request $request){
    if($request->hasFile('sample_file')){
    $path = $request->file('sample_file')->getRealPath();
    $data = \Excel::load($path)->get();
    $rowcount = 0;
    $de_test_id;
    $de_ques_id;
    if($data->count()){
        foreach ($data as $key => $value) {
          if($rowcount == 0){
          $rowcount = 1;
          $post = new AddTest;
          $post->test_header_3_id=$value->test_header_3_id;
          $post->test_header_1_id=$value->test_header_1_id;
          $post->test_header_2_id=$value->test_header_2_id;
          $post->test_header_4_id=$value->test_header_4_id;
          $post->test_category=$value->test_category;
          $post->test_group=$value->test_group;
          $post->test_name=$value->test_name;
          $post->description=$value->description;
          $post->duration=$value->duration;
          $post->start_date=$value->start_date;
          $post->expire_date=$value->expire_date;
          $post->attempt_limit=$value->attempt_limit;
          $post->updated_at=$value->updated_at;
          $post->total_marks=$value->total_marks;
          $post->num_questions=$value->num_questions;
          $post->correct_score=$value->correct_score;
          $post->min_percent=$value->min_percent;
          $post->is_view_correct_answers_allowed=$value->is_view_correct_answers_allowed;
          $post->incorrect_score=$value->incorrect_score;
          $post->admin_id=auth()->user()->id;
          if($post->save()) {
            $de_test_id =$post->test_id;
           }

      }//else {
     $post = new Questions;
     $post->subject_group_id=$value->subject_group_id;
     $post->question_type=$value->question_type;
     $post->question=$value->question;
     $post->option_1=$value->option_1;
     $post->option_2=$value->option_2;
     $post->option_3=$value->option_3;
     $post->option_4=$value->option_4;
     $post->option_5=$value->option_5;
     $post->correct_option=$value->correct_option;
     $post->questions_selection_count=$value->questions_selection_count;
     $post->admin_id=$value->admin_id;
     if($post->subject_group_id && $post->save()) {
       $de_ques_id =$post->question_id;
       $post = new Quiz;
       $post->test_id=$de_test_id;
       $post->question_id=$de_ques_id;
       $post->save();
      }

  //}


  }

    }
 }else {
 dd('Request data does not have any files to import.');
 }


 }

 public function importFileIntoDBS(Request $request){
   if($request->hasFile('sample_file')){
   $path = $request->file('sample_file')->getRealPath();
   $data = \Excel::load($path)->get();
   if($data->count()){
       foreach ($data as $key => $value) {
           $arr[] = ['subject_group_id' =>$request->input('question_type'), 'question_type' => $value->question_type,'question' => $value->question,
         'option_1' => $value->option_1,'option_2' => $value->option_2,'option_3' => $value->option_3,'option_4' => $value->option_4,'option_5' => $value->option_5,
       'correct_option' => $value->correct_option,'questions_selection_count' => $value->questions_selection_count,'admin_id' =>auth()->user()->id];
       }
       if(!empty($arr)){
           DB::table('question_bank')->insert($arr);
           DB::table('question_b_test')->insert($arr);
           dd('Insert Record successfully.');
       }
   }
}
dd('Request data does not have any files to import.');
}

 public function downloadExcelFile($type){
    $products = Questions::get()->toArray();
    return \Excel::create('questionbank', function($excel) use ($products) {
        $excel->sheet('sheet name', function($sheet) use ($products)
        {
            $sheet->fromArray($products);
        });
    })->download($type);
}

public function fileUploadPost(Request $request){
    $request->validate([
        'sample_file' => 'required|mimes:pdf,xlx,csv|max:2048',
    ]);
     if($request->hasFile('sample_file')){
    $cover = $request->file('sample_file');
    $extension = $cover->getClientOriginalExtension();
    $fileNameToStore= '/uploads/'.'pdf-'.time().'.'.$extension;
    Storage::disk('public')->put($fileNameToStore,File::get($cover));
  } else {
      $fileNameToStore = 'noimage.jpg';
  }
    $post = new PdfPost;
    $post->title = $request->input('pdf_title');;
    $post->pdf_cat = $request->input('question_type');
    $post->admin_id = auth()->user()->id;
    $post->materials = $fileNameToStore;
    $post->thumbimage = $fileNameToStore;
    $post->save();
    return back()

      ->with('success','You have successfully upload file.')
      ->with('file',$fileNameToStore);

  //  return redirect('/vedio')->with('success', 'Vedio Created');





}

public function testUploadPost(Request $request){
  $this->validate($request, [
     'test_title' => 'required',
     'sample_file' => 'required|mimes:pdf,xlx,xlsx,csv,xls|max:2048',
     'test_time'=> 'required',
     'test_marks' => 'required',
     'test_subject' => 'required',
  ]);

  if($request->hasFile('sample_file')){
  $path = $request->file('sample_file')->getRealPath();
  $data = \Excel::load($path)->get();
  if($data->count()){
      foreach ($data as $key => $value) {
          $arr[] = ['subject_group_id' =>$value->subject_group_id, 'question_type' => $value->question_type,'question' => $value->question,
        'option_1' => $value->option_1,'option_2' => $value->option_2,'option_3' => $value->option_3,'option_4' => $value->option_4,'option_5' => $value->option_5,
      'correct_option' => $value->correct_option,'questions_selection_count' => $value->questions_selection_count,'admin_id' =>auth()->user()->id];
      }
      if(!empty($arr)){
        DB::table('test_class_value')->truncate();
        $post = new testValue;
        $post->test_time = $request->input('test_time');
        $post->test_marks = $request->input('test_marks');
        $post->test_subject = $request->input('test_subject');
        $post->test_title = $request->input('test_title');
        $post->save();
        DB::table('question_b_test')->truncate();
        DB::table('question_b_test')->insert($arr);
        dd('Insert Record successfully.');
      }
  }

}
 dd('Request data does not have any files to import.');
}

public function show()  {

      $user =DB::table('question_b_test')->distinct()->get();
      $test =DB::table('test_class_value')->get();
      return view('uploads.indexshow', compact('user','test'));
  }

  public function wordExport() {
     $user =DB::table('question_b_test')->get();
     $test =DB::table('test_class_value')->get();
      header("Content-type: application/vnd.ms-word");
      header("Content-Disposition: attachment;Filename=YOUR_DOC_NAME.doc");

      echo ' <h2 align = "middle">VISION AYURVED ACADEMY,NAGPUR</h2><br><br>';
      foreach($test as $tes){
      echo '<table border="0" width = "100%"  align = "middle" >
           <td align = "middle"><strong>TIME: </strong>'.$tes->test_time.'</td>
           <td align = "middle"><strong>SUB: </strong>'.$tes->test_subject.'</td>
           <td align = "middle"><strong>MARKS: </strong>'.$tes->test_marks.'</td>
       </table><br><br><br>';
     }
      $tableData = '';
      $tableStart = '<table class="table table-striped" width = "100%">
             <thead>
               <tr>
                 <th scope="col" >No</th>
                 <th scope="col" >Question</th>
                 <th scope="col" >A</th>
                 <th scope="col" >B</th>
                 <th scope="col" >C</th>
                 <th scope="col" >D</th>
               </tr>
             </thead>
             <tbody> ';
                $tableBody = '';
                  foreach($user as $post){
                    $tableBody =$tableBody.'<tr><td>'.$post->question_id.'</td>'.
                      '<td>'.$post->question.'</td>'.
                       '<td>'.$post->option_1.'</td>'.
                      '<td>'.$post->option_2.'</td>'.
                      '<td>'.$post->option_3.'</td>'.
                      '<td>'.$post->option_4.'</td></tr>';
                     }
              $tableEnd ='

             </tbody>

          </table>';

       $tableData = $tableStart.$tableBody.$tableEnd;

       echo $tableData;


         /*$users =DB::table('question_b_test')->get();
          $templateProcessor = new TemplateProcessor('word-template/user.docx');
          $index = 0;
          $txt = '';
          $result = DB::table('question_b_test')->select(DB::raw('question_id'))->get();
          foreach ($users as $user1) {
          $templateProcessor->setValue('question_id', $user1-);
          $cnt++;
        }

          foreach ($users as $key => $value) {
          $templateProcessor->setValue('question_id',$users);
          $templateProcessor->setValue('ROW#' . $index, $index);
        }


         //$templateProcessor->setValue('question_id1', $users[$cnt]->question_id);

          $fileName = "fsd";
          $templateProcessor->saveAs($fileName . '.docx');
          return response()->download($fileName . '.docx')->deleteFileAfterSend(true);*/

      }



}
