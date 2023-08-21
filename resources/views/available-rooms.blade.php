@extends('layouts.theme')
@section('title', 'Available Rooms')
@section('style')
    <style>
        .page-item.active .page-link {
            background-color: #1cc3b2 !important;
            color: #ffffff !important;
            ;
            border-color: #1cc3b2 !important;
            ;
        }

        body {
            background-color: #eee
        }

        .card {
            border: none;
            border-radius: 10px
        }

        .c-details span {
            font-weight: 300;
            font-size: 13px
        }

        .icon {
            width: 10px;
            height: 50px;
            background-color: #eee;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 39px
        }

        .badge {
            display: inline-block;
            padding: 0.50em 0;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }

        .badge span {
            

            font-size: 20px;
            text-transform: capitalize;
            color: #2a303b;
            font-weight: 500;
            word-wrap: break-word;
        }

        .review span {
            background-color: #fffbec;
            width: 60px;
            height: 25px;
            padding-bottom: 3px;
            border-radius: 5px;
            display: flex;
            color: #fed85d;
            justify-content: center;
            align-items: center
        }

        .text1 {
            font-size: 14px;
            font-weight: 600
        }

        .text2 {
            color: #a5aec0
        }

        .btn-success {
            position: relative;
            z-index: 1;
            min-width: 150px;
            height: 46px;
            line-height: 46px;
            font-size: 16px;
            font-weight: 500;
            display: inline-block;
            padding: 0 40px;
            text-align: center;
            text-transform: capitalize;
            background-color: #1cc3b2;
            color: #ffffff;
            border: none;
            border-radius: 2px;
            -webkit-transition-duration: 500ms;
            -o-transition-duration: 500ms;
            transition-duration: 500ms;
        }

        /* .fa {
                color: #1cc3b2;
            } */

        .surrounding {
            font-size: 0.8rem;
            color: lightslategray;
        }

    .btn-success {

    margin-top: 10px;
    
}

.wish-icon {
	position: absolute;
	right: 20px;
	top: 5px;
	z-index: 99;
	cursor: pointer;
	font-size: 16px;
	color: #f11a1a;
}
.wish-icon .fa-heart {
	color: #ff6161;
}

    </style>
