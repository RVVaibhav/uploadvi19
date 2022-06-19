<?php

namespace Vision\Http\Controllers;

use Illuminate\Http\Request;
use Vision\StudyTipsTest;
use Vision\StudyTipsData;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;



class StudyTipsController extends Controller
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
      return view('studyStuff.indexStudyTips');
        //   return view('test.indextest',compact('items'));
   }

   public function store(Request $request) {
     $tabId = $request->input('id');
     if($tabId == 1){
       $this->validate($request, [
                 '_title' => 'required',
                 'description' => 'required',
                 'question_type' => 'required',
              ]);
          $post = new StudyTipsTest;
          $post->title = $request->input('_title');
          $post->description = $request->input('description');
          $post->createdBy = $request->input('question_type');
          $post->save();
          return redirect('/study')->with('success', 'Study Tips  Add Successfully!');
     }else if($tabId == 2) {

             $this->validate($request, [
                 'title' => 'required',
                  'gift_img' => 'required|image|mimes:jpg,png|max:2048',
                 'description'=> 'required',
                 'question_type' => 'required',
              ]);
              if($request->hasFile('gift_img')){
                    $cover = $request->file('gift_img');
                    $extension = $cover->getClientOriginalExtension();
                    $fileNameToStore= '/uploads/'.'image-'.time().'.'.$extension;
                 //   $path = $request->file('image')->storeAs('public/video', $fileNameToStore);
                    Storage::disk('public')->put($fileNameToStore,  File::get($cover));
                    // Upload Image
                   // $path = $request->file('image')->storeAs('public/video', $fileNameToStore);
                    //Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
                } else {
                    $fileNameToStore = 'noimage.jpg';
                }
          $post = new StudyTipsData;
          $post->title = $request->input('title');
          $post->description = $request->input('description');
          $post->createdBy = $request->input('question_type');
          $post->attachment = $fileNameToStore;
          $post->type = "image";
          $post->save();
          return redirect('/study')->with('success', 'Image Add Successfully!');
     }else if($tabId == 3) {
     $this->validate($request, [
         'title' => 'required',
         'description'=> 'required',
         'question_type' => 'required',
         'sample_file' => 'required|mimes:mp4,mov,ogg,qt',
       ]);

       // Handle File Upload
       if($request->hasFile('sample_file')){
             // Get filename with the extension
             $cover = $request->file('sample_file');
             $extension = $cover->getClientOriginalExtension();
             $fileNameToStore= '/uploads/'.'vid-'.time().'.'.$extension;
             Storage::disk('public')->put($fileNameToStore,  File::get($cover));
         } else {
             $fileNameToStore = 'noimage.jpg';
         }
           $post = new StudyTipsData;
           $post->title = $request->input('title');
           $post->description = $request->input('description');
           $post->createdBy = $request->input('question_type');
           $post->attachment = $fileNameToStore;
           $post->type = "video";
           $post->save();
          return redirect('/study')->with('success', 'Video Add Successfully!');



     }

 }
}
