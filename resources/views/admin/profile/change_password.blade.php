@extends('admin.layout')
@section('title', 'Change Password')

@section('content')
<div class="page-content">

    <!-- Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="active">Change Password</li>
        </ul>
    </div>

    <!-- Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Change Password
                <small>
                    <i class="fa fa-angle-right"></i>
                    Update Your Password
                </small>
            </h1>
        </div>
    </div>

    <!-- Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="widget radius-bordered">
                    <div class="widget-header bg-warning">
                        <span class="widget-caption text-white">
                            <i class="fa fa-lock"></i> Change Password
                        </span>
                    </div>
                    <div class="widget-body">

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
                              action="{{ route('admin.profile.updatePassword') }}"
                              class="form-horizontal">

                            @csrf

                            <div class="form-group">
                                <label class="col-lg-4 control-label">Current Password</label>
                                <div class="col-lg-8">
                                    <input type="password" name="current_password" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label">New Password</label>
                                <div class="col-lg-8">
                                    <input type="password" name="new_password" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label">Confirm Password</label>
                                <div class="col-lg-8">
                                    <input type="password" name="new_password_confirmation" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa fa-save"></i> Update Password
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
