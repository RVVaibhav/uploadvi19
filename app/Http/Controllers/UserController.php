<?php

namespace Vision\Http\Controllers;

use Vision\User;
use Vision\StudentRegistration;
use Vision\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Vision\UserDetails;
use Vision\UserCoin;
use Vision\Level;
use Vision\Algorithm;
use Storage;
use Log;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \Vision\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {

        $users = StudentRegistration::orderBy('created_at','desc')->paginate(10);
        $state = DB::table('master_states')->pluck('state_name','id');
        return view('users.index',compact('users','state'));
    }

    public function create()
    {
        $level = Level::all();
        return view('users.create')->with('level', $level);
    }

    public function show(Request $request,$id)
    {
        $level = Level::all();
        $user =  User::with('userDetails')->find($id);
        return view('users.edit')->with('user', $user)->with('level', $level);
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'name' => 'required',
            'mobile' => 'required|regex:/[0-9]{10}/|digits:10',
            'gender' => 'required',
            'user_bio' => 'required',
            'age' => 'required',
            'verification' => 'required',
            'level_id' => 'required',
            'is_primary' => 'required',
            'is_bot' => 'required',
            'profile_pic' => 'required|image|max:2048',
        ]);
        $level = Level::find($request->input('level_id'));
        $user = User::findOrFail($id);
        $user->name =  $request->input('name');
        $user->mobile =  $request->input('mobile');
        $user->gender =  $request->input('gender');
        $user->save();
        $userDetails = UserDetails::where('user_id',$user->id)->first();
        $userDetails->user_id = $user->id;
        $userDetails->level_id = $request->input('level_id');
        $userDetails->is_primary = $request->input('is_primary') == 'true' ? 1 : 0;
        $userDetails->is_bot = $request->input('is_bot')== 'true' ? 1 : 0;
        $userDetails->age = $request->input('age');
        $userDetails->verification = $request->input('verification');
        $userDetails->user_bio = $request->input('user_bio');
        $userDetails->status = $request->input('status');
        if($request->file('profile_pic')){
            $path = Storage::put('user/'.$user->id, $request->file('profile_pic'), 'public');
            // $path = $request->file('profile_pic')->store('user/'.$user->id);
            $userDetails->profile_pic = $path;
        }
        $userDetails->save();
        $usercoin = UserCoin::where('user_id',$user->id)->first();
        $usercoin->coins = $level->to_coin ? $level->to_coin : 10;
        $usercoin->save();
        return redirect('/users');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'name' => 'required',
            'mobile' => 'required|regex:/[0-9]{10}/|digits:10',
            'email' => 'required',
            'password' => 'required',
            'ugcollage' => 'required',
            'state_type' => 'required',
            'city' => 'required',
        ]);
        $user = new User();
        $user->name =  $request->input('name');
        $user->mobile =  $request->input('mobile');
        $user->gender =  $request->input('gender');
        $user->password =  bcrypt("User#$735");
        $user->role =  User::ROLE_ADMIN_USER;
        $user->save();
        $userDetails = new UserDetails();
        $userDetails->user_id = $user->id;
        $userDetails->level_id = $request->input('level_id');
        $userDetails->is_primary = $request->input('is_primary') == 'true' ? 1 : 0;
        $userDetails->is_bot = $request->input('is_bot')== 'true' ? 1 : 0;
        $userDetails->age = $request->input('age');
        $userDetails->verification = $request->input('verification');
        $userDetails->user_bio = $request->input('user_bio');
        $userDetails->status = $request->input('status');
        if($request->file('profile_pic')){
            $path = Storage::put('user/'.$user->id, $request->file('profile_pic'), 'public');
            // $path = $request->file('profile_pic')->store('user/'.$user->id);
            $userDetails->profile_pic = $path;
        }
        $userDetails->save();
        $usercoin = new UserCoin();
        $usercoin->user_id = $user->id;
        $usercoin->coins = $level->to_coin ? $level->to_coin : 10;
        $usercoin->save();
        return redirect('/users');
    }


    public function stores(Request $request){
      $validatedData = $request->validate([

          'fname' => 'required',
          'lname' => 'required',
          'mobile' => 'required|regex:/[0-9]{10}/|digits:10',
          'email' => 'required',
          'password' => 'required',
          'ugcollage' => 'required',
          'state_type' => 'required',
          'city' => 'required',
      ]);
      $user = new StudentRegistration();
      $user->user_name =  $request->input('fname').' '.$request->input('lname');
      $user->user_mobile =  $request->input('mobile');
      $user->user_email =  $request->input('email');
      $user->user_password =  sha1($request->input('password'));
      $user->ug_college =  $request->input('ugcollage');
      $user->city =  $request->input('city');
      $user->state =  $request->input('state_type');
      $user->save();
      return redirect('/users');
    }


    public function updateStudent(Request $request,$id)
    {
      $validatedData = $request->validate([

          'name' => 'required',
          'mobile' => 'required|regex:/[0-9]{10}/|digits:10',
          'email' => 'required',
          'password' => 'required',
          'ugcollage' => 'required',
          'state_type' => 'required',
          'city' => 'required',
      ]);
        $user = StudentRegistration::findOrFail($id);
        $user->user_name =  $request->input('name');
        $user->user_mobile =  $request->input('mobile');
        $user->user_email =  $request->input('email');
        $user->user_password =  bcrypt("User#$735");
        $user->ug_college =  $request->input('ugcollage');
        $user->city =  $request->input('city');
        $user->state =  $request->input('state_type');
        $user->save();

        return redirect('/users');
    }



       public function destroy($id){
         $gift = StudentRegistration::findOrFail($id)->delete();
         return redirect('/users');
       }




    public function updateProfile(Request $request)
    {
        // 'profile_pic' => 'required|image|max:2048',
        $validatedData = $request->validate([
            'name' => 'required',
            'user_bio' => 'required',
            'age' => 'required',
        ]);
        if($user = Auth::user()){
            $user->name =  $request->input('name');
            if($request->input('gender')){
                $user->gender =  $request->input('gender');
            }
            $user->save();
            if($user->userDetails()->exists() == ""){
                $userDetails = new UserDetails();
                $userDetails->user_id = $user->id;
            }else{
                $userDetails = $user->userDetails;
            }
            $userDetails->level_id = $userDetails->level_id ? $userDetails->level_id : 1;
            $userDetails->user_bio = $request->input('user_bio');
            $userDetails->age = $request->input('age');
            if($request->file('profile_pic')){
                $path = Storage::put('user/'.$user->id, $request->file('profile_pic'), 'public');
                $userDetails->profile_pic = $path;
            }
            $userDetails->save();
            $user['status'] = "success";
            return response()->json($user);
        }else{
            return response()->json(['error' => 'invalid_request'], 422);
        }
    }

    public function getProfile(Request $request)
    {
        $userid = $request->userid ? $request->userid : null;
        if($userid != null){
            $user = User::with('userDetails')->withCount('isFollow')->find($userid);
            $user['followers'] = $user->followCount();
            $user['userCoin'] = $user->userCoin();
            $user['status'] = "success";
            return response()->json($user);
        }else if($user = Auth::user()){
            $user->userDetails;
            $user['followers'] = $user->followCount();
            $user['userCoin'] = $user->userCoin();
            $user['status'] = "success";
            return response()->json($user);
        }else{
            return response()->json(['error' => 'invalid_request'], 422);
        }
    }

    public function followUser(Request $request)
    {
        $follow_id = $request->follow_id ? $request->follow_id : null;
        if($user = Auth::user()){
            $follow = User::find($follow_id);
            if($follow->role == User::ROLE_USER || $follow->role == User::ROLE_ADMIN_USER){
                $user->follow()->attach([$follow_id]);
                return response()->json(['msg' => 'success']);
            }else{
                return response()->json(['msg' => 'error'], 422);
            }
            // Get all friends:
            // Auth::user()->friends (or Auth::user()->friends()->get())
            // Add friends:
            // Auth::user()->friends()->attach([2,3,4]); // Add user_id 2, 3 and 4
            // Remove friends:
            // Auth::user()->friends()->detach([2]); // Remove user_id = 2
            // Sync friends:
            // Auth::user()->friends()->sync([7]); // Remove old and add user_id = 7
        }else{
            return response()->json(['msg' => 'error'], 422);
        }
    }

    public function getAlgorithmUsers(Request $request)
    {
        $offset = $request->offset ? $request->offset : 1;
        $limit = $request->limit ? $request->limit : 5;
        if($user = Auth::user()){
            $level_id = $user->userDetails ? $user->userDetails->level_id : 1;
            $algorithm = Algorithm::where('level_id', $level_id)->get();
            $users = [];
            foreach($algorithm as $key => $a){
                switch($a['reachto']){
                    case "all":
                        $usercount = UserDetails::where('is_bot',1)->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails'])->withCount('follow','isFollow')->whereHas('userDetails' , function($q){
                                $q->where('is_bot',1);
                            })->take($count)->get();
                        }
                    break;
                    case "1":
                        $usercount = UserDetails::where('is_bot',1)->where('level_id', 1)->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails'])->withCount('follow','isFollow')->whereHas('userDetails' , function($q){
                                $q->where('is_bot',1)->where('level_id', 1);
                            })->take($count)->get();
                        }
                    break;
                    case "2":
                        $usercount = UserDetails::where('is_bot',1)->where('level_id', 2)->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails'])->withCount('follow','isFollow')->whereHas('userDetails' , function($q){
                                $q->where('is_bot',1)->where('level_id', 2);
                            })->take($count)->get();
                        }
                    break;
                    case "3":
                        $usercount = UserDetails::where('is_bot',1)->where('level_id', 3)->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails'])->withCount('follow','isFollow')->whereHas('userDetails' , function($q){
                                $q->where('is_bot',1)->where('level_id', 3);
                            })->take($count)->get();
                        }
                    break;
                    case "verified":
                        $usercount = UserDetails::where('verification',"!=","Not Verified")->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails'])->withCount('follow','isFollow')->whereHas('userDetails' , function($q){
                                $q->where('verification',"!=","Not Verified");
                            })->take($count)->get();
                        }
                    break;
                    case "primary":
                        $usercount = UserDetails::where('is_primary',1)->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails'])->withCount('follow','isFollow')->whereHas('userDetails' , function($q){
                                $q->where('is_primary',1);
                            })->take($count)->get();
                        }
                    break;
                    case "Male":
                        $usercount = User::where('gender',"Male")->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails'])->withCount('follow','isFollow')->where('gender',"Male")->take($count)->get();
                        }
                    break;
                    case "Female":
                        $usercount = User::where('gender',"Female")->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails'])->withCount('follow','isFollow')->where('gender',"Female")->take($count)->get();
                        }
                    break;
                    case "VideoCall":
                        $usercount = UserDetails::where('status',"Video")->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails'])->withCount('follow','isFollow')->whereHas('userDetails' , function($q){
                                $q->where('status',"Video");
                            })->take($count)->get();
                        }
                    break;
                    case "AudioCall":
                        $usercount = UserDetails::where('status',"Audio")->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails'])->withCount('follow','isFollow')->whereHas('userDetails' , function($q){
                                $q->where('status',"Audio");
                            })->take($count)->get();
                        }
                    break;
                }
            }
            $collection = collect($users);
            $user = $collection->collapse();
            // $users = $this->paginate($user, $limit, $offset);
            return response()->json($user);
        }
    }

    public function getAlgorithmUsersPost(Request $request)
    {
        $offset = $request->offset ? $request->offset : 1;
        $limit = $request->limit ? $request->limit : 5;
        if($user = Auth::user()){
            $level_id = $user->userDetails ? $user->userDetails->level_id : 1;
            $algorithm = Algorithm::where('level_id', $level_id)->get();
            $users = [];
            foreach($algorithm as $key => $a){
                switch($a['reachto']){
                    case "all":
                        $usercount = UserDetails::where('is_bot',1)->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails','userlastpost'])->withCount('follow','isFollow')->whereHas('userDetails' , function($q){
                                $q->where('is_bot',1);
                            })->has('userlastpost')->take($count)->get();
                        }
                    break;
                    case "1":
                        $usercount = UserDetails::where('is_bot',1)->where('level_id', 1)->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails','userlastpost'])->withCount('follow','isFollow')->whereHas('userDetails' , function($q){
                                $q->where('is_bot',1)->where('level_id', 1);
                            })->has('userlastpost')->take($count)->get();
                        }
                    break;
                    case "2":
                        $usercount = UserDetails::where('is_bot',1)->where('level_id', 2)->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails','userlastpost'])->withCount('follow','isFollow')->whereHas('userDetails' , function($q){
                                $q->where('is_bot',1)->where('level_id', 2);
                            })->has('userlastpost')->take($count)->get();
                        }
                    break;
                    case "3":
                        $usercount = UserDetails::where('is_bot',1)->where('level_id', 3)->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails','userlastpost'])->withCount('follow','isFollow')->whereHas('userDetails' , function($q){
                                $q->where('is_bot',1)->where('level_id', 3);
                            })->has('userlastpost')->take($count)->get();
                        }
                    break;
                    case "verified":
                        $usercount = UserDetails::where('verification',"!=","Not Verified")->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails','userlastpost'])->withCount('follow','isFollow')->whereHas('userDetails' , function($q){
                                $q->where('verification',"!=","Not Verified");
                            })->has('userlastpost')->take($count)->get();
                        }
                    break;
                    case "primary":
                        $usercount = UserDetails::where('is_primary',1)->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails','userlastpost'])->withCount('follow','isFollow')->whereHas('userDetails' , function($q){
                                $q->where('is_primary',1);
                            })->has('userlastpost')->take($count)->get();
                        }
                    break;
                    case "Male":
                        $usercount = User::where('gender',"Male")->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails','userlastpost'])->withCount('follow','isFollow')->where('gender',"Male")->has('userlastpost')->take($count)->get();
                        }
                    break;
                    case "Female":
                        $usercount = User::where('gender',"Female")->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails','userlastpost'])->withCount('follow','isFollow')->where('gender',"Female")->has('userlastpost')->take($count)->get();
                        }
                    break;
                    case "VideoCall":
                        $usercount = UserDetails::where('status',"Video")->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails','userlastpost'])->withCount('follow','isFollow')->whereHas('userDetails' , function($q){
                                $q->where('status',"Video");
                            })->has('userlastpost')->take($count)->get();
                        }
                    break;
                    case "AudioCall":
                        $usercount = UserDetails::where('status',"Audio")->count();
                        $count = round($usercount * ($a['percentage']/100));
                        if($count > 0){
                            $users[] = User::with(['userDetails','userlastpost'])->withCount('follow','isFollow')->whereHas('userDetails' , function($q){
                                $q->where('status',"Audio");
                            })->has('userlastpost')->take($count)->get();
                        }
                    break;
                }
            }
            $collection = collect($users);
            $user = $collection->collapse();
            // $users = $this->paginate($user, $limit, $offset);
            return response()->json($user);
        }
    }

    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function myformAjax($id){
        $cities = DB::table("master_cities")
                    ->where("state_id",$id)
                    ->get();
        return json_encode($cities);
    }


}
