<?php

namespace App\Http\Controllers;

use App\City;
use App\Facility;
use App\Hotel;
use Illuminate\Http\Request;
use App\HotelGallery;
use App\HotelService;
use App\HotelSurrounding;
use App\PaymentLog;
use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Auth;
use App\Product;
use Dotenv\Regex\Success;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request , Hotel $hotel )
    {  
        $cities = City::all();
        $province = 0;
        $citys = 0;
        $rent = 0;
        $type = 0;
        $min = 0;
        $max = 0;
        if(isset($request->province))
        {
             
             if($request->province != '0')
             {
             $hotel = $hotel->where('provience',$request->province);
             $province = $request->province;
             }
             if($request->city != '0')
             {
                $hotel = $hotel->where('city_id',$request->city);
                $citys = $request->city;
             }
             if($request->min != '')
             {
                if($request->max == ''){
                    return redirect()->back()->with(['message' => 'Select Max Range', 'alert-type' => 'error']);
                 }
               else
                {
                    $range = 'Rs '  . $request->min . ' - Rs '. $request->max ; 
                    $hotel = $hotel->where('rent_range',$range);
                    $min = $request->min;
                }
             }
             if($request->max != '')
             {
                if($request->min == ''){
                    return redirect()->back()->with(['message' => 'Select Min Range', 'alert-type' => 'error']);
                }
                else
                {
                    $range = 'Rs '  . $request->min . ' - Rs '. $request->max ;
                    $hotel = $hotel->where('rent_range',$range);

                }
                 $max = $request->max;
             }

             if($request->type != '0')
             {
                $hotel = $hotel->where('type',$request->type);
                $type = $request->type;
             }
            // $filter = '->where("provience",'. $request->province . ')';
            //  $check = 'select * from hotels where provience = $request->province';
            if (Auth::user()->roles->first()->id == 1) {
               
                $hotels = $hotel->get();
                // $hotels   = DB::select($check);
                // // $hotels =  DB::select('select * from hotels where id = 20');
                // $hotels = Hotel::all();
                
            } else {
                
                $hotel = $hotel->where('user_id',auth()->user()->id);
                $hotels = $hotel->get();
               
            }
        }
        else
        {
            if (Auth::user()->roles->first()->id == 1) {
                $hotels = Hotel::all();
            } else {
                $hotels = Hotel::where('user_id', auth()->user()->id)->get();
            }
        }
       
       
        return view('admin.hotels.index', compact('hotels' , 'cities' , 'province' , 'citys' , 'rent' , 'type' , 'min' , 'max' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citys = City::all();
        $facilities = Facility::all();
        return view('admin.hotels.create',compact('citys' , 'facilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
         
          $range = 'Rs '  . $request->min_range . ' - Rs '. $request->max_range ; 
          
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'required|mimes:jpeg,jpg,png',
            'type' => 'required',
            'min_range' => 'required',
            'max_range' => 'required',
            'provience' => 'required|string',
            'area' => 'required|string',
            'address' => 'required|string',
        ]);
        $HotelObject = new Hotel;
        $HotelObject->title = $request->title;
        $HotelObject->slug = Str::slug($request->slug);
        $HotelObject->description = $request->description;
        $HotelObject->city_id = $request->city;
        
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
        $HotelObject->rent_range = $range;
        $HotelObject->provience = $request->provience;
        $HotelObject->area = $request->area;
        $HotelObject->address = $request->address;
        $HotelObject->country = $request->country ?? "Pakistan";
        $HotelObject->user_id = Auth::user()->id;
        $HotelInSave = $HotelObject->save();
        // Hotel Service
        if ($request->hotel_service) {
            foreach ($request->hotel_service as $service) {
                if (!is_null($service)) {
                    HotelService::create([
                        'user_id' => Auth::user()->id,
                        'hotel_id' => $HotelObject->id,
                        'service' => $service
                    ]);
                }
            }
        }
        //Hotel Surroundings
        if ($request->surrounding_location) {
            for ($i = 0; $i < count($request->surrounding_location); $i++) {
                if (!is_null($request->surrounding_location[$i])) {
                    HotelSurrounding::create([
                        'user_id' => Auth::user()->id,
                        'hotel_id' => $HotelObject->id,
                        'surrounding_location' => $request->surrounding_location[$i],
                        'surrounding_distance' => $request->surrounding_distance[$i]
                    ]);
                }
            }
        }

        // Hotel Gallery
        $images_product = array();
        if ($image = $request->file('image')) {
            foreach ($image as $files) {
                $thumbnail = $files;
                $extension = $files->getClientOriginalExtension();
                $fileName = uniqid() . '.' . $extension;
                $thumbnail->move('images/hotel_galleries', $fileName);
                $path = $fileName;
                HotelGallery::create([
                    'user_id' => Auth::user()->id,
                    'hotel_id' => $HotelObject->id,
                    'img_url' => $path
                ]);
            }
        }
        if ($HotelInSave) {
            return redirect(route('hotel.index'))->with(['message' => 'Hotel Added Successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Oops! something wrong.', 'alert-type' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return view('admin.hotels.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    { 
      
        $string =  (explode("-",$hotel->rent_range));
        $min =  preg_replace("/[^0-9]/", '', $string[0]);
        $max =  preg_replace("/[^0-9]/", '', $string[1]);
        $cities = City::all();
        $facilities = Facility::all();
        return view('admin.hotels.edit', compact('hotel' , 'cities' , 'facilities' , 'min' , 'max'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $range = 'Rs '  . $request->min_range . ' - Rs '. $request->max_range ; 
        $hotel = Hotel::find($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required',
            'min_range' => 'required',
            'max_range' => 'required',
            'provience' => 'required|string',
            'area' => 'required|string',
            'address' => 'required|string',
        ]);
        $hotel->title = $request->title;
        $hotel->slug = Str::slug($request->slug);
        $hotel->description = $request->description;

        // image upload
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $extension = $thumbnail->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $thumbnail->move('images/hotels/', $fileName);
            $hotel->thumbnail = $fileName;
        }
        $path = '';
//        if ($request->has('thumbnail')) {
//            $extension = "." . $request->thumbnail->getClientOriginalExtension();
//            $name = basename($request->thumbnail->getClientOriginalName(), $extension) . time();
//            $name = $name . $extension;
//            $path = $request->thumbnail->storeAs('images/Hotels', $name, 'public');
//            $hotel->thumbnail = $path;
//        }
        $hotel->type = $request->type;
        $hotel->rent_range = $range;
        $hotel->provience = $request->provience;
        $hotel->city_id = $request->city ;
        $hotel->area = $request->area;
        $hotel->address = $request->address;
        $hotel->country = $request->country ?? "Pakistan";
        $HotelInSave = $hotel->update();
        if ($request->hotel_service) {
            HotelService::where('hotel_id', $hotel->id)->delete();
            foreach ($request->hotel_service as $service) {
                if (!is_null($service)) {
                    HotelService::create([
                        'user_id' => Auth::user()->id,
                        'hotel_id' => $id,
                        'service' => $service
                    ]);
                }
            }
        }
        //Hotel Surroundings
        if ($request->surrounding_location) {
            HotelSurrounding::where('hotel_id', $hotel->id)->delete();
            for ($i = 0; $i < count($request->surrounding_location); $i++) {
                if (!is_null($request->surrounding_location[$i])) {
                    HotelSurrounding::create([
                        'user_id' => Auth::user()->id,
                        'hotel_id' => $id,
                        'surrounding_location' => $request->surrounding_location[$i],
                        'surrounding_distance' => $request->surrounding_distance[$i]
                    ]);
                }
            }
        }

        // Hotel Gallery
        $images_product = array();
        if ($image = $request->file('image')) {
            foreach ($image as $files) {
                $thumbnail = $files;
                $extension = $files->getClientOriginalExtension();
                $fileName = uniqid() . '.' . $extension;
                $thumbnail->move('images/hotel_galleries', $fileName);
                $path = $fileName;
                HotelGallery::create([
                    'user_id' => Auth::user()->id,
                    'hotel_id' => $hotel->id,
                    'img_url' => $path
                ]);
            }
        }

        return redirect()->back()->with(['message' => 'Hotel Updated.', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Hotel $hotel
     * @return \Illuminate\Http\Response
     */

    public function destroy(Hotel $hotel)
    {
        if (!is_null($hotel)) {
            //Delet Service
            HotelService::where('hotel_id', $hotel->id)->delete();
            //Delete Gallery
            $HotelGallery = HotelGallery::where('hotel_id', $hotel->id)->get();
            if (!is_null($HotelGallery)) {
                foreach ($HotelGallery as $gallery) {
                    Storage::delete($gallery->img_url);
                }
            }
            HotelGallery::where('hotel_id', $hotel->id)->delete();
            //Delete Surroundings
            HotelSurrounding::where('hotel_id', $hotel->id)->delete();
            $hotel->delete();
            return redirect()->route('hotel.index')->with(['message' => 'Hotel deleted successfully', 'alert-type' => 'success']);
        }
    }
    public function hotel_info()
    {
        $hotel  = Hotel::where('user_id', auth()->user()->id)->get();
        return view('admin.hotels.hotelinfo' , ['hotels' => $hotel]);
    }
    public function delete_gallery_image($image_id)
    {
        $HotelGallery = HotelGallery::find($image_id);
        $image = 'images/hotel_galleries/' . $HotelGallery->img_url;
        if (\File::exists(public_path($image))) {
            \File::delete(public_path($image));
        }
        $HotelGallery->delete();
        return ['success' => true];
    }
    public function updatestatus(Request $request)
    {
        if($request->cid == '2')
        {
        $hotel = Hotel::find($request->hid);
        $hotel->status = $request->id;
        $hotel->update();
        }
        else
        {
            $hotel = PaymentLog::find($request->hid);
            $hotel->payment_status = $request->id;
            $hotel->update();
        }
        return 'Done';
    }

    public function my_profile(Request $request)
    {
        $hotel  = Hotel::where('id', $request->id)->first();
        $cities =   City::all(); 
        return view('admin.hotels.my-profile', compact('hotel', 'cities'));
    }
    public function createhotel()
    {
        $cities =   City::all(); 
        return view('admin.hotels.createhotel' , compact('cities'));
    }
    // public function storehotel(Request $request)
    // {
    //       dd($request);
    //       $hotel = Hotel
          
    // }
}
