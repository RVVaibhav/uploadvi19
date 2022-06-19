<?php

namespace Vision;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'gender','mobile','role','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const ROLE_ADMIN = "admin";
    const ROLE_ADMIN_USER = "admin_user";
    const ROLE_USER = "user";


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }

    public function userDetails()
    {
        return $this->hasOne('Vision\UserDetails', 'user_id');
    }

    public function post()
    {
        return $this->hasMany('Vision\Post', 'user_id');
    }

    public function userlastpost()
    {
        return $this->hasOne('Vision\Post', 'user_id')->orderBy('id');
    }

    public function follow()
    {
        return $this->belongsToMany(User::class, 'Vision\Follow', 'user_id', 'follow_user_id');
    }

    function isFollow()
    {
        return $this->belongsToMany(User::class, 'Vision\Follow', 'follow_user_id', 'user_id');

    }

    public function followCount()
    {
        return $this->belongsToMany(User::class, 'Vision\Follow', 'user_id', 'follow_user_id')->count();
    }

    public function userCoin()
    {
        return $this->hasMany('Vision\UserCoin', 'user_id')->sum('coins');
    }

    public static function algorithUser($level_id){
        $algorithm = Algorithm::where('level_id', $level_id)->get();
        $users = [];
        foreach($algorithm as $key => $a){
            switch($a['reachto']){
                case "all":
                    $usercount = UserDetails::where('is_bot',1)->count();
                    $count = round($usercount * ($a['percentage']/100));
                    if($count > 0){
                        $users[] = User::with(['userDetails','userlastpost'])->whereHas('userDetails' , function($q){
                            $q->where('is_bot',1);
                        })->take($count)->get();
                    }
                break;
                case "1":
                    $usercount = UserDetails::where('is_bot',1)->where('level_id', 1)->count();
                    $count = round($usercount * ($a['percentage']/100));
                    if($count > 0){
                        $users[] = User::with(['userDetails','userlastpost'])->whereHas('userDetails' , function($q){
                            $q->where('is_bot',1)->where('level_id', 1);
                        })->take($count)->get();
                    }
                break;
                case "2":
                    $usercount = UserDetails::where('is_bot',1)->where('level_id', 2)->count();
                    $count = round($usercount * ($a['percentage']/100));
                    if($count > 0){
                        $users[] = User::with(['userDetails','userlastpost'])->whereHas('userDetails' , function($q){
                            $q->where('is_bot',1)->where('level_id', 2);
                        })->take($count)->get();
                    }
                break;
                case "3":
                    $usercount = UserDetails::where('is_bot',1)->where('level_id', 3)->count();
                    $count = round($usercount * ($a['percentage']/100));
                    if($count > 0){
                        $users[] = User::with(['userDetails','userlastpost'])->whereHas('userDetails' , function($q){
                            $q->where('is_bot',1)->where('level_id', 3);
                        })->take($count)->get();
                    }
                break;
                case "verified":
                    $usercount = UserDetails::where('verification',"!=","Not Verified")->count();
                    $count = round($usercount * ($a['percentage']/100));
                    if($count > 0){
                        $users[] = User::with(['userDetails','userlastpost'])->whereHas('userDetails' , function($q){
                            $q->where('verification',"!=","Not Verified");
                        })->take($count)->get();
                    }
                break;
                case "primary":
                    $usercount = UserDetails::where('is_primary',1)->count();
                    $count = round($usercount * ($a['percentage']/100));
                    if($count > 0){
                        $users[] = User::with(['userDetails','userlastpost'])->whereHas('userDetails' , function($q){
                            $q->where('is_primary',1);
                        })->take($count)->get();
                    }
                break;
                case "Male":
                    $usercount = User::where('gender',"Male")->count();
                    $count = round($usercount * ($a['percentage']/100));
                    if($count > 0){
                        $users[] = User::with(['userDetails','userlastpost'])->where('gender',"Male")->take($count)->get();
                    }
                break;
                case "Female":
                    $usercount = User::where('gender',"Female")->count();
                    $count = round($usercount * ($a['percentage']/100));
                    if($count > 0){
                        $users[] = User::with(['userDetails','userlastpost'])->where('gender',"Female")->take($count)->get();
                    }
                break;
                case "VideoCall":
                    $usercount = UserDetails::where('status',"Video")->count();
                    $count = round($usercount * ($a['percentage']/100));
                    if($count > 0){
                        $users[] = User::with(['userDetails','userlastpost'])->whereHas('userDetails' , function($q){
                            $q->where('status',"Video");
                        })->take($count)->get();
                    }
                break;
                case "AudioCall":
                    $usercount = UserDetails::where('status',"Audio")->count();
                    $count = round($usercount * ($a['percentage']/100));
                    if($count > 0){
                        $users[] = User::with(['userDetails','userlastpost'])->whereHas('userDetails' , function($q){
                            $q->where('status',"Audio");
                        })->take($count)->get();
                    }
                break;
            }
        }
        $collection = collect($users);
        return $collection->collapse();

    }

}
