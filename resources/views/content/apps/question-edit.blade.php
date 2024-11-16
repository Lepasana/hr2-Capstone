@extends('layouts/layoutMaster')

@section('title', 'Security Service Training Management - Apps')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Learning Management List</span>
    </h4>

    <div class="">
        <div class="card">
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
                <div class="p-5">
                    <form
                        action="{{ route('learning-management.question.update', ['examId' => $examId, 'questionId' => $question->id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')

                        <div class="col-md-12">
                            <label for="" class="form-label">Question</label>
                            <input type="text" name="questions" id="questions" class="form-control"
                                value="{{ $question->questions ?? old('questions') }}" required>

                            @if ($errors->has('questions'))
                                <div class="text-danger">
                                    {{ $errors->first('questions') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mt-3 border p-2">
                            <label class="form-label">Options</label>
                            <div id="key-value-container">
                                @foreach ($question->options as $key => $value)
                                    <div class="key-value-pair d-flex gap-2">
                                        <div class="col-md-4 my-2">
                                            <input type="text" name="key[]" placeholder="Items (e.g: a, b, c, ...)"
                                                class="form-control" value="{{ $key }}" required>
                                        </div>
                                        <div class="col-md-4 my-2">
                                            <input type="text" name="value[]" placeholder="Option Value"
                                                class="form-control" value="{{ $value }}" required>
                                        </div>
                                        <div class="col-md-4 my-2">
                                            <button type="button" class="remove-pair btn btn-danger">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <button type="button" class="btn btn-success mt-3" id="add-pair">Add More</button>
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-label">Correct Answer</label>
                            <input type="text" name="correct_answer" id="correct_answer" class="form-control"
                                value="{{ $question->correct_answer ?? old('correct_answer') }}" required>

                            @if ($errors->has('correct_answer'))
                                <div class="text-danger">
                                    {{ $errors->first('correct_answer') }}
                                </div>
                            @endif
                        </div>


                        <div class="mt-5">
                            <button type="button"
                                onclick="location.href = '{{ route('learning-management.show', ['id' => $examId]) }}'"
                                class="btn btn-secondary">Back</button>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('add-pair').addEventListener('click', function() {
            const container = document.getElementById('key-value-container');
            const newPair = document.createElement('div');
            newPair.classList.add('key-value-pair');
            newPair.innerHTML = `
          <div class="d-flex gap-2 py-2">
            <div class="col-md-4">
                <input type="text" name="key[]" placeholder="Items (e.g: a, b, c, ...)" class="form-control" required>
            </div>
                                <div class="col-md-4">
                                    <input type="text" name="value[]" placeholder="Option Value" class="form-control"
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="remove-pair btn btn-danger">Remove</button>
                                </div>
        </div>
      `;
            container.appendChild(newPair);
        });

        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-pair')) {
                e.target.closest('.key-value-pair').remove();
            }
        });
    </script>
@endsection
