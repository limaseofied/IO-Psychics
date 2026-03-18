@extends('admin.layout')
@section('title', 'Pay Per Session Plans')

@section('content')
<div class="page-content">

    <!-- Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Pay Per Session Plans
                <a href="{{ route('admin.pay-per-session.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Plan
                </a>
            </h1>
        </div>
    </div>

    {{-- Alerts --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible show">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success alert-dismissible show">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Body -->
    <div class="page-body">
        <div class="widget-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="DataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Duration (Minutes)</th>
                            <th>Price (₹)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plans as $index => $p)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $p->duration_min }}</td>
                                <td>₹ {{ number_format($p->price, 2) }}</td>
                                <td>
                                    <a href="{{ route('admin.pay-per-session.edit', $p->id) }}"
                                       class="btn btn-xs btn-warning">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    <a href="#"
                                       class="btn btn-xs btn-danger"
                                       onclick="event.preventDefault();
                                                if(confirm('Are you sure?')) {
                                                    document.getElementById('delete-form-{{ $p->id }}').submit();
                                                }">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>

                                    <form id="delete-form-{{ $p->id }}"
                                          action="{{ route('admin.pay-per-session.delete', $p->id) }}"
                                          method="POST"
                                          style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @if($plans->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center">No plans found</td>
                            </tr>
                        @endif

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