@extends('layouts.theme')
@section('title', 'Room Booking')
@include('include/navbar')
{{-- @include('include/breadcrumb', ['page' => $hotel->title]) --}}
@section('title')
    {{ $hotel->title }}
@endsection
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
      
    .wish-icon {
	position: absolute;
	right: 20px;
	top: 5px;
	z-index: 99;
	cursor: pointer;
	font-size: 16px;
	color: #abb0b8;
}
.wish-icon .fa-heart {
	color: #ff6161;
}

    
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
                <div class="col-md-3" style="background: #eaeaea; height:645px;margin-top: 20px;">
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
                                    <option {{ session()->has('variableName') && session()->get('variableName')['room'] == 01 ? 'selected' : '' }}
                                        value="01">
                                        01
                                    </option>
                                    <option {{ session()->has('variableName') && session()->get('variableName')['room'] == 02 ? 'selected' : '' }}
                                        value="02">
                                        02
                                    </option>
                                    <option {{ session()->has('variableName') && session()->get('variableName')['room'] == 03 ? 'selected' : '' }}
                                        value="03">
                                        03
                                    </option>
                                    <option {{ session()->has('variableName') && session()->get('variableName')['room'] == 04 ? 'selected' : '' }}
                                        value="04">
                                        04
                                    </option>
                                    <option {{ session()->has('variableName') && session()->get('variableName')['room'] == 05 ? 'selected' : '' }}
                                        value="05">
                                        05
                                    </option>
                                    <option {{ session()->has('variableName') && session()->get('variableName')['room'] == 06 ? 'selected' : '' }}
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
                        <div class="containr">
                            @php
                                $wishlist = ($checkFauvorite > 0) ? 'fa-heart' : 'fa-heart-o';
                            @endphp
                            <span class="wish-icon wishlist" data-id="{{$hotel->id}}"><i class="fa {{$wishlist}}"></i></span>
                            <h2>{{$hotel->title}}</h2>
                            <h5 style="color: gray; font-weight:400"> <i class="fa fa-map-marker" aria-hidden="true"
                                    style="font-size:17px; color: #0071c2;font-weight: bold;"></i> {!!$hotel->address!!} - {{$hotel->atCity->name}}</h5>
                           
                                <div id="myCarousel" class="carousel slide" data-interval="false">

                                    <div class="carousel-inner" role="listbox">
                                        @php $i = 0; @endphp
                                        @foreach ($hotel->gallery as $image)
                                        
                                            <div class="item {{($i == 0) ? "active" : ""}}">
                                                <img src="{{ asset('images/hotel_galleries/'.$image->img_url) }}"
                                                    alt="XZ" style="width: 420px; height: 440px">
                                            </div>
                                            @php $i++; @endphp
                                        @endforeach
                                    
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
                                        @php $s = 0; @endphp
                                        @foreach ($hotel->gallery as $image)
                                        <div data-target="#myCarousel" data-slide-to="{{$s}}" class="thumb {{($s == 1) ? "active" : "" }}"><img
                                                src="{{ asset('images/hotel_galleries/'.$image->img_url) }}" 
                                                alt="XZ" style="width: 120px; height: 130px">
                                        </div>
                                        @php $s++; @endphp
                                        @endforeach

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-12" style="display: block;">
                            <p>{!! $hotel->description !!}</p>
                        </div>
                    </div>
                     
                    
                    <div class="row">
                        <div class="col-12 col-lg-12 mb-15">
                            <h2 class="font-weight-bold">Most popular facilities:</h2>
                            @foreach ($hotel->service as $service)
