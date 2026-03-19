@extends('admin.layout')
@section('title', 'Add Service')

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
            <li class="active">Add Service</li>
        </ul>
    </div>

    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Services
                <small>
                    <i class="fa fa-angle-right"></i>
                    Add Service
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
                            Add Service
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

                        <form method="POST" action="{{ route('admin.services.store') }}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            {{-- Title --}}
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Title *</label>
                                <div class="col-lg-9">
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                            </div>

                            {{-- Thumbnail --}}
                           <div class="form-group">
                                <label class="col-lg-3 control-label">Thumbnail</label>
                                <div class="col-lg-9">
                                    <input type="file" name="thumbnail" class="form-control" accept=".jpg,.jpeg,.png">
                                </div>
                            </div>

                            {{-- Banner --}}
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Banner Image</label>
                                <div class="col-lg-9">
                                    <input type="file" name="banner_image" class="form-control" accept=".jpg,.jpeg,.png">
                                </div>
                            </div>

                            {{-- Small Description --}}
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Small Description</label>
                                <div class="col-lg-9">
                                    <textarea name="small_description" id="small_description" class="form-control editor"></textarea>
                                </div>
                            </div>

                            {{-- Full Description --}}
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Full Description</label>
                                <div class="col-lg-9">
                                    <textarea name="full_description" id="full_description" class="form-control editor"></textarea>
                                </div>
                            </div>

                            {{-- Steps --}}
                            <hr>
                            <h4>Steps</h4>

                            <div id="steps-wrapper">
                                <div class="step-item">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Step Title</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="steps[0][title]" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Step Image</label>
                                        <div class="col-lg-9">
                                           <input type="file" name="steps[0][image]" class="form-control" accept=".jpg,.jpeg,.png">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Step Content</label>
                                        <div class="col-lg-9">
                                            <textarea name="steps[0][content]" class="form-control editor"></textarea>
                                        </div>
                                    </div>

                                    <hr>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button type="button" class="btn btn-info" id="addStepBtn">+ Add More Step</button>
                            </div>

                            {{-- Final Thoughts --}}
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Final Thoughts</label>
                                <div class="col-lg-9">
                                    <textarea name="final_thoughts" class="form-control editor"></textarea>
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-success">
                                    Save
                                </button>
                                <a href="{{ url('admin/services') }}" class="btn btn-secondary">
                                    Back
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

    let stepIndex = 1;

    const addBtn = document.getElementById('addStepBtn');
    const wrapper = document.getElementById('steps-wrapper');

    addBtn.addEventListener('click', function () {

        // Validate existing steps before adding a new one
        const stepItems = wrapper.querySelectorAll('.step-item');
        for (let i = 0; i < stepItems.length; i++) {
            const title = stepItems[i].querySelector(`input[name^="steps"][name$="[title]"]`);
            const image = stepItems[i].querySelector(`input[name^="steps"][name$="[image]"]`);
            const content = stepItems[i].querySelector(`textarea[name^="steps"][name$="[content]"]`);

            if (!title.value.trim() || !image.value.trim() || !content.value.trim()) {
                alert('Please fill all fields in existing steps before adding a new one.');
                return; // Stop adding new step
            }
        }

        // All existing steps are filled, add new step
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
                    <input type="file" name="steps[${stepIndex}][image]" class="form-control" accept=".jpg,.jpeg,.png">
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

         // Initialize CKEditor on the new textarea
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

    // REMOVE step (event delegation)
    wrapper.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-step')) {
            e.target.closest('.step-item').remove();
        }
    });

});
</script>
@endsection