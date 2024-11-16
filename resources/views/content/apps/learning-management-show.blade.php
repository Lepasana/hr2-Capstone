@extends('layouts/layoutMaster')

@section('title', 'Security Service Training Management - Apps')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Learning Management List</span>
    </h4>

    <div class="">
        <div class="card">
            <div class="card-datatable table-responsive">
                <div class="p-5">
                    <div class="w-full mb-3">
                        <button class="btn btn-secondary btn-sm"
                            onclick="location.href = '{{ url('learning-management') }}'">Back</button>
                    </div>
                    <h3>Exam Title: <strong>{{ $exam->title }}</strong></h3>
                </div>

                <hr class="mx-5">

                <div class="px-5">
                    <div>
                        <a href="{{ route('learning-management.question.create', ['examId' => $exam->id]) }}"
                            class="btn btn-primary px-4 m-4 text-white">Add
                            Question</a>
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

                        <table id="dataTable2" class="datatables-learnings table border-top">
                            <thead>
                                <tr>
                                    <th class="text-center cell-fit">ID</th>
                                    <th class="text-center cell-fit">Question</th>
                                    <th class="text-center cell-fit">Correct Answer</th>
                                    <th class="text-center cell-fit">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td class="text-center">{{ $question->id }}</td>
                                        <td class="text-center">{{ $question->questions }}</td>
                                        <td class="text-center">{{ $question->correct_answer }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">
                                                <div>
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        onclick="location.href = '{{ route('learning-management.question.show', ['examId' => $exam->id, 'questionId' => $question->id]) }}'">View</button>
                                                </div>

                                                <div>
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        onclick="location.href = '{{ route('learning-management.question.edit', ['examId' => $exam->id, 'questionId' => $question->id]) }}'">Edit</button>
                                                </div>

                                                <div>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#modal-{{ $question->id }}"
                                                        data-action="{{ route('learning-management.question.delete', ['id' => $question->id]) }}">
                                                        Delete
                                                    </button>
                                                </div>

                                                {{-- MODAL FOR DELETE CONFIRMATION --}}
                                                <x-confirmation-modal
                                                    action="{{ route('learning-management.question.delete', ['id' => $question->id]) }}"
                                                    title="Confirm Deletion" id="{{ $question->id }}" />
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    $(document).ready(function() {
        new DataTable('#dataTable2'); // Use the correct ID
    });
</script>
