@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> City Management
                <small>Create</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('cities.index') }}"><i class="fa fa-users"></i> Cities Management
                    </a></li>
                <li class="active">Create</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content container-fluid">
            <!--------------------------                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         | Your Page Content Here |                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 -------------------------->
            <!-- /.col -->
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading bg-primary">Create City </div>
                    <div class="panel-body">
                        <!-- errors -->
                        @include('admin.partials.errors')
                        @can('permission-write')
                            <form action="{{ route('cities.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Name</label>
                                            <input type="text" id="name" name="name" class="form-control "
                                                   value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Image</label>
                                            <input type="file" id="image" name="image" class="form-control"
                                                   value="{{ old('image') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add city</button>
                                </div>
                            </form>
                        @else
                            <tr>
                                <td colspan="8">
                                    <h3 class="text-danger">Oops! You have no permission for this action!</h3>
                                </td>
                            </tr>
                        @endcan
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('title', 'Manage City|Create')




