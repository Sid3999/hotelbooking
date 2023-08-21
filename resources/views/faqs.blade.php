@extends('layouts.theme')
@section('content')
    @include('include/navbar')
    <style>
        @import url("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap");
        .main-content {
            padding-top: 100px;
            padding-bottom: 100px;
        }

        .flex-center {
            align-items: center;
        }

        #accordion .accordion-card {
            background: transparent;
            border: 0;
            margin-bottom: 30px;
        }
        #accordion .accordion-card__header {
            background: #1cc3b2;
            color: white;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        #accordion .accordion-card__header.collapsed .drop-icon {
            transform: rotate(0deg);
        }
        #accordion .accordion-card__header h5 {
            display: flex;
            align-items: center;
        }
        #accordion .accordion-card__header h5 span {
            margin-left: 10px;
        }
        #accordion .accordion-card__header .drop-icon {
            margin-right: 15px;
            transform: rotate(180deg);
            transition: all 0.2s;
        }
        #accordion .accordion-card__body {
            padding: 25px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 25px -3px rgba(0, 0, 0, 0.1);
        }

        element.style {
        }
        #accordion .accordion-card__header h5 span {
            margin-left: 10px;
        }
        h5{
            font-family: "Poppins", sans-serif;
            color: white;
            line-height: 1.3;
            font-weight: 500;
        }
    </style>
    {{--     --}}
    <!-- Contact Form Area Start -->
    <div class="roberto-contact-form-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <h2>Frequently Asked Questions</h2>
                    </div>
                </div>
            </div>
            <main id="main">
                <section class="section-property section-t8">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="main-content">
                                    <div class="container">
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <img src="{{asset('images/faqs.jpg')}}" alt="FAQ" class="img-fluid">
                                            </div>
                                            <div class="col-md-8">
                                                <div id="accordion">
                                                    <div class="accordion-card">
                                                        <div class="accordion-card__header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            <h5 class="mb-0">
                                                                <span>How do I find available hotels for the period I want to stay?</span>
                                                            </h5>
                                                            <i class="fa fa-caret-down drop-icon"></i>
                                                        </div>
                                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                            <div class="accordion-card__body">
                                                                In the search menu on the left containing the check-in and check-out data, please select the dates of your stay and tick ‘Show only available hotels’.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-card">
                                                        <div class="accordion-card__header collapsed" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            <h5 class="mb-0">
                                                                <span>How do I search for hotels that offer family rooms?</span>
                                                            </h5>
                                                            <i class="fa fa-caret-down drop-icon"></i>
                                                        </div>
                                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                            <div class="accordion-card__body">
                                                                In the search menu on the left simply click on the link "Show advanced options". Now you can refine your search by selecting different facilities such as "Family rooms" (note though that these rooms will not necessarily be available for the requested dates)
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-card">
                                                        <div class="accordion-card__header collapsed" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            <h5 class="mb-0">
                                                                <span>Where can I find the contact details of the hotel?</span>
                                                            </h5>
                                                            <i class="fa fa-caret-down drop-icon"></i>
                                                        </div>
                                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                            <div class="accordion-card__body">
                                                                You can find the address on the hotel page. The contact details will be given, after you have made the reservation, in the confirmation email.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-card">
                                                        <div class="accordion-card__header collapsed" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                            <h5 class="mb-0">
                                                                <span>Where can I find the directions to the hotel?</span>
                                                            </h5>
                                                            <i class="fa fa-caret-down drop-icon"></i>
                                                        </div>
                                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                                            <div class="accordion-card__body">
                                                                At the bottom of the overview page of the hotel you can find travel information with details on location and directions. On the top left there is an extensive map of the area around the hotel.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <div class="row">
            </div>
        </div>
    </div>
    <!-- Contact Form Area End -->

    @include('include/callnow')
    @include('include/footer')
@endsection
