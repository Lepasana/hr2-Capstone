@extends('layouts/layoutMaster')

@section('title', 'Security Service Learning Management - Apps')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Learning Management List</span>
    </h4>

    <div class="">
        <div class="card">
            <div>
                <a href="{{ url('/learning-management/create') }}" class="btn btn-primary px-4 m-4 text-white">Add
                    Exam</a>
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

                <table id="dataTable" class="datatables-learnings table border-top">
                    <thead>
                        <tr>
                            <th class="text-center cell-fit">ID</th>
                            <th class="text-center cell-fit">Title</th>
                            <th class="text-center cell-fit">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exams as $exam)
                            <tr>
                                <td class="text-center">{{ $exam->id }}</td>
                                <td class="text-center">{{ $exam->title }}</td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <div>
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                onclick="location.href = '{{ route('learning-management.show', ['id' => $exam->id]) }}'">View</button>
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-success btn-sm"
                                                onclick="location.href = '{{ route('learning-management.edit', ['id' => $exam->id]) }}'">Edit</button>
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#modal-{{ $exam->id }}"
                                                data-action="{{ route('learning-management.delete', ['id' => $exam->id]) }}">
                                                Delete
                                            </button>
                                        </div>

                                        {{-- MODAL FOR DELETE CONFIRMATION --}}
                                        <x-confirmation-modal
                                            action="{{ route('learning-management.delete', ['id' => $exam->id]) }}"
                                            title="Confirm Deletion" id="{{ $exam->id }}" />
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
