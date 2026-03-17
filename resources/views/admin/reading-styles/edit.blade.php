@extends('admin.layout')
@section('title', 'Edit Reading Style')

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
                <a href="{{ url('admin/readingstyles') }}">Reading Style</a>
            </li>
            <li class="active">Edit Reading Style</li>
        </ul>
    </div>

    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
               Reading Style
                <small>
                    <i class="fa fa-angle-right"></i>
                    Edit Reading Style
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
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="widget radius-bordered">
                    <div class="widget-header">
                        <span class="widget-caption">Edit Reading Style</span>
                    </div>

                    <div class="widget-body">

                        {{-- Error Messages --}}
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
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
                              action="{{ route('admin.readingstyles.update', $read->id) }}"
                              class="form-horizontal">

                            @csrf
                            <div class="form-group">
                                <label class="col-lg-4 control-label">
                                     Name <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           placeholder="Enter Name"
                                           value="{{ old('name', $read->name) }}"
                                           required>
                                </div>
                            </div>

                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Update                                 </button>
                                <a href="{{ url('admin/readingstyles') }}" class="btn btn-default">
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