@endsection
@section('content')
    @include('include/navbar')
    @include('include/breadcrumb', ['page' => $page])
    <!-- About Us Area Start -->
    <section class="roberto-about-area section-padding-100-0">
        <!-- Hotel Search Form Area -->
        <div class="hotel-search-form-area" style="font-size: 12px;">
            <div class="container-fluid">

                <div class="hotel-search-form">
                    <form action="{{ route('room_available') }}" method="get">
                        <div class="row justify-content-between align-items-end">
                            <div class="col-6 col-md-1 col-lg-2">
                                <label for="checkIn">City</label>

                                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city"
                                    name="city" value="{{ session()->get('variableName')['city'] }}"
                                    placeholder="where are you going ?">
                            </div>
                            <div class="col-5 col-md-1 col-lg-2">
                                <label for="checkIn">Check In</label>
                                <input type="date" class="form-control @error('checkin-date') is-invalid @enderror"
                                    id="checkIn" name="checkin-date"
                                    value="{{ session()->get('variableName')['checkin-date'] }}">
                            </div>
                            <div class="col-5 col-md-1 col-lg-2">
                                <label for="checkOut">Check Out</label>
                                <input type="date" class="form-control @error('checkout-date') is-invalid @enderror"
                                    id="checkOut" name="checkout-date"
                                    value="{{ session()->get('variableName')['checkout-date'] }}">
                            </div>
                            <div class="col-4 col-md-1">
                                <label for="room">Room</label>
                                <select name="room" id="room" class="form-control">
                                    <option {{ (request()->has('room') && request()->room == '01' ) ? 'selected' : '' }} value="01">
                                        01
                                    </option>
                                    <option {{ (request()->has('room') && request()->room == '02' ) ? 'selected' : '' }} value="02">
                                        02
                                    </option>
                                    <option {{ (request()->has('room') && request()->room == '03' ) ? 'selected' : '' }} value="03">
                                        03
                                    </option>
                                    <option {{ (request()->has('room') && request()->room == '04' ) ? 'selected' : '' }} value="04">
                                        04
                                    </option>
                                    <option {{ (request()->has('room') && request()->room == '05' ) ? 'selected' : '' }} value="05">
                                        05
                                    </option>
                                    <option {{ (request()->has('room') && request()->room == '06' ) ? 'selected' : '' }} value="06">
                                        06
                                    </option>
                                </select>
                            </div>
                            <div class="col-4 col-md-1">
                                <label for="adults">Adult</label>
                                <select name="adults" id="adults" class="form-control">
                                    <option {{ session()->get('variableName')['adults'] == 01 ? 'selected' : '' }}
                                        value="01">
                                        01
                                    </option>
                                    <option {{ session()->get('variableName')['adults'] == 02 ? 'selected' : '' }}
                                        value="02">
                                        02
                                    </option>
                                    <option {{ session()->get('variableName')['adults'] == 03 ? 'selected' : '' }}
                                        value="03">
                                        03
                                    </option>
                                    <option {{ session()->get('variableName')['adults'] == 04 ? 'selected' : '' }}
                                        value="04">
                                        04
                                    </option>
                                    <option {{ session()->get('variableName')['adults'] == 05 ? 'selected' : '' }}
                                        value="05">
                                        05
                                    </option>
                                    <option {{ session()->get('variableName')['adults'] == 06 ? 'selected' : '' }}
                                        value="06">
                                        06
                                    </option>
                                </select>
                            </div>
                            <div class="col-4 col-md-2 col-lg-1">
                                <label for="children">Children</label>
                                <select name="children" id="children" class="form-control">
                                    <option {{ session()->get('variableName')['children'] == 01 ? 'selected' : '' }}
                                        value="01">
                                        01
                                    </option>
                                    <option {{ session()->get('variableName')['children'] == 02 ? 'selected' : '' }}
                                        value="02">
                                        02
                                    </option>
                                    <option {{ session()->get('variableName')['children'] == 03 ? 'selected' : '' }}
                                        value="03">
                                        03
                                    </option>
                                    <option {{ session()->get('variableName')['children'] == 04 ? 'selected' : '' }}
                                        value="04">
                                        04
                                    </option>
                                    <option {{ session()->get('variableName')['children'] == 05 ? 'selected' : '' }}
                                        value="05">
                                        05
                                    </option>
                                    <option {{ session()->get('variableName')['children'] == 06 ? 'selected' : '' }}
                                        value="06">
                                        06
                                    </option>
                                </select>
                            </div>
                            <div class="col-12 col-md-2">
                                <button type="submit" class="form-control btn roberto-btn w-100" style="padding: 0 50px;">Check
                                    Availability
                                </button>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Area End -->
    <!-- Rooms Area Start -->
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            @if ($hotels->count() > 0)
                @foreach ($hotels as $hotel)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card p-3 mb-2">
                                <div class=" justify-content-between">
                                    <div class=" flex-row align-items-center">
                                        <div class="row">
                                            
                                            <div class="col-md-3 col-sm-12">
                                                @php
                                                    $wishlist = (in_array($hotel->id, $checkFauvorite)) ? 'fa-heart' : 'fa-heart-o';
                                                @endphp
                                                <span class="wish-icon wishlist" data-id="{{$hotel->id}}"><i class="fa {{$wishlist}}"></i></span>
                                                <img src="{{ asset('images/hotels/' . $hotel->thumbnail) }}">
                                            </div>
                                           <div class="col-9">
                                               <div class="row">
                                                <div class="col-md-8 col-lg-8 col-sm-12">
                                                    <div class="badge"><span>{{ $hotel->title }}</span></div>
                                                    <div>
                                                        <h6
                                                            style="color: lightslategray;font-family:Arial, Helvetica, sans-serif;font-weight:200;font-size:13px;">
                                                            {{ $hotel->address }},{{ $hotel->area }},{{ $hotel->country }}
                                                        </h6>
                                                    </div>
                                                    @foreach ($hotel->service as $service)
                                                        <span style="color:lightslategray;"class="fa fa-check"></span> <span style="color:lightslategray; font-family:Arial, Helvetica, sans-serif;font-weight:200;font-size:13px;"id="roomServices">
                                                            {{ $service->service }}
                                                        </span>
                                                    @endforeach
                                                <br>
                                                    <span class="surrounding font-weight-normal">Surrounding: <span>
                                                    @foreach ($hotel->surrounding as $surrounding)
                                                        <span class="fa fa-check"></span> <span id="roomServices">{{ $surrounding->surrounding_location }}</span>
                                                    @endforeach
                                                    
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-sm-12">
                                                    <span class="font-weight-light text-muted width-25">Reviews</span>
                                                    <span class="badge badge-warning p-1">
                                                        {{ number_format($hotel->ratings->avg('rating'),1) }}     
                                                    </span>
                                                    <br>
                                                    <span class="font-weight-light text-muted width-25">{{$nights}} Night, {{number_format(request()->get('adults') )}} Adults {{(request()->get('children') > 0 ) ? number_format(request()->get('children') )." Childrens" : "" }}</span>
                                                    <br>
                                                    {{-- @php   print_r($price); @endphp --}}
                                                    <span class="font-weight-bold width-25">PKR {{number_format($nights * $hotel->rooms->first()->price)}}</span>
                                                    <p class="font-weight-lighter width-25">Including taxes</p>
                                                    @php
                                                        $urlQuery = null;
                                                        foreach(request()->all() as $key => $value){
                                                            $urlQuery .= $key ."=". $value."  &&   ";
                                                        }
                                                    @endphp
                                                    <a href="{{ route('room-detail', $hotel->id) }}?{{$urlQuery}}" class="btn btn-sm  btn-success" role="button">See Availability</a>
                                                    {{-- <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms"
                                                            style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                                                            @php
                                                                $urlQuery = null;
                                                                foreach(request()->all() as $key => $value){
                                                                $urlQuery .= $key ."=". $value."  &&   ";
                                                                }
                                                            @endphp
                                                        <a href="{{ route('room-detail', $hotel->id) }}?{{$urlQuery}}"
                                                            class="btn  btn-success" role="button">See Availability</a>
                                                    </div> --}}
                                                </div>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-green">No Record found</h4>
                        </div>
                    </div>
                    {{-- <!-- Single Room Area --> --}}
                    {{-- @foreach ($room_categories as $room_cate) --}}
                    {{-- <div class=" --}}
                    {{-- single-room-area --}}
                    {{-- d-flex --}}
                    {{-- align-items-center --}}
                    {{-- mb-50 --}}
                    {{-- wow --}}
                    {{-- fadeInUp" --}}
                    {{-- data-wow-delay="100ms"> --}}
                    {{-- <!-- Room Thumbnail --> --}}
                    {{-- <div class="room-thumbnail"> --}}
                    {{-- <img --}}
                    {{-- src="{{ asset('images/room_category_galleries/' . $room_cate->roomCategory->gallery->first()->image_url) }}" --}}
                    {{-- alt="" style="max-height:250px;width:365px;max-width:365px"/> --}}
                    {{-- </div> --}}
                    {{-- <!-- Room Content --> --}}
                    {{-- <div class="room-content"> --}}
                    {{-- <h2>{{ $room_cate->roomCategory->title }}</h2> --}}
                    {{-- <h4>{{ $room_cate->roomCategory->price + $room_cate->tax }}PKR<span>/ Day</span></h4> --}}
                    {{-- <div class="room-feature"> --}}
                    {{-- <h6>Size: <span>{{ $room_cate->roomCategory->room_size }}</span></h6> --}}
                    {{-- <h6>Capacity: <span>{{ $room_cate->roomCategory->sleep }} People Can Sleep</span> --}}
                    {{-- </h6> --}}
                    {{-- <h6>Bed: <span> --}}
                    {{-- @switch($room_cate->roomCategory->bed_type) --}}
                    {{-- @case('1_king_bed_or_1_twin_bed') --}}
                    {{-- 1 King Bed or 1 Twin Bed --}}
                    {{-- @break --}}
                    {{-- @case('1_king_bed') --}}
                    {{-- 1 King Bed --}}
                    {{-- @break --}}
                    {{-- @case('1_twin_bed_or_1_king_bed') --}}
                    {{-- 1 Twin Bed or 1 King Bed --}}
                    {{-- @break --}}
                    {{-- @case('1_king_bed') --}}
                    {{-- 1 King Bed --}}
                    {{-- @break --}}

                    {{-- @default --}}
                    {{-- N/A --}}
                    {{-- @endswitch --}}
                    {{-- </span></h6> --}}
                    {{-- <h6>Services: <span> --}}
                    {{-- @foreach ($room_cate->roomCategory->service as $services) --}}
                    {{-- {{ $services->title }}, --}}
                    {{-- {{ $services->title }}, --}}
                    {{-- {{ $services->title }} --}}
                    {{-- @endforeach --}}
                    {{-- </span></h6> --}}
                    {{-- </div> --}}
                    {{-- <a href="{{ route('room-detail', $room_cate->roomCategory->id) }}" --}}
                    {{-- class="btn view-detail-btn">View --}}
                    {{-- Details --}}
                    {{-- <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> --}}
                    {{-- </div> --}}
                    {{-- </div> --}}
                    {{-- @endforeach --}}
                    <!-- Pagination -->
                    <nav class="roberto-pagination wow fadeInUp mb-100" data-wow-delay="1000ms">
                        <ul class="pagination">
                            {{-- {!! $room_categories->links() !!} --}}
                            {{-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next <i class="fa fa-angle-right"></i></a>
                            </li> --}}
                        </ul>
                    </nav>
                </div>

                {{-- <div class="col-12 col-lg-4">
                    <!-- Hotel Reservation Area -->
                    <div class="hotel-reservation--area mb-100">
                        <form action="#" method="post">
                            <div class="form-group mb-30">
                                <label for="checkInDate">Date</label>
                                <div class="input-daterange" id="datepicker">
                                    <div class="row no-gutters">
                                        <div class="col-6">
                                            <input type="text" class="input-small form-control" id="checkInDate"
                                                name="checkInDate" placeholder="Check In" />
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="input-small form-control" name="checkOutDate"
                                                placeholder="Check Out" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-30">
                                <label for="guests">Guests</label>
                                <div class="row">
                                    <div class="col-6">
                                        <select name="adults" id="guests" class="form-control">
                                            <option value="adults">Adults</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <select name="children" id="children" class="form-control">
                                            <option value="children">Children</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn roberto-btn w-100">
                                    Check Available
                                </button>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Rooms Area End -->

    <!-- Call To Action Area Start -->
    <section class="roberto-cta-area">
        <div class="container">
            <div class="cta-content bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/1.jpg)">
                <div class="row align-items-center">
                    <div class="col-12 col-md-7">
                        <div class="cta-text mb-50">
                            <h2>Contact us now!</h2>
                            <h6>
                                Contact (+12) 345-678-9999 to book directly or for advice
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 text-right">
                        <a href="#" class="btn roberto-btn mb-50">Contact Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Area End -->

    <!-- Partner Area Start -->
    <div class="partner-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="" data-wow-delay="300ms" style="display: flex; justify-content:space-between;">
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="{{ asset('website/img/core-img/p1.png') }}"
                                alt="4" /></a>
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="{{ asset('website/img/core-img/p2.png') }}"
                                alt="" /></a>
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="{{ asset('website/img/core-img/p3.png') }}"
                                alt="" /></a>
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="{{ asset('website/img/core-img/p4.png') }}"
                                alt="" /></a>
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="{{ asset('website/img/core-img/p5.png') }}"
                                alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Area End -->
    @include('include/footer')
@endsection
<script>
	
    </script>