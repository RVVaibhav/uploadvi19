<?php

namespace Vision\Http\Controllers\Auth;

use Vision\User;
use Vision\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use JWTAuth;
use Log;

use Vision\VerifyMobile;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Vision\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function registerMobile(Request $request){
        $validatedData = $request->validate([
            'mobile'     => 'required|digits:10',
        ]);

        $verification = VerifyMobile::where('mobile',  $request->input('mobile'))->first();
        if($verification){
            // $verifcode = mt_rand(1000, 9999);
            $verifcode = 1111;
            $verification->verif_code = $verifcode;
            $verification->status = 'newuser';
            $verification->save();
            Log::debug("VERIFICATION CODE : " .$verifcode );
            // $this->sendSMS($request->input('mobile'),  $verifcode);
            return response()->json(['mobile' => $verification->mobile]);
        }

        // $verifcode = mt_rand(1000, 9999);
        $verifcode = 1111;

        Log::debug("VERIFICATION CODE : " .$verifcode );

        $VerifyMobile = new VerifyMobile();
        $VerifyMobile->mobile = $request->input('mobile');
        $VerifyMobile->verif_code = $verifcode;
        $VerifyMobile->save();
        // $this->sendSMS($request->input('mobile'),  $verifcode);
        return response()->json(['mobile' => $verification->mobile]);
    }

     public function verifyMobile(Request $request){

        $validatedData = $request->validate([
            'mobile'     => 'required|regex:/[0-9]{10}/|digits:10',
            'verifcode'  => 'required'
        ]);

        $code = VerifyMobile::where('mobile', $request->input('mobile'))->where('verif_code', $request->input('verifcode'))->where('status', 'newuser')->orderBy('id', 'desc')->first();
        if($code){
            $code->status = 'verified';
            $code->save();
            $user = User::where('mobile', $request->input('mobile'))->first();
            if($user->role == User::ROLE_ADMIN){
                return response()->json(['status' => 'Admin User'],401);
            }
            if($user){
                $credentials = [
                    'mobile' => $request->input('mobile'),
                    'password' => "User#$735"
                ];
        
                try {
                    // verify the credentials and create a token for the user
                    if (! $token = JWTAuth::attempt($credentials)) {
                        return response()->json(['error' => 'invalid_credentials'], 401);
                    }
                } catch (JWTException $e) {
                    // something went wrong
                    return response()->json(['error' => 'could_not_create_token'], 500);
                }
                // if no errors are encountered we can return a JWT
                return response()->json(['status' => 'verified', 'token' => $token]);
            }else{
                return response()->json(['status' => 'success', 'token' => '']);
            }
        }else {
            return response()->json(['status' => 'invalid verification']);
        }
    }

    public function registerMobileUser(Request $request){

        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'mobile'   => 'required',
            'gender'   => 'required',
        ]);

        $user = User::where('mobile', $request->input('mobile'))->first();
        if(!$user){
            $user = new user();
        }
        $user->name = $request->input('name');
        $user->mobile = $request->input('mobile');
        $user->gender = $request->input('gender');
        $user->role = USER::ROLE_USER;
        $user->password = bcrypt("User#$735");
        $user->save();
        $credentials = [
            'mobile' => $user->mobile,
            'password' => "User#$735"
        ];

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }

    private function createSlug($name){
        $str_rand =  str_random(5);
        $slug = $name .'-'.$str_rand;
        return $slug;
    }


    private function validateSlug($slug, $name){
        $n_slug = $slug;
        $validateslug = User::where('slug', $slug)->get();
        if(count($validateslug) > 0){
            $n_slug = $this->createSlug($name);
            $this->validateSlug($n_slug, $name);
        }else
            return $n_slug;
    }

    private function sendSMS($mobile, $code){
        $ps2="7orGT$!6";

        $url = "https://www.smsjust.com/blank/sms/user/urlsmstemp.php?username=ADWIN&pass=". $ps2 ."&senderid=ADWINZ&dest_mobileno=" . $mobile. "&tempid=70644&F1=" . $code. "&response=Y";

        $curl_handle = curl_init();
                
        curl_setopt($curl_handle, CURLOPT_URL, $url);
                        
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
                        
        $hint = curl_exec($curl_handle);
                        
        curl_close($curl_handle);
    }
}
