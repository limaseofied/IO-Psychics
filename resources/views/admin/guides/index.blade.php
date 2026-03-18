@extends('admin.layout')
@section('title', 'Guides')

@section('content')
<div class="page-content">
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Guides
                <a href="{{ route('admin.guides.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Guide
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Guide Level</th>
                            <th>Price/Min</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($guides as $index => $g)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $g->name }}</td>
                            <td>{{ $g->email }}</td>
                            <td>{{ $g->phone }}</td>
                            <td>{{ $g->guide_level }}</td>
                            <td>₹ {{ number_format($g->price_per_min, 2) }}</td>
                            <td>
                                {{ $g->status ? 'Active' : 'Inactive' }}
                            </td>
                            <td>
                                <a href="{{ route('admin.guides.edit', $g->id) }}" class="btn btn-xs btn-warning">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                                <a href="{{ route('admin.guides.delete', $g->id) }}"
                                   class="btn btn-xs btn-danger"
                                   onclick="event.preventDefault(); 
                                            if(confirm('Are you sure?')) { 
                                                document.getElementById('delete-form-{{ $g->id }}').submit(); 
                                            }">
                                    <i class="fa fa-trash"></i> Delete
                                </a>

                                <form id="delete-form-{{ $g->id }}"
                                      action="{{ route('admin.guides.delete', $g->id) }}"
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

<script>
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(alert => alert.remove());
    }, 5000);
</script>
@endsection