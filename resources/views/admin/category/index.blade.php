@extends('admin.layout')
@section('title', 'Category Master')

@section('content')
<div class="page-content">
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Category Master
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Category
                </a>
            </h1>
        </div>
    </div>

    {{-- Alerts --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible show" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success alert-dismissible show" role="alert">
            {{ session('success') }}
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

    <div class="page-body">        
        <div class="widget-body">

        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="DataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categories as $index => $category)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>

                            <td>
                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                   class="btn btn-xs btn-warning">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                                <a href="{{ route('admin.category.delete', $category->id) }}"
                                   class="btn btn-xs btn-danger"
                                   onclick="return confirm('Are you sure you want to delete this category?')"
                                   onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();">
                                    <i class="fa fa-trash"></i> Delete
                                </a>

                                <form id="delete-form-{{ $category->id }}"
                                      action="{{ route('admin.category.delete', $category->id) }}"
                                      method="POST"
                                      style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection

{{-- Auto hide alerts --}}
<script>
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => alert.remove());
    }, 5000);
</script>
