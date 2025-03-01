@extends('layouts/layoutMaster')

@section('title', 'Security Service Learning Management - Apps')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">


@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Applicant List</span>
    </h4>

    <div class="">
        <div class="card">
            <div class="card-datatable table-responsive p-2">
                @if (session()->has('success'))
                    <x-alert successMessage="{{ session('success') }}" />
                @elseif(session()->has('error'))
                    <x-alert errorMessage="{{ session('error') }}" />
                @endif

                <table id="dataTable" class="datatables-learnings table border-top">
                    <thead>
                        <tr>
                            <th class="text-center cell-fit">ID</th>
                            <th class="text-center cell-fit">Applicant</th>
                            <th class="text-center cell-fit">Exam Title</th>
                            <th class="text-center cell-fit">Score</th>
                            <th class="text-center cell-fit">Duration</th>
                            <th class="text-center cell-fit">Date Finished</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applicantScores as $applicantScore)
                            <tr>
                                <td class="text-center">{{ $applicantScore->id }}</td>
                                <td class="text-start">{{ $applicantScore->applicant->name }}</td>
                                <td class="text-start">{{ $applicantScore->examination?->title }}</td>
                                <td class="text-center">{{ $applicantScore->score }}</td>
                                <td class="text-center">{{ $applicantScore->duration }}</td>
                                <td class="text-center">{{ $applicantScore->created_at->format('F d, Y') }}</td>
                                {{-- <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <div>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#modal-{{ $applicantScore->id }}"
                                                data-action="{{ route('applicant-score.delete', ['id' => $applicantScore->id]) }}">
                                                Delete
                                            </button>
                                        </div>

                                        <x-confirmation-modal
                                            action="{{ route('applicant-score.delete', ['id' => $applicantScore->id]) }}"
                                            title="Confirm Deletion" id="{{ $applicantScore->id }}" />
                                    </div>
                                </td> --}}
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
