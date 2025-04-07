@extends('layouts/layoutMaster')

@section('title', 'Competency Management - Apps')

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

@section('content')
    <style>
        .notes-cell {
            max-height: 40px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Competency Management List</span>
    </h4>

    <div class="container mt-5">
        <div class="card">
            <div>
                <a href="{{ url('/competency-management/create') }}" class="btn btn-primary px-4 m-4 text-white">Add
                    Competency</a>
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
                        <span>Filter</span>
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="menu-icon tf-icons ti ti-filter" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="Filter Training reports" />
                        </button>
                        <ul class="dropdown-menu p-3">
                            <li>
                                <!-- Department Filter -->
                                <div class="mb-2">
                                    <label for="to" class="form-label">Department</label>
                                    <select name="department" id="department" class="form-select">
                                        <option value="" selected>Select an option</option>
                                        @foreach ($departmentEnums as $departmentEnum)
                                            <option value="{{ $departmentEnum }}">{{ $departmentEnum }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <table id="dataTable" class="datatables-competencies table border-top">
                    <thead>
                        <tr>
                            <th class="text-center cell-fit">Employee ID</th>
                            <th class="text-center cell-fit">Employee Name</th>
                            <th class="text-center cell-fit">Job Position</th>
                            <th class="text-center cell-fit">Department</th>
                            <th class="text-center cell-fit">Skill Level</th>
                            <th class="text-center cell-fit">Status</th>
                            <th class="text-center cell-fit">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="competency-table-body">
                        @include('content.apps.partials.competency-table')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            new DataTable('#dataTable'); // Use the correct ID
        });

        $(document).ready(function() {
            let dataTable = new DataTable('#dataTable'); // Initialize DataTable

            function filterReports() {
                let department = $('#department').val();

                $.ajax({
                    url: "{{ route('competency-management') }}",
                    method: "GET",
                    data: {
                        department: department,
                    },
                    success: function(response) {
                        $('#competency-table-body').html(response.html);
                    }
                });
            }

            // Trigger AJAX on filter change
            $('#department').on('change', function() {
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
@endsection
