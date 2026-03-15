@extends('admin.layout')
@section('title', 'Add Horoscope Sign')

@section('content')
<div class="page-content">

    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ url('admin/dashboard') }}">Home</a>
            </li>
            <li>
                <a href="{{ url('admin/horoscope-signs') }}">Horoscope Signs</a>
            </li>
            <li class="active">Add Sign</li>
        </ul>
    </div>

    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Horoscope Signs
                <small>
                    <i class="fa fa-angle-right"></i>
                    Add Sign
                </small>
            </h1>
        </div>
    </div>

    <div class="page-body">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">

                <div class="widget radius-bordered">

                    <div class="widget-header bg-primary">
                        <span class="widget-caption text-white">
                            <i class="fa fa-star"></i> Add Horoscope Sign
                        </span>
                    </div>

                    <div class="widget-body">

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
                              action="{{ route('admin.signs.store') }}"
                              enctype="multipart/form-data"
                              class="form-horizontal"
                              id="signForm">

                            @csrf

                            {{-- Sign Name --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">
                                    Sign Name <span class="text-danger">*</span>
                                </label>

                                <div class="col-lg-8">
                                    <input type="text"
                                           name="name"
                                           id="name"
                                           class="form-control"
                                           placeholder="Enter Sign Name"
                                           value="{{ old('name') }}"
                                           required>
                                </div>
                            </div>

                            {{-- Icon Upload --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">
                                    Icon
                                </label>

                                <div class="col-lg-8">
                                    <input type="file"
                                           name="icon"
                                           class="form-control">
                                </div>
                            </div>

                             {{-- Image Upload --}}
                            <div class="form-group">
                                <label class="col-lg-4 control-label">
                                    Image
                                </label>

                                <div class="col-lg-8">
                                    <input type="file"
                                           name="image"
                                           class="form-control">
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Save Sign
                                </button>

                                <a href="{{ url('admin/horoscope-signs') }}" class="btn btn-secondary">
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

@section('scripts')
<script>

document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById('signForm');

    if(form){
        form.addEventListener('submit', function (e) {

            if(nameInput.value.trim() === ''){
                alert('Sign Name is required');
                e.preventDefault();
            }

        });
    }

});

</script>
@endsection