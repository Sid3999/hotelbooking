@extends('layouts.theme')
@section('title', 'Register as customer')
@section('content')
<style>
    .col-form-label {
    padding-top: calc(0.375rem + 1px);
    /* padding-bottom: calc(0.375rem + 1px); */
    margin-bottom: 0;
    font-size: 14px;
    line-height: 1.5;
    font-weight: 600;
    color: gray;
}
</style>
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
                                        <!-- Section Heading -->
                                        <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                                            <h6>Register As Customer</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-md-4 wow fadeInUp" data-wow-delay="100ms">
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
                                            <div class="col-12 col-md-4 wow fadeInUp" data-wow-delay="100ms">
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

                                            <div class="col-12 col-md-4 wow fadeInUp" data-wow-delay="100ms">
                                                <label for="address"
                                                       class=" col-form-label text-md-center">{{ __('Address') }}</label>
                                                <input type="text" name="address" value="{{old('address')}}"
                                                       class="form-control mb-30 @error('address') is-invalid @enderror"
                                                       placeholder="Your Address">
                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-12 col-md-4 wow fadeInUp" data-wow-delay="100ms">
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
                                            <div class="col-12 col-md-4 wow fadeInUp" data-wow-delay="100ms">
                                                <label for="phone"
                                                       class=" col-form-label text-md-center">{{ __('Phone') }}</label>
                                                <input type="text" name="phone" value="{{old('phone')}}"
                                                       class="form-control mb-30  @error('phone') is-invalid @enderror"
                                                       maxlength="12" placeholder="Enter Phone No">
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-4 wow fadeInUp" data-wow-delay="100ms">
                                                <label for="date_of_birth"
                                                       class=" col-form-label text-md-center">{{ __('Date of Birth') }}</label>
                                                <input type="date" name="date_of_birth" value="{{old('date_of_birth')}}"
                                                       class="form-control mb-30 @error('date_of_birth') is-invalid @enderror"
                                                       placeholder="Enter Your Date of Birth">
                                                @error('date_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-12 col-md-4 wow fadeInUp" data-wow-delay="100ms">
                                                <label for="cnic_no"
                                                       class=" col-form-label text-md-center">{{ __('CNIC No') }}</label>
                                                <input type="text" name="cnic_no" value="{{old('cnic_no')}}"
                                                       class="form-control mb-30"
                                                       placeholder="Enter Your CNIC No">
                                                @error('cnic_no')
                                                <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                               </span>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-4 wow fadeInUp" data-wow-delay="100ms">
                                                <label for="cnic"
                                                       class=" col-form-label text-md-center">{{ __('Upload Cnic ') }}</label>
                                                <input type="file" name="cnic" class="form-control mb-30"
                                                       placeholder="cnic pic">
                                            </div>

                                            <div class="col-12 col-md-4 wow fadeInUp" data-wow-delay="100ms">
                                                <label for="image"
                                                       class=" col-form-label text-md-center">{{ __('Image') }}</label>
                                                <input type="file" name="image" class="form-control mb-30"
                                                       placeholder="Image">
                                                @error('image')
                                                <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                               </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row">
                                           
                                            <div class="col-12 col-md-4 wow fadeInUp" data-wow-delay="100ms">
                                                <label for="utility_bill"
                                                       class=" col-form-label text-md-center">{{ __('Upload Utility Bill ') }}</label>
                                                <input type="file" name="utility_bill" class="form-control mb-30"
                                                       placeholder="utility_bill">
                                            </div>

                                            <div class="col-12 col-md-4 wow fadeInUp" data-wow-delay="100ms">
                                                <label for="name"
                                                       class=" col-form-label text-md-center">{{ __('Password') }}</label>
                                                <input type="password" name="password" class="form-control mb-30"
                                                       placeholder="password" autocomplete="off">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                               </span>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-4 wow fadeInUp" data-wow-delay="100ms">
                                                <label for="name"
                                                       class=" col-form-label text-md-center">{{ __('Confirm Password') }}</label>
                                                <input type="password" name="password_confirmation"
                                                       class="form-control mb-30"
                                                       placeholder="Confirm Password" autocomplete="off">
                                                @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                               </span>
                                                @enderror
                                            </div>
                                        </div>

                                       
                                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms"
                                             style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                                            <button type="submit" class="btn roberto-btn mt-15" style="padding: 0 50px;">Register</button>
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
@endsection
