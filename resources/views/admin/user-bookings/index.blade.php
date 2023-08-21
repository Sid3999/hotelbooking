@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Booking Requests
                <small>Manage Requests</small>
            </h1>
            <ol class="breadcrumb">
                @can('permission-write')
                    <li><a href="{{ route('hotel-rooms.index') }}"><i class="fa fa-users"></i> Booking Requests
                        </a></li>
                @endcan

                <li class="active">Manage Requests</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    | Your Page Content Here |
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    -------------------------->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title" style="display:block">Manage Booking Requests
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="datatable table table-bordered table-responsive table-striped">
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
                            @foreach ($bookings as $room_booking)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><span class="badge badge-success">{{ $room_booking->id }}</span></td>
                                    <td>{{ $room_booking->hotel->title }}</td>
                                    <td>{{ $room_booking->room_id == '' ? 'Not Assigned' : 'Assigned' }}</td>
                                    <td>{{ $room_booking->no_of_adults }} Adults </td>
                                    <td>{{ $room_booking->no_of_childrens }} Childrens</td>
                                    <td>{!! $room_booking->created_at->diffForHumans() !!}</td>
                                    <td>{!! $room_booking->created_at->format('d-m-Y') !!}</td>

                                    <td>
                                        <div class="button-group">
                                            <a href="{{ route('room-booking.show', $room_booking) }}"
                                                title="View Booking"><i class="fa fa-eye text-info"></i></a>
                                            <a href="{{ route('room-booking.edit', $room_booking) }}"
                                                title="Edit Booking"><i class="fa fa-pencil text-info"></i></a>
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

@section('title', 'Manage Booking Requests')

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
