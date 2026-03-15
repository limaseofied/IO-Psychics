@extends('admin.layout')
@section('title', 'Edit Profile')

@section('content')
<div class="page-content">

    <!-- Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="active">Edit Profile</li>
        </ul>
    </div>

    <!-- Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Admin Profile
                <small>
                    <i class="fa fa-angle-right"></i>
                    Edit Profile
                </small>
            </h1>
        </div>
    </div>

    <!-- Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-12 col-sm-12">

                <div class="widget radius-bordered">
                    <div class="widget-header bg-primary">
                        <span class="widget-caption text-white">
                            <i class="fa fa-user"></i> Edit Profile
                        </span>
                    </div>

                    <div class="widget-body">

                        {{-- Errors --}}
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST"
                              action="{{ route('admin.profile.update') }}"
                              class="form-horizontal">

                            @csrf

                            {{--  Name --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Name</label>
                                <div class="col-lg-8">
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           value="{{ old('name', $admin->name) }}"
                                           required>
                                </div>
                            </div>

                          
                            {{-- Email (readonly) --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Email</label>
                                <div class="col-lg-8">
                                    <input type="email"
                                           class="form-control"
                                           value="{{ $admin->email }}"
                                           readonly>
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Phone</label>
                                <div class="col-lg-8">
                                    <input type="text"
                                           name="phone"
                                           class="form-control"
                                           value="{{ old('phone', $admin->phone) }}">
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i> Update Profile
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection

<script>

    document.addEventListener("DOMContentLoaded", function () {  

            $('.editor').summernote({
                placeholder: 'Write something...',
                height: 150,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol']],
                    ['insert', ['link']],
                    ['view', ['codeview']]
                ]
            });
    });

</script>