@if($service->service === 'Swimming pool') @php echo '<svg fill="#2d8dd7" height="25px" width="25px" version="1.1" 
id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 453.136 453.136" 
xml:space="preserve" stroke="#2d8dd7"><g id="SVGRepo_bgCarrier" stroke-width="0"> </g><g id="SVGRepo_tracerCarrier" 
stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.9062720000000001"></g>
<g id="SVGRepo_iconCarrier"> <g> <circle cx="314.663" cy="129.249" r="40.898"></circle> 
<path d="M88.562,192.074c-7.87,7.538-8.137,20.031-0.597,27.901c7.403,7.727,19.935,8.23,27.901,0.597l49.288-47.223l0.001,0 l73.238,16.398l-65.353,2.282c-50.385,48.276-43.325,41.516-44.332,42.462c10.512,3.491,20.149,9.371,28.223,17.391 c0.059,0.059,0.121,0.113,0.18,0.172c2.397,2.397,5.597,3.717,9.011,3.717c3.413,0,6.613-1.32,9.01-3.717 c8.141-8.141,17.889-14.092,28.526-17.603c7.294-2.408,15.002-3.678,22.912-3.678c12.172,0,23.882,2.962,34.305,8.543 l23.094-18.578l59.875,9.581c4.631,0.741,9.491-0.18,13.631-2.785l78.421-49.366c9.223-5.806,11.993-17.99,6.188-27.213 c-5.807-9.223-17.99-11.993-27.213-6.188l-72.13,45.406l-54.256-8.682l-30.806-38.294c-9.279-11.535-25.925-13.651-37.766-5.033 l24.215,12.233c-0.001,0-79.512-18.945-79.513-18.945c-6.284-1.404-13.107,0.361-17.956,5.001 c-0.003,0.002-0.005,0.005-0.008,0.007C139.598,143.214,95.642,185.296,88.562,192.074z"></path> <path d="M86.055,283.874c5.24-5.24,12.207-8.125,19.618-8.125c7.411,0,14.377,2.886,19.617,8.125 c10.906,10.906,25.407,16.913,40.831,16.913c15.424,0,29.925-6.006,40.83-16.913c5.24-5.24,12.207-8.125,19.618-8.125 s14.377,2.886,19.618,8.125c22.513,22.514,59.146,22.515,81.662,0c5.24-5.24,12.207-8.125,19.617-8.125 c7.41,0,14.377,2.885,19.617,8.125c22.514,22.515,59.147,22.515,81.661,0c5.858-5.858,5.858-15.355,0-21.213 c-5.857-5.858-15.355-5.858-21.213,0c-5.24,5.24-12.207,8.125-19.618,8.125c-7.411,0-14.377-2.886-19.617-8.125 c-10.906-10.906-25.407-16.913-40.831-16.913c-15.424,0-29.925,6.006-40.831,16.913c-5.24,5.24-12.207,8.125-19.618,8.125 c-7.411,0-14.377-2.886-19.618-8.125c-22.514-22.515-59.147-22.515-81.662,0c-5.24,5.24-12.206,8.125-19.617,8.125 c-7.41,0-14.377-2.885-19.617-8.125c-22.514-22.515-59.147-22.515-81.661,0c-5.24,5.24-12.207,8.125-19.618,8.125 c-7.411,0-14.378-2.886-19.618-8.125c-5.857-5.858-15.356-5.858-21.213,0c-5.858,5.858-5.858,15.355,0,21.213 C26.907,306.389,63.541,306.389,86.055,283.874z"></path> <path d="M427.53,326.661c-5.24,5.24-12.207,8.125-19.618,8.125c-7.411,0-14.377-2.886-19.617-8.125 c-10.906-10.906-25.407-16.913-40.831-16.913c-15.424,0-29.925,6.006-40.831,16.913c-5.24,5.24-12.207,8.125-19.618,8.125 c-7.411,0-14.377-2.886-19.618-8.125c-22.514-22.515-59.147-22.515-81.662,0c-5.24,5.24-12.206,8.125-19.617,8.125 c-7.41,0-14.377-2.885-19.617-8.125c-22.514-22.515-59.147-22.515-81.661,0c-5.24,5.24-12.207,8.125-19.618,8.125 c-7.411,0-14.378-2.886-19.618-8.125c-5.857-5.858-15.356-5.858-21.213,0c-5.858,5.858-5.858,15.355,0,21.213 c22.514,22.515,59.147,22.515,81.661,0c5.24-5.24,12.207-8.125,19.618-8.125c7.411,0,14.377,2.886,19.617,8.125 c10.906,10.906,25.407,16.913,40.831,16.913c15.424,0,29.925-6.006,40.83-16.913c5.24-5.24,12.207-8.125,19.618-8.125 s14.377,2.886,19.618,8.125c22.513,22.514,59.146,22.515,81.662,0c5.24-5.24,12.207-8.125,19.617-8.125 c7.41,0,14.377,2.885,19.617,8.125c22.514,22.515,59.147,22.515,81.661,0c5.858-5.858,5.858-15.355,0-21.213 C442.886,320.803,433.388,320.803,427.53,326.661z"></path> 
</g> </g></svg>' @endphp @endif    @if($service->service === 'Spa') @php echo '<svg version="1.1" height="25px" width="25px" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 25 32" enable-background="new 0 0 25 32" xml:space="preserve" fill="#349698" stroke="#349698"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#808184" d="M23.92,17.774c1.42-3.653,1.896-7.274-1.415-9.918c-3.477-2.777-5.737-4.801-6.888-6.17 c-0.053-0.074-0.108-0.136-0.163-0.205c-0.074-0.093-0.159-0.193-0.222-0.279c-0.007-0.01-0.02-0.014-0.028-0.023 c-0.329-0.359-0.669-0.626-0.994-0.765c-0.646-0.274-1.274-0.413-1.866-0.413c-1.779,0-3.032,1.2-4.12,2.497 c-0.946,1.126-3.162,3.01-4.78,4.383c-0.853,0.724-1.59,1.352-1.962,1.713c-1.647,1.599-2.741,5.179,1.407,13.127 c0.002,0.005,0.008,0.007,0.01,0.011c0.309,0.639,4.935,10.072,9.086,10.262C12.071,31.998,12.157,32,12.243,32 c4.327,0,7.329-5.009,9.47-9.405l0.271-0.555c0.671-1.372,1.362-2.795,1.916-4.214C23.909,17.808,23.914,17.792,23.92,17.774z M21.882,8.637c2.541,2.029,2.471,4.787,1.479,7.764c-1.326-1.997-3.902-3.945-4.03-4.04c-0.22-0.164-0.533-0.121-0.7,0.1 c-0.165,0.221-0.12,0.534,0.101,0.7c0.033,0.025,3.248,2.453,4.178,4.463c-0.353,0.881-0.761,1.774-1.19,2.668 c-0.791-1.117-2.317-2.806-4.168-4.389c-0.016-0.014-0.03-0.03-0.049-0.042c-1.223-1.041-2.585-2.032-3.969-2.779 c3.336-2.412,3.656-5.524,3.53-7.231c-0.04-0.532-0.138-1.038-0.263-1.524C18.07,5.509,19.755,6.939,21.882,8.637z M2.179,9.307 C2.526,8.968,3.251,8.353,4.09,7.641c1.737-1.475,3.899-3.31,4.899-4.501C9.922,2.028,10.974,1,12.344,1 c0.463,0,0.945,0.109,1.476,0.334c0.132,0.056,0.277,0.166,0.425,0.298c-0.072,0.192-0.144,0.378-0.218,0.587 C13.396,4,12.613,6.214,9.472,7.882c-3.06,1.625-5.165,5.471-5.253,5.634c-0.132,0.243-0.041,0.546,0.201,0.678 c0.242,0.128,0.547,0.042,0.678-0.202c0.021-0.037,2.048-3.742,4.843-5.227c3.485-1.85,4.378-4.371,5.029-6.211 c0.002-0.005,0.003-0.01,0.005-0.015c0.529,0.847,0.992,2.042,1.092,3.386c0.146,1.951-0.394,4.712-3.784,6.791 c-5.518,3.382-7.977,6.354-8.913,7.734C0.672,15.014,0.258,11.17,2.179,9.307z M20.814,22.157 c-2.049,4.208-4.888,9.049-8.784,8.838c-2.916-0.133-6.75-6.693-8.131-9.498c0.337-0.574,1.493-2.305,4.188-4.566 c0.258-0.086,1.091-0.317,1.752,0.013c0.072,0.036,0.148,0.053,0.224,0.053c0.183,0,0.359-0.101,0.447-0.276 c0.123-0.247,0.023-0.547-0.224-0.671c-0.26-0.13-0.529-0.198-0.793-0.236c0.892-0.671,1.913-1.374,3.078-2.098 c1.079,0.529,2.138,1.218,3.13,1.975c-0.69,0.104-1.027,0.385-1.081,0.434c-0.2,0.181-0.215,0.483-0.04,0.689 c0.097,0.115,0.238,0.174,0.38,0.174c0.112,0,0.226-0.037,0.318-0.11c0.005-0.004,0.512-0.379,1.714-0.139 c2.123,1.837,3.74,3.771,4.217,4.604c-0.042,0.085-0.083,0.171-0.125,0.256L20.814,22.157z"></path> <path fill="#808184" d="M13.733,24.252c-0.469,0-0.847,0.123-1.078,0.222c-0.34-0.122-0.686-0.184-1.028-0.184 c-1.386,0-2.264,1.004-2.301,1.046c-0.16,0.188-0.16,0.465,0.001,0.652c1.012,1.174,2.115,1.769,3.28,1.769 c1.966,0,3.322-1.716,3.379-1.789c0.15-0.193,0.139-0.467-0.027-0.646C15.141,24.438,14.297,24.252,13.733,24.252z M12.607,26.758 c-0.742,0-1.476-0.356-2.186-1.059c0.418-0.297,1.245-0.577,2.056-0.22c0.146,0.065,0.323,0.052,0.463-0.031 c0.003-0.002,0.332-0.196,0.793-0.196c0.402,0,0.79,0.146,1.154,0.435C14.458,26.102,13.618,26.758,12.607,26.758z"></path> </g> </g></svg>' @endphp @endif{{$service->service}}
                           
                              @endforeach
                        </div>
                    </div>
                    
                    <form method="post" id="reserve-room-form" action="{{ route('getroom') }}">
                        @csrf
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="" style="background: white" colspan="3">
                                        <h3 class="font-weight-bold">Availability:</h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th width = "20%">Accommodation Type</th>
                                    <th width = "60%">
                                        <table>
                                            <tr>
                                                <th width = "20%">Sleeps</th>
                                                <th width = "20%">Today's Price</th>
                                                <th width = "20%" >Select amount</th>
                                            </tr>
                                        </table>
                                    </th>
                                    <th width = "20%"></th>
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
                                                                <td width = "20%">
                                                                    @for ($i = 0; $i < $report->adult; $i++)
                                                                        <i class="fa fa-user-o" style="font-size:24px"
                                                                            aria-hidden="true"></i>
                                                                    @endfor
                                                                    @if ($report->children)
                                                                    +
                                                                    @for ($i = 0; $i < $report->children; $i++)
                                                                        <i class="fa fa-user-o" style="font-size:15px"
                                                                            aria-hidden="true"></i>
                                                                    @endfor
                                                                    @endif

                                                                </td>
                                                              
                                                                <td width = "20%">
                                                                    <p>{{($report->price + $report->children_extra_price) * $nights}} </p>
                                                                </td>
                                                                <td width = "20%">
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
                                                        {{-- @if ($report->children)
                                                            <tr>
                                                                <td width = "20%">
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
                                                        @endif --}}
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
                </div>
                    {{-- <div class="row">
                        <div class="col-12">
                            <h4 class="font-weight-bold">Hotel surroundings:</h4>
                            @foreach ($hotel->surrounding as $surrounding)
                                <div class="row">
                                    <div class="col-6 " >
                                        <small class="text-muted">{{ $surrounding->surrounding_location }}</small>
                                    </div>
                                    <div class="col-6 text-right " >
                                        <small class="text-muted">{{ $surrounding->surrounding_distance }}</small>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div> --}}
                <div class="container">
                    <div class="row">        
                        <div class="col-sm-4 col-4">
                            <h1>Suroundings</h1>
                            @foreach ($hotel->surrounding as $surrounding)
                            <div class="row">
                                <div class="col-6 " >
                                    <small class="text-muted" style="font-size:20px" >{{ $surrounding->surrounding_location }}</small>
                                </div>
                                <div class="col-6  " >
                                    <small class="text-muted" style="font-size:20px">{{ $surrounding->surrounding_distance }} km</small>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <div class="col-md-12 col-6">
                            <h3>Reviews</h3>
                            <div class="room-review-area mb-100">
                            @foreach ($hotel->ratings as $rating )
                                {{-- <div class="row">
                                    <div class="col-3 " >
                                        <small class="text-muted">{{ $rating->user->name }}</small>
                                        <br>
                                        <small class="text-muted">{{ $rating->created_at->diffForHumans() }}</small>
                                    </div>
                                    <div class="col-9  " >
                                        <p class="font-wright-normal">
                                            {{ $rating->message }}
                                        </p>
                                    </div>
                                </div> --}}
                                <div class="single-room-review-area d-flex align-items-center">
                                    <div class="reviwer-thumbnail">
                                        <img src="img/bg-img/53.jpg" alt="">
                                    </div>
                                    <div class="reviwer-content">
                                        <div class="reviwer-title-rating d-flex align-items-center justify-content-between">
                                            <div class="reviwer-title">
                                                <h6>{{ $rating->user->name }}</h6>
                                            </div>
                                            <br>
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
                                                <br>
                                                <small class="font-weight-lighter">{{ $rating->created_at->diffForHumans() }}</small class="font-weight-lighter">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <h4 class="text-right">
                                <button class="btn roberto-btn mb-50" id="addReview">Add Review</button>
                            </h4>
                            </div>
                        </div>
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
            </div>
        </div>
    </div>
    </div>
    <!-- Rooms Area End -->
    @include('include/callnow')
    @include('include/footer')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $('body').on('submit','#reserve-room-form', function(e){
            var room_id = $('.room_id').val();
            if(room_id == ""){
                toastr.error('Please select a room quantity');
                e.preventDefault();
            }
            
        });
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
