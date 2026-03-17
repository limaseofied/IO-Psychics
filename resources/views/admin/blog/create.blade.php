@extends('admin.layout')
@section('title', 'Add Blog')

@section('content')
<div class="page-content">
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Blog Master
                <small><i class="fa fa-angle-right"></i> Add Blog</small>
            </h1>
        </div>
    </div>

    <div class="page-body">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="widget radius-bordered">
                    <div class="widget-header bg-primary">
                        <span class="widget-caption text-white"><i class="fa fa-pencil"></i> Add Blog</span>
                    </div>
                    <div class="widget-body">

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- Title --}}
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ old('title') }}" required>
                            </div>

                            {{-- Category --}}
                            <div class="form-group">
                                <label>Category <span class="text-danger">*</span></label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Content --}}
                            <div class="form-group">
                                <label>Content <span class="text-danger">*</span></label>
                                <textarea name="content" class="form-control" rows="6" placeholder="Enter Content" required>{{ old('content') }}</textarea>
                            </div>

                            {{-- Image --}}
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            {{-- Status --}}
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            {{-- Buttons --}}
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save Blog</button>
                                <a href="{{ route('admin.blog.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
