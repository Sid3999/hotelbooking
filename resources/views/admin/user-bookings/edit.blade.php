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
                    <h3 class="box-title" style="display:block">Edit Booking Request
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{ route('room-booking.update', $roomBooking) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Request No</label>
                                    <input type="text" id="room_no" name="room_no" class="form-control "
                                        value="{{ $roomBooking->id }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Update Checkout</label>
                                    <input type="date" name="check_out" id="check_out" class="form-control"
                                        value="{{ $roomBooking->check_out }}">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Edit Booking Request</button>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('title', 'Edit Booking Requests')

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
