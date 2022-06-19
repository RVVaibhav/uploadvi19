<?php

namespace Vision\Http\Controllers;

use Illuminate\Http\Request;
use Vision\VisionMnemonics;


class MnemonicsController extends Controller
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
        // if(Auth::user()->role == USER::ROLE_ADMIN){
        //     return redirect('home');
        // }

        // if(Auth::user()->role == USER::ROLE_ADMIN_USER){
        //     return redirect('/logout');
        // }

        // if(Auth::user()->role == USER::ROLE_USER){
        //     return redirect('/logout');
        // }
        return view('mnemonics.indexMnemonics');
    }


    public function store(Request $request) {

                     $post = new VisionMnemonics;
                     $post->title =$request->input('title');
                     $post->description = $request->input('description');
                     $post->admin_id = auth()->user()->id;
                     $post->save();
                     return redirect('/mnemonics')->with('success', ' Mnemonics Created!');


        }
}
