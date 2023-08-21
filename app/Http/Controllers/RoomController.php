<?php

namespace App\Http\Controllers;

use App\Room;
use App\Hotel;
use App\RoomCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rooms = []; 
        $hoteDatas = Hotel::where('user_id', Auth::user()->id)->get()->toarray();
        $hotels = Hotel::where('user_id', Auth::user()->id)->get();
      
        if ($hoteDatas) {
            foreach($hoteDatas as $hoteData)  
            {        
            $Rooms = Room::where('user_id', $hoteData['user_id'])->where('hotel_id', $hoteData['id'])->get()->toarray();
            $rooms =  array_merge($rooms,$Rooms);
             
            }
            
        } else {
             $rooms = [];
        }

        return view('admin.rooms.index', compact('rooms' , 'hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoteData = Hotel::where('user_id', Auth::user()->id)->first();
        $hotels = Hotel::where('user_id', Auth::user()->id)->get();
        if ($hoteData) {
            $roomCategory = RoomCategory::where('user_id', $hoteData->user_id)->where('hotel_id', $hoteData->id)->get();
        } else {
            $roomCategory = [];
        }

        return view('admin.rooms.create', compact('roomCategory' , 'hotels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator=Validator::make($request->all(),[
           'room_no' => 'required|string|unique:rooms|max:255',
           'category_id' => 'required',
           'floor' => 'required',
           'room_size' => 'required',
           'bed_detail' => 'required',
           'adult' => 'required',
           'price' => 'required',
          
       ]);
       if ($validator->fails()){
           return back()->withErrors($validator)->withInput();
       }
       
        $RoomObject = new Room;
        $RoomObject->uuid = (string)Str::uuid();
        $RoomObject->category_id = $request->category_id;
        $RoomObject->room_no = $request->room_no;
        $RoomObject->floor = $request->floor;
        $RoomObject->room_size = $request->room_size;
        $RoomObject->adult = $request->adult;
        $RoomObject->price = $request->price;
        $RoomObject->children = $request->children;
        $RoomObject->children_extra_price = $request->children_extra_price;
        $RoomObject->reserved = 'false';
        $RoomObject->bed_detail = $request->bed_detail;
        $RoomObject->user_id = Auth::user()->id;
        $RoomObject->hotel_id = $request->hotel;
        $RoomObject->save();
       
        if ($RoomObject) {
            return redirect(route('hotel-rooms.index'))->with(['message' => 'Room  Added Successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Oops! something wrong.', 'alert-type' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::find($id);
        $hoteData = Hotel::where('user_id', Auth::user()->id)->first();
        $roomCategory = RoomCategory::where('user_id', $hoteData->user_id)->where('hotel_id', $hoteData->id)->get();
        return view('admin.rooms.edit', compact('roomCategory', 'room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'room_no' => 'required|unique:rooms,room_no,'. $id,
            'category_id' => 'required',
            'floor' => 'required',
            'room_size' => 'required',
            'bed_detail' => 'required',
            'adult' => 'required',
            'price' => 'required',

        ]);
        $bed_no = 0;
        foreach ($request->bed_detail as $bed_detail) {
            $bed_no = $bed_no + $bed_detail;
        }
        $RoomObject = Room::find($id);
        $RoomObject->uuid = (string)Str::uuid();
        $RoomObject->category_id = $request->category_id;
        $RoomObject->room_no = $request->room_no;
        $RoomObject->floor = $request->floor;
        $RoomObject->room_size = $request->room_size;
        $RoomObject->adult = $request->adult;
        $RoomObject->price = $request->price;
        $RoomObject->children = $request->children;
        $RoomObject->children_extra_price = $request->children_extra_price;
        $RoomObject->bed_detail = $request->bed_detail;
        if ($RoomObject->update()) {
            return redirect(route('hotel-rooms.index'))->with(['message' => 'Room  Updated Successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Oops! something wrong.', 'alert-type' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Room $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $RoomObject = Room::find($id);
        if ($RoomObject->delete()) {
            return redirect(route('hotel-rooms.index'))->with(['message' => 'Room  Deleted Successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Oops! something wrong.', 'alert-type' => 'error']);
        }
    }
    public function getroom($value)
    {
        $rooms = []; 
        $hoteDatas = Hotel::where('id', $value)->get()->toarray();
        $hotels = Hotel::where('user_id', Auth::user()->id)->get();
      
        if ($hoteDatas) {
            foreach($hoteDatas as $hoteData)  
            {        
            $Rooms = Room::where('user_id', $hoteData['user_id'])->where('hotel_id', $hoteData['id'])->get()->toarray();
            $rooms =  array_merge($rooms,$Rooms);
             
            }
            
        } else {
             $rooms = [];
        }

        return view('admin.rooms.index', compact('rooms' , 'hotels'));
    }
}
