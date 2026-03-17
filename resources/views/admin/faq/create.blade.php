@extends('admin.layout')
@section('title', 'Add FAQ')

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
                <a href="{{ url('admin/faq') }}">FAQ</a>
            </li>
            <li class="active">Add FAQ</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->

    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                FAQ
                <small>
                    <i class="fa fa-angle-right"></i>
                    Add FAQ
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
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget radius-bordered">
                    <div class="widget-header bg-primary">
                        <span class="widget-caption text-white">
                            <i class="fa fa-folder-open"></i> Add FAQ
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
                              action="{{ route('admin.faq.store') }}"
                              class="form-horizontal"
                              id="FaqForm">

                            @csrf

                            <div class="form-group">
                                <label class="col-lg-4 control-label">
                                    Question <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <input type="text"
                                           name="question"
                                           class="form-control"
                                           placeholder="Enter Question"
                                           value="{{ old('question') }}"
                                           required>
                                    @error('question')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-lg-4 control-label">
                                    Answer <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">

                                     <textarea name="answer" id="answer" required class="form-control editor">{{ old('answer') }}</textarea>
                                           <div class="char-count"><span id="charCount">0</span> / 2000</div>
                                    @error('answer')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                             <div class="form-group">
                                <label class="col-lg-4 control-label">
                                    Category <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-8">
                                    <select name="category"  id="category" class="form-control" required>
                                    <option value="">-- Select Category --</option>                                   
                                        <option value="Billing">Billing</option>
                                        <option value="Subscription">Subscription </option>
                                        <option value="Help Center">Help Center</option>
                                        <option value="How it Works">How it Works</option>
                                        <option value="Horoscope">Horoscope</option>
                                        <option value="Tarrot">Tarrot</option>
                                        <option value="Guide">Guide</option>
                                        <option value="Tarrot">Tarrot</option>
                                   
                                </select>
                                </div>
                            </div>



                            {{-- Buttons --}}
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Save 
                                </button>
                                <a href="{{ url('admin/faq') }}" class="btn btn-secondary">
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
    const form = document.getElementById('FaqForm');
    form.addEventListener('submit', function (e) {
        if (form.question.value.trim() === '') {
            alert('Question is required');
            e.preventDefault();
        }

        if (form.answer.value.trim() === '') {
            alert('Answer is required');
            e.preventDefault();
        }

        if (form.category.value === '') {
            alert('Category is required');
            e.preventDefault();
        }
    });


});


</script>
@endsection
