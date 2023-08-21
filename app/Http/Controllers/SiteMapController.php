<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;

class SiteMapController extends Controller
{
    public function index()
    {
        // create new sitemap object
        $sitemap = App::make('sitemap');

        $hotels = \App\Hotel::orderBy('id','desc')->get();
        $rooms = \App\Room::orderBy('id','desc')->get();
        $blogs = \App\Blog::orderBy('id','desc')->get();

        foreach ($hotels as $hotel) {
            $params = "city=".$hotel->city."&city_id=".$hotel->city_id."&hotel_id=".$hotel->id."&room=01&&checkin=".date('Y-m-d')."&checkout=".date('Y-m-d', strtotime('+1 day'))."adult=01&child=0";
            $sitemap->add(URL::to('/rooms-available?'.$params), $hotel->updated_at, '1.0', 'daily');
        }

        foreach($rooms as $room) {
            $sitemap->add(URL::to('/rooms/'.$room->id), $room->updated_at, '1.0', 'daily');
        }

        $sitemap->add(URL::to('/news'), $blogs->last()->updated_at, '1.0', 'monthly');
        $sitemap->add(URL::to('/contact'), date('Y-m-d h:i:s',strtotime('2020-02-01 09:30:00')), '1.0', 'monthly');
        $sitemap->add(URL::to('/about'), date('Y-m-d h:i:s',strtotime('2020-02-01 09:30:00')), '1.0', 'monthly');
        $sitemap->add(URL::to('/'), date('Y-m-d h:i:s',strtotime('2020-02-01 09:30:00')), '1.0', 'monthly');
        $sitemap->add(URL::to('/register'), date('Y-m-d h:i:s',strtotime('2020-02-01 09:30:00')), '1.0', 'yearly');
        $sitemap->add(URL::to('/register-as-business'), date('Y-m-d h:i:s',strtotime('2020-02-01 09:30:00')), '1.0', 'yearly');
        $sitemap->add(URL::to('/login'), date('Y-m-d h:i:s',strtotime('2020-02-01 09:30:00')), '1.0', 'yearly');



        foreach($blogs as $blog) {
            $sitemap->add(URL::to('/news/'.$blog->id), $blog->updated_at, '1.0', 'monthly');
        }

        $sitemap->store('xml', 'sitemap');

        
    }
}
