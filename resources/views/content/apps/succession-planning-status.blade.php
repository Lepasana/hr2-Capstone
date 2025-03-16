@extends('layouts/layoutMaster')

@section('title', 'Succession Planning')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss', 'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/moment/moment.js', 'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'])
@endsection

@section('page-script')
    {{-- @vite('resources/assets/js/app-invoice-list.js') --}}
@endsection
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Succession Planning List</span>
    </h4>

    <!-- Invoice List Table -->
    <div class="card">
        <div class="card-datatable table-responsive p-2">
            <table id="dataTable" class="invoice-list-table table border-top">
                <thead>
                    <tr>
                        <th class="text-center cell-fit">Employee ID</th>
                        <th class="text-center cell-fit">Employee Name</th>
                        <th class="text-center cell-fit">Current Position</th>
                        <th class="text-center cell-fit">Department</th>
                        <th class="text-center cell-fit">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($successors as $successor)
                        <tr>
                            <td class="text-center">{{ $successor->employee->id }}</td>
                            <td class="text-start">{{ $successor->employee->name }}</td>
                            <td class="text-start">{{ $successor->current_position }}</td>
                            <td class="text-start">{{ $successor->department }}</td>
                            <td class="text-start">{{ $successor->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    $(document).ready(function() {
        new DataTable('#dataTable'); // Use the correct ID
    });
</script>
