@extends('admin.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @if($hotel->status == '0')
        <div class="alert alert-danger" role="alert">
            Hotel is inactive . @if (Auth::user()->roles->first()->id != 1)
            Contact Admin
            @endif  
          </div>
          @endif
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title"></h5>
                    </div>
                    <div class="modal-body" id="service-edit">
                    </div>

                </div>
            </div>
        </div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Hotels
                <small>{{ $hotel->title }}</small>
            </h1>
            <ol class="breadcrumb">
                @can('permission-write')
                    <li><a href="{{ route('product.index') }}"><i class="fa fa-users"></i>Hotels</a></li>
                @endcan
                <li class="active">Hotels List [{{ $hotel->title }}]</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="false">Basic Information</a>
                        </li>
                        <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Services</a></li>
                        <li class=""><a href="#surroudings" data-toggle="tab" aria-expanded="true">Surroundings</a></li>
                        <li class=""><a href="#gallery" data-toggle="tab" aria-expanded="true">Gallery</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="activity">
                            <table class="table table-bordered table-responsive table-striped">
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
                                    </tr>
                                </thead>

                                <tbody>
                                    @can('category-read')
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $hotel->thumbnail) }}" alt=""
                                                    style="width:80px">
                                            </td>
                                            <td>{{ $hotel->title }}</td>
                                            <td>{{ $hotel->rent_range }}</td>
                                            <td>{{ ucfirst($hotel->type) }}</td>
                                            <td>{{ ucfirst($hotel->area) }}</td>
                                            <td>{{ ucfirst($hotel->city) }}</td>
                                            <td>{{ $hotel->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="8">
                                                <h3 class="text-danger">Oops! You have no permission for this action!</h3>
                                            </td>
                                        </tr>
                                    @endcan
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Address</h4>
                                    <p>{{ $hotel->address }}</p>
                                    <h4>Postal Code</h4>
                                    <p>{{ $hotel->postal_code ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Description</h4>
                                    <p>{!! $hotel->description !!}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <h4>Hotel Services</h4>
                            <table class="table">
                                <tr>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Service</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </tr>
                                <tbody>
                                    @can('category-read')
                                        @foreach ($hotel->service as $service)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $service->service }}</td>
                                                <td>{{ $service->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <div class="button-group">
                                                        @can('permission-edit')
                                                            <a data-id="{{ $service->id }}" class="edit-service"
                                                                title="Edit Service" data-toggle="modal"
                                                                data-target="#exampleModal"><i
                                                                    class="fa fa-pencil-square text-info"></i></a>
                                                        @endcan
                                                        @can('category-delete')
                                                            <form id="delete-form"
                                                                action="{{ route('hotel-service.destroy', $service->id) }}"
                                                                method="post" style="display: inline;border:0">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="text-danger delete" type="submit"
                                                                    style="border:0;background:none" title="Delete Service">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        @endcan

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">
                                                <h3 class="text-danger">Oops! You have no permission for this action!</h3>
                                            </td>
                                        </tr>
                                    @endcan
                                </tbody>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="surroudings">
                            <h4>Hotel Surroundings</h4>
                            <table class="table">
                                <tr>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Attraction</th>
                                            <th>Distance</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </tr>
                                <tbody>
                                    @can('category-read')
                                        @foreach ($hotel->surrounding as $surrounding)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $surrounding->surrounding_location }}</td>
                                                <td>{{ $surrounding->surrounding_distance }}</td>
                                                <td>{{ $surrounding->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <div class="button-group">
                                                        @can('permission-edit')
                                                            <a data-id="{{ $surrounding->id }}" class="edit-surrounding"
                                                                title="Edit Surrounding" data-toggle="modal"
                                                                data-target="#exampleModal">
                                                                <i
                                                                    class="fa fa-pencil-square text-info"></i></a>
                                                        @endcan
                                                        @can('category-delete')
                                                            <form id="delete-form"
                                                                action="{{ route('hotel-surrounding.destroy',$surrounding) }}" method="post"
                                                                style="display: inline;border:0">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="text-danger delete" type="submit"
                                                                    style="border:0;background:none" title="Delete Hotel">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        @endcan

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">
                                                <h3 class="text-danger">Oops! You have no permission for this action!</h3>
                                            </td>
                                        </tr>
                                    @endcan
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="gallery">
                            <h4>Hotel Gallery</h4>
                            <table class="table">
                                <tr>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </tr>
                                <tbody>
                                    @can('category-read')
                                        @foreach ($hotel->gallery as $gallery)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td> <img src="{{ asset('images/hotel_galleries/' . $gallery->img_url) }}"
                                                        alt="Image Not Found" style="width:80px">
                                                </td>
                                                <td>{{ $gallery->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <div class="button-group">
                                                        @can('permission-edit')
                                                             <a data-id="{{ $gallery->id }}" class="edit-galley"
                                                                title="Edit Gallery" data-toggle="modal"
                                                                data-target="#exampleModal"><i
                                                                    class="fa fa-pencil-square text-info"></i></a>
                                                        @endcan
                                                        @can('category-delete')
                                                            <form id="delete-form"
                                                                action="{{ route('hotel-gallery.destroy', $gallery) }}" method="post"
                                                                style="display: inline;border:0">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="text-danger delete" type="submit"
                                                                    style="border:0;background:none" title="Delete Hotel">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        @endcan

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">
                                                <h3 class="text-danger">Oops! You have no permission for this action!</h3>
                                            </td>
                                        </tr>
                                    @endcan
                                </tbody>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('title', 'Hotels List')

@section('scripts')
    <script>
        $(document).ready(function() {
                    $(".edit-service").click(function(e) {
                            let id = $(this).attr('data-id');
                            console.log(id);
                            $.ajax({
                                url: "{{ url('get-service-data') }}/" + id,
                                type: "GET",
                                success: function(data) {
                                    let id = data['id'];
                                    let action = "{{ url('hotel-service') }}/" + data['id'];
                                    console.log(action);
                                    $("#modal-title").text("Edit Service");
                                    let form = `<form action="${action}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                <label for="service_title">Service Title</label>
                                <input type="text" name="service"
                                class="form-control form-control-border" id="service_title" value="${data['service']}"
                                placeholder="New Service Title">
                                </div><input type="hidden" value="${data['id']}"><br><div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>`;
                                    $("#service-edit").html(form);
                                },
                                error: function(error) {
                                    console.log(error);
                                }
                                  });
                            });

                            $(".edit-surrounding").click(function(e) {
                                let id = $(this).attr('data-id'); $.ajax({
                                            url: "{{ url('get-surrounding-data') }}/" + id,
                                            type: "GET",
                                            success: function(data) {
                                                let id = data['id'];
                                                let action = "{{ url('hotel-surrounding') }}/" +
                                                    data[
                                                        'id'];
                                                $("#modal-title").text("Edit Surrounding");
                                                let form = `<form action="${action}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                <label for="service_title">Surrounding Location</label>
                                <input type="text" name="surrounding_location"
                                class="form-control form-control-border" id="surrounding_location" value="${data['surrounding_location']}"
                                placeholder="Surrounding Location">
                                </div>
                                <div class="form-group">
                                <label for="service_title">Surrounding Distance</label>
                                <input type="text" name="surrounding_distance"
                                class="form-control form-control-border" id="surrounding_distance" value="${data['surrounding_distance']}"
                                placeholder="Surrounding Distance">
                                </div>
                                <input type="hidden" value="${data['id']}"><br><div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>`;
                                $("#service-edit").html(form);
                                            },
                                            error: function(error) {
                                                console.log(error);
                                            }
                                        });
                                });

                                $(".edit-galley").click(function(e) {
                                let id = $(this).attr('data-id');
                                let action = "{{ url('hotel-gallery') }}/" +id
                                $("#modal-title").text("Edit Gallery");
                                let form = `<form action="${action}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                        <label for="img_url">Gallery Image</label>
                                        <input type="file" name="img_url"
                                        class="form-control form-control-border" id="img_url"
                                        placeholder="Surrounding Distance">
                                        </div>
                                        <input type="hidden" value="${id}"><br><div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>`;
                                        $("#service-edit").html(form);});
 });
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
