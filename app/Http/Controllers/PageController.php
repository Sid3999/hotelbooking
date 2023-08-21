<?php

namespace App\Http\Controllers;

use App\Blog;
use App\City;
use App\Room;
use App\User;
use App\Hotel;
use App\Favourite;
use App\RoomBooking;
use App\RoomCategory;
use App\BookingDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function index()
    {
        $cities=City::all();
        $news=Blog::get()->take(3);
        return view('index',compact('cities','news'));
    }

    public function rooms()
    {
        $room_categories = RoomCategory::with('gallery')->paginate(15);
        return view('rooms', ['page' => 'Our Room', 'room_categories' => $room_categories]);
    }

    public function about()
    {
        return view('about', ['page' => 'About Us']);
    }

    public function news()
    {
        $blogs=Blog::all();
        return view('news', compact('blogs') ,  ['page' => 'Blog']);
    }

    public function contact()
    {
        return view('contact', ['page' => 'Contact Us']);
    }
    // public function register(){
    //     //return view('register');

    // }
    public function room_detail($id)
    {
        $session = Session::get('variableName');
        // dd($session);
        $alreadyBooked = []; 
        DB::enableQueryLog();
        if(request()->has('checkin-date') && request()->has('checkout-date') && request()->get('checkin-date') != '' && request()->get('checkout-date') != ''):
            $checkindate = request()->get('checkin-date') ? request()->get('checkin-date') : session()->get('checkin-date');
            $checkoutdate = request()->get('checkout-date') ? request()->get('checkout-date') : session()->get('checkout-date');
            // dd($checkindate, $checkoutdate);
            $alreadyBooked = BookingDetail::whereIn('hotel_id', [$id])
            ->where('booking_date', '>=', $checkindate)
            ->where('booking_date', '<=', $checkoutdate)
            ->distinct('room_id')
            ->pluck('room_id')->toArray();
        endif;
        // dd(DB::getQueryLog());
        $hotel = Hotel::with('service', 'ratings')->find($id);
        $room = Room::where('hotel_id', $id)
            ->select(DB::raw('distinct(category_id) as category_id'))
            ->pluck('category_id')->toArray();
        $roomCategories = \App\RoomCategory::with('rooms', 'service')->whereIn('id', $room)->get()->toArray();
        foreach ($roomCategories as $k => $roomCategory) {
            for ($i = 0; $i < count($roomCategory['rooms']); $i++) {
                $roomCategories[$k]['reports'] = DB::table('rooms')
                    ->selectRaw('count(*) as number_of_room, bed_no,category_id,reserved,hotel_id,price,children,adult,children_extra_price,bed_detail,id')
                    ->groupBy('bed_no')
                    ->where('category_id', $roomCategory['rooms'][$i]['category_id'])
                    ->where('hotel_id', $id)
                    ->get()
                    ->toArray();
            }

        }
        $checkFauvorite = (auth()->check()) ? Favourite::where('user_id', auth()->user()->id)->where('hotel_id', $id)->count() : 0;
        return view('single-room', compact('hotel', 'roomCategories', 'alreadyBooked','checkFauvorite'));
    }

    public function room_available(Request $request)
    {
        Session::put('variableName', $request->all());
        // $request->validate([
        //     'checkin-date' => 'date',
        //     'checkout-date' => 'date',
        // ]);
        if($request->get('checkout-date') && $request->get('checkin-date')):
            $nights = (strtotime($request->get('checkout-date')) - strtotime($request->get('checkin-date'))) / (60 * 60 * 24);
        else:
            $nights = 1;
        endif;
       
        $nights = ($nights == 0) ? 1 : $nights;
        if($request->has('city_id') && $request->get('city_id') != ''){
            $hotel = Hotel::where('city_id', $request->get('city_id'));
        }
        else{
            $city = City::where('name', 'LIKE', "%{$request->city}%");
            if($city->count() > 0):
                $city_id = $city->first()->id;
            else:
                $city_id = 0;
            endif;
            $hotel = Hotel::where('city_id', $city_id);
        }
        $hotelIds = $hotel->pluck('id')->toArray();
        $room = Room::whereIn('hotel_id', $hotelIds);
        $room = $room->pluck('hotel_id')->toArray();
        $hotels = Hotel::whereIn('id', $room)->get();
        // dd(12);
        $checkFauvorite = (auth()->check()) ? Favourite::where('user_id', auth()->user()->id)->whereIn('hotel_id', $hotelIds)->pluck('hotel_id')->toArray() : [];
        return view('available-rooms', ['page' => 'Available Rooms', 'hotels' => $hotels, 'nights' => $nights, 'checkFauvorite' => $checkFauvorite]);
    }

    public function booking(Request $request)
    {
        $request->validate([
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date',
        ]);
        // $room_bookign = Room::has('roomBooking')->get();
        $date_from = $request->get('checkin_date');
        $date_to = $request->get('checkout_date');
        $room = Room::whereNotIn('id', function ($query) use ($date_from, $date_to) {
            $query->from('room_bookings')
                ->select('room_id')
                ->where('check_in', '>=', $date_from)
                ->where('check_out', '<=', $date_to);
        })->with('roomCategory')->where('category_id', $request->category_id)->where('reserved', 'false')->get();

        if (count($room) < 0) {
            return redirect()->back()->with('message', 'No Room Available in This Category');
        } else {
            return view('booking', ['page' => 'Booking Room'], compact('request'));
        }
    }

    public function faqs()
    {
        return view('faqs');
    }

    public function terms_and_condition()
    {
        return view('terms_and_condition');
    }

    public function privacy_policy()
    {
        return view('privacy_policy');
    }
     public function single_blog($id){
        
      $blog=Blog::find($id);
         return view('blog-details' , compact('blog'));
     }
}