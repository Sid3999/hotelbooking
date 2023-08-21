 @extends('layouts.theme')
 @section('title', 'Customer Profile')
@section('content')
@include('include/navbar')
@include('include/breadcrumb', ['page' => 'Profile'])
<style>
        #image {
  width: 200px;
  height: 200px;
  border-radius: 50%; /*don't forget prefixes*/
  background-image: url("path/to/image");
  background-position: center center;
  /* as mentioned by Vad: */
  background-size: cover;
}
    </style>
<section class="google-maps-contact-info pb-2">
<form class="form-horizontal container-fluid" role="form" action="{{route('myprofile.update')}}" method="POST"  enctype="multipart/form-data">
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
                            <!-- left column -->
                            <div class="col-md-3">
                                <div class="text-center">
                                    @php
                                        $image = auth()->user()->image;
                                        $image = ($image == null && $image == 'images/users/default.png') ? $image : asset('images/users/'.$image);
                                    @endphp
                                    <img src="{{$image}}" class="avatar img-circle" alt="profile image" style="width: 40 ,hieght 50px;" id="image">
                                    <h6>Upload a different photo</h6>

                                    <input type="file" class="form-control " name="image">
                                </div>
                            </div>
                           
                            <!-- edit form column -->
                            <div class="col-md-9 personal-info">

                                <h3>Personal info</h3>

                            
                               <div class="row">
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label>Name:</label>
                                                  <input  name='id' type="hidden" value="{{(  $user->id)}}">
                                                    <input class="form-control" type="text" value="{{($user->name)}}" name="name">
                                        </div>
                                    </div>
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label>Email:</label>
                                                    <input class="form-control @error('email') is-invalid @enderror" type="email" value="{{($user->email)}}" name="email">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <small>{{ $message }}</small>
                                                    </span>
                                                @enderror
                                                </div>
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label>Mobile No</label>
                                                <input class="form-control @error('mobile') is-invalid @enderror" type="text" value="{{($user->mobile)}}" name="mobile">
                                        </div>
                                    </div>
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label>Phone No</label>
                                            <input class="form-control @error('phone') is-invalid @enderror" type="text" value="{{($user->phone)}}" name="phone">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                  </div>
                                </div>
                                    <div class="row">
                                        <div class="col col-md-12">
                                            <div class="form-group">
                                                <label>Adddress</label>
                                                        <input class="form-control" type="text" value="{{($user->address)}}" name="address">
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-8">
                                            <input type="submit" class="btn btn-info btn-outline" value="submitt">
                                            <span></span>
                                            <input type="reset" class="btn btn-default" value="Cancel">
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
</section>
@include('include.footer')
@endsection