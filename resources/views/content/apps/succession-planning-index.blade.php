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
        <div>
            <a href="{{ url('/succession-planning/create') }}" class="btn btn-primary px-4 m-4 text-white">Add Successor</a>
        </div>
        <div class="card-datatable table-responsive p-2">
            @if (session()->has('success'))
                <x-alert successMessage="{{ session('success') }}" />
            @elseif(session()->has('error'))
                <x-alert errorMessage="{{ session('error') }}" />
            @endif

            {{-- Filter --}}
            <div class="d-flex justify-content-end w-100">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="menu-icon tf-icons ti ti-filter" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-title="Filter Succession Planning" />
                    </button>
                    <ul class="dropdown-menu p-3 w-100">
                        <li class="w-100">
                            <!-- Status Filter -->
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" value="{{ old('status') }}" required>
                                <option value="{{ old('status') ?? '' }}" selected>
                                    Select an option</option>
                                @foreach ($statusEnums as $statusEnum)
                                    <option value="{{ $statusEnum }}">{{ $statusEnum }}</option>
                                @endforeach
                            </select>
                        </li>
                    </ul>
                </div>
            </div>

            <table id="dataTable" class="invoice-list-table table border-top">
                <thead>
                    <tr>
                        <th class="text-center cell-fit">Employee ID</th>
                        <th class="text-center cell-fit">Employee Name</th>
                        <th class="text-center cell-fit">Current Position</th>
                        <th class="text-center cell-fit">Department</th>
                        <th class="text-center cell-fit">Status</th>
                        <th class="cell-fit">Actions</th>
                    </tr>
                </thead>
                <tbody id="succession-planning-table-body">
                    @include('content.apps.partials.succession-planning-table')
                </tbody>
            </table>
        </div>
    </div>

@endsection
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    $(document).ready(function() {
        let dataTable = new DataTable('#dataTable');

        function filterReports() {
            let status = $('#status').val();

            $.ajax({
                url: "{{ route('succession-planning') }}",
                method: "GET",
                data: {
                    status: status,
                },
                success: function(response) {
                    $('#succession-planning-table-body').html(response.html);
                }
            });
        }

        // Trigger AJAX on filter change
        $('#status').on('change', function() {
            filterReports();
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                let actionUrl = this.getAttribute('data-action');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: "Yes, delete it!",
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        let form = document.createElement('form');
                        form.method = 'POST';
                        form.action = actionUrl;
                        form.innerHTML = `
                            @csrf
                            @method('DELETE')
                        `;
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });
    });
</script>
