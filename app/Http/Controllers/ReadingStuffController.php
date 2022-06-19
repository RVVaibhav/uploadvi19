<?php

namespace Vision\Http\Controllers;

use Illuminate\Http\Request;
use Vision\ReadinStuffText;
use Vision\ReadingStuffData;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
class ReadingStuffController extends Controller
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
      return view('readingStuff.indexReading');
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
          $post = new ReadinStuffText;
          $post->title = $request->input('_title');
          $post->description = $request->input('description');
          $post->createdBy = $request->input('question_type');
          $post->save();
          return redirect('/reading')->with('success', 'Reading Stuff  Add Successfully!');
     }else if($tabId == 2) {

              $validatedData =$request->validate([
                 'title' => 'required',
                 'description'=> 'required',
                 'question_type' => 'required',
              ]);
              if($request->hasFile('gift_img')){
                foreach($request->file('gift_img') as $file)
              {
                $cover = $file;
                $extension = $cover->getClientOriginalExtension();
                $fileNameToStore= '/uploads/'.'image-'.time().'.'.$extension;
             //   $path = $request->file('image')->storeAs('public/video', $fileNameToStore);
                Storage::disk('public')->put($fileNameToStore,  File::get($cover));
                   $Imgdata[] = $fileNameToStore;
              }

                   // $path = $request->file('image')->storeAs('public/video', $fileNameToStore);
                    //Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
                } else {
                    $fileNameToStore = 'noimage.jpg';
                }
          $post = new ReadingStuffData;
          $post->title = $request->input('title');
          $post->description = $request->input('description');
          $post->createdBy = $request->input('question_type');
          $post->attachment = json_encode($Imgdata);
          $post->type = "image";
          $post->save();
          return redirect('/reading')->with('success', 'Image Add Successfully!');
     }else if($tabId == 3) {
    $validatedData = $request->validate([
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
           $post = new ReadingStuffData;
           $post->title = $request->input('title');
           $post->description = $request->input('description');
           $post->createdBy = $request->input('question_type');
           $post->attachment = $fileNameToStore;
           $post->type = "video";
           $post->save();
          return redirect('/reading')->with('success', 'Video Add Successfully!');



     }
}
}
