@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Facility Management
                <small>Create</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('facilities.index') }}"><i class="fa fa-users"></i> Facilities Management
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
                    <div class="panel-heading bg-primary">Create Facility</div>
                    <div class="panel-body">
                        <!-- errors -->
                        @include('admin.partials.errors')
                        {{-- @can('permission-write') --}}
                            <form action="{{ route('facilities.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Facility Name</label>
                                            <input type="text" id="name" name="name" class="form-control "
                                                   value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add facility</button>
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
@section('title', 'Manage Facility|Create')



