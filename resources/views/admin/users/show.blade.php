@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
            <h1>Hotel <small>Create</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('product.index') }}"><i class="fa fa-users"></i>Hotel</a></li>
                <li class="active">Create</li>
            </ol>
        </section> -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-fluid">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    User
                    <small>Information</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('users.create') }}"><i class="fa fa-users"></i> Users </a></li>
                    <li class="active">Create</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

                <!--------------------------
            | Your Page Content Here |
            -------------------------->
                <!-- /.col -->
                <div class="main">
                    <div class="col-md-10 col-sm-offset-1">
                                <div class="panel panel-primary">
                                    <div class="panel-heading bg-primary">User Information</div>
                                    <div class="panel-body">
                                        <!-- errors -->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name" class="control-label">Name <span
                                                            class="text-danger">*</span></label>
                                                    {{$user->name}}
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">

                                                    <label for="email" class="control-label">Email <span
                                                            class="text-danger">*</span></label>
                                                    {{$user->email}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-70">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="image" class="control-label ">Profile Picture</label>
                                                    <img class="img img-thumbnail" src="{{asset('images/users/'.$user->image)}}" alt="" width="100px" width="100px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-70">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="mobile" class="control-label">Mobile Number <span
                                                            class="text-danger">*</span></label>
                                                   {{$user->phone}}
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="phone" class="control-label">Phone Number</label>
                                                    {{$user->mobile}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="address" class="control-label">Address</label>
                                                    {{$user->address}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($user->hotel)
                                {{-- <div class="panel panel-primary" id="hotel">
                                    <div class="panel-heading bg-primary">User Business (Hotel) Information</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Title<span
                                                            class="text-danger">*</span></label>
                                                    {{$user->hotel->title}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Slug<span>
                                                  {{$user->hotel->slug}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Thumbnail</label>
                                           <img src="{{asset('images/hotels/'.$user->hotel->thumbnail)}}" alt="" width="100px" height="100px">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Description<span
                                                    class="text-danger">*</span> </label>
                                            {!!$user->hotel->description!!}
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Property Type<span
                                                            class="text-danger">*</span></label>
                                                 Hotel
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Rent Range<span
                                                            class="text-danger">*</span></label>
                                                {{$user->hotel->rent_range}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Country</label>
                                                    Pakistan
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Provience<span
                                                            class="text-danger">*</span></label>
                                                {{$user->hotel->provience}}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">City</label>
                                                      @php  $city = \App\City::where(['id' => $user->hotel->city_id])->first(); @endphp
                                                    {{$city->name}}
                                                </div>
                                            </div>
                                      
                                        </div>
                                    
                                    </div>
                                </div> --}}
                                @endif
                         
                       
                    <!-- /.col -->

                    </div>
                    @if($user->paymentInfo)
                    {{-- <div class="col-md-10 col-sm-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="list" data-size="18" data-c="white"
                                       data-hc="white" data-loop="true"></i>
                                    Billing Information
                                </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw ti-angle-up clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Charges</label>
                                            {{$user->paymentInfo->charges}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="form-control-loble">Discount</label>
                                            {{$user->paymentInfo->discount}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Subscription Type</label>
                                            {{$user->paymentInfo->subscription_type = ($user->paymentInfo->subscription_type == 1) ? "Monthly" : "Yearly"  }}
                                        </div>
                                    </div>
                                </div>
                            </div>        
                        </div>
                    </div> --}}
                    @endif
                </div>
                <!-- /.col -->
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('title', 'User Create')
@section('title', 'Add New Hotel')

