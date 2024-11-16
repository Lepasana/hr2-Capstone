@extends('layouts/layoutMaster')
@section('title', 'Security Service Training Management - Apps')
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
                            onclick="location.href = '{{ route('learning-management.show', ['id' => $examId]) }}'">Back</button>
                    </div>
                    <h3>Question: {{ $question->questions }}</h3>

                    <h5>
                        <strong>Options:</strong>

                        <ul class="list-unstyled px-3">
                            @foreach ($question->options as $key => $value)
                                <li>
                                    {{ $key }}.) {{ $value }}
                                </li>
                            @endforeach
                        </ul>
                    </h5>

                    <h5><strong>Correct Answer: </strong> {{ $question->correct_answer }}</h5>
                </div>

                <hr class="mx-5">
            </div>
        </div>
    </div>
@endsection
