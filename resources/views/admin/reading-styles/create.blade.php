@extends('admin.layout')
@section('title', 'Add Reading Style')

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
            <li class="active">Add Reading Style</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Reading Style
                <small>
                    <i class="fa fa-angle-right"></i>
                    Add Reading Style
                </small>
            </h1>
        </div>
        <div class="header-buttons">
            <a class="sidebar-toggler" href="#"><i class="fa fa-arrows-h"></i></a>
            <a class="refresh" id="refresh-toggler" href=""><i class="glyphicon glyphicon-refresh"></i></a>
            <a class="fullscreen" id="fullscreen-toggler" href="#"><i class="glyphicon glyphicon-fullscreen"></i></a>
        </div>
    </div>
    <!-- /Page Header -->

    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="widget radius-bordered">
                    <div class="widget-header bg-primary">
                        <span class="widget-caption text-white">
                            <i class="fa fa-folder-open"></i> Add Reading Style
                        </span>
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
                              action="{{ route('admin.readingstyles.store') }}"
                              class="form-horizontal"
                              id="readingstylesForm">

                            @csrf

                            {{-- Category Name --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">
                                    Name <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           placeholder="Enter Name"
                                           value="{{ old('name') }}"
                                           required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Save 
                                </button>
                                <a href="{{ url('admin/readingstyles') }}" class="btn btn-secondary">
                                    <i class="fa fa-arrow-left"></i> Back
                                </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Body -->
</div>
@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById('readingstylesForm');
    form.addEventListener('submit', function (e) {
        if (form.name.value.trim() === '') {
            alert('Name is required');
            e.preventDefault();
        }
    });
});
</script>
@endsection
