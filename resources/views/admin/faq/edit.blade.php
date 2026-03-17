@extends('admin.layout')
@section('title', 'Edit FAQ')

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
            <li class="active">Edit FAQ</li>
        </ul>
    </div>

    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
               FAQ
                <small>
                    <i class="fa fa-angle-right"></i>
                    Edit FAQ
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
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget radius-bordered">
                    <div class="widget-header">
                        <span class="widget-caption">Edit FAQ</span>
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
                              action="{{ route('admin.faq.update', $faq->id) }}"
                              class="form-horizontal">

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
                                           value="{{ old('question',$faq->question) }}"
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

                                     <textarea name="answer" id="answer" class="form-control editor">{{ old('answer',$faq->answer) }}</textarea>
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
                                        <option value="Billing" {{($faq->category=='Billing') ? 'selected' : ''}}>Billing</option>
                                        <option value="Subscription" {{($faq->category=='Billing') ? 'selected' : ''}}>Subscription </option>
                                        <option value="Help Center" {{($faq->category=='Billing') ? 'selected' : ''}}>Help Center</option>
                                        <option value="How it Works" {{($faq->category=='How it Works') ? 'selected' : ''}}>How it Works</option>
                                        <option value="Horoscope" {{($faq->category=='Billing') ? 'selected' : ''}}>Horoscope</option>
                                        <option value="Tarrot" {{($faq->category=='Billing') ? 'selected' : ''}}>Tarrot</option>
                                        <option value="Guide" {{($faq->category=='Billing') ? 'selected' : ''}}>Guide</option>
                                        <option value="Tarrot" {{($faq->category=='Billing') ? 'selected' : ''}}>Tarrot</option>
                                   
                                </select>
                                </div>
                            </div>


                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Update                                 </button>
                                <a href="{{ url('admin/tools') }}" class="btn btn-default">
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

<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById('FaqForm');
    form.addEventListener('submit', function (e) {
        if (form.question.value.trim() === '') {
            alert('Question is required');
            e.preventDefault();
        }

        if (form.category.value === '') {
            alert('Category is required');
            e.preventDefault();
        }

        let content = $('#answer').summernote('code').trim();

        // Remove HTML tags
        let text = content.replace(/<[^>]*>/g, '').trim();

        if (text.length === 0) {
            alert('Answer is required');
            e.preventDefault();
            return false;
        }


    });


});


</script>
@endsection
