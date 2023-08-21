<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required",
            "message" => "required",
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data = $request->only('name', 'email', 'messages');
        ContactUs::create($data);
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];
        $admin = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->first();
        $mailError = null;
        try {
            \Mail::to($admin->email)->send(new \App\Mail\ContactUs($details));
        } catch (\Exception $e) {
            $mailError = $e->getMessage();
        }
        return Redirect::back()->withErrors(['message' => "Your Request Submit Successfully", 'mailError' => $mailError]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ContactUs $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ContactUs $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ContactUs $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ContactUs $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
