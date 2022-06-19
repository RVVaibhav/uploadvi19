<?php

namespace Vision\Http\Controllers;

use Illuminate\Http\Request;
use Vision\Subscription;
class SubscribeController extends Controller
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

      return view('subscribeTab.indexsubscribe');
        //   return view('test.indextest',compact('items'));
       }

       public function store(Request $request) {
         $tabId = $request->input('id');
         if($tabId == 1){
           $validatedData =$request->validate([
             'first_year' => 'required',
             'second_year' => 'required',
             'third_year' => 'required',
             'fourth_year' => 'required',
             'complete' => 'required',
             'user_bio' => 'required',
           ]);
                  //   'description','subsription','tab1','tab2','tab3','tab4','admin','createdBy'
              $post = new Subscription;
              $post->description = $request->input('user_bio');
              $post->subsription = "BAMS";
              $post->tab1 = $request->input('first_year');
              $post->tab2 = $request->input('second_year');
              $post->tab3 = $request->input('third_year');
              $post->tab4 = $request->input('fourth_year');
              $post->admin_i = auth()->user()->id;
              $post->createdBy = auth()->user()->id;
              $post->complete = $request->input('complete');
              $post->save();
              return redirect('/subscribe')->with('success', ' Subscription BAMS Add Successfully!');
         }else if($tabId == 2) {
                  $validatedData =$request->validate([
                    'charaka_p' => 'required',
                    'Sushrut_p' => 'required',
                    'vaghbhat_p' => 'required',
                    'other_samhita_s' => 'required',
                    'complete_s' => 'required',
                    'user_bio_s' => 'required',
                  ]);

                  $post = new Subscription;
                  $post->description = $request->input('user_bio_s');
                  $post->subsription = "SAMHITA";
                  $post->tab1 = $request->input('charaka_p');
                  $post->tab2 = $request->input('Sushrut_p');
                  $post->tab3 = $request->input('vaghbhat_p');
                  $post->tab4 = $request->input('other_samhita_s');
                  $post->admin_i = auth()->user()->id;
                  $post->createdBy = auth()->user()->id;
                  $post->complete = $request->input('complete_s');
                  $post->save();
                return redirect('/subscribe')->with('success', 'Subscription SAMHITA Add Successfully!');
         }else if($tabId == 3) {
           $validatedData =$request->validate([
             'first_year_t' => 'required',
             'second_year_t' => 'required',
             'third_year_t' => 'required',
             'fourth_year_t' => 'required',
             'complete_t' => 'required',
             'user_bio_t' => 'required',
           ]);
            $post = new Subscription;
            $post->description = $request->input('user_bio_t');
            $post->subsription = "TESTSERIES";
            $post->tab1 = $request->input('first_year_t');
            $post->tab2 = $request->input('second_year_t');
            $post->tab3 = $request->input('third_year_t');
            $post->tab4 = $request->input('fourth_year_t');
            $post->admin_i = auth()->user()->id;
            $post->createdBy = auth()->user()->id;
            $post->complete = $request->input('complete_t');
            $post->save();
            return redirect('/subscribe')->with('success', 'Subscription TEST Series Add Successfully!');

         }
}
}
