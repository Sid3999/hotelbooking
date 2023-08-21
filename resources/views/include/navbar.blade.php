<header class="header-area">

    <!-- Search Form -->
    <div class="search-form d-flex align-items-center">
        <div class="container">
            <form action="index.html" method="get">
                <input type="search" name="search-form-input" id="searchFormInput"
                       placeholder="Type your keyword ...">
                <button type="submit"><i class="icon_search"></i></button>
            </form>
        </div>
    </div>
@include('include/topbar')
<!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <!-- <div class="container-fluid"> -->
            <div class="d-flex justify-content-center col-md-10">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="robertoNav">
                    <!-- Logo -->
                    <a class="nav-brand" href="{{route('index')}}"><img src="{{asset('images/logo.png')}}" width="180px"></a>
                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li class="active"><a href="{{ route('index') }}">Home</a></li>
                                {{-- <li><a href="{{ route('rooms') }}">Rooms</a></li> --}}
                                {{-- <li><a href="{{ route('about-us') }}">About Us</a></li> --}}
                                {{-- <li><a href="#">Property</a>
                                    <ul class="dropdown">
                                        <li><a href="/">-List Your Property</a></li>
                                    </ul>
                                </li> --}}
                                <li><a href="{{ route('news') }}">Blog</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                @if(!Auth::check())
                                    <li><a href="#">Register</a>
                                        <ul class="dropdown">
                                            <li><a href="{{route('register')}}"> Register As Customer</a></li>
                                            <li><a href="{{route('register-as-business.index')}}">Register As Business</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('login')}}">Login</a>

                                @else
                                    <li><a href="javascript::void(0)">{{Auth::user()->name}}</a>
                                        <ul class="dropdown">
                                            <li><a href="{{route('booking.dashboard')}}">Dashboard</a></li>
                                            <li><a href="{{route('myprofile')}}">My Profile</a></li>
                                            <li><a href="{{route('changepassword')}}">Change Password</a></li>
                                            <li><a href="{{asset('customer-logout')}}">Logout</a></li>
                                        </ul>
                                    </li>
                                    {{-- <li><a href="javascript:void(0)">Logout</a>
                                        <ul class="dropdown">
                                           
                                        </ul>
                                    </li> --}}
                                @endif
                            </ul>
                            <!-- Search -->
                            <div class="search-btn ml-4">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                            <!-- Book Now -->
                            <div class="book-now-btn ml-3 ml-lg-5">
                                <a href="{{ route('rooms') }}">Book Now <i class="fa fa-long-arrow-right"
                                                                           aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->
