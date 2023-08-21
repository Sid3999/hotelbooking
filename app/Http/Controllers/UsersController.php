<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Image;
use App\City;
use App\Room;
use App\RoomBooking;
use App\Role;
use App\User;
use App\Hotel;
use App\Payment;
use Carbon\Carbon;
use App\Permission;
use App\HotelGallery;
use App\HotelService;
use  App\HotelSurrounding;
use App\PaymentLog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function user()
    {
        return view('home');
    }

    public function dashboard()
    {
       
        $userRoles = Auth::user()->roles->pluck('id');
        $hotelno = 0;
        $roomno = 0;
        $bookings = 0;
        $revenue = 0;
        $user = 0;
        $cities = 0;
        if(Auth::user()->roles->first()->id == 2)
        {
            return redirect('booking-dashboard');
        }

    //    dd($userRoles);
        // $hotelno = Hotel::where('user_id',Auth::user()->id)->count();
        if(Auth::user()->roles->first()->id == 3)
        {
        $hotels = Hotel::where('user_id',Auth::user()->id)->get();
        }
        else
        {
            $hotels = Hotel::get();
            $user  = User::get()->count();
            $cities = City::get()->count();
            $revenue = PaymentLog::where('payment_status', '1')->sum('payment');
        }
       
        foreach($hotels as $hotel) 
        {
           $hotelno += 1;
           $rooms = Room::where('hotel_id',$hotel->id)->count();
           $roomno = $roomno + $rooms;
           $roombookings =  RoomBooking::where('hotel_id' , $hotel->id )->get();
           foreach($roombookings as $roombooking )
           {
              $bookings += 1;
              $revenue += $roombooking->balance_amount;
           }

        }
        
        return view('admin.dashboard' , ['bookings' => $bookings , 'hotels' => $hotelno , 'rooms' => $roomno , 'revenue' => $revenue , 'user' => $user , 'cities' => $cities ]);
    }

    public function nopermission()
    {
        return view('nopermission');
    }

    /**
     * Return admin profile view
     */
    public function adminProfile()
    {
        
        return view('admin.profile');
    }

    /**
     * Admin Profile Update
     */
    public function adminProfileUpdate(Request $request)
    {
       
        $userId = Auth::user()->id;

        $User = User::find($userId);

        $User->name = $request->name;
        $User->designation = $request->designation;
        $User->education = $request->education;
        $User->skills = $request->skills;

        if ($request->has('image')) {
            $user_image = $request->file('image');
            $extension = $user_image->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $user_image->move('images/users/', $fileName);
            $path = $fileName;
            $User->image = $path;
        }
        $User->mobile = $request->mobile;
        $User->phone = $request->phone;
        $User->address = $request->address;
        $User->bio = $request->bio;
        $update = $User->save();

        if ($update) {
            $notification = array(
                'message' => 'Your profile has been updated successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.profile')->with($notification);
        } else {
            $notification = array(
                'message' => 'Oops! Something went wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Return user profile view
     */
    public function userProfile()
    {
        return view('user.profile');
    }

    /**
     * Admin Profile Update
     */
    public function userProfileUpdate(Request $request)
    {
        $userId = Auth::user()->id;
        $request->validate([
            'name' => 'required|string|max:60',
            'designation' => 'required|string|max:100',
            'education' => 'required|string|max:255',
            'skills' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:1024',
            'mobile' => 'nullable|numeric|unique:users,mobile,' . $userId,
            'phone' => 'nullable|numeric|unique:users,phone,' . $userId,
            'address' => 'nullable|string',
            'bio' => 'nullable|string',
        ]);

        $User = User::find($userId);
        $User->name = $request->name;
        $User->designation = $request->designation;
        $User->education = $request->education;
        $User->skills = $request->skills;

        // image upload
        if ($request->has('image')) {
            $user_image = $request->file('image');
            $extension = $user_image->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $user_image->move('images/users/', $fileName);
            $path = $fileName;
        }

        $User->image = $path;
        $User->mobile = $request->mobile;
        $User->phone = $request->phone;
        $User->address = $request->address;
        $User->bio = $request->bio;
        $update = $User->save();
        if ($update) {
            $notification = array(
                'message' => 'Your profile has been updated successfully.',
                'alert-type' => 'success'
            );

            return redirect()->route('user.profile')->with($notification);
        } else {
            $notification = array(
                'message' => 'Oops! Something went wrong',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }

    /**
     * Return users
     *
     * @return array
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->with('hotel')->get();
        // dd($users);
    //    return $users;
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::all();
        $hotels = Hotel::all();
        $cities = City::get();
        return view('admin.users.create', compact('roles', 'permissions', 'hotels', 'cities'));
    }

    public function store(Request $request)

    {
        $validationArray = [
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            // 'designation' => 'nullable|string',
            // 'education' => 'nullable|string',
            // 'skills' => 'nullable|string',
            'picture' => 'mimes:jpeg,jpg,png,gif|max:1024',
            'mobile' => 'required|numeric|unique:users',
            'phone' => 'nullable|numeric|unique:users',
            'address' => 'nullable|string',
            // 'bio' => 'nullable|string',
        ];
        // if ($request->create_hotel == 1):
            $validationArray['title'] = 'required|string|max:255';
            $validationArray['slug'] = 'required|string|max:255';
            $validationArray['description'] = 'required|string';
            $validationArray['thumbnail'] = 'mimes:jpeg,jpg,png,gif';
            $validationArray['type'] = 'required';
            $validationArray['rent_range'] = 'required';
            $validationArray['provience'] = 'required|string';
            // $validationArray['area'] = 'required|string';
            // $validationArray['address'] = 'required|string';
        // endif;
        $create_hotel = ['create_hotel' => $request->create_hotel];
        $validator = Validator::make($request->all(), $validationArray);
        // dd($validator->errors());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with($create_hotel);
        }
        $data = $request->only('name', 'email', 'designation', 'education', 'skills', 'mobile', 'phone', 'address', 'bio');
        $data['password'] = bcrypt($request->password);
        if ($request->has('picture')) {
            // Storage::delete($User->image);
            // $extension = "." . $request->image->getClientOriginalExtension();
            // $name = basename($request->image->getClientOriginalName(), $extension) . time();
            // $name = $name . $extension;
            // $path = $request->image->storeAs('images/users', $name, 'public');
            $user_image = $request->file('picture');
            $extension = $user_image->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $user_image->move('images/users/', $fileName);
            $data['image'] = $fileName;

        }
        $path = 'images/users/no-thumbnail.jpeg';
        $save = User::create($data);
        $user_id = $save->id;
        if ($request->hotel_id) {
            $hotel = Hotel::where('id', $request->hotel_id)->first();
            $hotel->update(['user_id' => $user_id]);
        }
        if ($save) {
            $roleAssigns[] = [
                'role_id' => 3,
                'user_id' => $user_id
            ];
            $save = \Illuminate\Support\Facades\DB::table('role_user')->insert($roleAssigns);
            $permissions = Permission::all();
            $permissionAssigns = [];
            foreach ($permissions as $permission) {
                $permissionAssigns[] = [
                    'user_id' => $user_id,
                    'permission_id' => $permission->id

                ];
            }
            $save = DB::table('permission_user')->insert($permissionAssigns);

            // save roles for this user
//            $roleAssigns = [];
//            foreach ($request->role_id as $role) {
//                $roleAssigns[] = [
//                    'role_id' => $role,
//                    'user_id' => $user_id
//                ];
//            }
//            $save = DB::table('role_user')->insert($roleAssigns);
//            // save permissions for this user
//            $permissionAssigns = [];
//            foreach ($request->permission_id as $permission) {
//                $permissionAssigns[] = [
//                    'user_id' => $user_id,
//                    'permission_id' => $permission
//
//                ];
//            }
//            $save = DB::table('permission_user')->insert($permissionAssigns);


            $notification = array(
                'message' => 'Your profile has been updated successfully.',
                'alert-type' => 'success'
            );

            // return redirect()->route('users.index')->with($notification);
        }
        /////////////////////
        // if ($request->create_hotel == 1) {
            $HotelObject = new Hotel;
            $HotelObject->title = $request->title;
            $HotelObject->slug = Str::slug($request->slug);
            $HotelObject->description = $request->description;
            // image upload
            $path = '';
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $extension = $thumbnail->getClientOriginalExtension();
                $fileName = uniqid() . '.' . $extension;
                $thumbnail->move('images/hotels/', $fileName);
                $path = $fileName;
            }
//        dd($path);
//        if ($request->has('thumbnail')) {
//            $extension = "." . $request->thumbnail->getClientOriginalExtension();
//            $name = basename($request->thumbnail->getClientOriginalName(), $extension) . time();
//            $name = $name . $extension;
//            $path = $request->thumbnail->storeAs('images/Hotels', $name, 'public');
//        }
            $HotelObject->thumbnail = $path;
            $HotelObject->uuid = (string)Str::uuid();
            $HotelObject->type = $request->type;
            $HotelObject->rent_range = $request->rent_range;
            $HotelObject->provience = $request->provience;
            $HotelObject->city = $request->city ?? "None";
            $HotelObject->area = $request->area;
            $HotelObject->address = $request->address;
            $HotelObject->country = $request->country ?? "Pakistan";
            $HotelObject->user_id = $user_id;
            $HotelInSave = $HotelObject->save();
            $paymentsArr = [
                'user_id' => $user_id,
                'hotel_id' => $HotelObject->id,
                'amount' => $request->amount ? $request->amount : 0,
                'payment_type' => $request->payment_type ? $request->payment_type : 1,
                'discount' => $request->discount ? $request->discount : 0,
                'confirm_at' => Carbon::now(),
            ];
            $payment = Payment::create($paymentsArr);
            // Hotel Service
            // if ($request->hotel_service) {
            //     foreach ($request->hotel_service as $service) {
            //         if (!is_null($service)) {
            //             HotelService::create([
            //                 'user_id' => $user_id,
            //                 'hotel_id' => $HotelObject->id,
            //                 'service' => $service
            //             ]);
            //         }
            //     }
            // }
            //Hotel Surroundings
            // if ($request->surrounding_location) {
            //     for ($i = 0; $i < count($request->surrounding_location); $i++) {
            //         if (!is_null($request->surrounding_location[$i])) {
            //             HotelSurrounding::create([
            //                 'user_id' => $user_id,
            //                 'hotel_id' => $HotelObject->id,
            //                 'surrounding_location' => $request->surrounding_location[$i],
            //                 'surrounding_distance' => $request->surrounding_distance[$i] ? $request->surrounding_distance[$i] : 0
            //             ]);
            //         }
            //     }
            // }

            // Hotel Gallery
            $images_product = array();
            // if ($image = $request->file('image')) {
            //     foreach ($image as $files) {
            //         $thumbnail = $files;
            //         $extension = $files->getClientOriginalExtension();
            //         $fileName = uniqid() . '.' . $extension;
            //         $thumbnail->move('images/hotel_galleries', $fileName);
            //         $path = $fileName;
            //         HotelGallery::create([
            //             'user_id' => $user_id,
            //             'hotel_id' => $HotelObject->id,
            //             'img_url' => $path
            //         ]);
            //     }
            // } else {
            //     $notification = array(
            //         'message' => 'Oops! Something went wrong',
            //         'alert-type' => 'error'
            //     );

            // }
        // }
        $hotels = Hotel::all();
        return redirect()->route('users.index')->with($notification, $hotels);
    }

    public function show($id)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view('admin.users.show', compact('roles', 'user'));
    }

    public function edit($id)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $user = User::find($id);
        $cities = City::get();
        return view('admin.users.edit', compact('roles', 'user', 'permissions','cities'));
    }

    public function update(Request $request, $id)
    {
       
        $request->validate([
            'name' => 'nullable|string|max:100',
            'email' => 'nullable|string|max:255',
            // 'designation' => 'nullable|string',
            // 'education' => 'nullable|string',
            // 'skills' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1024',
            'mobile' => 'nullable|numeric',
            'phone' => 'nullable|numeric',
            'address' => 'nullable|string',
            // 'bio' => 'nullable|string',
            // 'role_id' => 'required|array',
            // 'permission_id' => 'nullable|array',
        ]);
         
        $User = User::find($id);
       
        $User->name = $request->name;
        $User->email = $request->email;
        $User->designation = $request->designation;
        $User->education = $request->education;

        // profile picture update
        $path = 'images/users/no-thumbnail.jpeg';
       
        if ($request->file('image')) {
           
            Storage::delete($User->image);
            $user_image = $request->file('image');
            $extension = $user_image->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $user_image->move('images/users/', $fileName);
            $path = $fileName;
        }

        $User->image = $path;

        $User->skills = $request->skills;
        $User->mobile = $request->mobile;
        $User->phone = $request->phone;
        $User->address = $request->address;
        $User->bio = $request->bio;
        $save = $User->save();

       
            //payement update
            // $payment = Payment::where('user_id', $id)->first();
            // $payment->charges = $request->charges;
            // $payment->subscription_type = $request->subscription_type;
            // $payment->discount = $request->discount;
            // $payment->save();
            
        
        $notification = array(
            'message' => 'User updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $User = User::find($id);

        if (!is_null($User)) {
            Storage::delete($User->image);
            $delete = $User->delete();

            if ($delete) {

                // save roles for this user
                $userRoles = DB::table('role_user')->where('user_id', '=', $id)->get();
                foreach ($userRoles as $role) {
                    $role->delete();
                }

                $notification = array(
                    'message' => 'User has been deleted successfully.',
                    'alert-type' => 'success'
                );

                return redirect()->route('users.index')->with($notification);
            } else {

                $notification = array(
                    'message' => 'Oops! Something went wrong',
                    'alert-type' => 'error'
                );

                return redirect()->back()->with($notification);
            }
        }
    }

    public function ban(Request $request)
    {
        try {
            $user = User::find(request()->id);
            if($user->is_active == '1'):
                $active = '0';
                $message = 'User has been banned successfully.';
            else:
                $active = '1';
                $message = 'User has been activated successfully.';
            endif;
            $user->is_active = $active;
            $user->save();
            $notification = array(
                'message' => $message,
                'status' => 'success'
            );
            return response()->json($notification);

        } catch (\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'status' => 'error'
            );
            return response()->json($notification);
        }
    }
    public function customerLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}