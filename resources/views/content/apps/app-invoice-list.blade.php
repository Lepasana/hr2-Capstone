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

@section('content')
    <h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Succession Planning List</span>
    </h4>

    <!-- Invoice List Table -->
    <div class="card">
        <div>
            <a href="{{ url('/succession-planning/create') }}" class="btn btn-primary px-4 m-4 text-white">Add Successor</a>
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
            <table class="invoice-list-table table border-top">
                <thead>
                    <tr>
                        <th class="text-center cell-fit">Employee ID</th>
                        <th class="text-center cell-fit">Employee Name</th>
                        <th class="text-center cell-fit">Current Position</th>
                        <th class="text-center cell-fit">Potential Successor(s)</th>
                        <th class="text-center cell-fit">Development Needs</th>
                        <th class="text-center cell-fit">Readiness Level</th>
                        <th class="cell-fit">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($successors as $successor)
                        <tr>
                            <td>{{ $successor->employee->id }}</td>
                            <td>{{ $successor->employee->name }}</td>
                            <td>{{ $successor->current_position }}</td>
                            <td>{{ $successor->potential_successor }}</td>
                            <td>{{ $successor->development_needs }}</td>
                            <td>{{ $successor->readiness_level }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <div>
                                        <button type="button" class="btn btn-success btn-sm"
                                            onclick="location.href = '{{ route('succession-planning.edit', ['id' => $successor->id]) }}'">Edit</button>
                                    </div>

                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#modal-{{ $successor->id }}"
                                            data-action="{{ route('succession-planning.delete', ['id' => $successor->id]) }}">
                                            Delete
                                        </button>
                                    </div>

                                    {{-- MODAL FOR DELETE CONFIRMATION --}}
                                    <x-confirmation-modal
                                        action="{{ route('succession-planning.delete', ['id' => $successor->id]) }}"
                                        title="Confirm Deletion" id="{{ $successor->id }}"
                                    />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
