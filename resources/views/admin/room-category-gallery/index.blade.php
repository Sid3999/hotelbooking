@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Room Categories
                <small>Manage Room Gallery</small>
            </h1>
            <ol class="breadcrumb">
                @can('permission-write')
                    <li><a href="{{ route('room-category-service.index') }}"><i class="fa fa-users"></i>Room Categories</a>
                    </li>
                @endcan

                <li class="active">Manage Room Categories Gallery</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
                                                                                                                                                                                                                                                                                                                                                                                        | Your Page Content Here |
                                                                                                                                                                                                                                                                                                                                                                                        -------------------------->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title" style="display:block">Room Gallery
                        <span class="pull-right" style="display:inline-block">
                            <a class="btn btn-primary btn-sm" href="{{ route('room-category-gallery.create') }}"> <i
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
                                <th>Image</th>
                                <th>Room Category</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @can('category-read') --}}
                                @foreach ($RoomCateGalleries as $gallery)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td> <img src="{{ asset('images/room_category_galleries/' . $gallery->image_url) }}" alt="Image Not Found"
                                                style="width:80px">
                                        </td>
                                        <td>{{ $gallery->hotelCategory->title }}</td>
                                        <td>{{ $gallery->created_at->diffForHumans() }}</td>
                                        <td>
                                            <div class="button-group">
                                                {{-- @can('permission-edit') --}}
                                                    <a href="{{ route('room-category-gallery.edit', $gallery) }}"><i
                                                            class="fa fa-pencil-square text-info"></i></a>
                                                {{-- @endcan --}}
                                                {{-- @can('category-delete') --}}
                                                    <form id="delete-form"
                                                        action="{{ route('room-category-gallery.destroy', $gallery->id) }}"
                                                        method="post" style="display: inline;border:0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-danger delete" type="submit"
                                                            style="border:0;background:none">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                {{-- @endcan --}}

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
                                <th>Service</th>
                                <th>Hotel</th>
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

@section('title', 'Room Categories Gallery')

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
