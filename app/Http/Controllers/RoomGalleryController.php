<?php

namespace App\Http\Controllers;

use App\RoomGallery;
use App\Hotel;
use App\HotelService;
use App\RoomCategory;
use App\RoomService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Storage;

class RoomGalleryController extends Controller
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
            $RoomCateGalleries = RoomGallery::where('hotel_id', $hotel->id)->where('user_id', $hotel->user_id)->get();
        } else {
            $RoomCateGalleries = [];
        }
        return view('admin.room-category-gallery.index', compact('RoomCateGalleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotel = Hotel::where('user_id', Auth::user()->id)->first();
        if ($hotel){
            $room_categories = RoomCategory::where('hotel_id', $hotel->id)->where('user_id', Auth::user()->id)->get();
        }else{
            $room_categories = [];
        }

        return view('admin.room-category-gallery.create', compact('room_categories'));
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
            'image_url.*' => 'required|mimes:jpeg,jpg,png',
            'category_id' => 'required',
        ]);
        $images_product = array();
        $count = 0;
        $hotel = Hotel::where('user_id', Auth::user()->id)->first();
        if ($image = $request->file('image_url')) {
            if (!is_null($image)) {
                foreach ($image as $files) {
                    $thumbnail = $files;
                    $extension = $thumbnail->getClientOriginalExtension();
                    $fileName = uniqid() . '.' . $extension;
                    $thumbnail->move('images/room_category_galleries/', $fileName);
                    $path = $fileName;
                    RoomGallery::create([
                        'user_id' => Auth::user()->id,
                        'category_id' => $request->category_id,
                        'image_url' => $path,
                        'hotel_id' => $hotel->id
                    ]);
                    $count++;
                }
            }
        }

        if ($count > 0) {
            return redirect(route('room-category-gallery.index'))->with(['message' => 'Room Category Gallery Added Successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Oops! something wrong.', 'alert-type' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\RoomGallery $roomGallery
     * @return \Illuminate\Http\Response
     */
    public function show(RoomGallery $roomGallery)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\RoomGallery $roomGallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotel::where('user_id', Auth::user()->id)->first();
        $room_categories = RoomCategory::where('hotel_id', $hotel->id)->where('user_id', Auth::user()->id)->get();
        $RoomCateGallery = RoomGallery::find($id);
        return view('admin.room-category-gallery.edit', compact('room_categories', 'RoomCateGallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\RoomGallery $roomGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image_url' => 'required|mimes:jpeg,jpg,png|max:512',
            'category_id' => 'required',
        ]);
        $count = 0;
        $hotel = Hotel::where('user_id', Auth::user()->id)->first();
        $RoomCateGallery = RoomGallery::find($id);

        if ($request->has('image_url')) {
            $extension = "." . $request->image_url->getClientOriginalExtension();
            $name = basename($request->image_url->getClientOriginalName(), $extension) . time();
            $name = $name . $extension;
            $path = $request->image_url->storeAs('images/RoomCategory/Gallery', $name, 'public');
            Storage::Delete($RoomCateGallery->image_url);
            $RoomCateGallery->image_url = $path;
            $RoomCateGallery->category_id = $request->category_id;
        }

        if ($RoomCateGallery->update()) {
            return redirect(route('room-category-gallery.index'))->with(['message' => 'Room Category Gallery Updated Successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Oops! something wrong.', 'alert-type' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\RoomGallery $roomGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $RoomCateGallery = RoomGallery::find($id);
        Storage::Delete($RoomCateGallery->image_url);
        if ($RoomCateGallery->delete()) {
            return redirect()->back()->with(['message' => 'Room Category Gallery Deleted Successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Oops! something wrong.', 'alert-type' => 'error']);
        }
    }
}
