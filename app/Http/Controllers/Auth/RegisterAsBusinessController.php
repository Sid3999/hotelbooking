<?php

namespace App\Http\Controllers\Auth;

use App\City;
use App\Hotel;
use App\Permission;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterAsBusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::get();
        $data['cities'] = $city;
        return view('auth.register_as_business')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required',
            'city' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);
        $hotel = Hotel::create([
            'title' => $request->company_name,
            'city_id' => $request->city,
            'user_id' => $user->id,
        ]);
        $roleAssigns[] = [
            'role_id' => 3,
            'user_id' => $user->id
        ];
        $save = DB::table('role_user')->insert($roleAssigns);
        $permissions = Permission::all();
        $permissionAssigns = [];
        foreach ($permissions as $permission) {
            $permissionAssigns[] = [
                'user_id' => $user->id,
                'permission_id' => $permission->id

            ];
        }
      
        $save = DB::table('permission_user')->insert($permissionAssigns);
        
        return back()->with(['message' => "Your Business Register Successfully"]);
        // $user->sendEmailVerificationNotification();
        
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
