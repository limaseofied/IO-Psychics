@extends('admin.layout')
@section('title', 'Edit Horoscope Sign')

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
                <a href="{{ url('admin/horoscope-signs') }}">Horoscope Signs</a>
            </li>
            <li class="active">Edit Sign</li>
        </ul>
    </div>

    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Horoscope Signs
                <small>
                    <i class="fa fa-angle-right"></i>
                    Edit Sign
                </small>
            </h1>
        </div>
    </div>

    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">

                <div class="widget radius-bordered">

                    <div class="widget-header">
                        <span class="widget-caption">
                            <i class="fa fa-star"></i> Edit Horoscope Sign
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
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST"
                              action="{{ route('admin.signs.update', $sign->sign_id) }}"
                              enctype="multipart/form-data"
                              class="form-horizontal">

                            @csrf                          
                            {{-- Sign Name --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">
                                    Sign Name <span class="text-danger">*</span>
                                </label>

                                <div class="col-lg-8">
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           value="{{ old('name', $sign->name) }}"
                                           required>
                                </div>
                            </div>

                            {{-- Slug --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Slug</label>

                                <div class="col-lg-8">
                                    <input type="text"
                                           class="form-control"
                                           value="{{ $sign->slug }}"
                                           readonly>
                                </div>
                            </div>

                            {{-- Icon --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Icon</label>

                                <div class="col-lg-8">

                                    @if($sign->icon)
                                        <div style="margin-bottom:10px;">
                                            <img src="{{ asset('public/storage/uploads/horoscope_icon/'.$sign->icon) }}"
                                                 width="50">
                                        </div>
                                    @endif

                                    <input type="file"
                                           name="icon"
                                           class="form-control">
                                </div>
                            </div>


                             {{-- Image --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Image</label>

                                <div class="col-lg-8">

                                    @if($sign->image)
                                        <div style="margin-bottom:10px;">
                                            <img src="{{ asset('public/storage/uploads/horoscope_image/'.$sign->image) }}"
                                                 width="50">
                                        </div>
                                    @endif

                                    <input type="file"
                                           name="image"
                                           class="form-control">
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Update Sign
                                </button>

                                <a href="{{ url('admin/horoscope-signs') }}" class="btn btn-default">
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