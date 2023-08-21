@extends('layouts.theme')
@section('title', 'Contact us')
@section('content')
    @include('include/navbar')
    @include('include/breadcrumb',['page'=>$page])
    <!-- Google Maps & Contact Info Area Start -->
    <section class="google-maps-contact-info">
        <div class="container-fluid">
            <div class="google-maps-contact-content">
                <div class="row">
                    <!-- Single Contact Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <h4>Phone</h4>
                            <p>+0512308311</p>
                        </div>
                    </div>
                    <!-- Single Contact Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <h4>Address</h4>
                            <p>Apartment #1, 2nd Floor Capital Tower 1, G-15 Markaz Islamabad
                                Pakistan</p>
                        </div>
                    </div>
                    <!-- Single Contact Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <h4>Open time</h4>
                            <p>10:00 am to 23:00 pm</p>
                        </div>
                    </div>
                    <!-- Single Contact Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <h4>Email</h4>
                            <p>reciption@softechbusinessservice.com</p>
                        </div>
                    </div>
                </div>

                <!-- Google Maps -->
                <div class="google-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10855.346317017917!2d72.91886809518626!3d33.63432070231113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df97664c5227b5%3A0x1bafb7d54d1d4de5!2sSoftech%20Business%20Services.%20A%20Software%20Company%20in%20Islamabad!5e0!3m2!1sen!2sbd!4v1657170502850!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="roberto-contact-form p-4">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                                <h6>Contact Us</h6>
                                <h2>Leave Message</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Form -->
                            <div class="roberto-contact-form">
                                @if($errors->any())
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>
                                            {{$errors->first()}}
                                        </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <form action="{{route('contactUs.store')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
                                            <input type="text" name="name" class="form-control mb-30"
                                                   placeholder="Your Name">
                                        </div>
                                        <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
                                            <input type="email" name="email" class="form-control mb-30"
                                                   placeholder="Your Email">
                                        </div>
                                        <div class="col-12 wow fadeInUp" data-wow-delay="100ms">
                                    <textarea name="message" class="form-control mb-30"
                                              placeholder="Your Message"></textarea>
                                        </div>
                                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
                                            <button type="submit" class="btn roberto-btn mt-15">Send Message
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Contact Form Area End -->
    @include('include/callnow')
    @include('include/footer')
@endsection
