@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Room Categories<small>Create</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('room-category.index') }}"><i class="fa fa-users"></i>Room Category Service</a></li>
                <li class="active">Create</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        | Your Page Content Here |
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          -------------------------->
            <!-- /.col -->
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading bg-primary">Create Room Category Service</div>
                    <div class="panel-body">
                        <!-- errors -->
                        @include('admin.partials.errors')
                        {{-- @can('permission-write') --}}
                            <form action="{{ route('room-category.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Title</label>
                                            <input type="text" id="txturl" name="title" class="form-control "
                                                value="{{ old('title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label">Select Facility</label>
                                        <select name="facility[]"  class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                            @foreach($facilities as $facility)
                                                <option value="{{$facility->name}}" >{{$facility->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="form-control-label">Room Size</label>--}}
{{--                                            <input type="text" id="room_size" name="room_size" class="form-control "--}}
{{--                                                value="{{ old('room_size') }}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="form-control-label">Sleeping Space</label>--}}
{{--                                            <input type="text" id="sleep" name="sleep" class="form-control "--}}
{{--                                                value="{{ old('sleep') }}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="form-control-label">Bed Type</label>--}}
{{--                                            <select class="form-control" name="bed_type">--}}
{{--                                                <option value="1_king_bed_or_1_twin_bed">1 king bed or 1 twin bed--}}
{{--                                                </option>--}}
{{--                                                <option value="1_twin_bed_or_1_king_bed">1 twin bed or 1 king bed--}}
{{--                                                </option>--}}
{{--                                                <option value="1_king_bed">1 king bed</option>--}}
{{--                                                <option value="1_twin_bed">1 Twin bed</option>--}}
{{--                                                <option value="1_sinle_bed">1 Single bed</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <label class="form-control-label">Attach Bathroom</label><br>--}}
{{--                                        <input type="hidden" id="attach_bth" name="attach_bth" value="0" class="form-control">--}}
{{--                                        <button id="attach_bth_active">--}}
{{--                                            <i class=" fa-2x fa fa-toggle-off text-default"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <label class="form-control-label">Air Conditionar</label><br>--}}
{{--                                        <input type="hidden" id="air_conditionar" name="air_conditionar" value="0"--}}
{{--                                            class="form-control">--}}
{{--                                        <button id="air_conditionar_active">--}}
{{--                                            <i class=" fa-2x fa fa-toggle-off text-default"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <label class="form-control-label">Wifi</label><br>--}}
{{--                                        <input type="hidden" id="wifi" name="wifi" value="0" class="form-control">--}}
{{--                                        <button id="wifi_active">--}}
{{--                                            <i class=" fa-2x fa fa-toggle-off text-default"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="form-control-label">Price</label>--}}
{{--                                            <input type="number" id="price" name="price" class="form-control"--}}
{{--                                                value="{{ old('price') }}" min="1">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="form-control-label">Tax</label>--}}
{{--                                            <input type="number" id="tax" name="tax" class="form-control"--}}
{{--                                                value="{{ old('tax') }}" min="1">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="form-control-label">No Of Adults</label>--}}
{{--                                            <select class="form-control" name="adult">--}}
{{--                                                <option value="01">01--}}
{{--                                                </option>--}}
{{--                                                <option value="02">02--}}
{{--                                                </option>--}}
{{--                                                <option value="03">03</option>--}}
{{--                                                <option value="04">04</option>--}}
{{--                                                <option value="05">05</option>--}}
{{--                                                <option value="06">06</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="form-control-label">No Of Childrens</label>--}}
{{--                                            <select class="form-control" name="children">--}}
{{--                                                <option value="01">01--}}
{{--                                                </option>--}}
{{--                                                <option value="02">02--}}
{{--                                                </option>--}}
{{--                                                <option value="03">03</option>--}}
{{--                                                <option value="04">04</option>--}}
{{--                                                <option value="05">05</option>--}}
{{--                                                <option value="06">06</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="form-control-label">Description </label>--}}
{{--                                            <textarea name="description" id="editor" class="form-control " rows="5"--}}
{{--                                                cols="5">{{ old('description') }}</textarea>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add Category</button>
                                </div>
                            </form>
                        {{-- @else
                            <tr>
                                <td colspan="8">
                                    <h3 class="text-danger">Oops! You have no permission for this action!</h3>
                                </td>
                            </tr>
                        @endcan --}}
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('title', 'Room Category|Create')
@section('scripts')
<script>

    $(document).ready(function() {

        $(document).on('click', '#is_menu_active', function(event) {
            event.preventDefault();
            /* Act on the event */
            var isMenuVal = $('#is_menu').val();
            if (isMenuVal == 0) {
                $('#is_menu').val(1);
                $('#is_menu_active i').removeClass('text-default');
                $('#is_menu_active i').addClass('text-success');
                $('#is_menu_active i').removeClass('fa-toggle-off');
                $('#is_menu_active i').addClass('fa-toggle-on');
            } else {
                $('#is_menu').val(0);
                $('#is_menu_active i').removeClass('text-success');
                $('#is_menu_active i').addClass('text-default');
                $('#is_menu_active i').removeClass('fa-toggle-on');
                $('#is_menu_active i').addClass('fa-toggle-off');
            }
        });
        $(document).on('click', '#attach_bth_active', function(event) {
            event.preventDefault();
            /* Act on the event */
            var bath_value = $('#attach_bth').val();
            if (bath_value == 0) {
                $('#attach_bth').val(1);
                $('#attach_bth_active i').removeClass('text-default');
                $('#attach_bth_active i').addClass('text-success');
                $('#attach_bth_active i').removeClass('fa-toggle-off');
                $('#attach_bth_active i').addClass('fa-toggle-on');
            } else {
                $('#attach_bth').val(0);
                $('#attach_bth_active i').removeClass('text-success');
                $('#attach_bth_active i').addClass('text-default');
                $('#attach_bth_active i').removeClass('fa-toggle-on');
                $('#attach_bth_active i').addClass('fa-toggle-off');
            }
        });
        $(document).on('click', '#air_conditionar_active', function(event) {
            event.preventDefault();
            /* Act on the event */
            var air_value = $('#air_conditionar').val();
            if (air_value == 0) {
                $('#air_conditionar').val(1);
                $('#air_conditionar_active i').removeClass('text-default');
                $('#air_conditionar_active i').addClass('text-success');
                $('#air_conditionar_active i').removeClass('fa-toggle-off');
                $('#air_conditionar_active i').addClass('fa-toggle-on');
            } else {
                $('#air_conditionar').val(0);
                $('#air_conditionar_active i').removeClass('text-success');
                $('#air_conditionar_active i').addClass('text-default');
                $('#air_conditionar_active i').removeClass('fa-toggle-on');
                $('#air_conditionar_active i').addClass('fa-toggle-off');
            }
        });
        $(document).on('click', '#wifi_active', function(event) {
            event.preventDefault();
            /* Act on the event */
            var air_value = $('#wifi').val();
            if (air_value == 0) {
                $('#wifi').val(1);
                $('#wifi_active i').removeClass('text-default');
                $('#wifi_active i').addClass('text-success');
                $('#wifi_active i').removeClass('fa-toggle-off');
                $('#wifi_active i').addClass('fa-toggle-on');
            } else {
                $('#wifi').val(0);
                $('#wifi_active i').removeClass('text-success');
                $('#wifi_active i').addClass('text-default');
                $('#wifi_active i').removeClass('fa-toggle-on');
                $('#wifi_active i').addClass('fa-toggle-off');
            }
        });
        $(document).on('click', '#is_active_btn', function(event) {
            event.preventDefault();
            /* Act on the event */
            var isMenuVal = $('#is_active').val();
            if (isMenuVal == 0) {
                $('#is_active').val(1);
                $('#is_active_btn i').removeClass('text-default');
                $('#is_active_btn i').addClass('text-success');
                $('#is_active_btn i').removeClass('fa-toggle-off');
                $('#is_active_btn i').addClass('fa-toggle-on');
            } else {
                $('#is_active').val(0);
                $('#is_active_btn i').removeClass('text-success');
                $('#is_active_btn i').addClass('text-default');

                $('#is_active_btn i').removeClass('fa-toggle-on');
                $('#is_active_btn i').addClass('fa-toggle-off');
            }
        });
    });
</script>
@endsection
