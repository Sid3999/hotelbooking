<?php

namespace App\Http\Controllers\Auth;

use App\Emailverfication\emailverfication;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Request;

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
    protected $redirectTo = '/home';

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
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|min:6|same:password',
            'address' => 'required',
            'mobile' => 'required',
            'phone' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif'],

            ['name.required' => 'Name cannot be empty',
                'email.required' => 'Email field is required',
                'email.unique' => 'Email has been already taken !',
                'password.required' => 'Password cannot be empty',
                'password.min' => 'Min Password length must be 6',
                'password.confirmed' => "Password doesn't match",
                'image.mimes' => "Image type must be jpeg,jpg,png,gif",
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data , emailverfication $email)
    {    
       
        // $user_image = $data['image'];
        // $cnic = $data['cnic'];
        // $utility_bill = $data['utility_bill'];
      
        $userdata = [
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'image' => $data['image'],
            'cnic' => $data['cnic'],
            'utility_bill' => $data['utility_bill'],
            'date_of_birth' => $data['date_of_birth'],
            'password' => Hash::make($data['password']),
            'is_active' => 1,
        ];
        if (request()->hasFile('image') && request()->file('image')->isValid()) {
            $user_image = request()->file('image');
            $extension = $user_image->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $user_image->move('images/users/', $fileName);
            $userdata['image'] = $fileName;
        }
        if (request()->hasFile('cnic') && request()->file('cnic')->isValid()) {
            $cnic = request()->file('cnic');
            $extension = $cnic->getClientOriginalExtension();
            $fileNamee = uniqid() . '.' . $extension;
            $cnic->move('images/cnics/', $fileNamee);
            $userdata['cnic'] = $fileNamee;
        }
        if (request()->hasFile('utility_bill') && request()->file('utility_bill')->isValid()) {
            $utility_bill = request()->file('utility_bill');
            $extension = $utility_bill->getClientOriginalExtension();
            $fileNameee = uniqid() . '.' . $extension;
            $utility_bill->move('images/utility_bills/', $fileNameee);
            $userdata['utility_bill'] = $fileNameee;
        }
        $user = User::create($userdata);
        $users = User::orderBy('id', 'desc')->first();
         
        if ($user) {
            $data = ['role_id' => 2, 'user_id' => $users->id];
            DB::table('role_user')->insert($data);
            
            
        }
        // $email->verfication($users->id ,  $userdata['email']);
        return $user;
       
      
    }
}
