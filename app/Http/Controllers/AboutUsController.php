<?php

namespace Vision\Http\Controllers;

use Illuminate\Http\Request;
use Vision\AboutUs;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
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
      return view('aboutus.indexaboutUs');
        //   return view('test.indextest',compact('items'));
       }

       public function store(Request $request){
           $this->validate($request, [
              'name' => 'required',
              'image' => 'required|image|mimes:jpg,png|max:2048',
              'education'=> 'required',
              'description' => 'required',
              'education'=> 'required',
              'description' => 'required',
           ]);

           // Handle File Upload
           if($request->hasFile('image')){
                 // Get filename with the extension
                 $cover = $request->file('image');
                 $extension = $cover->getClientOriginalExtension();

                 //$filenameWithExt = $request->file('image')->getClientOriginalName();
                 // Get just filename
                // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                 // Get just ext
                 //$extension = $request->file('image')->getClientOriginalExtension();
                 // Filename to store
                 $fileNameToStore= '/uploads/'.'pro-'.time().'.'.$extension;
              //   $path = $request->file('image')->storeAs('public/video', $fileNameToStore);
                 Storage::disk('public')->put($fileNameToStore,  File::get($cover));
                 // Upload Image
                // $path = $request->file('image')->storeAs('public/video', $fileNameToStore);
                 //Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
             } else {
                 $fileNameToStore = 'noimage.jpg';
             }
        
           $post = new AboutUs;
           $post->name = $request->input('name');
           $post->education = $request->input('education');
           $post->description = $request->input('description');
           $post->createdBy = auth()->user()->id;
           $post->admin_id = auth()->user()->id;
           $post->attachment = $fileNameToStore;

           $post->save();
           return redirect('/aboutus')->with('success', 'Data  Created');
       }

}
