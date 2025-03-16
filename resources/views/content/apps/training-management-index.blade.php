@extends('layouts/layoutMaster')

@section('title', 'Security Service Training Management - Apps')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Training Management List</span>
    </h4>

    <div class="">
        <div class="card">
            <div class="card-datatable table-responsive p-2">

                @if (session()->has('success'))
                    <x-alert successMessage="{{ session('success') }}" />
                @elseif(session()->has('error'))
                    <x-alert errorMessage="{{ session('error') }}" />
                @endif

                <div>
                    <a href="{{ url('/training-management/create') }}" class="btn btn-primary px-4 m-4 text-white">Add
                        Training</a>
                </div>

                <table id="dataTable" class="datatables-trainings table border-top">
                    <thead>
                        <tr>
                            <th class="text-center cell-fit">Training ID</th>
                            <th class="text-center cell-fit">Training Name</th>
                            <th class="text-center cell-fit">Employee Name</th>
                            <th class="text-center cell-fit">Training Date</th>
                            <th class="text-center cell-fit">Duration</th>
                            <th class="text-center cell-fit">Status</th>
                            <th class="text-center cell-fit">Date Finished</th>
                            <th class="text-center cell-fit">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="training-table-body">
                        @foreach ($trainings as $training)
                            @php
                                $trainingDate = Carbon\Carbon::parse($training->training_date)->format('F d, Y');

                                $completedDate = $training->date_completed
                                    ? Carbon\Carbon::parse($training->date_completed)->format('F d, Y')
                                    : null;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $training->id }}</td>
                                <td class="text-start">{{ $training->training_name }}</td>
                                <td class="text-start">{{ $training->employee->name }}</td>
                                <td class="text-start">{{ $trainingDate }}</td>
                                <td class="text-start">
                                    {{ $training->duration?->title && $training->duration?->title != 1 ? $training->duration?->title . ' Days' : $training->duration?->title . ' Day' }}
                                </td>
                                <td class="text-start">{{ $training->status }}</td>
                                <td class="text-start">{{ $completedDate ?? '' }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div>
                                            <button type="button" class="btn btn-success btn-sm"
                                                onclick="location.href = '{{ route('training-management.edit', ['id' => $training->id]) }}'">Edit</button>
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#modal-{{ $training->id }}"
                                                data-action="{{ route('training-management.delete', ['id' => $training->id]) }}">
                                                Delete
                                            </button>
                                        </div>

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
    @endsection
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            new DataTable('#dataTable'); // Use the correct ID
        });
    </script>
