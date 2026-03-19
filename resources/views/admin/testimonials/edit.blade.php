@extends('admin.layout')
@section('title', 'Edit Testimonial')

@section('content')
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ url('admin/dashboard') }}">Home</a>
            </li>
            <li>
                <a href="{{ url('admin/testimonials') }}">Testimonials</a>
            </li>
            <li class="active">Edit Testimonial</li>
        </ul>
    </div>

    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
               Testimonials
                <small>
                    <i class="fa fa-angle-right"></i>
                    Edit Testimonial
                </small>
            </h1>
        </div>
        <div class="header-buttons">
            <a class="sidebar-toggler" href="#"><i class="fa fa-arrows-h"></i></a>
            <a class="refresh" id="refresh-toggler" href=""><i class="glyphicon glyphicon-refresh"></i></a>
            <a class="fullscreen" id="fullscreen-toggler" href="#"><i class="glyphicon glyphicon-fullscreen"></i></a>
        </div>
    </div>

    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-8 col-sm-12 col-xs-12">
                <div class="widget radius-bordered">
                    <div class="widget-header bg-primary">
                        <span class="widget-caption text-white">Edit Testimonial</span>
                    </div>

                    <div class="widget-body">

                        {{-- Error Messages --}}
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST"
                              action="{{ route('admin.testimonials.update', $testimonial->id) }}"
                              class="form-horizontal">

                            @csrf
                            {{-- Name --}}
                            <div class="form-group">
                                <label class="col-lg-3 control-label">
                                     Name <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-9">
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           placeholder="Enter Name"
                                           value="{{ old('name', $testimonial->name) }}"
                                           required>
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="form-group">
                                <label class="col-lg-3 control-label">
                                     Content
                                </label>
                                <div class="col-lg-9">
                                    <textarea name="content" class="form-control" rows="5" placeholder="Enter Content">{{ old('content', $testimonial->content) }}</textarea>
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="form-group">
                                <label class="col-lg-3 control-label">
                                     Status <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-9">
                                    <select name="status" class="form-control" required>
                                        <option value="active" {{ old('status', $testimonial->status)=='active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status', $testimonial->status)=='inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Update
                                </button>
                                <a href="{{ url('admin/testimonials') }}" class="btn btn-default">
                                    <i class="fa fa-arrow-left"></i> Back
                                </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection