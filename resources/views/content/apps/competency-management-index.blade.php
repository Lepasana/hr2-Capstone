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

                <table id="dataTable" class="datatables-competencies table border-top">
                    <thead>
                        <tr>
                            <th class="text-center cell-fit">Employee ID</th>
                            <th class="text-center cell-fit">Employee Name</th>
                            <th class="text-center cell-fit">Job Position</th>
                            <th class="text-center cell-fit">Department</th>
                            <th class="text-center cell-fit">Skill Level</th>
                            <th class="text-center cell-fit">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($competencies as $competency)
                            <tr>
                                <td class="text-center">{{ $competency->employee->id }}</td>
                                <td class="text-center">{{ $competency->employee->name }}</td>
                                <td class="text-center">{{ $competency->jobRequest->job_title }}</td>
                                <td class="text-center">{{ $competency->department }}</td>
                                <td class="text-center">{{ $competency->skill_level }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div>
                                            <button type="button" class="btn btn-success btn-sm"
                                                onclick="location.href = '{{ route('competency-management.edit', ['id' => $competency->id]) }}'">Edit</button>
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-danger btn-sm delete-button"
                                                data-action="{{ route('competency-management.delete', ['id' => $competency->id]) }}">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
