
@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Blogs
                <small>Create</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('cities.index') }}"><i class="fa fa-users"></i> Blogs
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
                    <div class="panel-heading bg-primary">Create Blog </div>
                    <div class="panel-body">
                        <!-- errors -->
                        @include('admin.partials.errors')
                        @can('permission-write')
                            <form action="{{Route('blog.update' , $blog->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Title</label>
                                            <input type="hidden" id="id" name="id" class="form-control "
                                                   value="{{ $blog->id}}">
                                            <input type="text" id="title" name="title" class="form-control "
                                                   value="{{ $blog->title }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Freatured Image</label>
                                            <input type="file" id="image" name="image" class="form-control"
                                                   value="{{$blog->image }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group">
                                    <label class="form-control-label ">Description </label><small style="color:red">*</small>
                                    <textarea name="description" id="summernote" class="form-control summernote" rows="3"
                                        cols="6">{{$blog->description}}</textarea>
                                        @error('description')
                                 <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror

                                    
                                </div>
                               
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">submit</button>
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
@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
          $('.summernote').summernote();
        });
    </script>

@endsection