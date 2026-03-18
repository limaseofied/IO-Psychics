@extends('admin.layout')
@section('title', 'Add Guide')

@section('content')
<div class="page-content">

    <!-- Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ url('admin/dashboard') }}">Home</a>
            </li>
            <li>
                <a href="{{ route('admin.guides.index') }}">Guides</a>
            </li>
            <li class="active">Add Guide</li>
        </ul>
    </div>

    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Guides
                <small>
                    <i class="fa fa-angle-right"></i>
                    Add Guide
                </small>
            </h1>
        </div>
    </div>

    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">

                <div class="widget radius-bordered">

                    <div class="widget-header bg-primary">
                        <span class="widget-caption text-white">
                            <i class="fa fa-user"></i> Add Guide
                        </span>
                    </div>

                    <div class="widget-body">

                        {{-- Alerts --}}
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

                        <form method="POST" autocomplete="off"
                              action="{{ route('admin.guides.store') }}"
                              class="form-horizontal"
                              id="GuideForm">

                            @csrf

                            {{-- Name --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Name *</label>
                                <div class="col-lg-8">
                                    <input type="text" name="name" class="form-control"
                                           value="{{ old('name') }}" required>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Email *</label>
                                <div class="col-lg-8">
                                    <input type="email" name="email" class="form-control"
                                           value="{{ old('email') }}" required>
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Phone *</label>
                                <div class="col-lg-8">
                                    <input type="text" name="phone" class="form-control"
                                           value="{{ old('phone') }}" required>
                                </div>
                            </div>

                            {{-- Password --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Password *</label>
                                <div class="col-lg-8">
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>

                            {{-- Guide Level --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Guide Level</label>
                                <div class="col-lg-8">
                                    <select name="guide_level" class="form-control" required>
                                        <option value="">-- Select Level --</option>

                                        <option value="core"
                                            {{ old('guide_level') == 'core' ? 'selected' : '' }}>
                                            Core
                                        </option>

                                        <option value="senior"
                                            {{ old('guide_level') == 'senior' ? 'selected' : '' }}>
                                            Senior
                                        </option>

                                        <option value="master"
                                            {{ old('guide_level') == 'master' ? 'selected' : '' }}>
                                            Master
                                        </option>
                                    </select>
                                </div>
                            </div>

                            {{-- Price --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Price/Min</label>
                                <div class="col-lg-8">
                                    <input type="number" name="price_per_min" class="form-control"
                                           value="{{ old('price_per_min') }}">
                                </div>
                            </div>

                            {{-- Experience --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Experience</label>
                                <div class="col-lg-8">
                                    <input type="text" name="experience" class="form-control"
                                           value="{{ old('experience') }}">
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="col-lg-4 control-label">Specialities</label>
                                <div class="col-lg-8">
                                    <select name="speciality_id[]" id="speciality_id" class="form-control" multiple>
                                        @foreach($specialities as $s)
                                            <option value="{{ $s->id }}" {{ in_array($s->id, old('speciality_id', [])) ? 'selected' : '' }}>{{ $s->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label">Reading Style</label>
                                <div class="col-lg-8">
                                   <select name="reading_style_id[]" id="reading_style_id"  class="form-control" multiple>
                                        @foreach($reading_styles as $r)
                                            <option value="{{ $r->id }}" {{ in_array($r->id, old('reading_style_id', [])) ? 'selected' : '' }}>{{ $r->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label">Tools</label>
                                <div class="col-lg-8">
                                    <select name="tool_id[]" id="tool_id" class="form-control" multiple>
                                       @foreach($tools as $t)
                                        <option value="{{ $t->id }}"
                                            {{ in_array($t->id, old('tool_id', [])) ? 'selected' : '' }}>
                                            {{ $t->name }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-4 control-label">Skills</label>
                                <div class="col-lg-8">
                                    <select name="skill_id[]" id="skill_id" class="form-control" multiple>
                                        @foreach($skills as $s)
                                            <option value="{{ $s->id }}" {{ in_array($s->id, old('skill_id', [])) ? 'selected' : '' }}>{{ $s->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            
                            

                            {{-- Rating --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Rating</label>
                                <div class="col-lg-8">
                                    <input type="text" name="rating" class="form-control"
                                           value="{{ old('rating') }}">
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Address</label>
                                <div class="col-lg-8">
                                    <textarea name="address" class="form-control"
                                              rows="3">{{ old('address') }}</textarea>
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Status</label>
                                <div class="col-lg-8">
                                    <select name="status" class="form-control">
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Save
                                </button>
                                <a href="{{ route('admin.guides.index') }}" class="btn btn-default">
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

{{-- Simple JS Validation --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
     $('#speciality_id').multiselect({
        includeSelectAllOption: true,
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth: '100%',
        maxHeight: 200
    });

    $('#reading_style_id').multiselect({
        includeSelectAllOption: true,
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth: '100%',
        maxHeight: 200
    });

    $('#tool_id').multiselect({
        includeSelectAllOption: true,
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth: '100%',
        maxHeight: 200
    });

    $('#skill_id').multiselect({
       includeSelectAllOption: true,
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth: '100%',
        maxHeight: 200
    });

});
</script>

@endsection