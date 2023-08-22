@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Hotel <small>Create</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('product.index') }}"><i class="fa fa-users"></i>Hotel</a></li>
                <li class="active">Create</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <form action="{{ route('hotel.store') }}" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading bg-primary">Create New Hotel</div>
                            <div class="panel-body">
                                <!-- errors -->
                                @include('admin.partials.errors')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Title</label>
                                            <input type="text" id="txturl" name="title" class="form-control "
                                                value="{{ old('title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Slug</label>
                                            <input type="text" id="slug" name="slug" class="form-control "
                                                value="{{ old('slug') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Thumbnail</label>
                                    <input type="file" name="thumbnail" id="thumbnail" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Description </label>
                                    <textarea name="description" id="editor" class="form-control " rows="3"
                                        cols="6">{{ old('description') }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Property Type</label>
                                            <select name="type" id="type" id="type" class="form-control">
                                                <option value="apartment" >Apartment</option>
                                                <option value="hotel">Hotel</option>
                                                <option value="resort">Resorts</option>
                                                <option value="villa">Villas</option>
                                                <option value="cabin">Cabin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="form-control-label">Minimun Range</label>
                                                <input type="number" id="min_range" name="min_range" class="form-control" >
                                            </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-control-label">Maximum Range</label>
                                                    <input type="number" id="max_range" name="max_range" class="form-control" >
                                                </div>
                                                </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Country</label>
                                            <input type="text" name="country" id="country" value="Pakistan"
                                                class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Province</label>
                                            <select name="provience" id="provience" class="form-control">
                                                <option value="ICT">ICT</option>
                                                <option value="KP">KP</option>
                                                <option value="Punjab">Pubjab</option>
                                                <option value="Sindh">Sindh</option>
                                                <option value="Balochistan">Balochistan</option>
                                                <option value="AJK">Azad Kashmir</option>
                                                <option value="Giglit Baltistan">Gilgit Baltistan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">City</label>
                                            <select name="city" id="city" class="form-control">
                                                @foreach($citys as $city)
                                              
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label class="form-control-label">Area</label>
                                        <textarea name="area" class="form-control " rows="1"
                                            cols="2">{{ old('area') }}</textarea>

                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label class="form-control-label">Address </label>
                                        <textarea name="address" class="form-control " rows="3"
                                            cols="2">{{ old('address') }}</textarea>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading bg-primary">Hotel Surroundings</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="form-control-label">Hotel Surroundings</label>
                                    <button id="attributebtn" class="pull-right btn btn-success"><i class="fa fa-plus"></i>
                                        Add New Surrounding</button>
                                </div>
                                <div class="form-group row" id="surroundingDiv">
                                    <div id="attBox">
                                        <div class="form-group col-md-5">
                                            <input type="text" name="surrounding_location[]" id="surrounding_location"
                                                placeholder="Surrounding Location" class="form-control">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <input type="text" name="surrounding_distance[]" id="attribute_value"
                                                placeholder="Surrounding Distance" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button id="attRemoveBtn" class="btn btn-danger btn-block col-md-2"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading bg-primary">Hotel Services</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="form-control-label">Hotel Services</label>
                                    <button id="servicebutebtn" class="pull-right btn btn-success"><i
                                            class="fa fa-plus"></i>
                                        Add New Services</button>
                                </div>
                                <div class="form-group row" id="serviceattBox">
                                    <div id="serviceDiv">
                                        <div class="form-group col-md-8">
                                            <input type="text" name="hotel_service[]" id="hotel_service"
                                                placeholder="Hotel Service" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button id="serRemoveBtn" class="btn btn-danger btn-block col-md-2"><i
                                                    class="fa fa-trash"></i> </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading bg-primary">Hotel Gallery</div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="form-control-label">Multiple Image Upload</label>
                                    <button id="imagebtn" class="pull-right btn btn-success"><i class="fa fa-plus"></i> Add
                                        New Image</button>
                                </div>
                                <div class="form-group" id="image_div">
                                    <input type="file" name="image[]" class="form-control-file col-md-10"
                                        style="margin-bottom: 30px" accept="image/*" multiple>

                                    <button id="imgRemoveBtn" class="btn btn-xs btn-danger col-md-2"><i
                                            class="fa fa-trash"></i></button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-md btn-success">Save Hotel</button>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('title', 'Add New Hotel')

@section('scripts')
<script src="http://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: '{{ url('/') }}/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '{{ url('/') }}/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '{{ url('/') }}/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '{{ url('/') }}/laravel-filemanager/upload?type=Files&_token='
    };

    CKEDITOR.replace('description', options);
</script>

<script>
    $(document).ready(function() {

        //Date picker
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        // attrubutes
        $(document).on('click', '#servicebutebtn', function(event) {
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
        $(document).on('click', '#serRemoveBtn', function(event) {
            event.preventDefault();
            $('#serviceattBox #serviceDiv').last().remove();
        });

        // attrubutes
        $(document).on('click', '#attributebtn', function(event) {
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

        $(document).on('click', '#attRemoveBtn', function(event) {
            event.preventDefault();
            /* Act on the event */
            $('#surroundingDiv #attBox').last().remove();
        });


        // images
        $(document).on('click', '#imagebtn', function(event) {
            event.preventDefault();
            /* Act on the event */
            $('#image_div').append(
                '<input type="file" name="image[]" class="form-control-file col-md-10" style="margin-bottom:30px" accept="image/*" multiple> <button id="imgRemoveBtn" class="btn btn-xs btn-danger col-md-2"><i class="fa fa-trash"></i></button>'
            );
        });

        $(document).on('click', '#imgRemoveBtn', function(event) {
            event.preventDefault();
            $('#image_div input').last().remove();
            $('#image_div #imgRemoveBtn').last().remove();
        });

    });
</script>
@endsection
