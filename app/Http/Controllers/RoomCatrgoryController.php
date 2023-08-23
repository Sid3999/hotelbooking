<?php

namespace App\Http\Controllers;

use App\Facility;
use App\RoomCategory;
use App\Hotel;
use App\Room;
use App\RoomGallery;
use App\RoomService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Auth;

class RoomCatrgoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomCategory = RoomCategory::where('user_id', Auth::user()->id)->get();
        return view('admin.room-categories.index', compact('roomCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facilities = Facility::all();
        return view('admin.room-categories.create', compact('facilities'));
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
            'title' => 'required|string|unique:room_categories|max:255',
        ]);
        $hoteData = Hotel::where('user_id', Auth::user()->id)->first();
        $RoomCateObject = new RoomCategory;
        $RoomCateObject->title = $request->title;
        $RoomCateObject->user_id = $hoteData->user_id;
        $RoomCateObject->hotel_id = $hoteData->id;
        $RoomCateIsSave = $RoomCateObject->save();
        if ($RoomCateIsSave) {
            return redirect(route('room-category.index'))->with(['message' => 'Room Category Added Successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Oops! something wrong.', 'alert-type' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\RoomCategory $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function show(RoomCategory $roomCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\RoomCategory $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomCategory $roomCategory)
    {
        $facilities = Facility::all();
        return view('admin.room-categories.edit', compact('roomCategory', 'facilities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\RoomCategory $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomCategory $roomCategory)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:room_categories,title,' . $roomCategory->id,
            'facility' => 'required',
        ]);
        $RoomCateObject = $roomCategory;
        $RoomCateObject->title = $request->title;
        $RoomCateObject->facilities = $request->facility;
        $RoomCateIsUpdate = $RoomCateObject->update();

        if ($RoomCateIsUpdate) {
            return redirect(route('room-category.index'))->with(['message' => 'Room Category Updated Successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Oops! something wrong.', 'alert-type' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\RoomCategory $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomCategory $roomCategory)
    {
        if (!is_null($roomCategory)) {
            //Delet Service
            RoomService::where('hotel_id', $roomCategory->hotel_id)->delete();
            //Delete Gallery
            $roomGallery = RoomGallery::where('hotel_id', $roomCategory->hotel_id)->get();
            if (!is_null($roomGallery)) {
                foreach ($roomGallery as $gallery) {
                    Storage::delete($gallery->image_url);
                }
            }
            //Delete Room Gallery
            RoomGallery::where('hotel_id', $roomCategory->hotel_id)->delete();
            $roomCategory->delete();
            return redirect()->route('room-category.index')->with(['message' => 'Room Category Deleted Successfully', 'alert-type' => 'success']);
        }
    }
}
