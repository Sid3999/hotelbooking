@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Hotels
                <small>List</small>
            </h1>
            <ol class="breadcrumb">
                @can('permission-write')
                    <li><a href="{{ route('product.index') }}"><i class="fa fa-users"></i>Hotels</a></li>
                @endcan

                <li class="active">Hotels List</li>
            </ol>
        </section>
        
        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
            | Your Page Content Here |
            -------------------------->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title" style="display:block">Manage Hotels
                        <span class="pull-right" style="display:inline-block">
                        
                            <a class="btn btn-primary btn-sm" href="{{ route('hotel.create') }}"> <i
                                    class="fa fa-plus"></i> Add New</a>
                       
                        </span>
                    </h3>
                </div>
             
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                        <select class="form-control" name="province" id = "province" style="
                        margin-left: 20px;">
                          
                            <option value="0">Province </option>
                            <option value="ICT"  @if($province === "ICT") {{'selected'}} @endif>  ICT</option>
                            <option value="KP" @if($province === "KP") {{'selected'}} @endif>KP</option>
                            <option value="Punjab" @if($province === "Punjab") {{'selected'}} @endif>Punjab</option>
                            <option value="Sindh" @if($province === "Sindh") {{'selected'}} @endif>Sindh</option>
                            <option value="Balochistan" @if($province === "Balochistan") {{'selected'}} @endif>Balochistan</option>
                            <option value="AJK" @if($province === "AJK") {{'selected'}} @endif>Azad Kashmir</option>
                            <option value="Giglit Baltistan" @if($province === "Giglit Baltistan") {{'selected'}} @endif>Gilgit Baltistan</option>
                           
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <select class="form-control" name="city" id = "city" style="
                        margin-left: 20px;" >
                           
                            <option value="0">City</option>
                             @foreach($cities as $city)
                             <option value="{{$city->id}}" @if($citys == $city->id) {{'selected'}} @endif>{{$city->name}}</option>
                             @endforeach
                           
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                         <input type="number" id="min_range" name="min_range" class="form-control" @if($min == 0) {{"placeholder='Minimum Range'"}} @else {{"value=$min"}} @endif>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                         <input type="number" id="max_range" name="max_range" class="form-control" @if($min == 0) {{"placeholder='Maximum Range'"}} @else {{"value=$max"}} @endif>
                        </div>
                    </div>
                
                 
                    <div class="col-md-2">
                        <div class="form-group">
                        <select class="form-control" name="type" id = "type" style="
                        margin-left: 20px;"
                        >
                            
                            <option value="0">Property Type </option>
                            <option value="apartment" @if($type === "apartment") {{'selected'}} @endif>Apartment</option>
                            <option value="hotel" @if($type === "hotel") {{'selected'}} @endif>Hotel</option>
                            <option value="resort" @if($type === "resort") {{'selected'}} @endif>Resorts</option>
                            <option value="villa" @if($type === "villa") {{'selected'}} @endif>Villas</option>
                            <option value="cabin" @if($type === "cabin") {{'selected'}} @endif>Cabin</option>
                           
                        </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <span class="pull-right" style="display:inline-block">
                        <button class="btn btn-primary btn-sm" id = "check" >Search</button>
                        </span>
                    </div>
                </div>
             
                    
               

                <!-- /.box-header -->
                <div class="box-body">
                    <table class="datatable table table-bordered table-responsive table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Rent Range</th>
                            <th>Type</th>
                            <th>Province</th>
                            <th>City</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        {{-- @can('category-read') --}}
                            @foreach ($hotels as $hotel)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('images/hotels/'.$hotel->thumbnail) }}" alt="" style="width:80px">
                                    </td>
                                    <td>{{ $hotel->title }}</td>
                                    <td>{{ $hotel->rent_range }}</td>
                                    <td>{{ ucfirst($hotel->type) }}</td>
                                    <td>{{ ucfirst($hotel->provience) }}</td>
                                    <td>@php $cits = \App\City::where('id',$hotel->city_id)->first(); @endphp {{ ucfirst($cits->name) }}</td>
                                    <td>{{ $hotel->created_at->diffForHumans() }}</td>
                                    <td>
                                      
                                        <div class="button-group">
                                            <a href="{{ route('hotel.show', $hotel) }}" title="View Hotel"><i
                                                    class="fa fa-eye text-info"></i></a>
                                            {{-- @can('permission-edit') --}}
                                                <a href="{{ route('hotel.edit', $hotel->id) }}" title="Edit Hotel"><i
                                                        class="fa fa-pencil-square text-info"></i></a>
                                            {{-- @endcan --}}
                                            {{-- @can('category-delete') --}}
                                                <form id="delete-form" action="{{ route('hotel.destroy', $hotel) }}"
                                                      method="post" style="display: inline;border:0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-danger delete" type="submit"
                                                            style="border:0;background:none" title="Delete Hotel">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            {{-- @endcan --}}
                                            @if (Auth::user()->roles->first()->id == 1)
                                            @if($hotel->status == '0')
                                            <img style = "width:25px ; cursor: pointer ; margin-bottom: 3px" src="{{ asset('images/offbutton.png') }}" data-toggle="tooltip" data-placement="top" title="Click to Activate" onclick="status(1,{{$hotel->id}})       "> 
                                            @else
                                            <img style = "width:30px ; cursor: pointer ; margin-bottom: 3px" src="{{ asset('images/onbutton.png') }}" data-toggle="tooltip" data-placement="top" title="Click to Deactivate" onclick="status(0,{{$hotel->id}})">
                                            @endif
                                            @else
                                            @if($hotel->status == '0')
                                            <img style = "width:25px  ; margin-bottom: 3px" src="{{ asset('images/offbutton.png') }}" data-toggle="tooltip" data-placement="top" title="Hotel is inactive" >
                                            @endif
                                            @endif

                            
                                        </div>
                        
                                    </td>
                                </tr>
                            @endforeach

                        {{-- @else
                            <tr>
                                <td colspan="8">
                                    <h3 class="text-danger">Oops! You have no permission for this action!</h3>
                                </td>
                            </tr>
                        @endcan --}}
                        </tbody>

                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('title', 'Hotels List')

@section('scripts')
    <script>
        
         function status(id,hid)
        {
            $.ajax({
                type: 'GET',
                url: '{{ url('updatestatus') }}',
                data: {
                id : id,
                hid : hid,
                cid : 2
                },
                success: function () {
                    location.reload();
                }
        });
    }
    $('#check').click(function()
    {
         var province = $('select[id=province]').val();
         var city = $('select[id=city]').val();
         var min_rent = $('#min_range').val();
         var max_rent =  $('#max_range').val();
         var type = $('select[id=type]').val();
          window.location.href = "/hotel?province="+ province + "&city=" + city  + "&min=" + min_rent + "&max=" + max_rent + "&type=" + type; 
        
    });
        $(document).on('click', '.delete', function (e) {

            var form = $(this).parents('form:first');

            var confirmed = false;

            e.preventDefault();

            swal({
                title: 'Are you sure want to delete?',
                text: "Onec Delete, This will be permanently delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    // window.location.href = link;
                    confirmed = true;

                    form.submit();

                } else {
                    swal("Safe Data!");
                }
            });
        });
    </script>
@endsection
