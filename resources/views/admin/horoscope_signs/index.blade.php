@extends('admin.layout')
@section('title', 'Horoscope Sign')

@section('content')
<div class="page-content">
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Horoscope Sign
                <a href="{{ route('admin.signs.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Horoscope Sign
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
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Icon</th>
                    <th>Image</th>
                    <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($signs as $index => $sign)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $sign->name }}</td>
                            <td>{{ $sign->slug }}</td>
                            <td>
                                 @if($sign->icon)
                                    <img src="{{ asset('public/storage/uploads/horoscope_icon/'.$sign->icon) }}" width="60">
                                @endif

                            </td>

                             <td>
                                 @if($sign->image)
                                    <img src="{{ asset('public/storage/uploads/horoscope_image/'.$sign->image) }}" width="60">
                                @endif

                            </td>
                            <td>
                                <a href="{{ route('admin.signs.edit',$sign->sign_id) }}"
                                   class="btn btn-xs btn-warning">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('admin.signs.destroy',$sign->sign_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-xs btn-danger"
                                        onclick="return confirm('Are you sure to delete this sign?')">
                                        Delete
                                    </button>
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
