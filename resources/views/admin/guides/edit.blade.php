@extends('admin.layout')
@section('title', 'Edit Guide')

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
                <a href="{{ url('admin/guides') }}">Guides</a>
            </li>
            <li class="active">Edit Guide</li>
        </ul>
    </div>

    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
               Guides
                <small>
                    <i class="fa fa-angle-right"></i>
                    Edit Guide
                </small>
            </h1>
        </div>
    </div>

    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="widget radius-bordered">
                    <div class="widget-header">
                        <span class="widget-caption">Edit Guide</span>
                    </div>

                    <div class="widget-body">

                        {{-- Errors --}}
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @php
                            $selectedSpecialities = $guide->speciality_id ? explode(',', $guide->speciality_id) : [];
                            $selectedTools = $guide->tool_id ? explode(',', $guide->tool_id) : [];
                            $selectedSkills = $guide->skill_id ? explode(',', $guide->skill_id) : [];
                            $selectedReading = $guide->reading_style_id ? explode(',', $guide->reading_style_id) : [];
                        @endphp

                        <form method="POST"
                              action="{{ route('admin.guides.update', $guide->id) }}"
                              class="form-horizontal">
                            @csrf
                         
                            {{-- Name --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Name *</label>
                                <div class="col-lg-8">
                                    <input type="text" name="name" class="form-control"
                                           value="{{ old('name', $guide->name) }}" required>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Email *</label>
                                <div class="col-lg-8">
                                    <input type="email" name="email" class="form-control"
                                           value="{{ old('email', $guide->email) }}" required>
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Phone *</label>
                                <div class="col-lg-8">
                                    <input type="text" name="phone" class="form-control"
                                           value="{{ old('phone', $guide->phone) }}" required>
                                </div>
                            </div>

                            {{-- Password --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Password</label>
                                <div class="col-lg-8">
                                    <input type="password" name="password" class="form-control"
                                           placeholder="Leave blank to keep old password">
                                </div>
                            </div>

                            {{-- Guide Level --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Guide Level *</label>
                                <div class="col-lg-8">
                                    <select name="guide_level" class="form-control">
                                        <option value="core" {{ $guide->guide_level=='core'?'selected':'' }}>Core</option>
                                        <option value="senior" {{ $guide->guide_level=='senior'?'selected':'' }}>Senior</option>
                                        <option value="master" {{ $guide->guide_level=='master'?'selected':'' }}>Master</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Price --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Price per Min *</label>
                                <div class="col-lg-8">
                                    <input type="text" name="price_per_min" class="form-control"
                                           value="{{ old('price_per_min', $guide->price_per_min) }}">
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Address</label>
                                <div class="col-lg-8">
                                    <textarea name="address" class="form-control">{{ old('address', $guide->address) }}</textarea>
                                </div>
                            </div>

                            {{-- Specialities --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Specialities</label>
                                <div class="col-lg-8">
                                    <select name="speciality_id[]" id="speciality_id" class="form-control" multiple>
                                        @foreach($specialities as $s)
                                            <option value="{{ $s->id }}"
                                                {{ in_array($s->id, $selectedSpecialities) ? 'selected' : '' }}>
                                                {{ $s->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Tools --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Tools</label>
                                <div class="col-lg-8">
                                    <select name="tool_id[]" id="tool_id"  class="form-control" multiple>
                                        @foreach($tools as $t)
                                            <option value="{{ $t->id }}"
                                                {{ in_array($t->id, $selectedTools) ? 'selected' : '' }}>
                                                {{ $t->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Skills --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Skills</label>
                                <div class="col-lg-8">
                                    <select name="skill_id[]"  id="skill_id" class="form-control" multiple>
                                        @foreach($skills as $s)
                                            <option value="{{ $s->id }}"
                                                {{ in_array($s->id, $selectedSkills) ? 'selected' : '' }}>
                                                {{ $s->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Reading Style --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Reading Style</label>
                                <div class="col-lg-8">
                                    <select name="reading_style_id[]" id="reading_style_id" class="form-control" multiple>
                                        @foreach($reading_styles as $r)
                                            <option value="{{ $r->id }}"
                                                {{ in_array($r->id, $selectedReading) ? 'selected' : '' }}>
                                                {{ $r->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Status</label>
                                <div class="col-lg-8">
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $guide->status ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ !$guide->status ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Update
                                </button>
                                <a href="{{ url('admin/guides') }}" class="btn btn-default">
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