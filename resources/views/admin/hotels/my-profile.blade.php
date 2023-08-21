@extends('admin.layouts.app')

@section('content')
@php $id =  $_GET['id'];  @endphp
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Hotel <small>Edit</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('product.index') }}"><i class="fa fa-users"></i>Hotel</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>

        <!-- Main content -->
      
        <section class="content container-fluid">
            <form action="{{ route('hotel.update',['id' => $id]) }}" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading bg-primary">Edit New Hotel</div>
                            <div class="panel-body">
                                <!-- errors -->
                            
                                @csrf
                                <!-- @method('PUT') -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Title</label><small style="color:red">*</small>
                                            <input type="text" id="txturl" name="title" class="form-control "
                                                value="{{$hotel->title }}">
                                                @error('title')
                                 <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror

                                                
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Slug</label><small style="color:red">*</small>
                                            <input type="text" id="slug" name="slug" class="form-control "
                                                value="{{$hotel->slug}}">
                                                @error('slug')
                                 <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Thumbnail</label><small style="color:red">*</small>
                                    <input type="file" name="thumbnail" id="thumbnail" accept="image/*">
                                    <img src="{{asset('images/hotels/'.$hotel->thumbnail)}}" width="150px" height="150px" alt="" class="form-group">
                                    @error('thumbnail')
                                 <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror

                                </div>
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Description </label><small style="color:red">*</small>
                                    <textarea name="description" id="editor" class="form-control " rows="3"
                                        cols="6">{{ $hotel->description }}</textarea>
                                        @error('description')
                                 <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Property Type</label>
                                            <select name="type" id="type" id="type" class="form-control">
                                                <option value="apartment" {{$hotel->type == 'apartment' ? 'selected' : ''}}>Apartment</option>
                                                <option value="hotel" {{$hotel->type == 'hotel' ? 'selected' : ''}}>Hotel</option>
                                                <option value="resort" {{$hotel->type == 'resort' ? 'selected' : ''}}>Resorts</option>
                                                <option value="villa" {{$hotel->type == 'villa' ? 'selected' : ''}}>Villas</option>
                                                <option value="cabin" {{$hotel->type == 'cabin' ? 'selected' : ''}}>Cabin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Rent Range</label>
                                            <select name="rent_range" id="rent_range" class="form-control">
                                                <option value="5k-15k"   {{$hotel->rent_range == '5k-15k'   ? 'selected' : ''}}>5k-15k</option>
                                                <option value="5k-30k"   {{$hotel->rent_range == '5k-30k'   ? 'selected' : ''}}>5k-30k</option>
                                                <option value="10k-60k"  {{$hotel->rent_range == '10k-60k'  ? 'selected' : ''}}>10k-60k</option>
                                                <option value="10k-60k"  {{$hotel->rent_range == '10k-60k'  ? 'selected' : ''}}>10k-60k</option>
                                                <option value="10k-100k" {{$hotel->rent_range == '10k-100k' ? 'selected' : ''}}>10k-100k</option>
                                            </select>
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
                                            <label class="form-control-label">Provience</label>
                                            <select name="provience" id="provience"  class="form-control">
                                                <option value="ICT"  {{$hotel->provience == "ICT"   ? 'selected' : ''}}>ICT</option>
                                                <option value="KP" {{$hotel->provience == "KP"   ? 'selected' : ''}}>KP</option>
                                                <option value="Punjab" {{$hotel->provience == "Punjab"   ? 'selected' : ''}}>Pubjab</option>
                                                <option value="Sindh" {{$hotel->provience == "Sindh"   ? 'selected' : ''}}>Sindh</option>
                                                <option value="Balochistan" {{$hotel->provience == "Balochistan"   ? 'selected' : ''}}>Balochistan</option>
                                                <option value="AJK" {{$hotel->provience == "AJK"   ? 'selected' : ''}}>Azad Kashmir</option>
                                                <option value="Giglit Baltistan" {{$hotel->provience == "Giglit Baltistan"   ? 'selected' : ''}}>Gilgit Baltistan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">City</label>
                                            <select name="city" id="city"  class="form-control">
                                                <option value="" >select</option>
                                                @foreach ($cities as $city )
                                                    @php
                                                        $selected = $city->id == $hotel->city_id ? 'selected' : ''
                                                    @endphp
                                                    <option value="{{$city->id}}" {{$selected}}> {{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                    <label class="form-control-label">Area</label><small style="color:red">*</small>
                                    <textarea name="area" class="form-control " rows="1"
                                        cols="2">{{ $hotel->area }}</textarea>
                                        @error('description')
                                 <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                    </div>
                                    <div class="col-md-12 form-group">
                                    <label class="form-control-label">Address </label><small style="color:red">*</small>
                                    <textarea name="address" class="form-control " rows="3"
                                        cols="2">{{$hotel->address }}</textarea>
                                        @error('address')
                                 <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    
                                    @if ($hotel->surrounding->count() > 0)
                                        @foreach ($hotel->surrounding as $item)
                                        <div id="attBox">
                                            <div class="form-group col-md-5">
                                                <input type="text" name="surrounding_location[]"  id="surrounding_location"
                                                    value="{{$item->surrounding_location}}" class="form-control">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <input type="text" name="surrounding_distance[]" id="attribute_value"
                                                value="{{$item->surrounding_distance}}" class="form-control">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <button id="attRemoveBtn" class="btn btn-danger btn-block col-md-2"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
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
                                    @endif
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
                                @if(!$hotel->service->count() > 0)
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
                                @else
                                    @foreach ($hotel->service as $item)
                                    <div class="form-group row" id="serviceattBox">
                                        <div id="serviceDiv">
                                            <div class="form-group col-md-8">
                                                <input type="text" name="hotel_service[]" id="hotel_service"
                                                   value="{{$item->service}}" class="form-control">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <button id="serRemoveBtn" class="btn btn-danger btn-block col-md-2"><i
                                                        class="fa fa-trash"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading bg-primary">Hotel Gallery</div>
                            <div class="panel-body">
                                <div class="row">
                                    @foreach ($hotel->gallery as $item)
                                        
                                            <div class="col-sm-2" id="gallery_image_{{$item->id}}">
                                                <div class="thumbnail">
                                                    <button type="button" class="close delete-gallery-image" onclick="deletGalleryImage({{$item->id}})">
                                                        <span aria-hidden="true" style="color: red">&times;</span>
                                                    </button>
                                                    <img src="{{asset('images/hotel_galleries/'.$item->img_url)}}" width="200px" height="150px" alt="" class="img img-thumbnail">
                                                </div>
                                            </div>
                                    
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    {{-- <label class="form-control-label">Multiple Image Upload</label> --}}
                                    <button id="imagebtn" style="display: none" class="pull-right btn btn-success"><i class="fa fa-plus"></i> Add
                                        New Image</button>
                                </div>
                                <div class="form-group" id="image_div">
                                    <input type="file" name="image[]" class="form-control-file col-md-10"
                                        style="margin-bottom: 30px" accept="image/*" multiple>

                                    <button id="imgRemoveBtn" style="display: none" class="btn btn-xs btn-danger col-md-2"><i
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

@section('title', 'Edit Hotel')

@section('scripts')
    <script src="http://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
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
                var attrivuteHtml = ` <div id="serviceattBox">
                                    <div class="form-group col-md-8">
                                        <input type="text"
                                            name="hotel_service[]"
                                            id="hotel_service"
                                            placeholder="Hotel Service"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button id="attRemoveBtn"
                                            class="btn btn-danger btn-block col-md-2"><i class="fa fa-trash"></i> </button>
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

        function deletGalleryImage(id)
        {
            bootbox.confirm({
                title: "Delete Image",
                message: "Do you want to delete this image? This cannot be undone.",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Delete'
                    }
                },
                callback: function (result) {
                    if(result)
                    {
                        $.ajax({
                            url: '{{url("hotel/delete-gallery-image")}}/'+id,
                            type: 'GET',
                            success: function(response) {
                                if (response.success == true) {
                                    $('#gallery_image_' + id).remove();
                                }
                            }
                        });
                    }
                }
            });

    
        }
        
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#photo').attr('src', e.target.result).height(80).width(80);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function () {
            readURL(this); 
        });
           
    </script>
@endsection
