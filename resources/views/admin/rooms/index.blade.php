@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Rooms Management
                <small>Manage Rooms</small>
            </h1>
            <ol class="breadcrumb">
                @can('permission-write')
                    <li><a href="{{ route('hotel-rooms.index') }}"><i class="fa fa-users"></i>Rooms Management</a></li>
                @endcan

                <li class="active">Manage Rooms</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
                                                                                                                                                                                                                                                                                                                | Your Page Content Here |
                                                                                                                                                                                                                                                                                                                -------------------------->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title" style="display:block">Manage Categories
                        <span class="pull-right" style="display:inline-block">
                            <a class="btn btn-primary btn-sm" href="{{ route('hotel-rooms.create') }}"> <i
                                    class="fa fa-plus"></i> Add New</a>
                        </span>
                
                    </h3>
                </div>
                <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                    <select class="form-control" name="hotel" id = "hotel" style="
                    margin-left: 20px;" onchange="hotelsearch()">
                       
                        <option value="0"> Select Hotel </option>
                        @foreach($hotels as $hotel)
                        <option value="{{$hotel->id}}">{{$hotel->title}}</option>
                        @endforeach
                       
                    </select>
                    </div>
                </div>
            </div>
                <!-- /.box-header -->
                <div class="box-body">
                    
                    <table class="datatable table table-bordered table-responsive table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Room No</th>
                            <th>Room Category</th>
                            <th>Floor</th>
                            <th>Room Size</th>
                            <th>Adult</th>
                            <th>Price</th>
                            <th>Children</th>
                            <th>Children Extra Price</th>
                            <th>Booked</th>
                            <th>Bed Detail</th>
                            <th>Hotel</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- @can('category-read') --}}
                            @if(!empty($rooms))
                            {{-- @php dd($rooms) @endphp --}}
                                @foreach ($rooms as $room)
                                 @php $category =  \App\RoomCategory::where(['id' => $room['category_id']])->first(); $hotel = \App\Hotel::where(['id' => $room['hotel_id']])->first(); @endphp
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><span class="badge badge-success">{{ ucwords($room['room_no']) }}</span></td>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $room['floor'] }}</td>
                                        <td>{{ $room['room_size'] }}</td>
                                        <td>{{ $room['adult'] }}</td>
                                        <td>{{ $room['price'] }}</td>
                                        <td>{{ $room['children'] }}</td>
                                        <td>{{ $room['children_extra_price'] }}</td>
                                        <td>{{ $room['reserved'] == 'true' ? 'Booked' : 'Not Booked' }}</td>
                                        <td>@foreach($room['bed_detail'] as $key => $value)
                                            {{-- @php dd($room['bed_detail']) @endphp  --}}
                                            {{ $key }} = {{$value}}<br> @endforeach</td>
                                        {{-- <td>{{ $category->sleep }} People Can Sleep</td>
                                        <td>{{ ucfirst($category->bed_type) }}</td>
                                        <td><span class="badge badge-primary">{!! ucfirst($category->attach_bth == 'true' ? 'Available' : 'Not Available') !!}</span></td>
                                        <td><span class="badge badge-danger">{!! ucfirst($category->air_conditionar == 'true' ? 'Available' : 'Not Available') !!}</span></td>
                                        <td><span class="badge badge-danger">{!! ucfirst($category->wifi == 'true' ? 'Available' : 'Not Available') !!}</span></td>
                                        <td>{!! $category->price !!}</td>
                                        <td>{!! $category->tax !!}</td> --}}
                                        <td>{{$hotel->title}}</td>

                                        <td>
                                            <div class="button-group">
                                                @can('permission-edit')
                                                    <a href="{{ route('hotel-rooms.edit', $room['id']) }}"><i
                                                            class="fa fa-pencil-square text-info"></i></a>
                                                @endcan

                                                @can('category-delete')
                                                    <form id="delete-form"
                                                          action="{{ route('hotel-rooms.destroy', $room['id']) }}"
                                                          method="post" style="display: inline;border:0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-danger delete" type="submit"
                                                                style="border:0;background:none">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @endcan

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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
                            <th>Room No</th>
                            <th>Room Category</th>
                            <th>Floor</th>
                            <th>Room Size</th>
                            <th>Adult</th>
                            <th>Price</th>
                            <th>Children</th>
                            <th>Children Extra Price</th>
                            <th>Booked</th>
                            <th>Bed Detail</th>
                            <th>Hotel</th>
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

@section('title', 'Manage Rooms')

@section('scripts')
    <script>
        function hotelsearch()
        {
            var e = document.getElementById("hotel");
            var value = e.value;
            
            if(value != '0')
            {
            $.ajax({
                type: 'GET',
                url: '{{ url('hotel-rooms') }}',
                data: {
                id : value
                },
                success: function (data) {
                   
                   
                    window.location.href = "/searchhotel/" + value;
                   
                  
                 }
            });
            }
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
