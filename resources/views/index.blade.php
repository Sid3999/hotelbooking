@extends('layouts.theme')
@section('title', 'Home')
@section('content')
    @include('include.navbar')
    @include('include.welcome')
    @include('include.about')
    <style>
@media only screen and (max-width: 767px) {
    .text {
        margin-top: 100px;
        margin-left:-90px;
    }
}

    </style>


    <div class="text">
    <h3 style="margin-left: 7.5rem;font-family: Arial, Helvetica, sans-serif;font-size: 30px;">Explore Pakistan</h3>
    <h6 style="color: gray; margin-left: 7.5rem; font-family: Arial, Helvetica, sans-serif;font-size: 15px;">These popular destinations have a lot to offer</h6>
    </div>
   
    <div class="carosell">
        <div class="container" style="margin-top: 10rem;">
            <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="800000">
                <div class="carousel-inner row w-100 mx-auto" role="listbox">
                    @foreach($cities as $key=>$city)
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-2 @if($key==0) active @endif">
                            <a href="{{url('rooms-available')}}?city={{$city->name}}&city_id={{$city->id}}&&room=01&checkin-date={{\Carbon\Carbon::now()->format("Y-m-d")}}&checkout-date={{\Carbon\Carbon::now()->addDay(1)->format("Y-m-d")}}&adults=01&children=0">
                                <img class="img-fluid mx-auto d-block"
                                     src="{{asset('images/cities/'.$city->image)}}"
                                     alt="slide 1" width="200px" height="200px">
                            </a>
                            <h4>{{$city->name}} <small class="text text-muted pb-1">(Total {{$city->hotel->count()}} Properties)</small></h4>
                            
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                    <i class="fa fa-chevron-left fa-lg text-muted"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                    <i class="fa fa-chevron-right fa-lg text-muted"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    @include('include.service')
    @include('include.rooms')
    @include('include.feedback')
    {{-- @include('include.roomslider') --}}
    @include('include.blog')
    @include('include.callnow')
    @include('include.footer')
@endsection
