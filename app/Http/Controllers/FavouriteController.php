<?php

namespace App\Http\Controllers;

use App\Favourite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required',
        ]);

        $where = [
            'hotel_id' => $request->hotel_id,
            'user_id' => auth()->user()->id,
        ];

        

        $favourite = Favourite::where($where);
    
        if ($favourite->exists()) {
            $favorite = $favourite->delete();
            return response()->json(['success' => 'Hotel removed from favourites.']);
        }else{
            $favorite = Favourite::create($where);
            return response()->json(['success' => 'Hotel added to favourites.']);
        }

    }
}
