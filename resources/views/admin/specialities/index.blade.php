@extends('admin.layout')
@section('title', 'Specialities')

@section('content')
<div class="page-content">
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Specialities
                <a href="{{ route('admin.specialities.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Specialities
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
                        <th>Image</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($speciality as $index => $s)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $s->name }}</td>
                              <td>
                                 @if($s->image)
                                    <img src="{{ asset('public/storage/uploads/specialities/'.$s->image) }}" width="60">
                                @endif

                            </td>
                            <td>{{ \Carbon\Carbon::parse($s->created_at)->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('admin.specialities.edit', $s->id) }}" class="btn btn-xs btn-warning">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                                <a href="{{ route('admin.specialities.delete', $s->id) }}"
                                   class="btn btn-xs btn-danger"
                                   onclick="event.preventDefault(); 
                                            if(confirm('Are you sure?')) { document.getElementById('delete-form-{{ $s->id }}').submit(); }">
                                    <i class="fa fa-trash"></i> Delete
                                </a>

                                <form id="delete-form-{{ $s->id }}" action="{{ route('admin.specialities.delete', $s->id) }}" method="POST" style="display:none;">
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
