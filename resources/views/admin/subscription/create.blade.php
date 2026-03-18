@extends('admin.layout')
@section('title', 'Add Subscription Plan')

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
                <a href="{{ url('admin/subscription') }}">Subscription Plans</a>
            </li>
            <li class="active">Add Plan</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Subscription Plans
                <small>
                    <i class="fa fa-angle-right"></i>
                    Add Plan
                </small>
            </h1>
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
                            <i class="fa fa-folder-open"></i> Add Subscription Plan
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
                              action="{{ route('admin.subscription.store') }}"
                              class="form-horizontal"
                              id="SubscriptionForm">

                            @csrf

                            {{-- Name --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">
                                    Name <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           placeholder="Enter Plan Name"
                                           value="{{ old('name') }}"
                                           required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Duration --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">
                                    Duration (Minutes) <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="number"
                                           name="duration_min"
                                           class="form-control"
                                           placeholder="Enter Duration in Minutes"
                                           value="{{ old('duration_min') }}"
                                           required>
                                    @error('duration_min')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Guide Level --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">
                                    Guide Level <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <select name="guide_level" class="form-control" required>
                                        <option value="">Select Level</option>
                                        <option value="core" {{ old('guide_level') == 'core' ? 'selected' : '' }}>Core</option>
                                        <option value="senior" {{ old('guide_level') == 'senior' ? 'selected' : '' }}>Senior</option>
                                        <option value="master" {{ old('guide_level') == 'master' ? 'selected' : '' }}>Master</option>
                                    </select>
                                    @error('guide_level')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Price --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">
                                    Price <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="number"
                                           name="price"
                                           class="form-control"
                                           placeholder="Enter Price"
                                           value="{{ old('price') }}"
                                           step="0.01"
                                           required>
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Save 
                                </button>
                                <a href="{{ url('admin/subscription') }}" class="btn btn-secondary">
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
    const form = document.getElementById('SubscriptionForm');
    form.addEventListener('submit', function (e) {
        if (form.name.value.trim() === '' ||
            form.duration_min.value.trim() === '' ||
            form.guide_level.value.trim() === '' ||
            form.price.value.trim() === '') {
            alert('All fields are required');
            e.preventDefault();
        }
    });
});
</script>
@endsection