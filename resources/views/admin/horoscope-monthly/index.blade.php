@extends('admin.layout')
@section('title', 'Monthly Horoscope')

@section('content')
<div class="page-content">
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Monthly Horoscope
            </h1>
        </div>
    </div>

    <div class="page-body">
        <div class="widget-body">

            {{-- FILTER --}}
            <form method="GET" class="mb-3">
                <select name="month">
                    @for($i=1; $i<=12; $i++)
                        <option value="{{ $i }}" {{ $month == $i ? 'selected' : '' }}>
                            {{ date('F', mktime(0,0,0,$i,1)) }}
                        </option>
                    @endfor
                </select>

                <input type="number" name="year" value="{{ $year }}">

                <button class="btn btn-info btn-sm">Filter</button>
                <a href="{{ route('admin.monthly.index') }}" class="btn btn-secondary btn-sm">Reset</a>
            </form>

            
            <div align="right">
              {{ $data->links() }}
            </div>


            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sign</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Prediction</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $row)
                            <tr>
                                <td>{{ $data->firstItem() + $index }}</td>
                                <td> {{ $row->sign->name }}</td>
                                <td>{{ date('F', mktime(0, 0, 0, $row->month, 1)) }}</td>
                                <td>{{ $row->year }}</td>
                                <td>
                                    @if(!empty($row->prediction))
                                        @php
                                            $paragraphs = json_decode($row->prediction, true);
                                        @endphp

                                        @if(is_array($paragraphs))
                                            @foreach($paragraphs as $para)
                                                <p>{{ $para }}</p>
                                            @endforeach
                                        @else
                                            {{-- If it's not an array, just print the raw content --}}
                                            <p>{{ $row->prediction }}</p>
                                        @endif
                                    @else
                                        <p>No prediction available.</p>
                                    @endif

                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5">No data found</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div align="right">

            {{-- PAGINATION --}}
            {{ $data->links() }}
            </div>

        </div>
    </div>
</div>
@endsection