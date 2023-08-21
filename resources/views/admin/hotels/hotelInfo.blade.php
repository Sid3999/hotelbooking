@extends('admin.layouts.app')
<title>Hotel Management</title>
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Hotel Management
            </h1>
            <ol class="breadcrumb">
                @can('permission-write')
                    <li><a href="{{ route('hotel.hotelinfo') }}"><i class="fa fa-users"></i>Hotel Management</a></li>
                @endcan

                <li class="active">Manage Hotels</li>
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
                            <a class="btn btn-primary btn-sm" href="{{ route('hotels.create') }}"> <i
                                    class="fa fa-plus"></i> Add New</a>
                        </span>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="datatable table table-bordered table-responsive table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        @php $i = 1; @endphp
                        <tbody>
                            @foreach ($hotels as $hotel)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$hotel->title}}</td>
                                <td>{{$hotel->created_at}}</td>
                                 @if($hotel->status == '1')
                                <td> <img style = "width:30px ; cursor: pointer " src="{{ asset('images/onbutton.png') }}" onclick="status(0,{{$hotel->id}})"> <img style = "width:20px ; cursor: pointer ; margin-left: 5px" src="{{ asset('images/edit.png') }}" onclick="edit({{$hotel->id}})"> </td>
                                @else
                                <td> <img style = "width:30px ; cursor: pointer " src="{{ asset('images/offbutton.png') }}"> <img style = "width:20px ; cursor: pointer ; margin-left: 5px" src="{{ asset('images/edit.png') }}" onclick="edit({{$hotel->id}})"> </td>
                                @endif
                            </tr>
                            @endforeach
                        {{-- @can('category-read') --}}
                         
                        {{-- @else --}}
                            {{-- <tr>
                                <td colspan="8">
                                    <h3 class="text-danger">Oops! You have no permission for this action!</h3>
                                </td>
                            </tr> --}}
                        {{-- @endcan --}}
                        </tbody>
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

@section('title', 'Manage Facility')

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
                },
                success: function () {
                    location.reload();
                }
        });
    }
    function edit(id)
    {
        window.location.href = 'my-profile?id=' + id;
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
