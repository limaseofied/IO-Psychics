@extends('admin.layout')
@section('title', 'Services')

@section('content')
<div class="page-content">
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Services
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Service
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
                            <th>Title</th>
                            <th>Thumbnail</th>
                            <th>Banner</th>
                            <th>Created On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $index => $s)
                            <tr>
                                <td>{{ $services->firstItem() + $index }}</td>

                                <td>{{ $s->title }}</td>

                                {{-- Thumbnail --}}
                                <td>
                                    @if($s->thumbnail)
                                        <img src="{{ asset($s->thumbnail) }}" width="60">
                                    @else
                                        N/A
                                    @endif
                                </td>

                                {{-- Banner --}}
                                <td>
                                    @if($s->banner_image)
                                        <img src="{{ asset($s->banner_image) }}" width="80">
                                    @else
                                        N/A
                                    @endif
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($s->created_at)->format('F d, Y') }}
                                </td>

                                <td>
                                    <a href="{{ route('admin.services.edit', $s->id) }}" class="btn btn-xs btn-warning">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    <a href="{{ route('admin.services.delete', $s->id) }}"
                                       class="btn btn-xs btn-danger"
                                       onclick="event.preventDefault(); 
                                                if(confirm('Are you sure?')) { document.getElementById('delete-form-{{ $s->id }}').submit(); }">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>

                                    <form id="delete-form-{{ $s->id }}" 
                                          action="{{ route('admin.services.delete', $s->id) }}" 
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