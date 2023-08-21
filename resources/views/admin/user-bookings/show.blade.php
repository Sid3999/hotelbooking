@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Booking Requests
                <small>Single Requests</small>
            </h1>
            <ol class="breadcrumb">
                @can('permission-write')
                    <li><a href="{{ route('hotel-rooms.index') }}"><i class="fa fa-users"></i> Booking Detail
                        </a></li>
                @endcan

                <li class="active">Detail of Booking</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                | Your Page Content Here |
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                -------------------------->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title" style="display:block">Booking Details
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Book Detail</a>
                            </li>
                            <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Booking Timeline </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="activity">
                                <p>Basic Detail</p>
                                <table class="table table-bordered table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Hotel</th>
                                            <th>Room Category</th>
                                            <th>Room Assigned</th>
                                            <th>Adults</th>
                                            <th>Childrens</th>
                                            <th>Booked Ago</th>
                                            <th>Booking Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><span class="badge badge-success">{{ $roomBooking->id }}</span></td>
                                            <td>{{ $roomBooking->category_id }}</td>
                                            <td>{{ $roomBooking->room_id == '' ? 'Not Assigned' : 'Assigned' }}</td>
                                            <td>{{ $roomBooking->no_of_adults }} Adults </td>
                                            <td>{{ $roomBooking->no_of_childrens }} Childrens</td>
                                            <td>{!! $roomBooking->created_at->diffForHumans() !!}</td>
                                            <td>{!! $roomBooking->created_at->format('d-m-Y') !!}</td>
                                        </tr>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Hotel</th>
                                            <th>Room Category</th>
                                            <th>Room Assigned</th>
                                            <th>Adults</th>
                                            <th>Childrens</th>
                                            <th>Booked Ago</th>
                                            <th>Booking Date</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <p>Secondary Detail</p>
                                <table class="table table-bordered table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Vistor List</th>
                                            <th>Special Request</th>
                                            <th>Contact</th>
                                            <th>Arrival Time</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Balance Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $roomBooking->visitors_name_list }}</td>
                                            <td>{{ $roomBooking->special_request == '' ?? 'N/A' }}</td>
                                            <td>{{ $roomBooking->contact_no }}</td>
                                            <td>{{ $roomBooking->approx_arrival_time }}</td>
                                            <td>{{ $roomBooking->check_in }}</td>
                                            <td>{{ $roomBooking->check_out }}</td>
                                            <td>{{ $roomBooking->balance_amount }} PKR</td>

                                        </tr>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Vistor List</th>
                                            <th>Special Request</th>
                                            <th>Contact</th>
                                            <th>Arrival Time</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Balance Amount</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <ul class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-red">
                                            {!! $roomBooking->created_at->format('d-m-Y') !!}
                                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-envelope bg-blue"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i>
                                                <td>{!! $roomBooking->created_at->diffForHumans() !!}</td>
                                            </span>
                                            <h3 class="timeline-header"><a href="#">{{ Auth::user()->name }}</a> Booked A
                                                Room
                                            </h3>
                                            <div class="timeline-body">
                                                You have requested for room to stay from {!! $roomBooking->check_in !!} to
                                                {!! $roomBooking->check_out !!}
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-user bg-aqua"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> {!! $roomBooking->created_at->diffForHumans() !!}</span>
                                            <h3 class="timeline-header no-border"><a href="#">Admin</a> Booking Request has
                                                Received
                                            </h3>
                                            <div class="timeline-body">
                                                Thanks for choosing us,A Room will be Allotted You Soon,Thank You!
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    @if ($roomBooking->room_id != null)
                                        <!-- timeline item -->
                                        <li>
                                            <i class="fa fa-comments bg-yellow"></i>
                                            <div class="timeline-item">
                                                <span class="time"><i class="fa fa-clock-o"></i>
                                                    {!! $roomBooking->updated_at->diffForHumans() !!}</span>
                                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post
                                                </h3>
                                                <div class="timeline-body">
                                                    Take me to your leader!
                                                    Switzerland is small and neutral!
                                                    We are more like Germany, ambitious and misunderstood!
                                                </div>
                                                <div class="timeline-footer">
                                                    <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- END timeline item -->
                                    @endif
                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-green">
                                            {!! $roomBooking->check_out !!}
                                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->

                                    <li>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> {!! $roomBooking->created_at->diffForHumans() !!}</span>
                                            <h3 class="timeline-header no-border"><a href="#">System </a> Your Checkout Date
                                            </h3>
                                            {{-- <div class="timeline-body">
                                                Thanks for choosing us,A Room will be Allotted You Soon,Thank You!
                                            </div> --}}
                                        </div>
                                        <i class="fa fa-clock-o bg-gray"></i>

                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    {{-- <table class="datatable table table-bordered table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hotel</th>
                                <th>Room Category</th>
                                <th>Room Assigned</th>
                                <th>Adults</th>
                                <th>Childrens</th>
                                <th>Booked Ago</th>
                                <th>Booking Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><span class="badge badge-success">{{ $booking->id }}</span></td>
                                    <td>{{ $booking->category_id }}</td>
                                    <td>{{ $booking->room_id == '' ? 'Not Assigned' : 'Assigned' }}</td>
                                    <td>{{ $booking->no_of_adults }} Adults </td>
                                    <td>{{ $booking->no_of_childrens }} Childrens</td>
                                    <td>{!! $booking->created_at->diffForHumans() !!}</td>
                                    <td>{!! $booking->created_at->format('d-m-Y') !!}</td>

                                    <td>
                                        <div class="button-group">
                                            <a href="{{ route('hotel-rooms.edit', $booking->id) }}"
                                                title="View Booking"><i class="fa fa-eye text-info"></i></a>
                                            @can('category-delete')
                                                <form id="delete-form"
                                                    action="{{ route('hotel-rooms.destroy', $booking->id) }}" method="post"
                                                    style="display: inline;border:0">

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
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Hotel</th>
                                <th>Room Category</th>
                                <th>Room Assigned</th>
                                <th>Adults</th>
                                <th>Childrens</th>
                                <th>Booked Ago</th>
                                <th>Booking Date</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table> --}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('title', 'Booking Details')

@section('scripts')
<script>
    $(document).on('click', '.delete', function(e) {

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
