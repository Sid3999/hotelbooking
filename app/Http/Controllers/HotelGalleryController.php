<?php

namespace App\Http\Controllers;

use App\HotelGallery;
use Illuminate\Http\Request;
use Storage;

class HotelGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HotelGallery  $hotelGallery
     * @return \Illuminate\Http\Response
     */
    public function show(HotelGallery $hotelGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HotelGallery  $hotelGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelGallery $hotelGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HotelGallery  $hotelGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelGallery $hotelGallery)
    {
        if ($request->has('img_url')) {
            $extension = "." . $request->img_url->getClientOriginalExtension();
            $name = basename($request->img_url->getClientOriginalName(), $extension) . time();
            $name = $name . $extension;
            $path = $request->img_url->storeAs('images/Hotels', $name, 'public');
            Storage::Delete($hotelGallery->img_url);
            $hotelGallery->img_url = $path;
            if ($hotelGallery->update()) {
                return redirect()->back()->with(['message' => 'Hotel Gallery Updated Successfully!', 'alert-type' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Oops! something wrong.', 'alert-type' => 'error']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HotelGallery  $hotelGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelGallery $hotelGallery)
    {
        Storage::Delete($hotelGallery->img_url);
        if ($hotelGallery->delete()) {
            return redirect()->back()->with(['message' => 'Hotel Gallery Deleted Successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Oops! something wrong.', 'alert-type' => 'error']);
        }
    }
}
