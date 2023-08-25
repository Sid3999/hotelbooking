<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\reset;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{ 
    use HttpResponses;
    public function store(Request $request)
    {
        $request->validate([
          'email' => 'required|unique:users'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->phone;
        $user->password = bcrypt($request->password);
        $user->address = $request->City;
        $user->email_verified_at = new DateTime();
        $user->save();
        if ($user) {
            $data = ['role_id' => 2, 'user_id' => $user->id];
            DB::table('role_user')->insert($data);
            $message = 'User Added Successfully';
            return $this->success($user,$message,200);
        }
        else
        {
            $message = 'User Registeration Unsuccessful. Try Again';
            return $this->success($user,$message,400);
        }
     
      
    }
    public function login(Request $request)
    {
        // if(Auth::check())
        // {
        //     return 'd';
        // }
        // else
        // {
        //     $check = User::where('email', '=' ,$request->email)->where('password',bcrypt($request->password))->get('id');
        //     return $check;
        // }
        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
           return $this->error('', 'unauthenticated', 402);
        }
        $check = User::where('email', '=' ,$request->email)->get('id');
        if ($check){
            foreach ($check AS $usercheck) {
                $auth_user = User::find($usercheck['id']);
                if(!$auth_user && !Hash::check($request->password, $auth_user->password)){
                    $this->error('', 'Credentials not match', 401);
                }else{
                        return $this->success([
                            'user' => $auth_user,
                            'token' => $auth_user->createToken('Api Token of '. $auth_user->name)->plainTextToken
                        ]);
                  
                }
            }
        }else{
            return $this->error('', 'User Dont exits', 401);
        }


    }
    public function forgetpassword(Request $request)
    {
        request()->validate(['email' => 'required|email']);
        $check = User::where('email', '=' ,$request->email)->first();
      
        if($check)
        {
            $otp = mt_rand(1000,9999);
            $reset = reset::where('user_id',$check->id)->first(); 
           if($reset)
           {
               $reset->otp = $otp;
               $reset->update();
           }
           else
           {
            $reset = new reset();
            $reset->user_id = $check->id;
            $reset->otp =  $otp;
            $reset->save();
            }
            $details = [
                'id' => $check->id,
                'otp' => $otp
            ];
           
                \Mail::to($request->email)->send(new \App\Mail\resetPassword($details));
           
            
        }
        else
        {
         return $this->error('', 'User Dont exits', 401);
        }

        return $this->success($details,'Otp sent on your email id',200);
    }
    public function verifyotp(Request $request)
    {
        $check = User::where('id',$request->id)->first();
        $reset = reset::where('user_id',$request->id)->first();
        if ($check){
           if($reset)
           {
        $reset = reset::where('user_id' , $request->id)->first();
        if($reset->otp == $request->otp)
        {
            return $this->success('','Otp Verified',200);
        }
        else
        {
            return $this->error('','Incorret Otp. Try Again',401);
        }
    }
    else
    {
        return $this->error('', 'We Havenot recived Password Change request', 401);
    }

    }
     else
    {
        return $this->error('', 'User Dont exits', 401);
    }
    }
    public function resetpassword(Request $request)
    {
        $check = User::where('id',$request->id)->first();
        
        if ($check){
            $user = User::find($request->id);
            $user->password = Hash::make($request->password);
            $user->update();
            return $this->success($user,'Password Changed',200);
        }
        else
        {
            return $this->error('', 'User Dont exits', 401);
        }
    }

}
