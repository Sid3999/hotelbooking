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
                    <div class="col-md-2">
                        <div class="form-group">
                        <select class="form-control" name="city" id = "city" style="
                        margin-left: 20px;" >
                           
                            <option value="0">City</option>
                             @foreach($cities as $city)
                             <option value="{{$city->id}}">{{$city->name}}</option>
                             @endforeach
                           
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <select class="form-control" name="rent" id = "rent" style="
                        margin-left: 20px;" >
                           
                            <option value="0">Rent Range </option>
                            <option value="1k-10k">1k-10k</option>
                            <option value="10k-30k">10k-30k</option>
                            <option value="30k-60k">30k-60k</option>
                            <option value="60k-100k">60k-100k</option>
                            <option value="100k+">100k+</option>
                           
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <select class="form-control" name="type" id = "type" style="
                        margin-left: 20px;"
                        >
                           
                            <option value="0">Property Type </option>
                            <option value="apartment">Apartment</option>
                            <option value="hotel">Hotel</option>
                            <option value="resort">Resorts</option>
                            <option value="villa">Villas</option>
                            <option value="cabin">Cabin</option>
                           
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <span class="pull-right" style="display:inline-block">
                        <button class="btn btn-primary btn-sm" onclick="clear1()">Search</button>
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
                            <th>Area</th>
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
                                    <td>{{ ucfirst($hotel->area) }}</td>
                                    <td>{{ ucfirst($hotel->city) }}</td>
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
                hid : hid
                cid : 2
                },
                success: function () {
                    location.reload();
                }
        });
    }
    function clear1()
        {
            console.log('d');
        }
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
