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
                    <small>Create User</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('users.create') }}"><i class="fa fa-users"></i> Users </a></li>
                    <li class="active">Create</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
            @php
                if(!isset($create_hotel)){
                $create_hotel=null;
                }

            @endphp
                <!--------------------------
            | Your Page Content Here |
            -------------------------->
                <!-- /.col -->
                <div class="main">
                    <div class="col-md-10 col-sm-offset-1">
                        @can('user-write')
                            <form class="" action="{{ route('users.store') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="panel panel-primary">
                                    <div class="panel-heading bg-primary">User Information</div>
                                    <div class="panel-body">
                                        <!-- errors -->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name" class="control-label">Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control "
                                                           placeholder="Name" value="{{ old('name') }}">
                                                    @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">

                                                    <label for="email" class="control-label">Email <span
                                                            class="text-danger">*</span></label>
                                                    <input type="email" name="email" class="form-control"
                                                           placeholder="Email" value="{{ old('email') }}">
                                                    @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-70">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="password" class="control-label">Password <span
                                                            class="text-danger">*</span></label>
                                                    <input id="password" type="password" class="form-control"
                                                           name="password" autocomplete="new-password">
                                                    @error('password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="password-confirm"
                                                           class="control-label">{{ __('Confirm Password') }} <span
                                                            class="text-danger">*</span></label>
                                                    <input id="password-confirm" type="password" class="form-control"
                                                           name="password_confirmation" autocomplete="new-password">
                                                    @error('password_confirmation')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-70">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="image" class="control-label ">Profile Picture</label>
                                                    <input type="file" name="picture" class="form-control"
                                                           id="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-70">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="mobile" class="control-label">Mobile Number <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" name="mobile" class="form-control" id="mobile"
                                                           value="{{ old('mobile') }}" placeholder="Mobile Number">
                                                    @error('mobile')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="phone" class="control-label">Phone Number</label>
                                                    <input type="number" name="phone" class="form-control" id="mobile"
                                                           value="{{ old('phone') }}" placeholder="Phone Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="address" class="control-label">Address</label>
                                                    <textarea class="form-control" name="address" id="address"
                                                              placeholder="Address">{{ old('address') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-primary" id="hotel">
                                    <div class="panel-heading bg-primary">User Business (Hotel) Information</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Title<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="txturl" name="title"
                                                           class="form-control " value="{{ old('title') }}">
                                                    @error('title')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Slug<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="slug" name="slug"
                                                           class="form-control " value="{{ old('slug') }}">
                                                    @error('slug')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Thumbnail</label>
                                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Description<span
                                                    class="text-danger">*</span> </label>
                                            <textarea name="description" id="editor" class="form-control "
                                                      rows="3" cols="6">{{ old('description') }}</textarea>
                                            @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Property Type<span
                                                            class="text-danger">*</span></label>
                                                    <select name="type" id="type" id="type"
                                                            class="form-control">
                                                        <option value="apartment">Apartment</option>
                                                        <option value="hotel">Hotel</option>
                                                        <option value="resort">Resorts</option>
                                                        <option value="villa">Villas</option>
                                                        <option value="cabin">Cabin</option>
                                                    </select>
                                                    @error('type')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Rent Range<span
                                                            class="text-danger">*</span></label>
                                                    <select name="rent_range" id="rent_range"
                                                            class="form-control">
                                                        <option value="5k-15k">5k-15k</option>
                                                        <option value="5k-30k">5k-30k</option>
                                                        <option value="10k-60k">10k-60k</option>
                                                        <option value="10k-60k">10k-60k</option>
                                                        <option value="10k-100k">10k-100k</option>
                                                    </select>
                                                    @error('rent_range')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Country</label>
                                                    <input type="text" name="country" id="country"
                                                           value="Pakistan" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Provience<span
                                                            class="text-danger">*</span></label>
                                                    <select name="provience" id="provience"
                                                            class="form-control">
                                                        <option value="ICT">ICT</option>
                                                        <option value="KP">KP</option>
                                                        <option value="Punjab">Pubjab</option>
                                                        <option value="Sindh">Sindh</option>
                                                        <option value="Balochistan">Balochistan</option>
                                                        <option value="AJK">Azad Kashmir</option>
                                                        <option value="Giglit Baltistan">Gilgit Baltistan
                                                        </option>
                                                    </select>
                                                    @error('provience')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">City</label>
                                                    <select name="city" id="city" class="form-control">
                                                       <option value="">Select</option>
                                                       @foreach ($cities as $city )
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                       @endforeach
                                                    </select>
                                                    @error('city')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                      
                                        </div>
                                    
                                    </div>
                                </div>
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
                                                    <input type="number" name="charges" class="form-control" id="charges" placeholder="Enter Subscription charges">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="form-control-loble">Discount</label>
                                                    <input type="number" class="form-control" name="discount" id="discount" placeholder="Enter Discount">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Subscription Type</label>
                                                    <select name="subscription_type" id="subscription_type" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="1">Monthly</option>
                                                        <option value="2">Yearly</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>        
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-success" style="margin-top:10px">
                                        Submit
                                    </button>
                                </div>
                            </form>
                            @else
                                <h3 class="text-danger">Opps! You have no permission for this action!</h3>
                            @endcan
                    <!-- /.col -->
                    </div>
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

@section('scripts')
    <script src="http://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '{{ url(' / ') }}/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '{{ url(' / ') }}/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '{{ url(' / ') }}/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '{{ url(' / ') }}/laravel-filemanager/upload?type=Files&_token='
        };

        CKEDITOR.replace('description', options);

        $(document).ready(function () {
            var create_hotel = $('#create_hotel').val();
            if(create_hotel==0){
                $("#hotel").hide()
                $('#create_hotel_active i').removeClass('text-success');
                $('#create_hotel_active i').addClass('text-default');
                $('#create_hotel_active i').removeClass('fa-toggle-on');
                $('#create_hotel_active i').addClass('fa-toggle-off');

            }else{
                $("#hotel").show()
                $("#hotel_id").hide();
                $('#create_hotel_active i').removeClass('text-default');
                $('#create_hotel_active i').addClass('text-success');
                $('#create_hotel_active i').removeClass('fa-toggle-off');
                $('#create_hotel_active i').addClass('fa-toggle-on');
            }

            //Date picker
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });

            // attrubutes
            $(document).on('click', '#servicebutebtn', function (event) {
                event.preventDefault();
                /* Act on the event */
                var attrivuteHtml = ` <div id="serviceDiv">
                                        <div class="form-group col-md-8">
                                            <input type="text" name="hotel_service[]" id="hotel_service"
                                                placeholder="Hotel Service" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button id="serRemoveBtn" class="btn btn-danger btn-block col-md-2"><i class="fa fa-trash"></i> </button>
                                        </div>
                                    </div>`;
                $('#serviceattBox').append(attrivuteHtml);
            });
            $(document).on('click', '#serRemoveBtn', function (event) {
                event.preventDefault();
                $('#serviceattBox #serviceDiv').last().remove();
            });

            // attrubutes
            $(document).on('click', '#attributebtn', function (event) {
                event.preventDefault();
                /* Act on the event */
                var attrivuteHtml = ` <div id="attBox">
                                    <div class="form-group col-md-5">
                                          <input type="text"
                                            name="surrounding_location[]"
                                            id="surrounding_location"
                                            placeholder="Surrounding Location"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <input type="text"
                                            name="surrounding_distance[]"
                                            id="attribute_value"
                                            placeholder="Surrounding Distance"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button id="attRemoveBtn"
                                            class="btn btn-danger btn-block col-md-2"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>`;
                $('#surroundingDiv').append(attrivuteHtml);
            });

            $(document).on('click', '#attRemoveBtn', function (event) {
                event.preventDefault();
                /* Act on the event */
                $('#surroundingDiv #attBox').last().remove();
            });


            // images
            $(document).on('click', '#imagebtn', function (event) {
                event.preventDefault();
                /* Act on the event */
                $('#image_div').append(
                    '<input type="file" name="image[]" class="form-control-file col-md-10" style="margin-bottom:30px" accept="image/*" multiple> <button id="imgRemoveBtn" class="btn btn-xs btn-danger col-md-2"><i class="fa fa-trash"></i></button>'
                );
            });

            $(document).on('click', '#imgRemoveBtn', function (event) {
                event.preventDefault();
                $('#image_div input').last().remove();
                $('#image_div #imgRemoveBtn').last().remove();
            });

        });
        $(document).on('click', '#create_hotel_active', function (event) {
            event.preventDefault();
            /* Act on the event */
            var bath_value = $('#create_hotel').val();
            if (bath_value == 0) {
                $('#create_hotel').val(1);
                $("#hotel").show()
                $("#hotel_id").hide();
                $('#create_hotel_active i').removeClass('text-default');
                $('#create_hotel_active i').addClass('text-success');
                $('#create_hotel_active i').removeClass('fa-toggle-off');
                $('#create_hotel_active i').addClass('fa-toggle-on');
            } else {
                $('#create_hotel').val(0);
                $("#hotel").hide()
                $("#hotel_id").show();
                $('#create_hotel_active i').removeClass('text-success');
                $('#create_hotel_active i').addClass('text-default');
                $('#create_hotel_active i').removeClass('fa-toggle-on');
                $('#create_hotel_active i').addClass('fa-toggle-off');
            }
        });
    </script>
@endsection
