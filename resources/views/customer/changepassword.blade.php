@extends('layouts.theme')
@section('content')
@include('title','Change Password')
@include('include/navbar')
@include('include/breadcrumb', ['page' => 'Change Password'])

<section class="google-maps-contact-info pb-2">
    <form class="form-horizontal container-fluid" role="form" action="{{route('myprofile.updatepassword')}}" method="POST"  enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="container-fluid">
            <div class="google-maps-contact-content">
                <div class="row">
                    <div class="col-12">
                        <div class="container">
                            @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                                
                            @endif
                            <div class="row container">
                                <div class="col-6 d-flex justify-content-center">
                                    <div class="card-body">
                                        <h2>Update Your Password</h2>
                                        @if (Session::has('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>
                                         @endif
                                        <form class="form" role="form" autocomplete="off">
                                            <div class="form-group">
                                                <label for="inputPasswordOld">Current Password</label>
                                                <input type="password" class="form-control  @error('password') is-invalid @enderror" value="{{old('password')}}" name="password" id="inputPasswordOld" required="">
                                                @error('password')
                                                <span class="invalid-feedback" id="inputPasswordOld" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPasswordNew">New Password</label>
                                                <input type="password" class="form-control  @error('new_password') is-invalid @enderror"  value="{{old('new_password')}}"id="inputPasswordNew" name="new_password" required="">
                                                @error('new_password')
                                                <span class="invalid-feedback" id="inputPasswordNew" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPasswordNewVerify">Confirm New Password</label>
                                                <input type="password" id="inputPasswordNewVerify"  value="{{old('confirm_password')}}" class="form-control @error('confirm_password') is-invalid @enderror" id="inputPasswordNewVerify" name="confirm_password" required="" >
                                                @error('confirm_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info float-left">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@include('include.footer')
@endsection
