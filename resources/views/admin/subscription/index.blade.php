@extends('admin.layout')
@section('title', 'Subscription Plans')

@section('content')
<div class="page-content">
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Subscription Plans
                <a href="{{ route('admin.subscription.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Plan
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
                            <th>Duration (Min)</th>
                            <th>Guide Level</th>
                            <th>Price</th>
                            <th>Created On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscription as $index => $p)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->duration_min }}</td>
                                <td>
                                    @php
                                        switch($p->guide_level) {
                                            case 'core':
                                                $badgeClass = 'badge-success';
                                                break;
                                            case 'senior':
                                                $badgeClass = 'badge-warning';
                                                break;
                                            case 'master':
                                                $badgeClass = 'badge-danger';
                                                break;
                                            default:
                                                $badgeClass = 'badge-info';
                                        }
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">
                                        {{ ucfirst($p->guide_level) }}
                                    </span>
                                </td>
                                <td>${{ number_format($p->price, 2) }}</td>
                                <td>{{ \Carbon\Carbon::parse($p->created_at)->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.subscription.edit', $p->id) }}" class="btn btn-xs btn-warning">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    <a href="{{ route('admin.subscription.delete', $p->id) }}"
                                       class="btn btn-xs btn-danger"
                                       onclick="event.preventDefault(); 
                                                if(confirm('Are you sure?')) { document.getElementById('delete-form-{{ $p->id }}').submit(); }">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>

                                    <form id="delete-form-{{ $p->id }}" 
                                          action="{{ route('admin.subscription.delete', $p->id) }}" 
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