@extends('layouts/layoutMaster')

@section('title', 'Security Service Training Management - Apps')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Training Management List</span>
    </h4>

    <div class="">
        <div class="card">
            <div>
                <a href="{{ url('/training-management/create') }}" class="btn btn-primary px-4 m-4 text-white">Add
                    Training</a>
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
                <table id="dataTable" class="datatables-trainings table border-top">
                    <thead>
                        <tr>
                            <th class="text-center cell-fit">Training ID</th>
                            <th class="text-center cell-fit">Training Name</th>
                            <th class="text-center cell-fit">Employee Name</th>
                            <th class="text-center cell-fit">Training Date</th>
                            <th class="text-center cell-fit">Duration</th>
                            <th class="text-center cell-fit">Status</th>
                            <th class="text-center cell-fit">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainings as $training)
                            <tr>
                                <td class="text-center">{{ $training->id }}</td>
                                <td class="text-start">{{ $training->training_name }}</td>
                                <td class="text-start">{{ $training->employee->name }}</td>
                                <td class="text-start">{{ $training->training_date }}</td>
                                <td class="text-start">{{ $training->duration->title }}</td>
                                <td class="text-start">{{ $training->status }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div>
                                            <button type="button" class="btn btn-success btn-sm"
                                                onclick="location.href = '{{ route('training-management.edit', ['id' => $training->id]) }}'">Edit</button>
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#modal-{{ $training ->id }}"
                                                data-action="{{ route('training-management.delete', ['id' => $training ->id]) }}">
                                                Delete
                                            </button>
                                        </div>

                                        {{-- MODAL FOR DELETE CONFIRMATION --}}
                                        <x-confirmation-modal
                                            action="{{ route('training-management.delete', ['id' => $training->id]) }}"
                                            title="Confirm Deletion" id="{{ $training->id }}" />
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
