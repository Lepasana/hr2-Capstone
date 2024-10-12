@extends('layouts/layoutMaster')

@section('title', 'Security Service Training Management - Apps')

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
            <div class="card-datatable table-responsive">
                @if (session()->has('success'))
                    <div class="alert alert-success m-3">
                        {{ session('success') }}
                    </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger m-3">
                        {{ session('error') }}
                    </div>
                @endif
                <table class="datatables-trainings table border-top">
                    <thead>
                        <tr>
                            <th>Training ID</th>
                            <th>Training Name</th>
                            <th>Employee Name</th>
                            <th>Training Date</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainings as $training)
                            <tr>
                                <td>{{ $training->id }}</td>
                                <td>{{ $training->training_name }}</td>
                                <td>{{ $training->employee->name }}</td>
                                <td>{{ $training->training_date }}</td>
                                <td>{{ $training->duration->title }}</td>
                                <td>{{ $training->status }}</td>
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
