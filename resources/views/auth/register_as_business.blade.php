@extends('layouts.theme')
@section('title','Register as Business') 
@section('content')
    @include('include.navbar')
    <!-- Contact Form Area Start -->
    <div class="roberto-contact-form-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Form -->
                    <div class="roberto-contact-form">
                        <div class="col-md-12">
                            <div class="card box">
                                <div class="row mt-70">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-8">
                                                @if(session()->has('message'))
                                                    <div class="alert alert-success">
                                                        {{ session()->get('message') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Section Heading -->
                                        <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                                            <h6>Register As Business</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('register-as-business.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                                <label for="name"
                                                       class=" col-form-label text-md-center">{{ __('Company Name') }}</label>
                                                <input type="text" name="company_name" value="{{old('company_name')}}"
                                                       class="form-control mb-30 @error('company_name') is-invalid @enderror"
                                                       placeholder="Enter Your Compnay Name" autocomplete="off">
                                                @error('company_name')
                                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                                <label for="name"
                                                       class=" col-form-label text-md-center">{{ __('Name') }}</label>
                                                <input type="text" name="name" value="{{old('name')}}"
                                                       class="form-control mb-30 @error('name') is-invalid @enderror"
                                                       placeholder="Enter Your Name" autocomplete="off">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                                <label for="name"
                                                       class=" col-form-label text-md-center">{{ __('Email') }}</label>
                                                <input type="email" name="email" value="{{old('email')}}"
                                                       class="form-control mb-30 @error('email') is-invalid @enderror"
                                                       placeholder="Your Email" autocomplete="off">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                                <label for="mobile"
                                                       class=" col-form-label text-md-center">{{ __('Mobile No') }}</label>
                                                <input type="text" name="mobile" value="{{old('mobile')}}"
                                                       class="form-control mb-30 @error('mobile') is-invalid @enderror"
                                                       maxlength="12" placeholder="Enter Mobile No" autocomplete="off">
                                                @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                                <label for="phone"
                                                       class=" col-form-label text-md-center">{{ __('City') }}</label>
                                                {{-- <input type="text" name="city" value="{{old('city')}}"
                                                       class="form-control mb-30  @error('city') is-invalid @enderror"
                                                       maxlength="12" placeholder="Enter City"> --}}
                                                       <select name="city" class="form-control mb-30 
                                                       {{-- cities-list   --}}
                                                        @error('city') is-invalid @enderror">
                                                            <option value="">Select City</option>
                                                            @foreach($cities as $city)
                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                            @endforeach
                                                        </select>   
                                                @error('city')
                                                <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                                <label for="name"
                                                       class=" col-form-label text-md-center">{{ __('Password') }}</label>
                                                <input type="password" name="password"
                                                       class="form-control mb-30 @error('password') is-invalid @enderror"
                                                       placeholder="password" autocomplete="off">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                                <label for="name"
                                                       class=" col-form-label text-md-center">{{ __('Conform Password') }}</label>
                                                <input type="password" name="password_confirmation"
                                                       class="form-control mb-30  @error('password') is-invalid @enderror"
                                                       placeholder="Conform Password" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms"
                                             style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                                            <button type="submit" class="btn roberto-btn mt-15">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Form Area End -->


    <!-- <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

        <div class="form-group rows">
            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
        </button>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div> -->
        <br>
        <br>
    @include('include.footer')
    @section('custom-style')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
    @section('custom-script')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.cities-list').select2();
            });
        </script>
    @endsection
@endsection
