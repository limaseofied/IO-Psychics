@extends('admin.layout')
@section('title', 'Testimonials')

@section('content')
<div class="page-content">
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Testimonials
                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Testimonial
                </a>
            </h1>
        </div>
    </div>

    {{-- Alerts --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="page-body">
        <div class="widget-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="DataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($testimonials as $index => $t)
                            <tr>
                                 <td>{{ $index + 1 }}</td>
                                <td>{{ $t->name }}</td>
                                <td>{{ Str::limit($t->content, 250) }}</td>
                                <td>
                                    @if($t->status == 'active')
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($t->created_at)->format('F d, Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.testimonials.edit', $t->id) }}" class="btn btn-xs btn-warning">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    <a href="{{ route('admin.testimonials.delete', $t->id) }}"
                                       class="btn btn-xs btn-danger"
                                       onclick="event.preventDefault(); 
                                                if(confirm('Are you sure?')) { document.getElementById('delete-form-{{ $t->id }}').submit(); }">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>

                                    <form id="delete-form-{{ $t->id }}" action="{{ route('admin.testimonials.delete', $t->id) }}" method="POST" style="display:none;">
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