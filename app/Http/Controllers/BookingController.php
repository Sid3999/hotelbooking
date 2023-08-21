<?php

namespace App\Http\Controllers;

use App\Room;
use App\User;
use DateTime;
use Carbon\Carbon;
use App\RoomBooking;
use App\RoomCategory;
use App\BookingDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $bookings = RoomBooking::where('user_id', Auth::user()->id)->get();
        return view('admin.user-bookings.index', compact('bookings'));
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
        // dd(Session::get('variableName'));
        $session=Session::get('variableName');
        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $session['checkin-date']);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $session['checkout-date']);
        $diff_in_days = $to->diffInDays($from);
        $checkIn_date=Carbon::createFromFormat('Y-m-d', $session['checkin-date']);
        $checkOut_date=Carbon::createFromFormat('Y-m-d', $session['checkout-date']);
        if ($request->has('bed_no') && !empty($request->bed_no)) {
            $rooms = [];
            foreach ($request->bed_no as $bed_no) {
                $name[]= explode(',', $bed_no);
            }
            foreach ($name as $room) {
                $roomUpdate = Room::where('id', $room[0])->first();
                $price=$room[1] * $diff_in_days;
                $roomUpdate->update(['reserved'=>'true']);
                $data=[
                    'hotel_id'=>$roomUpdate->hotel_id,
                    'room_id'=>$roomUpdate->id,
                    'category_id'=>$roomUpdate->category_id,
                    'user_id'=>\auth()->user()->id,
                    'balance_amount'=>$price,
                    'no_of_adults'=>$session['adults'],
                    'no_of_childrens'=>$session['children'],
                    'check_in'=>$session['checkin-date'],
                    'check_out'=>$session['checkout-date'],
                    'booking_number'=> auth()->user()->id."_".Str::random(10),
                ];
                $roomBooking = RoomBooking::create($data);
                $bookingDates = [];

                for ($i = $checkIn_date; $i->lte($checkOut_date); $i->addDay()) {
                    $bookingDates['booking_id']=$roomBooking->id;
                    $bookingDates['number_of_rooms']= $bed_no;
                    $bookingDates['booking_date'] = $i->format('Y-m-d');
                    $bookingDates['room_id'] = $roomUpdate->id;
                    $bookingDates['user_id'] = auth()->user()->id;
                    $bookingDates['hotel_id'] = $roomUpdate->hotel_id;
                    BookingDetail::create($bookingDates);
                }

            }
        }
        Session::forget('variableName');
        return redirect()->route('booking.dashboard')->with('success', 'Room Booked Successfully');
        // $bookings=RoomBooking::where('user_id',\auth()->user()->id)->get();
        // return view('booking_message',compact('bookings'));
//        $request->validate([
//            'name' => 'required|string',
//            'contact_no' => 'required|string',
//            'email' => 'required|email|unique:users',
//            'visitors_name_list' => 'required|string',
//            'password' => 'min:6|required_with:password_confirmation',
//            'password_confirmation' => 'min:6|same:password_confirmation'
//        ]);

//        $User = new User;
//        $User->name = $request->name;
//        $User->email = $request->email;
//        $User->password = bcrypt($request->password);
//        $User->designation = $request->designation ?? 'N/A';
//        $User->education = $request->education ?? 'N/A';

        // image upload
//        $path = 'images/users/no-thumbnail.jpeg';
//        if ($request->has('image')) {
//            // Storage::delete($User->image);
//            $extension = "." . $request->image->getClientOriginalExtension();
//            $name = basename($request->image->getClientOriginalName(), $extension) . time();
//            $name = $name . $extension;
//            $path = $request->image->storeAs('images/users', $name, 'public');
//        }
//        $User->image = $path;
//        $User->skills = $request->skills ?? 'N/A';
//        $User->mobile = $request->contact_no ?? 'N/A';
//        $User->phone = $request->phone ?? 'N/A';
//        $User->address = $request->address ?? 'N/A';
//        $User->bio = $request->bio ?? 'N/A';
//        $save = $User->save();

//        if ($save) {
//            // save roles for this user
//            $roleAssigns = [];
//            $roleAssigns[] = [
//                'role_id' => 2,
//                'user_id' => $User->id
//            ];
//            $save = DB::table('role_user')->insert($roleAssigns);
        //Saving Booking Detail
//            $check_in = new DateTime($request->check_in);
//            $check_out = new DateTime($request->check_out);
//            $interval = $check_in->diff($check_out);
//            $days = $interval->format('%a');
//
//            $roomBooking = new RoomBooking;
//            $roomBooking->no_of_adults = $request->no_of_adults;
//            $roomBooking->visitors_name_list = $request->visitors_name_list;
//            $roomBooking->contact_no = $request->contact_no;
//            $roomBooking->user_id = $User->id;
//            $roomBooking->no_of_childrens = $request->no_of_childrens;
//            $roomBooking->special_request = $request->special_request;
//            $roomBooking->approx_arrival_time = $request->approx_arrival_time;
//            $roomBooking->check_in = $request->check_in;
//            $roomBooking->check_out = $request->check_out;
//            $roomBooking->balance_amount = $request->balance_amount * $days;
//            $roomBooking->hotel_id = $request->hotel_id;
//            $roomBooking->category_id = $request->category_id;
//            $bookingSave = $roomBooking->save();
//        } else {
//            dd($request->all());
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\RoomBooking $roomBooking
     * @return \Illuminate\Http\Response
     */
    public function show(RoomBooking $roomBooking)
    {
        return view('admin.user-bookings.show', compact('roomBooking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\RoomBooking $roomBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomBooking $roomBooking)
    {
        return view('admin.user-bookings.edit', compact('roomBooking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\RoomBooking $roomBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomBooking $roomBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\RoomBooking $roomBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomBooking $roomBooking)
    {
        //
    }

    public function getRooms(Request $request)
    {
        $name = [];
        // dd($request->all());
        if ($request->has('room_id') && !empty($request->room_id)) {
            foreach ($request->room_id as $room) {
                if ($room != '') {
                    $name[] = explode(',', $room);
                }
            }
        }
        return view("booking", compact('name'));
    }

    public function bookingDashboard(){
        
        if(Auth::user()->roles->first()->id == 3 || Auth::user()->roles->first()->id == 1)
        {
            return redirect('dashboard');
        }
       
        $bookings=RoomBooking::with('roomCategory')->where('user_id',\auth()->user()->id)->get();
        return view('booking_message',compact('bookings'));
    }
}
