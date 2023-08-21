<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use app\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function myprofile(){
        if(auth::user()){
            $user=User::find(auth::user()->id);
            if($user)
            return view('customer.profile'  , compact('user'));
        }
    }
    public function myorder(){
        return view('customer.myorder');
    }
    public function changepassword(){
        return view('customer.changepassword');
    }

    public function updatepassword(Request $request){
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = User::find(auth::user()->id);
        if(!Hash::check($request->password, $user->password)):
            return back()->withErrors(['password' => 'Current password is incorrect']);
        endif;

        $user->password = Hash::make($request->new_password);
        $user->save();
        return back()->with('success', 'Password updated successfully');
    }
  
    public function update(Request $request, User $id)
    { 
        
        $id=$request->id;
               
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'image' => 'mimes:jpeg,jpg,png,gif|max:1024',
            'mobile' => 'required|unique:users,mobile,' . $id,
            'phone' => 'required|unique:users,phone,' . $id,
            'address' => 'nullable|string',
        ]);
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->phone = $request->phone;
        $user->address = $request->address;
        if($request->hasFile('image')):
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/users/' . $image_name);
            $user->image = $image_name;
            $image->move(public_path('images/users'), $image_name);
        endif;

        $user->save();
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }
}
