@extends('layouts.theme')
@include('include/navbar')
<style>
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        padding: 20px;
        width: 1000px;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border-radius: 6px;
        -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1)
    }

    .comment-box {

        padding: 5px;
    }


    .comment-area textarea {
        resize: none;
        border: 1px solid #f5b917;
    }


    .form-control:focus {
        color: #f5b917;
        background-color: #fff;
        border-color: #ffffff;
        outline: 0;
    }

    .send {
        color: #fff;
        background-color: #f5b917;
        border-color: #f5b917;
    }

    .send:hover {
        color: #fff;
        background-color: #f5b917;
        border-color: #f5b917;
    }


    .rating {
        display: flex;
        margin-top: -10px;
        flex-direction: row-reverse;
        margin-left: -4px;
        float: left;
    }

    .rating>input {
        display: none
    }

    .rating>label {
        position: relative;
        width: 19px;
        font-size: 25px;
        color: #f5b917;
        cursor: pointer;
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }

    th {
        background: #1cc3b2;
        color: white;
    }

    p {
        font-size: 18px;
        font-family: auto;
    }

    #roomServices {
        font-size: 18px;
        font-family: auto;
    }


    .containr {
        background: #eaeaea;
        text-align: center;
        margin-top: 20px;
    }

    .carousel-inner>.item>img,
    .carousel-inner>.item>a>img {
        margin: auto;
    }

    #myCarousel {
        max-width: 650px;
        margin: 0 auto;
        background: #fff;
    }

    #thumbCarousel {
        max-width: 650px;
        margin: 0 auto;
        overflow: hidden;
        background: #eaeaea;
        padding: 10px 0;
    }

    #thumbCarousel .thumb {
        float: left;
        margin-right: 10px;
        border: 1px solid #ccc;
        background: #fff;
    }

    #thumbCarousel .thumb:last-child {
        margin-right: 0;
    }

    .thumb:hover {
        cursor: pointer;
    }

    .thumb img {
        opacity: 0.5;
    }

    .thumb img:hover {
        opacity: 1;
    }

    .thumb.active img {
        opacity: 1;
        border: 1px solid #1d62b7;
    }

    @media only screen and (max-width: 767px){
        .classy-nav-container .classy-navbar .nav-brand {
    max-width: 90px;
    margin-left: -25px;
    }}
      


    
