<?php

namespace App\Http\Controllers;

use App\HotelSurrounding;
use Illuminate\Http\Request;

class HotelSurroundingController extends Controller
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
     * @param  \App\HotelSurrounding  $hotelSurrounding
     * @return \Illuminate\Http\Response
     */
    public function show(HotelSurrounding $hotelSurrounding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HotelSurrounding  $hotelSurrounding
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelSurrounding $hotelSurrounding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HotelSurrounding  $hotelSurrounding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelSurrounding $hotelSurrounding)
    {
        $hotelSurrounding->surrounding_location = $request->surrounding_location;
        $hotelSurrounding->surrounding_distance = $request->surrounding_distance;
        $surrounding = $hotelSurrounding->update();
        if ($surrounding) {
            return redirect()->back()->with(['message' => 'Hotel Surrounding Updated Successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Oops! something wrong.', 'alert-type' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HotelSurrounding  $hotelSurrounding
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelSurrounding $hotelSurrounding)
    {
        $hotelSurrounding->delete();
        return redirect()->back()->with(['message' => 'Hotel Surrounding deleted Successfully', 'alert-type' => 'success']);
    }
    //get the data against ajax request
    public function surroundingData($id)
    {
        $hotelSurrounding = HotelSurrounding::find($id);
        return $hotelSurrounding;
    }
}
