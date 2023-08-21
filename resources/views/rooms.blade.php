@extends('layouts.theme')
@section('title', 'Privacy Policy')
@section('style')
    <style>
        .page-item.active .page-link {
            background-color: #1cc3b2 !important;
            color: #ffffff !important;
            ;
            border-color: #1cc3b2 !important;
            ;
        }

  

    </style>
@endsection
@section('content')
    @include('include/navbar')
    @include('include/breadcrumb',['page'=>$page])
    <!-- Rooms Area Start -->
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <!-- Single Room Area -->
                    @foreach ($room_categories as $room_cate)
                        <div class=" single-room-area  d-flex align-items-center mb-50  wow fadeInUp" data-wow-delay="100ms">
                            <!-- Room Thumbnail -->
                            <div class="room-thumbnail">
                                <img src="@if($room_cate->gallery->first()) {{ asset('images/room_category_galleries/'.$room_cate->gallery->first()->image_url) }} @endif" alt=""
                                    style="max-height:250px;width:365px;max-width:365px" />
                            </div>
                            <!-- Room Content -->
                            <div class="room-content">
                                    <h2>{{ $room_cate->title }}</h2>
                                    <h4>{{ $room_cate->price + $room_cate->tax }}PKR<span>/ Day</span></h4>
                                    <div class="room-feature">
                                        <h6>Size: <span>{{ $room_cate->room_size }}</span></h6>
                                        <h6>Capacity: <span>{{ $room_cate->sleep }} People Can Sleep</span></h6>
                                        <h6>Bed: <span>
                                            @switch($room_cate->bed_type)
                                                    @case('1_king_bed_or_1_twin_bed')
                                                    1 King Bed or 1 Twin Bed
                                                    @break
                                                    @case('1_king_bed')
                                                    1 King Bed
                                                    @break
                                                    @case('1_twin_bed_or_1_king_bed')
                                                    1 Twin Bed or 1 King Bed
                                                    @break
                                                    @case('1_king_bed')
                                                    1 King Bed
                                                    @break
                                                    @default
                                                    N/A
                                                @endswitch
                                        </span></h6>
                                        <h6>Services: <span>
{{--                                            {{ $room_cate->service->random(3)[0]->title }},{{ $room_cate->service->random(3)[1]->title }},{{ $room_cate->service->random(3)[2]->title }}--}}
                                        </span></h6>
                                    </div>
                                    <a href="{{ route('room-detail', $room_cate->id) }}" class="btn view-detail-btn">View
                                        Details<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    @endforeach
                    <!-- Pagination -->
                    <nav class="roberto-pagination wow fadeInUp mb-100" data-wow-delay="1000ms">
                        <ul class="pagination">
                            {!! $room_categories->links() !!}
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next <i class="fa fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="col-12 col-lg-4">
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
                </div>
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
                    <div class="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            partner-logo-content
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            d-flex
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            align-items-center
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            justify-content-between
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            wow
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            fadeInUp
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          "
                        data-wow-delay="300ms">
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
