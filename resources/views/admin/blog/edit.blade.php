@extends('admin.layout')
@section('title', 'Edit Blog')

@section('content')
<div class="page-content">
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li><i class="fa fa-home"></i> <a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li><a href="{{ route('admin.blog.index') }}">Blog Master</a></li>
            <li class="active">Edit Blog</li>
        </ul>
    </div>

    <div class="page-body">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="widget radius-bordered">
                    <div class="widget-header bg-primary">
                        <span class="widget-caption text-white"><i class="fa fa-pencil"></i> Edit Blog</span>
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

                        <form method="POST" action="{{ route('admin.blog.update', $blog->id) }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
                            </div>

                            {{-- Category --}}
                            <div class="form-group">
                                <label>Category <span class="text-danger">*</span></label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Content --}}
                            <div class="form-group">
                                <label>Content <span class="text-danger">*</span></label>
                                <textarea name="content" class="form-control" rows="6" required>{{ old('content', $blog->content) }}</textarea>
                            </div>

                            {{-- Image --}}
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                                @if($blog->image)
                                    <br>
                                    <img src="{{ asset('storage_public/uploads/blog/'.$blog->image) }}" width="100">
                                @endif
                            </div>

                            {{-- Status --}}
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $blog->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $blog->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            {{-- Buttons --}}
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update Blog</button>
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
