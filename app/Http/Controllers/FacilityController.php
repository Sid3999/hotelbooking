<?php

namespace App\Http\Controllers;

use App\Facility;
use App\HotelGallery;
use App\HotelService;
use App\HotelSurrounding;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::all();
        return view('admin.facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data = $request->only('name');
        $data['user_id'] = auth()->user()->id;
        Facility::create($data);
        return redirect()->route('facilities.index')->with(['message' => 'Facility Add Successfully .', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Facility $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Facility $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Facility $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data = $request->only('name');
        $data['user_id'] = auth()->user()->id;
        $facility->update($data);
        return redirect()->route('facilities.index')->with(['message' => 'Facility Add Successfully .', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Facility $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        if (!is_null($facility)) {
          $facility=  Facility::find($facility->id);
            $facility->delete();
            return redirect()->route('facilities.index')->with(['message' => 'Facility deleted successfully', 'alert-type' => 'success']);
        }
    }
}
