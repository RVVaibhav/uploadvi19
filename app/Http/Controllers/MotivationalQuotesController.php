<?php

namespace Vision\Http\Controllers;

use Illuminate\Http\Request;
use Vision\MotivationalQuotes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class MotivationalQuotesController extends Controller
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

    public function index()  {
        return view('motivation.indexMotivationQuotes');
    }

    public function store(Request $request){
        // Handle File Upload
        if($request->hasFile('thumbimage')){
              // Get filename with the extension
              $cover = $request->file('thumbimage');
              $extension = $cover->getClientOriginalExtension();
              $fileNameToStore= '/uploads/'.'spec-'.time().'.'.$extension;
              Storage::disk('public')->put($fileNameToStore,  File::get($cover));
          } else {
              $fileNameToStore = 'noimage.jpg';
          }
          if($request->hasFile('thumbimageM')){
                // Get filename with the extension
                $cover = $request->file('thumbimageM');
                $extension = $cover->getClientOriginalExtension();
                $fileNamesToStores= '/uploads/'.'moti-'.time().'.'.$extension;
                Storage::disk('public')->put($fileNamesToStores,  File::get($cover));
            } else {
                $fileNameToStores = 'noimage.jpg';
            }

        $post = new MotivationalQuotes;
        $post->date = $request->input('startdate');
        $post->special_day = $request->input('specialDay');
        $post->special_image = $fileNameToStore;
        $post->motivation_txt = $request->input('motivation');
        $post->motivation_image = $fileNamesToStores;
        $post->admin_id = auth()->user()->id;
        $post->save();
        return redirect('/motivationQuotes')->with('success', 'Vedio Created');
    }
}
