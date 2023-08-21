@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Room Services<small>Edit</small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('room-category-service.index') }}"><i class="fa fa-users"></i>Room Services</a></li>
                <li class="active">Edit</li>
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
                    <div class="panel-heading bg-primary">Edit Room Services</div>
                    <div class="panel-body">

                        <!-- errors -->
                        @include('admin.partials.errors')
                        {{-- @can('permission-write') --}}

                            <form action="{{ route('room-category-service.update', $roomService) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                </div>
                                <div id="serviceattBox">
                                    <div class="form-group row">
                                        <div class="serviceDiv">
                                            <div class="col-md-12">
                                                <div id=" input-group">
                                                    <div class="form-group col-md-6">
                                                        <label for="category_id">Write Services</label>
                                                        <input type="text" class="form-control" name="service"
                                                            placeholder="Service Title" value="{{ $roomService->title }}">
                                                        {{-- <span class="input-group-btn btn-add">
                                                                <button type="button" class="btn btn-success btn-flat"><span
                                                                        class="glyphicon glyphicon-plus"
                                                                        aria-hidden="true"></span></button>
                                                            </span> --}}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="category_id">Select Room</label>
                                                            <select name="category_id" id="category_id" class="form-control">
                                                                @foreach ($room_categories as $room)
                                                                    <option value="{{ $room->id }}"
                                                                        {{ $roomService->category_id == $room->id ? 'selected' : '' }}>
                                                                        {{ $room->title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-md btn-success">Edit Services</button>
                                    </div>
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

@section('title', 'Room Category Services|Create')

@section('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('click', '.btn-add', function(event) {
                event.preventDefault();

                var length = $(".serviceDivCont").length;
                length++;
                /* Act on the event */
                var attrivuteHtml = `<div class="form-group row serviceDivCont" id="serviceDiv_${length}" >
                                <div class="serviceDiv">
                                    <div class="col-md-12">
                                        <div id=" input-group">
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="service[]" placeholder="Service Title">
                                                    <span class="input-group-btn btn-remove" data-id="${length}">
                                                        <button type="button" class="btn btn-danger btn-flat"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                $('#serviceattBox').append(attrivuteHtml);
            });
            $(document).on('click', '.btn-remove', function(event) {
                var dataId = $(this).data('id');

                event.preventDefault();
                $('#serviceDiv_' + dataId).remove();
            });

        });
    </script>
@endsection
