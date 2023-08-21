@extends('layouts.theme')
@section('title', 'Login')
@section('content')
<style>
    label{
        color: gray;
        font-weight: 600
    }
</style>
    @include('include.navbar')
    <br>
    <br>
    <br>
    <div class="container">

        <div class="row justify-content-center mt-30">
            <div class="col-md-8">
                <div class="card box">
                    <div class="row mt-70">
                        <div class="col-12">
                            <!-- Section Heading -->
                            <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                                <h6>Login</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}"> @csrf
                            <div class="form-group diplay-flex justify-content-center">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror "
                                                   name="email" value="{{ old('email') }}" required
                                                   autocomplete="email" autofocus
                                                   placeholder="Enter your email"> @error('email')  <span
                                                class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label for="password">{{ __('Password') }}</label>
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="current-password"
                                                   placeholder="Password"> @error('password') <span
                                                class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old( 'remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember"> {{ __('Remember Me') }} </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0 ">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" style="padding: 0 50px;"
                                            class="btn roberto-btn mt-15"> {{ __('Login') }} </button> @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a> @endif </div>
                            </div> {{--
						<div class="form-group row mb-0 mt-3">
							<div class="col-md-8 offset-md-4"> <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-default"><i class="fa fa-facebook"></i> {{ __('Login with Facebook') }}</a> <a href="{{ url('/auth/redirect/google') }}" class="btn btn-default"><i class="fa fa-google"></i> {{ __('Login with Google') }}</a> </div>
						</div> --}} </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    @Include('include.footer')
@endsection
