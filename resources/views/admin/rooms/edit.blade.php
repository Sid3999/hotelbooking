@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <h1> Rooms Management
                <small>Edit</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('hotel-rooms.index') }}"><i class="fa fa-users"></i> Rooms Management
                    </a></li>
                <li class="active">Edit</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                | Your Page Content Here |
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                -------------------------->

            <!-- /.col -->
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading bg-primary">Edit Room</div>
                    <div class="panel-body">

                        <!-- errors -->
                        @include('admin.partials.errors')
                        {{-- @can('permission-write') --}}

                            <form action="{{ route('hotel-rooms.update', $room->id) }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Room Type</label>
                                            <div class="form-group">
                                                <select class="form-control" name="category_id">
                                                    @if (count($roomCategory) > 0)
                                                        @foreach ($roomCategory as $roomCate)
                                                            <option
                                                                {{ $room->category_id == $roomCate->id ? 'selected' : '' }}
                                                                value="{{ $roomCate->id }}">{{ $roomCate->title }}
                                                            </option>
                                                        @endforeach

                                                    @else
                                                        <option value="">No Room Category Found
                                                        </option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label"> Room No </label>
                                            <input type="text" id="room_no" name="room_no" class="form-control "
                                                   value="{{ $room->room_no }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Select Floor</label>
                                            <div class="form-group">
                                                <select class="form-control" name="floor">
                                                    <option value="">Select floor</option>
                                                    <option {{$room->floor=="Basement" ? 'selected' :''}}  value="Basement">Basement</option>
                                                    <option {{$room->floor=="Office" ? 'selected' :''}} value="Office">Ground</option>
                                                    <option {{$room->floor=="First" ? 'selected' :''}} value="First">First</option>
                                                    <option {{$room->floor=="Second" ? 'selected' :''}} value="Second">Second</option>
                                                    <option {{$room->floor=="Third" ? 'selected' :''}} value="Third">Third</option>
                                                    <option {{$room->floor=="Fourth" ? 'selected' :''}} value="Fourth">Fourth</option>
                                                    <option {{$room->floor=="Fifth" ? 'selected' :''}} value="Fifth">Fifth</option>
                                                    <option {{$room->floor=="Sixth" ? 'selected' :''}} value="Sixth">Sixth</option>
                                                    <option {{$room->floor=="Seventh" ? 'selected' :''}} value="Seventh">Seventh</option>
                                                    <option {{$room->floor=="Eighth" ? 'selected' :''}} value="Eighth">Eighth</option>
                                                    <option {{$room->floor=="Ninth" ? 'selected' :''}} value="Ninth">Ninth</option>
                                                    <option {{$room->floor=="Tenth" ? 'selected' :''}} value="Tenth">Tenth</option>
                                                    <option {{$room->floor=="Eleventh" ? 'selected' :''}} value="Eleventh">Eleventh</option>
                                                    <option {{$room->floor=="Twelfth" ? 'selected' :''}} value="Twelfth">Twelfth</option>
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
                                                <option {{$room->bed_detail['full']== 01 ? 'selected' :''}} value="01">01
                                                </option>
                                                <option {{$room->bed_detail['full']== 02? 'selected' :''}} value="02">02
                                                </option>
                                                <option {{$room->bed_detail['full']== "03"? 'selected' :''}} value="03">03</option>
                                                <option {{$room->bed_detail['full']== "04"? 'selected' :''}} value="04">04</option>
                                                <option {{$room->bed_detail['full']== "05"? 'selected' :''}} value="05">05</option>
                                                <option {{$room->bed_detail['full']== "06"? 'selected' :''}} value="06">06</option>
                                                <option {{$room->bed_detail['full']== "07"? 'selected' :''}} value="07">07</option>
                                                <option {{$room->bed_detail['full']== "08"? 'selected' :''}} value="08">08</option>
                                                <option {{$room->bed_detail['full']== "09"? 'selected' :''}} value="09">09</option>
                                                <option {{$room->bed_detail['full']== "10"? 'selected' :''}} value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">King Bed</label>
                                            <select class="form-control" name="bed_detail[king]">
                                                <option {{$room->bed_detail['king']== "01"? 'selected' :''}} value="01">01
                                                </option>
                                                <option {{$room->bed_detail['king']== "02"? 'selected' :''}} value="02">02
                                                </option>
                                                <option {{$room->bed_detail['king']== "03"? 'selected' :''}} value="03">03</option>
                                                <option {{$room->bed_detail['king']== "04"? 'selected' :''}} value="04">04</option>
                                                <option {{$room->bed_detail['king']== "05"? 'selected' :''}} value="05">05</option>
                                                <option {{$room->bed_detail['king']== "06"? 'selected' :''}} value="06">06</option>
                                                <option {{$room->bed_detail['king']== "07"? 'selected' :''}} value="07">07</option>
                                                <option {{$room->bed_detail['king']== "08"? 'selected' :''}} value="08">08</option>
                                                <option {{$room->bed_detail['king']== "09"? 'selected' :''}} value="09">09</option>
                                                <option {{$room->bed_detail['king']== "10"? 'selected' :''}} value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Twin Bed</label>
                                            <select class="form-control" name="bed_detail[twin]">
                                                <option {{$room->bed_detail['twin']== "01"? 'selected' :''}} value="01">01
                                                </option>
                                                <option {{$room->bed_detail['twin']== "02"? 'selected' :''}} value="02">02
                                                </option>
                                                <option {{$room->bed_detail['twin']== "03"? 'selected' :''}} value="03">03</option>
                                                <option {{$room->bed_detail['twin']== "04"? 'selected' :''}} value="04">04</option>
                                                <option {{$room->bed_detail['twin']== "05"? 'selected' :''}} value="05">05</option>
                                                <option {{$room->bed_detail['twin']== "06"? 'selected' :''}} value="06">06</option>
                                                <option {{$room->bed_detail['twin']== "07"? 'selected' :''}} value="07">07</option>
                                                <option {{$room->bed_detail['twin']== "08"? 'selected' :''}} value="08">08</option>
                                                <option {{$room->bed_detail['twin']== "09"? 'selected' :''}} value="09">09</option>
                                                <option {{$room->bed_detail['twin']== "10"? 'selected' :''}} value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label"> Room Size(Squre Feet)</label>
                                            <input type="text" id="room_size" min="0" name="room_size" class="form-control "
                                                   value="{{ $room->room_size }}">
                                            @if ($errors->has('room_size'))
                                                <span class="text-danger">{{ $errors->first('room_size') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">No Of Adults</label>
                                            <select class="form-control" name="adult" id="adult">
                                                <option {{$room->adult==1 ? 'selected' :''}} value="01">01
                                                </option>
                                                <option {{$room->adult==2 ? 'selected' :''}} value="02">02
                                                </option>
                                                <option {{$room->adult==3 ? 'selected' :''}} value="03">03</option>
                                                <option {{$room->adult==4 ? 'selected' :''}} value="04">04</option>
                                                <option {{$room->adult==5 ? 'selected' :''}} value="05">05</option>
                                                <option {{$room->adult==6 ? 'selected' :''}} value="06">06</option>
                                                <option {{$room->adult==7 ? 'selected' :''}} value="07">07</option>
                                                <option {{$room->adult==8 ? 'selected' :''}} value="08">08</option>
                                                <option {{$room->adult==9 ? 'selected' :''}} value="09">09</option>
                                                <option {{$room->adult==10 ? 'selected' :''}} value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label"> Price</label>
                                            <input type="number" id="price" min="0" name="price" class="form-control "
                                                   value="{{ $room->price }}">
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
                                                <option  value="">0</option>
                                                <option {{$room->children==1 ? 'selected' :''}} value="01">01
                                                </option>
                                                <option {{$room->children==2 ? 'selected' :''}} value="02">02
                                                </option>
                                                <option {{$room->children==3 ? 'selected' :''}} value="03">03</option>
                                                <option {{$room->children==4 ? 'selected' :''}} value="04">04</option>
                                                <option {{$room->children==5 ? 'selected' :''}} value="05">05</option>
                                                <option {{$room->children==6 ? 'selected' :''}} value="06">06</option>
                                                <option {{$room->children==7 ? 'selected' :''}} value="07">07</option>
                                                <option {{$room->children==8 ? 'selected' :''}} value="08">08</option>
                                                <option {{$room->children==9 ? 'selected' :''}} value="09">09</option>
                                                <option {{$room->children==10 ? 'selected' :''}} value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Children Extra Price</label>
                                            <input type="number" id="price" min="0" name="children_extra_price" class="form-control "
                                                   value="{{ $room->children_extra_price }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Edit Room</button>
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
    <script>
        $(document).ready(function () {
            $("#adult").change(function () {
                var adult = parseInt($(this).val());
                var children = parseInt($("#children").val());
                var max_occupancy = adult + children;
                $("#max_occupancy").val(max_occupancy);
            })

            $("#children").change(function () {
                var children = parseInt($(this).val());
                var adult = parseInt($("#adult").val());
                var max_occupancy = adult + children;
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
