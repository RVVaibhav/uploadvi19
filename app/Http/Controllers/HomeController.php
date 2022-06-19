<?php

namespace Vision\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use app\User;
use Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // if(Auth::user()->role == USER::ROLE_ADMIN){
        //     return redirect('home');
        // }

        // if(Auth::user()->role == USER::ROLE_ADMIN_USER){
        //     return redirect('/logout');
        // }

        // if(Auth::user()->role == USER::ROLE_USER){
        //     return redirect('/logout');
        // }
        return view('home');
    }
}
