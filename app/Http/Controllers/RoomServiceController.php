<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\HotelService;
use App\RoomCategory;
use App\RoomService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class RoomServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel = Hotel::where('user_id', Auth::user()->id)->first();
        if ($hotel) {
            $HotelServices = RoomService::where('hotel_id', $hotel->id)->where('user_id', $hotel->user_id)->get();
        }else{
          $HotelServices= [];
    }
        return view('admin.room-category-service.index', compact('HotelServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotel = Hotel::where('user_id', Auth::user()->id)->first();
        if ($hotel) {
        $room_categories = RoomCategory::where('hotel_id', $hotel->id)->where('user_id', Auth::user()->id)->get();
        }else{
            $room_categories= [];
        }
        return view('admin.room-category-service.create', compact('room_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'service.*' => 'required|string|max:255',
        ]);
        $HotelObject = Hotel::where('user_id', Auth::user()->id)->first();
        $count = 0;
        if ($request->service) {
            foreach ($request->service as $service) {
                if (!is_null($service)) {
                    RoomService::create([
                        'user_id' => Auth::user()->id,
                        'hotel_id' => $HotelObject->id,
                        'title' => $service,
                        'category_id' => $request->category_id
                    ]);
                    $count++;
                }
            }
        }
        if ($count) {
            return redirect(route('room-category-service.index'))->with(['message' => 'Room Services Added Successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Oops! something wrong.', 'alert-type' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\RoomService $roomService
     * @return \Illuminate\Http\Response
     */
    public function show(RoomService $roomService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\RoomService $roomService
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomService = RoomService::find($id);
        $hotel = Hotel::where('user_id', Auth::user()->id)->first();
        $room_categories = RoomCategory::where('hotel_id', $hotel->id)->where('user_id', Auth::user()->id)->get();
        return view('admin.room-category-service.edit', compact('room_categories', 'roomService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\RoomService $roomService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $roomService = RoomService::find($id);
        $request->validate([
            'service.*' => 'required|string|max:255',
        ]);
        $roomService->title = $request->service;
        $roomService->category_id = $request->category_id;;
        if ($roomService->update()) {
            return redirect(route('room-category-service.index'))->with(['message' => 'Room Services Updated Successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Oops! something wrong.', 'alert-type' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\RoomService $roomService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roomService = RoomService::find($id);
        if ($roomService->delete()) {
            return redirect(route('room-category-service.index'))->with(['message' => 'Room Services Deleted Successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Oops! something wrong.', 'alert-type' => 'error']);
        }
    }
}
