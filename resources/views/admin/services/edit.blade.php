@extends('admin.layout')
@section('title', 'Edit Service')

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
                <a href="{{ url('admin/services') }}">Services</a>
            </li>
            <li class="active">Edit Service</li>
        </ul>
    </div>

    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Services
                <small>
                    <i class="fa fa-angle-right"></i>
                    Edit Service
                </small>
            </h1>
        </div>
    </div>

    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-10">
                <div class="widget radius-bordered">
                    <div class="widget-header bg-primary">
                        <span class="widget-caption text-white">
                            Edit Service
                        </span>
                    </div>

                    <div class="widget-body">

                        {{-- Errors --}}
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.services.update', $service->id) }}" 
                              class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Title --}}
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Title *</label>
                                <div class="col-lg-9">
                                    <input type="text" name="title" class="form-control" 
                                           value="{{ old('title', $service->title) }}" required>
                                </div>
                            </div>

                            {{-- Thumbnail --}}
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Thumbnail</label>
                                <div class="col-lg-9">
                                    <input type="file" name="thumbnail" class="form-control" accept=".jpg,.jpeg,.png">
                                    @if($service->thumbnail)
                                        <img src="{{ asset('public/storage/uploads/services/thumbnail/' . $service->thumbnail) }}" 
                                             alt="Thumbnail" style="max-width:150px; margin-top:10px;">
                                    @endif
                                </div>
                            </div>

                            {{-- Banner --}}
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Banner Image</label>
                                <div class="col-lg-9">
                                    <input type="file" name="banner_image" class="form-control" accept=".jpg,.jpeg,.png">
                                    @if($service->banner_image)
                                        <img src="{{ asset('public/storage/uploads/services/banner/' . $service->banner_image) }}" 
                                             alt="Banner" style="max-width:150px; margin-top:10px;">
                                    @endif
                                </div>
                            </div>

                            {{-- Small Description --}}
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Small Description</label>
                                <div class="col-lg-9">
                                    <textarea name="small_description" class="form-control editor">{{ old('small_description', $service->small_description) }}</textarea>
                                </div>
                            </div>

                            {{-- Full Description --}}
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Full Description</label>
                                <div class="col-lg-9">
                                    <textarea name="full_description" class="form-control editor">{{ old('full_description', $service->full_description) }}</textarea>
                                </div>
                            </div>

                            {{-- Steps --}}
                            <hr>
                            <h4>Steps</h4>
                            <div id="steps-wrapper">
                                @foreach($service->steps as $index => $step)
                                <div class="step-item">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Step Title</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="steps[{{ $index }}][title]" 
                                                   class="form-control" value="{{ old("steps.$index.title", $step->title) }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Step Image</label>
                                        <div class="col-lg-9">
                                            <input type="file" name="steps[{{ $index }}][image]" class="form-control" accept=".jpg,.jpeg,.png">
                                            @if($step->image)
                                                <img src="{{ asset('public/storage/uploads/services/steps/' . $step->image) }}" 
                                                     alt="Step Image" style="max-width:150px; margin-top:10px;">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Step Content</label>
                                        <div class="col-lg-9">
                                            <textarea name="steps[{{ $index }}][content]" class="form-control editor">{{ old("steps.$index.content", $step->content) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="text-center mb-2">
                                        <button type="button" class="btn btn-danger btn-sm remove-step">Remove</button>
                                    </div>
                                    <hr>
                                </div>
                                @endforeach
                            </div>

                            <div class="form-group text-center">
                                <button type="button" class="btn btn-info" id="addStepBtn">+ Add More Step</button>
                            </div>

                            {{-- Final Thoughts --}}
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Final Thoughts</label>
                                <div class="col-lg-9">
                                    <textarea name="final_thoughts" class="form-control editor">{{ old('final_thoughts', $service->final_thoughts) }}</textarea>
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ url('admin/services') }}" class="btn btn-secondary">Back</a>
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
    let stepIndex = {{ $service->steps->count() }};
    const addBtn = document.getElementById('addStepBtn');
    const wrapper = document.getElementById('steps-wrapper');

    addBtn.addEventListener('click', function () {
        // Validation: check last step
        const lastStep = wrapper.querySelector('.step-item:last-child');
        const lastTitle = lastStep.querySelector('input[name$="[title]"]').value.trim();
        const lastContent = lastStep.querySelector('textarea[name$="[content]"]').value.trim();
        if (!lastTitle || !lastContent) {
            alert('Please fill in the last step title and content before adding a new step.');
            return;
        }

        const html = `
        <div class="step-item">
            <div class="form-group">
                <label class="col-lg-3 control-label">Step Title</label>
                <div class="col-lg-9">
                    <input type="text" name="steps[${stepIndex}][title]" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Step Image</label>
                <div class="col-lg-9">
                    <input type="file" name="steps[${stepIndex}][image]" class="form-control" accept="image/*">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Step Content</label>
                <div class="col-lg-9">
                    <textarea name="steps[${stepIndex}][content]" class="form-control editor"></textarea>
                </div>
            </div>
            <div class="text-center mb-2">
                <button type="button" class="btn btn-danger btn-sm remove-step">Remove</button>
            </div>
            <hr>
        </div>
        `;
        wrapper.insertAdjacentHTML('beforeend', html);
        // Initialize Summernote on the new textarea
        $(wrapper).find(`textarea[name="steps[${stepIndex}][content]"]`).summernote({
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['para', ['ul', 'ol']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        });
        stepIndex++;
    });

    // Remove step
    wrapper.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-step')) {
            e.target.closest('.step-item').remove();
        }
    });
});
</script>
@endsection