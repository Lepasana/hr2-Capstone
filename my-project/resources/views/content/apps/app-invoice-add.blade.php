@extends('layouts/layoutMaster')

@section('title', 'Succession Planning')

@section('vendor-style')
@vite('resources/assets/vendor/libs/flatpickr/flatpickr.scss')
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/flatpickr/flatpickr.js',
  'resources/assets/vendor/libs/cleavejs/cleave.js',
  'resources/assets/vendor/libs/cleavejs/cleave-phone.js',
  'resources/assets/vendor/libs/jquery-repeater/jquery-repeater.js'
])
@endsection

@section('content')

<div class="">
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-succession table border-top">
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Current Position</th>
                        <th>Potential Successor(s)</th>
                        <th>Development Needs</th>
                        <th>Readiness Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example rows, to be dynamically generated based on succession planning data -->
                    @for ($i = 1; $i <= 20; $i++)
                    <tr>
                        <td>{{ sprintf('%03d', $i) }}</td>
                        <td>Employee {{ $i }}</td>
                        <td>Position {{ $i }}</td>
                        <td>Successor {{ $i }}</td>
                        <td>Training Need {{ $i }}</td>
                        <td>{{ $i % 2 == 0 ? 'Ready Now' : '1 Year' }}</td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-primary me-2">View</button>
                                <button class="btn btn-danger">Remove</button>
                            </div>
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
