<?php

namespace App\Http\Controllers;

use App\City;
use App\HotelService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $image->move('images/cities/', $fileName);
            $data['image'] = $fileName;
        }
        City::create($data);
        $notification = array(
            'message' => 'City has been add successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('cities.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $data = $request->only('name');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $image->move('images/cities/', $fileName);
            $data['image'] = $fileName;
        }
        $city->update($data);
        $notification = array(
            'message' => 'City has been update successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('cities.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->back()->with(['message' => 'City deleted Successfully', 'alert-type' => 'success']);
    }
}
