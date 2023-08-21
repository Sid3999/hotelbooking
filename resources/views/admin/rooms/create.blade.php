@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Rooms Management
                <small>Create</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('hotel-rooms.index') }}"><i class="fa fa-users"></i> Rooms Management
                    </a></li>
                <li class="active">Create</li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading bg-primary">Create Room</div>
                    <div class="panel-body">
                        <!-- errors -->
                        @include('admin.partials.errors')
                        {{-- @can('permission-write') --}}
                            <form action="{{ route('hotel-rooms.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Category</label>
                                            <div class="form-group">
                                                <select class="form-control" name="category_id">
                                                    @if (count($roomCategory) > 0)
                                                        <option value="">Select Category </option>
                                                        @foreach ($roomCategory as $roomCate)
                                                            <option value="{{ $roomCate->id }}">{{ $roomCate->title }}
                                                            </option>
                                                        @endforeach
                                                    @else
                                                        <option value="">No Room Type Found
                                                        </option>
                                                    @endif
                                                </select>
                                                @if ($errors->has('category_id'))
                                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label"> Room No</label>
                                            <input type="text" id="room_no" name="room_no" class="form-control "
                                                   value="{{ old('room_no') }}">
                                            @if ($errors->has('room_no'))
                                                <span class="text-danger">{{ $errors->first('room_no') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Select Floor</label>
                                            <div class="form-group">
                                                <select class="form-control" name="floor">
                                                    <option value="">Select floor</option>
                                                    <option value="Basement">Basement</option>
                                                    <option value="Office">Ground</option>
                                                    <option value="First">First</option>
                                                    <option value="Second">Second</option>
                                                    <option value="Third">Third</option>
                                                    <option value="Fourth">Fourth</option>
                                                    <option value="Fifth">Fifth</option>
                                                    <option value="Sixth">Sixth</option>
                                                    <option value="Sixth">Seventh</option>
                                                    <option value="Eighth">Eighth</option>
                                                    <option value="Ninth">Ninth</option>
                                                    <option value="Tenth">Tenth</option>
                                                    <option value="Eleventh">Eleventh</option>
                                                    <option value="Twelfth">Twelfth</option>
                                                </select>
                                                @if ($errors->has('floor'))
                                                    <span class="text-danger">{{ $errors->first('floor') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Full Bed</label>
                                            <select class="form-control" name="bed_detail[full]">
                                                <option value="">0</option>
                                                <option value="01">01
                                                </option>
                                                <option value="02">02
                                                </option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">King Bed</label>
                                            <select class="form-control" name="bed_detail[king]">
                                                <option value="">0</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Twin Bed</label>
                                            <select class="form-control" name="bed_detail[twin]">
                                                <option value="">0</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-12">  @if ($errors->has('floor'))
                                           <span class="text-danger">Please Select at lest one from full bed,king bed,twin bed</span>
                                       @endif
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label"> Room Size(Squre Feet)</label>
                                            <input type="text" id="room_size" min="0" name="room_size" class="form-control "
                                                   value="{{ old('room_size') }}">
                                            @if ($errors->has('room_size'))
                                                <span class="text-danger">{{ $errors->first('room_size') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">No Of Adult</label>
                                            <select class="form-control" name="adult">
                                                <option value="">0</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                            </select>
                                            @if ($errors->has('adult'))
                                                <span class="text-danger">{{ $errors->first('adult') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label"> Price</label>
                                            <input type="number" id="price" min="0" name="price" class="form-control "
                                                   value="{{ old('price') }}">
                                            @if ($errors->has('price'))
                                                <span class="text-danger">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">No Of Children</label>
                                            <select class="form-control" name="children">
                                                <option value="0">0</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Children Extra Price</label>
                                            <input type="number" id="price" min="0" name="children_extra_price" class="form-control "
                                                   value="{{ old('children_extra_price') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Hotel</label>
                                            <select class="form-control" name="hotel">
                                                @foreach($hotels as $hotel)
                                                <option value="{{$hotel->id}}">{{$hotel->title}}</option>
                                                @endforeach
                                               
                                            </select>
                                            @if ($errors->has('price'))
                                                <span class="text-danger">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add Room</button>
                                </div>
                            </form>
                        {{-- @else
                            <tr>
                                <td colspan="8">
                                    <h3 class="text-danger">Oops! You have no permission for this action!</h3>
                                </td>
                            </tr>
                        @endcan --}}
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('title', 'Manage Rooms|Create')

@section('scripts')
    {{--    <script>--}}
    {{--        $(document).ready(function(){--}}

    {{--            $('#btn_login_details').click(function(){--}}

    {{--                var error_noOfRoom = '';--}}
    {{--                var error_category_id = '';--}}
    {{--                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;--}}

    {{--                if($.trim($('#noOfRoom').val()).length == 0)--}}
    {{--                {--}}
    {{--                    error_noOfRoom = 'No of room is required';--}}
    {{--                    $('#error_noOfRoom').text(error_noOfRoom);--}}
    {{--                    $('#noOfRoom').addClass('has-error');--}}
    {{--                }--}}
    {{--                else--}}
    {{--                {--}}
    {{--                    if (!filter.test($('#email').val()))--}}
    {{--                    {--}}
    {{--                        error_noOfRoom = '';--}}
    {{--                        $('#error_noOfRoom').text(error_noOfRoom);--}}
    {{--                        $('#noOfRoom').addClass('has-error');--}}
    {{--                    }--}}
    {{--                    else--}}
    {{--                    {--}}
    {{--                        error_noOfRoom = '';--}}
    {{--                        $('#error_noOfRoom').text(error_noOfRoom);--}}
    {{--                        $('#email').removeClass('has-error');--}}
    {{--                    }--}}
    {{--                }--}}

    {{--                if($.trim($('#category_id').val()).length == 0)--}}
    {{--                {--}}
    {{--                    error_category_id = 'Room type is required';--}}
    {{--                    $('#error_category_id').text(error_category_id);--}}
    {{--                    $('#password').addClass('has-error');--}}
    {{--                }--}}
    {{--                else--}}
    {{--                {--}}
    {{--                    error_category_id = '';--}}
    {{--                    $('#error_category_id').text(error_category_id);--}}
    {{--                    $('#password').removeClass('has-error');--}}
    {{--                }--}}

    {{--                if($.trim($('#noOfBed').val()).length == 0)--}}
    {{--                {--}}
    {{--                    error_noOfBed = 'No of Bed is required';--}}
    {{--                    $('#error_noOfBed').text(error_noOfBed);--}}
    {{--                    $('#noOfBed').addClass('has-error');--}}
    {{--                }--}}
    {{--                else--}}
    {{--                {--}}
    {{--                    error_noOfBed = '';--}}
    {{--                    $('#error_noOfBed').text(error_noOfBed);--}}
    {{--                    $('#noOfBed').removeClass('has-error');--}}
    {{--                }--}}

    {{--                if($.trim($('#pricePerNight').val()).length == 0)--}}
    {{--                {--}}
    {{--                    error_pricePerNight = 'Price Per Night is required';--}}
    {{--                    $('#error_pricePerNight').text(error_pricePerNight);--}}
    {{--                    $('#pricePerNight').addClass('has-error');--}}
    {{--                }--}}
    {{--                else--}}
    {{--                {--}}
    {{--                    error_pricePerNight = '';--}}
    {{--                    $('#error_pricePerNight').text(error_pricePerNight);--}}
    {{--                    $('#pricePerNight').removeClass('has-error');--}}
    {{--                }--}}

    {{--                if(error_noOfRoom != '' || error_category_id != '' || error_noOfBed != '')--}}
    {{--                {--}}
    {{--                    return false;--}}
    {{--                }--}}
    {{--                else--}}
    {{--                {--}}
    {{--                    $('#list_login_details').removeClass('active active_tab1');--}}
    {{--                    $('#list_login_details').removeAttr('href data-toggle');--}}
    {{--                    $('#login_details').removeClass('active');--}}
    {{--                    $('#list_login_details').addClass('inactive_tab1');--}}
    {{--                    $('#list_personal_details').removeClass('inactive_tab1');--}}
    {{--                    $('#list_personal_details').addClass('active_tab1 active');--}}
    {{--                    $('#list_personal_details').attr('href', '#personal_details');--}}
    {{--                    $('#list_personal_details').attr('data-toggle', 'tab');--}}
    {{--                    $('#personal_details').addClass('active in');--}}
    {{--                }--}}
    {{--            });--}}

    {{--            $('#previous_btn_personal_details').click(function(){--}}
    {{--                $('#list_personal_details').removeClass('active active_tab1');--}}
    {{--                $('#list_personal_details').removeAttr('href data-toggle');--}}
    {{--                $('#personal_details').removeClass('active in');--}}
    {{--                $('#list_personal_details').addClass('inactive_tab1');--}}
    {{--                $('#list_login_details').removeClass('inactive_tab1');--}}
    {{--                $('#list_login_details').addClass('active_tab1 active');--}}
    {{--                $('#list_login_details').attr('href', '#login_details');--}}
    {{--                $('#list_login_details').attr('data-toggle', 'tab');--}}
    {{--                $('#login_details').addClass('active in');--}}
    {{--            });--}}

    {{--            $('#btn_personal_details').click(function(){--}}
    {{--                var error_first_name = '';--}}
    {{--                var error_last_name = '';--}}

    {{--                if($.trim($('#first_name').val()).length == 0)--}}
    {{--                {--}}
    {{--                    error_first_name = 'First Name is required';--}}
    {{--                    $('#error_first_name').text(error_first_name);--}}
    {{--                    $('#first_name').addClass('has-error');--}}
    {{--                }--}}
    {{--                else--}}
    {{--                {--}}
    {{--                    error_first_name = '';--}}
    {{--                    $('#error_first_name').text(error_first_name);--}}
    {{--                    $('#first_name').removeClass('has-error');--}}
    {{--                }--}}

    {{--                if($.trim($('#last_name').val()).length == 0)--}}
    {{--                {--}}
    {{--                    error_last_name = 'Last Name is required';--}}
    {{--                    $('#error_last_name').text(error_last_name);--}}
    {{--                    $('#last_name').addClass('has-error');--}}
    {{--                }--}}
    {{--                else--}}
    {{--                {--}}
    {{--                    error_last_name = '';--}}
    {{--                    $('#error_last_name').text(error_last_name);--}}
    {{--                    $('#last_name').removeClass('has-error');--}}
    {{--                }--}}

    {{--                if(error_first_name != '' || error_last_name != '')--}}
    {{--                {--}}
    {{--                    return false;--}}
    {{--                }--}}
    {{--                else--}}
    {{--                {--}}
    {{--                    $('#list_personal_details').removeClass('active active_tab1');--}}
    {{--                    $('#list_personal_details').removeAttr('href data-toggle');--}}
    {{--                    $('#personal_details').removeClass('active');--}}
    {{--                    $('#list_personal_details').addClass('inactive_tab1');--}}
    {{--                    $('#list_contact_details').removeClass('inactive_tab1');--}}
    {{--                    $('#list_contact_details').addClass('active_tab1 active');--}}
    {{--                    $('#list_contact_details').attr('href', '#contact_details');--}}
    {{--                    $('#list_contact_details').attr('data-toggle', 'tab');--}}
    {{--                    $('#contact_details').addClass('active in');--}}
    {{--                }--}}
    {{--            });--}}

    {{--            $('#previous_btn_contact_details').click(function(){--}}
    {{--                $('#list_contact_details').removeClass('active active_tab1');--}}
    {{--                $('#list_contact_details').removeAttr('href data-toggle');--}}
    {{--                $('#contact_details').removeClass('active in');--}}
    {{--                $('#list_contact_details').addClass('inactive_tab1');--}}
    {{--                $('#list_personal_details').removeClass('inactive_tab1');--}}
    {{--                $('#list_personal_details').addClass('active_tab1 active');--}}
    {{--                $('#list_personal_details').attr('href', '#personal_details');--}}
    {{--                $('#list_personal_details').attr('data-toggle', 'tab');--}}
    {{--                $('#personal_details').addClass('active in');--}}
    {{--            });--}}

    {{--            $('#btn_contact_details').click(function(){--}}
    {{--                var error_address = '';--}}
    {{--                var error_mobile_no = '';--}}
    {{--                var mobile_validation = /^\d{10}$/;--}}
    {{--                if($.trim($('#address').val()).length == 0)--}}
    {{--                {--}}
    {{--                    error_address = 'Address is required';--}}
    {{--                    $('#error_address').text(error_address);--}}
    {{--                    $('#address').addClass('has-error');--}}
    {{--                }--}}
    {{--                else--}}
    {{--                {--}}
    {{--                    error_address = '';--}}
    {{--                    $('#error_address').text(error_address);--}}
    {{--                    $('#address').removeClass('has-error');--}}
    {{--                }--}}

    {{--                if($.trim($('#mobile_no').val()).length == 0)--}}
    {{--                {--}}
    {{--                    error_mobile_no = 'Mobile Number is required';--}}
    {{--                    $('#error_mobile_no').text(error_mobile_no);--}}
    {{--                    $('#mobile_no').addClass('has-error');--}}
    {{--                }--}}
    {{--                else--}}
    {{--                {--}}
    {{--                    if (!mobile_validation.test($('#mobile_no').val()))--}}
    {{--                    {--}}
    {{--                        error_mobile_no = 'Invalid Mobile Number';--}}
    {{--                        $('#error_mobile_no').text(error_mobile_no);--}}
    {{--                        $('#mobile_no').addClass('has-error');--}}
    {{--                    }--}}
    {{--                    else--}}
    {{--                    {--}}
    {{--                        error_mobile_no = '';--}}
    {{--                        $('#error_mobile_no').text(error_mobile_no);--}}
    {{--                        $('#mobile_no').removeClass('has-error');--}}
    {{--                    }--}}
    {{--                }--}}
    {{--                if(error_address != '' || error_mobile_no != '')--}}
    {{--                {--}}
    {{--                    return false;--}}
    {{--                }--}}
    {{--                else--}}
    {{--                {--}}
    {{--                    $('#btn_contact_details').attr("disabled", "disabled");--}}
    {{--                    $(document).css('cursor', 'prgress');--}}
    {{--                    $("#register_form").submit();--}}
    {{--                }--}}

    {{--            });--}}

    {{--        });--}}
    {{--    </script>--}}
    <script>
        $(document).ready(function () {
            $("#adult").change(function () {
               var adult=parseInt($(this).val());
               var children =parseInt($("#children").val());
               var max_occupancy= adult + children;
               $("#max_occupancy").val(max_occupancy);
            })

            $("#children").change(function () {
                var children=parseInt($(this).val());
                var  adult=parseInt($("#adult").val());
                var max_occupancy= adult + children;
                $("#max_occupancy").val(max_occupancy);
            })
            $(document).on('click', '#is_menu_active', function (event) {
                event.preventDefault();
                /* Act on the event */

                var isMenuVal = $('#is_menu').val();

                if (isMenuVal == 0) {
                    $('#is_menu').val(1);
                    $('#is_menu_active i').removeClass('text-default');
                    $('#is_menu_active i').addClass('text-success');

                    $('#is_menu_active i').removeClass('fa-toggle-off');
                    $('#is_menu_active i').addClass('fa-toggle-on');

                } else {
                    $('#is_menu').val(0);
                    $('#is_menu_active i').removeClass('text-success');
                    $('#is_menu_active i').addClass('text-default');

                    $('#is_menu_active i').removeClass('fa-toggle-on');
                    $('#is_menu_active i').addClass('fa-toggle-off');
                }

            });


            $(document).on('click', '#attach_bth_active', function (event) {
                event.preventDefault();
                /* Act on the event */

                var bath_value = $('#attach_bth').val();
                if (bath_value == 0) {
                    $('#attach_bth').val(1);
                    $('#attach_bth_active i').removeClass('text-default');
                    $('#attach_bth_active i').addClass('text-success');
                    $('#attach_bth_active i').removeClass('fa-toggle-off');
                    $('#attach_bth_active i').addClass('fa-toggle-on');
                } else {
                    $('#attach_bth').val(0);
                    $('#attach_bth_active i').removeClass('text-success');
                    $('#attach_bth_active i').addClass('text-default');
                    $('#attach_bth_active i').removeClass('fa-toggle-on');
                    $('#attach_bth_active i').addClass('fa-toggle-off');
                }

            });

            $(document).on('click', '#air_conditionar_active', function (event) {
                event.preventDefault();
                /* Act on the event */

                var air_value = $('#air_conditionar').val();
                if (air_value == 0) {
                    $('#air_conditionar').val(1);
                    $('#air_conditionar_active i').removeClass('text-default');
                    $('#air_conditionar_active i').addClass('text-success');
                    $('#air_conditionar_active i').removeClass('fa-toggle-off');
                    $('#air_conditionar_active i').addClass('fa-toggle-on');
                } else {
                    $('#air_conditionar').val(0);
                    $('#air_conditionar_active i').removeClass('text-success');
                    $('#air_conditionar_active i').addClass('text-default');
                    $('#air_conditionar_active i').removeClass('fa-toggle-on');
                    $('#air_conditionar_active i').addClass('fa-toggle-off');
                }

            });
            $(document).on('click', '#wifi_active', function (event) {
                event.preventDefault();
                /* Act on the event */

                var air_value = $('#wifi').val();
                if (air_value == 0) {
                    $('#wifi').val(1);
                    $('#wifi_active i').removeClass('text-default');
                    $('#wifi_active i').addClass('text-success');
                    $('#wifi_active i').removeClass('fa-toggle-off');
                    $('#wifi_active i').addClass('fa-toggle-on');
                } else {
                    $('#wifi').val(0);
                    $('#wifi_active i').removeClass('text-success');
                    $('#wifi_active i').addClass('text-default');
                    $('#wifi_active i').removeClass('fa-toggle-on');
                    $('#wifi_active i').addClass('fa-toggle-off');
                }

            });

            $(document).on('click', '#is_active_btn', function (event) {
                event.preventDefault();
                /* Act on the event */

                var isMenuVal = $('#is_active').val();

                if (isMenuVal == 0) {
                    $('#is_active').val(1);
                    $('#is_active_btn i').removeClass('text-default');
                    $('#is_active_btn i').addClass('text-success');

                    $('#is_active_btn i').removeClass('fa-toggle-off');
                    $('#is_active_btn i').addClass('fa-toggle-on');

                } else {
                    $('#is_active').val(0);
                    $('#is_active_btn i').removeClass('text-success');
                    $('#is_active_btn i').addClass('text-default');

                    $('#is_active_btn i').removeClass('fa-toggle-on');
                    $('#is_active_btn i').addClass('fa-toggle-off');
                }

            });


        });
    </script>
@endsection
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Multi Step Registration Form Using JQuery Bootstrap in PHP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

</head>
<body>
<br/>

</body>
</html>



