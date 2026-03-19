@extends('admin.layout')
@section('title', 'Guides')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 20px;
}
.switch input { display: none; }
.slider {
  position: absolute;
  cursor: pointer;
  background-color: #ccc;
  transition: .4s;
  border-radius: 20px;
  top: 0; left: 0; right: 0; bottom: 0;
}
.slider:before {
  position: absolute;
  content: "";
  height: 14px; width: 14px;
  left: 3px; bottom: 3px;
  background-color: white;
  transition: .4s;
  border-radius: 50%;
}
input:checked + .slider {
  background-color: #28a745;
}
input:checked + .slider:before {
  transform: translateX(20px);
}
</style>
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
                            <th>Profile Image</th>
                            <th>Guide Level</th>
                            <th>Price/Min</th>
                            <th>Display In Home</th>
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
                            <td>
                                 @if($g->profile_image)
                                    <img src="{{ asset('public/storage/uploads/guide_profile/'.$g->profile_image) }}" width="60">
                                @endif

                            </td>
                               <td>
                                    @php
                                        switch($g->guide_level) {
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
                                        {{ ucfirst($g->guide_level) }}
                                    </span>
                                </td>
                            <td>$ {{ number_format($g->price_per_session, 2) }}</td>

                            <td>
                                <label class="switch">
                                    <input type="checkbox" 
                                        class="toggle-display" 
                                        data-id="{{ $g->id }}"
                                        {{ $g->display_in_home ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                             <td>
                                @if($g->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
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

<script>
document.querySelectorAll('.toggle-display').forEach(function(el) {
    el.addEventListener('change', function() {
        let guideId = this.dataset.id;
        let status = this.checked ? 1 : 0;

        fetch("{{ route('admin.guides.toggleDisplay') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                id: guideId,
                display_in_home: status
            })
        })
        .then(res => res.json())
        .then(data => {
            console.log(data);
        })
        .catch(err => console.error(err));
    });
});
</script>
@endsection