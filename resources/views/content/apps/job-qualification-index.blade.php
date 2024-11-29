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
                <a href="{{ url('/job-qualification/create') }}" class="btn btn-primary px-4 m-4 text-white">Add
                    Job Qualifications</a>
            </div>
            <div class="card-datatable table-responsive p-2">
                @if (session()->has('success'))
                    <div class="alert alert-success m-3">
                        {{ session('success') }}
                    </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger m-3">
                        {{ session('error') }}
                    </div>
                @endif

                <table id="dataTable" class="datatables-competencies table border-top">
                    <thead>
                        <tr>
                            <th class="text-center cell-fit">Content</th>
                            <th class="text-center cell-fit">Date Added</th>
                            <th class="text-center cell-fit">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($qualifications as $qualification)
                            <tr>
                                <td class="text-center d-inline-block text-truncate" style="max-width: 250px;">
                                    {{ $qualification->content }}</td>
                                <td class="text-center">{{ $qualification->created_at->format('m/d/Y h:i A (T)') }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div>
                                            <button type="button" class="btn btn-success btn-sm"
                                                onclick="location.href = '{{ route('job-qualification.edit', ['id' => $qualification->id]) }}'">Edit</button>
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#modal-{{ $qualification->id }}"
                                                data-action="{{ route('competency-management.delete', ['id' => $qualification->id]) }}">
                                                Delete
                                            </button>
                                        </div>

                                        <x-confirmation-modal
                                            action="{{ route('job-qualification.delete', ['id' => $qualification->id]) }}"
                                            title="Confirm Deletion" id="{{ $qualification->id }}" />
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