</style>
<head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
@section('content')
    <!-- Rooms Area Start -->
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-md-3"
                    style="background: -webkit-gradient(linear,left top,left bottom,from(#febb02),to(#febb02)); height:645px;margin-top: 20px;">
                    <form action="{{ route('room_available') }}" method="get">
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-12">
                                <label for="checkIn">City</label>

                                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city"
                                    name="city" value="{{ session()->get('variableName')['city'] }}"
                                    placeholder="where are you going ?">
                            </div>
                        </div>
                        <div class="row mt-15">
                            <div class="col-md-12">
                                <label for="checkIn">Check In</label>
                                <input type="date" class="form-control @error('checkin-date') is-invalid @enderror"
                                    id="checkIn" name="checkin-date"
                                    value="{{ session()->get('variableName')['checkin-date'] }}">
                            </div>
                        </div>
                        <div class="row mt-15">
                            <div class="col-md-12">
                                <label for="checkOut">Check Out</label>
                                <input type="date" class="form-control @error('checkout-date') is-invalid @enderror"
                                    id="checkOut" name="checkout-date"
                                    value="{{ session()->get('variableName')['checkout-date'] }}">
                            </div>
                        </div>
                        <div class="row mt-15">
                            <div class="col-md-12">
                                <label for="room">Room</label>
                                <select name="room" id="room" class="form-control">
                                    <option {{ session()->get('variableName')['room'] == 01 ? 'selected' : '' }}
                                        value="01">
                                        01
                                    </option>
                                    <option {{ session()->get('variableName')['room'] == 02 ? 'selected' : '' }}
                                        value="02">
                                        02
                                    </option>
                                    <option {{ session()->get('variableName')['room'] == 03 ? 'selected' : '' }}
                                        value="03">
                                        03
                                    </option>
                                    <option {{ session()->get('variableName')['room'] == 04 ? 'selected' : '' }}
                                        value="04">
                                        04
                                    </option>
                                    <option {{ session()->get('variableName')['room'] == 05 ? 'selected' : '' }}
                                        value="05">
                                        05
                                    </option>
                                    <option {{ session()->get('variableName')['room'] == 06 ? 'selected' : '' }}
                                        value="06">
                                        06
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-15">
                            <div class="col-md-12">
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
                        </div>
                        <div class="row mt-15">
                            <div class="col-md-12">
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
                        </div>
                        <div class="row mt-15">
                            <div class="col-md-12">
                                <button type="submit" class="form-control btn roberto-btn w-100">Check
                                    Availability
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    <!-- Single Room Details Area -->
                    <div class="single-room-details-area mb-50">
                        <!-- Room Thumbnail Slides -->
                        {{-- <div class="room-thumbnail-slides mb-50">
                        <div id="room-thumbnail--slide" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($hotel->gallery as $iamge)
                                    <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('images/hotel_galleries/'.$iamge->img_url) }}"
                                             class="d-block w-100 vh-50" alt="" style="max-height:500px">
                                    </div>
                                @endforeach
                            </div>
                            <ol class="carousel-indicators">
                                @foreach ($hotel->gallery as $iamge)
                                    <li data-target="#room-thumbnail--slide" data-slide-to="{{ $loop->index }}"
                                        class="{{ $loop->index == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('images/hotel_galleries/' . $iamge->img_url) }}"
                                             class="d-block w-100 vh-25" alt="" style="max-height:50%">
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                     {{-- </div>  --}}


                     



                        <div class="containr">
                            <h2>Harvey Islamabad</h2>
                            <h5 style="color: gray; font-weight:400"> <i class="fa fa-map-marker" aria-hidden="true"
                                    style="font-size:17px; color: #0071c2;font-weight: bold;"></i> Street 6 House 99C, PMCHS
                                , E11/2, E-11 Sector, 46000 Islamabad, Pakistan</h5>
                           
                                <div id="myCarousel" class="carousel slide" data-interval="false">

                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                            <img src="https://www.technobuffalo.com/wp-content/uploads/2016/09/Xperia-XZ_platinum_group_SCR1-1280x1280.png"
                                                alt="XZ" style="width: 420px; height: 440px">
                                        </div>
                                        <div class="item">
                                            <img src="https://cdn.arstechnica.net/wp-content/uploads/2016/08/Xperia-XZ_forestBlue_group_SCR1.png"
                                                alt="XZ" style="width: 420px; height: 440px">
                                        </div>
                                        <div class="item">
                                            <img src="https://sits-pod35.demandware.net/dw/image/v2/ABBC_PRD/on/demandware.static/-/Sites-sony-master-catalog/default/dw9ddcfe3a/images/XPERIAXZB/XPERIAXZB.png?sw=442&sh=442&sm=fit"
                                                alt="XZ" style="width: 420px; height: 440px">
                                        </div>
                                        <div class="item">
                                            <img src="https://www.starhub.com/content/dam/catalog/starhub-store-sony-xperia-xz-blue-back.png"
                                                alt="XZ" style="width: 420px; height: 440px">
                                        </div>
                                        <div class="item">
                                            <img src="https://www.starhub.com/content/dam/catalog/starhub-store-sony-xperia-xz-platinum-back.png"
                                                alt="XZ" style="width: 420px; height: 440px">
                                        </div>

                                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel" role="button"
                                            data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                    <div id="thumbCarousel">
                                        <div data-target="#myCarousel" data-slide-to="0" class="thumb active"><img
                                                src="https://www.technobuffalo.com/wp-content/uploads/2016/09/Xperia-XZ_platinum_group_SCR1-1280x1280.png"
                                                alt="XZ" style="width: 120px; height: 130px"></div>
                                        <div data-target="#myCarousel" data-slide-to="1" class="thumb"><img
                                                src="https://cdn.arstechnica.net/wp-content/uploads/2016/08/Xperia-XZ_forestBlue_group_SCR1.png"
                                                alt="XZ" style="width: 120px; height: 130px"></div>
                                        <div data-target="#myCarousel" data-slide-to="2" class="thumb"><img
                                                src="https://sits-pod35.demandware.net/dw/image/v2/ABBC_PRD/on/demandware.static/-/Sites-sony-master-catalog/default/dw9ddcfe3a/images/XPERIAXZB/XPERIAXZB.png?sw=442&sh=442&sm=fit"
                                                alt="XZ" style="width: 120px; height: 130px"></div>
                                        <div data-target="#myCarousel" data-slide-to="3" class="thumb"><img
                                                src="https://www.starhub.com/content/dam/catalog/starhub-store-sony-xperia-xz-blue-back.png"
                                                alt="XZ" style="width: 120px; height: 130px"></div>
                                        <div data-target="#myCarousel" data-slide-to="4" class="thumb"><img
                                                src="https://www.starhub.com/content/dam/catalog/starhub-store-sony-xperia-xz-platinum-back.png"
                                                alt="XZ" style="width: 120px; height: 130px"></div>
                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <p>{!! $hotel->description !!}</p>
                        </div>
                    </div>
                    <h4>Most popular facilities:</h4>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            @foreach ($hotel->service as $service)
                                {!! $service->service !!},
                            @endforeach
                        </div>
                    </div>
                    <br>
                    <h4>Availability:</h4>
                    <form method="post" action="{{ route('getroom') }}">
                        @csrf
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Accommodation Type</th>
                                    <th scope="col">
                                        <table>
                                            <tr>
                                                <th scope="col">Sleeps</th>
                                                <th scope="col">Today's Price</th>
                                                <th scope="col">Select amount</th>
                                            </tr>
                                        </table>
                                    </th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roomCategories as $key => $roomCategory)
                                    <tr>
                                        <td>
                                            <div class="row">

                                                <div class="col-md-10">
                                                    <h6>{{ $roomCategory['title'] }}</h6>
                                                    @foreach ($roomCategory['reports'] as $report)
                                                        @php
                                                            $bed = json_decode($report->bed_detail, true);
                                                            
                                                        @endphp
                                                        @if ($bed['full'] > 0)
                                                            {{ $bed['full'] }} Full bed <span
                                                                class="fa fa-bed"></span>
                                                        @endif
                                                        <br>
                                                        @if ($bed['king'] > 0)
                                                            {{ $bed['king'] }} King bed <span
                                                                class="fa fa-bed"></span>
                                                        @endif
                                                        <br>
                                                        @if ($bed['twin'] > 0)
                                                            {{ $bed['twin'] }} Twin bed <span
                                                                class="fa fa-bed"></span>
                                                        @endif
                                                    @endforeach
                                                    <p>

                                                        @foreach ($roomCategory['facilities'] as $facilites)
                                                            {{-- {{$facilites}} --}}
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                            <p>
                                                @foreach ($roomCategory['service'] as $service)
                                                    <span class="fa fa-check"></span> <span
                                                        id="roomServices">{{ $service['title'] }}</span>
                                                @endforeach
                                            </p>
                                        <td>
                                            <table class="table table-bordered">
                                                <tbody>
                                                    @php
                                                        $totalBookedRooms = 0;
                                                    @endphp
                                                    @foreach ($roomCategory['reports'] as $report)
                                                        @if ($report->adult)
                                                            <tr>
                                                                <td>
                                                                    @for ($i = 0; $i < $report->adult; $i++)
                                                                        <i class="fa fa-user-o" style="font-size:24px"
                                                                            aria-hidden="true"></i>
                                                                    @endfor

                                                                </td>
                                                                <td>
                                                                    <p>{{ $report->price }}</p>
                                                                </td>
                                                                <td>
                                                                    <select name="room_id[]"
                                                                        class="room_id @if (in_array($report->id, $alreadyBooked)) @php $totalBookedRooms++; @endphp disabled  @else @endif "
                                                                        id="room_id">
                                                                        <option value="">0</option>
                                                                        @php
                                                                            for ($i = 1; $i <= $report->number_of_room; $i++) {
                                                                                $price = $report->price * $i;
                                                                                echo " <option value='$report->id,$report->bed_no,$i'> $i PKR($price)   </option>";
                                                                            }
                                                                            
                                                                        @endphp
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @if ($report->children)
                                                            <tr>
                                                                <td>
                                                                    @for ($i = 0; $i < $report->children; $i++)
                                                                        <i class="fa fa-user-o" style="font-size:24px"
                                                                            aria-hidden="true"></i>
                                                                    @endfor
                                                                    +
                                                                    @for ($i = 0; $i < $report->children; $i++)
                                                                        <i class="fa fa-user-o" style="font-size:15px"
                                                                            aria-hidden="true"></i>
                                                                    @endfor
                                                                    <p></p>
                                                                </td>
                                                                <td>
                                                                    <p>{{ $report->price + $report->children_extra_price }}
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <select name="room_id[]"
                                                                        class="room_id @if (in_array($report->id, $alreadyBooked)) @php $totalBookedRooms++; @endphp disabled  @else @endif "
                                                                        id="room_id">
                                                                        <option value="">0</option>
                                                                        @php
                                                                            for ($i = 1; $i <= $report->number_of_room; $i++) {
                                                                                $price = $report->price * $i;
                                                                                echo " <option value='$report->id,$report->bed_no,$i'> $i PKR($price)   </option>";
                                                                            }
                                                                        @endphp
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                        @if ($key == 0)
                                            <td colspan="3">
                                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms"
                                                    style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                                                    @if (!$totalBookedRooms == count($roomCategory['reports']))
                                                        <button type="submit" class="btn roberto-btn mt-15">
                                                            Reserve
                                                        </button>
                                                    @else
                                                        <button disabled="disabled" type="button"
                                                            class="btn roberto-btn mt-15">Reserved
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    <h4>Hotel surroundings:</h4>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            @foreach ($hotel->surrounding as $surrounding)
                                <div class="row">
                                    <div class="col-md-4">{{ $surrounding->surrounding_location }}</div>
                                    <div class="col-md-8 text-right">{{ $surrounding->surrounding_distance }}</div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>

                    <div class="room-review-area mb-100">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Room Review</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-right">
                                    <button class="btn roberto-btn mb-50" id="addReview">Add Review</button>
                                </h4>
                            </div>
                        </div>
                        <div class="card add-review">
                            <div class="row">
                                <div class="col-2">
                                    {{-- <img src="https://i.imgur.com/xELPaag.jpg" width="70" --}}
                                    {{-- class="rounded-circle mt-2"> --}}
                                </div>

                                <div class="col-10">
                                    <form action="{{ route('ratings.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id"
                                            value="@if (Auth::check()) {{ auth()->user()->id }} @endif">
                                        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                                        <div class="comment-box ml-2">
                                            <h4>Add a comment</h4>
                                            <div class="rating">
                                                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                            </div>
                                            <div class="comment-area">
                                                <textarea class="form-control" name="message" placeholder="what is your view?" rows="4"></textarea>
                                            </div>
                                            <div class="comment-btns mt-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="pull-left">

                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="pull-right">
                                                            <div class="col-12 col-md-5 text-right">
                                                                <button type="submit" class="btn roberto-btn mb-50">
                                                                    Send
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <br>
                        <!-- Single Review Area -->
                        @foreach ($hotel->ratings as $rating)
                            <div class="single-room-review-area d-flex align-items-center">
                                <div class="reviwer-thumbnail">
                                    <img src="img/bg-img/53.jpg" alt="">
                                </div>
                                <div class="reviwer-content">
                                    <div class="reviwer-title-rating d-flex align-items-center justify-content-between">
                                        <div class="reviwer-title">
                                            <span>{{ $rating->created_at->diffForHumans() }}</span>
                                            <h6>{{ $rating->user->name }}</h6>
                                        </div>
                                        <div class="reviwer-rating">
                                            @php
                                                for ($i = 1; $i <= 5; $i++) {
                                                    if ($i <= $rating->rating) {
                                                        echo "<i class='fa fa-star checked'></i>";
                                                    } else {
                                                        echo "<i class='fa fa-star'></i>";
                                                    }
                                                }
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    <!-- Gallery -->

                </div>
            </div>




            {{-- <div class="col-12 col-lg-4"> --}}
            {{-- <!-- Hotel Reservation Area --> --}}
            {{-- <div class="hotel-reservation--area mb-100"> --}}
            {{-- <form action="{{ route('room-link-booking') }}" method="GET"> --}}
            {{-- @csrf --}}
            {{-- <div class="hotel-reservation--area mb-100"> --}}
            {{-- <div class="form-group mb-20"> --}}
            {{-- <label for="checkInDate">Date</label> --}}
            {{-- <div> --}}
            {{-- <div class="row no-gutters"> --}}
            {{-- <div class="col-6"> --}}
            {{-- <input type="date" --}}
            {{-- class="input-small form-control  @error('checkin_date') is-invalid @enderror" --}}
            {{-- name="checkin_date" placeholder="Check In" --}}
            {{-- value="{{ old('checkin_date') }}"> --}}
            {{-- </div> --}}
            {{-- <div class="col-6"> --}}
            {{-- <input type="date" --}}
            {{-- class="input-small form-control @error('checkout_date') is-invalid @enderror" --}}
            {{-- name="checkout_date" placeholder="Check Out" --}}
            {{-- value="{{ old('checkout_date') }}"> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- <div class="form-group mb-20"> --}}
            {{-- <label for="guests">Amount</label> --}}
            {{-- <div class="row"> --}}
            {{-- <div class="col-12"> --}}
            {{-- <input type="text" class="form-control" name="balance_amount" disabled --}}
            {{-- value="{{ $rooms->price + $rooms->tax }}"> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- <div class="form-group mb-20"> --}}
            {{-- <label for="guests">Guests</label> --}}
            {{-- <div class="row"> --}}
            {{-- <div class="col-6"> --}}
            {{-- <select name="adults" id="guests" class="form-control"> --}}
            {{-- <option value="">Adults</option> --}}
            {{-- <option value="01" {{ old('no_of_adults') == '01' ? 'selected' : '' }}>01 --}}
            {{-- </option> --}}
            {{-- <option value="02" {{ old('no_of_adults') == '02' ? 'selected' : '' }}>02 --}}
            {{-- </option> --}}
            {{-- <option value="03" {{ old('no_of_adults') == '03' ? 'selected' : '' }}>03 --}}
            {{-- </option> --}}
            {{-- <option value="04" {{ old('no_of_adults') == '04' ? 'selected' : '' }}>04 --}}
            {{-- </option> --}}
            {{-- <option value="05" {{ old('no_of_adults') == '05' ? 'selected' : '' }}>05 --}}
            {{-- </option> --}}
            {{-- <option value="06" {{ old('no_of_adults') == '06' ? 'selected' : '' }}>06 --}}
            {{-- </option> --}}
            {{-- </select> --}}
            {{-- </div> --}}
            {{-- <div class="col-6"> --}}
            {{-- <select name="children" id="children" class="form-control"> --}}
            {{-- <option value="">Children</option> --}}
            {{-- <option value="01" --}}
            {{-- {{ old('no_of_childrens') == '01' ? 'selected' : '' }}>01 --}}
            {{-- </option> --}}
            {{-- <option value="02" --}}
            {{-- {{ old('no_of_childrens') == '02' ? 'selected' : '' }}>02 --}}
            {{-- </option> --}}
            {{-- <option value="03" --}}
            {{-- {{ old('no_of_childrens') == '03' ? 'selected' : '' }}>03 --}}
            {{-- </option> --}}
            {{-- <option value="04" --}}
            {{-- {{ old('no_of_childrens') == '04' ? 'selected' : '' }}>04 --}}
            {{-- </option> --}}
            {{-- <option value="05" --}}
            {{-- {{ old('no_of_childrens') == '05' ? 'selected' : '' }}>05 --}}
            {{-- </option> --}}
            {{-- <option value="06" --}}
            {{-- {{ old('no_of_childrens') == '06' ? 'selected' : '' }}>06 --}}
            {{-- </option> --}}
            {{-- </select> --}}
            {{-- </div> --}}

            {{-- </div> --}}
            {{-- </div> --}}
            {{-- <div class="form-group mb-20"> --}}
            {{-- <label for="guests">Arrival Time</label> --}}
            {{-- <div class="row"> --}}
            {{-- <div class="col-12"> --}}
            {{-- <input type="time" name="approx_arrival_time" id="approx_arrival_time" --}}
            {{-- class="form-control" value="{{ old('approx_arrival_time') }}"> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- <input type="hidden" name="category_id" value="{{ $rooms->id }}"> --}}
            {{-- <input type="hidden" name="hotel_id" value="{{ $rooms->hotel_id }}"> --}}
            {{-- <input type="hidden" name="balance_amount" --}}
            {{-- value="{{ $rooms->price + $rooms->tax }}"> --}}
            {{-- @if ($rooms->rooms->where('reserved', 'false')->count() > 0) --}}
            {{-- <div class="form-group"> --}}
            {{-- <button type="submit" class="btn roberto-btn w-100">Reserve Now</button> --}}
            {{-- </div> --}}
            {{-- @else --}}
            {{-- <p class="text-warning">Sorry ! All Rooms Booked in This Category</p> --}}
            {{-- @endif --}}
            {{-- @if (session()->has('message')) --}}
            {{-- <div class="alert alert-success"> --}}
            {{-- {{ session()->get('message') }} --}}
            {{-- </div> --}}
            {{-- @endif --}}

            {{-- </form> --}}
            {{-- </div> --}}
            {{-- </div> --}}
        </div>

    

    </div>
    </div>
    <!-- Rooms Area End -->
    @include('include/callnow')
    @include('include/footer')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".add-review").hide()
            $("#addReview").click(function() {
                $(".add-review").show()
            })
        })

        function rooms() {
            var room_ids = new Array();
            // var room_id=$('#room_id');
            // alert(1);
            // console.log(room_ids);
            var dt = $('.room_id option:selected').map(function() {
                if (this.value != "") {
                    room_ids.push(this.value);
                }
            });
            var fdata = {
                "room_id": room_ids,
                '_token': $('input[name=_token]').val(),
            };
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('input[name=_token]').val()
            //     }
            // });
            // var fdata = new FormData();
            // fdata.append('room_id',room_ids);
            // fdata.append('_token', $('input[name=_token]').val());
            $.ajax({
                type: 'POST',
                url: '{{ route('getroom') }}',
                data: fdata,
                success: function(data) {
                    co
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {

            //Show carousel-control

            $("#myCarousel").mouseover(function() {
                $("#myCarousel .carousel-control").show();
            });

            $("#myCarousel").mouseleave(function() {
                $("#myCarousel .carousel-control").hide();
            });

            //Active thumbnail

            $("#thumbCarousel .thumb").on("click", function() {
                $(this).addClass("active");
                $(this).siblings().removeClass("active");

            });

            //When the carousel slides, auto update

            $('#myCarousel').on('slid.bs.carousel', function() {
                var index = $('.carousel-inner .item.active').index();
                //console.log(index);
                var thumbnailActive = $('#thumbCarousel .thumb[data-slide-to="' + index + '"]');
                thumbnailActive.addClass('active');
                $(thumbnailActive).siblings().removeClass("active");
                //console.log($(thumbnailActive).siblings());
            });
        });
    </script>
@endsection
