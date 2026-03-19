@extends('admin.layout')
@section('title', 'Daily Horoscope')

@section('content')
<div class="page-content">
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Daily Horoscope
            </h1>
        </div>
    </div>

    {{-- Alerts --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="page-body">
        <div class="widget-body">

            {{-- FILTER --}}
            <form method="GET" class="mb-3">
                <input type="date" name="date" value="{{ $date }}">
                <button class="btn btn-info btn-sm">Filter</button>
                <a href="{{ route('admin.daily.index') }}" class="btn btn-secondary btn-sm">Reset</a>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sign</th>
                            <th>Date</th>
                            <th>Personal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $row)
                            <tr>
                                <td>{{ $data->firstItem() + $index }}</td>
                                <td> {{ $row->sign->name }}</td>
                               <td>{{ \Carbon\Carbon::parse($row->horoscope_date)->format('F d, Y') }}</td>
                                <td>
                                    <b>Personal Life :</b> {{ $row->personal_life }} <br>
                                    <b>Profession :</b> {{ $row->profession }} <br>
                                    <b>Health :</b> {{ $row->health }} <br>
                                    <b>Emotions :</b> {{ $row->emotions }} <br>
                                    <b>Travel :</b> {{ $row->travel }} <br>
                                    <b>Luck :</b> {{ $row->luck }} <br>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4">No data found</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            {{ $data->links() }}

        </div>
    </div>
</div>
@endsection