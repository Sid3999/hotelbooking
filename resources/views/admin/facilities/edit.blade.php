@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <h1> Facility Management
                <small>Edit</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('facilities.index') }}"><i class="fa fa-users"></i> Facilities Management</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <!--------------------------
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                | Your Page Content Here |                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      -------------------------->

            <!-- /.col -->
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading bg-primary">Edit Facility </div>
                    <div class="panel-body">

                        <!-- errors -->
                        @include('admin.partials.errors')
                        {{-- @can('permission-write') --}}
                            <form action="{{ route('facilities.update', $facility->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Facility Name</label>
                                            <input type="text" id="name" name="name" class="form-control "
                                                value="{{ $facility->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Edit facility</button>
                                </div>
                            </form>
                        {{-- @else --}}
                            {{-- <tr>
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

@section('title', 'Manage Facility|Edit')
