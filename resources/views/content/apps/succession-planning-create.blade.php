@extends('layouts/layoutMaster')

@section('title', 'Succession Planning')

@section('vendor-style')
    @vite('resources/assets/vendor/libs/flatpickr/flatpickr.scss')
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/flatpickr/flatpickr.js', 'resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/jquery-repeater/jquery-repeater.js'])
@endsection

@section('content')

    <div class="">
        <div class="card">
            <div class="card-datatable table-responsive">
                <div class="p-5 d-flex flex-row gap-3">
                    @if (session()->has('success'))
                        <x-alert successMessage="{{ session('success') }}" />
                    @elseif(session()->has('error'))
                        <x-alert errorMessage="{{ session('error') }}" />
                    @endif

                    <div class="w-100">
                        <form action="{{ url('/succession-planning/store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="col-md-12">
                                <label for="" class="form-lab">Employee</label>
                                <select name="employee" id="select-employee" class="form-select" value="{{ old('employee') }}"
                                    required>
                                    <option value="" selected>Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}"
                                            data-position="{{ $employee->jobPosition->title }}"
                                            data-department="{{ $employee->department }}"
                                            data-skills="{{ collect($employee->skills)->map(fn($skill) => $skill['title'])->join(', ') }}"
                                            data-score="{{ $employee->applicantScores->first()->score }}"
                                            data-status="{{ $employee->applicantScores->first()->status }}"
                                            >{{ $employee->name }}
                                        </option>
                                    @endforeach

                                    @if ($errors->has('employee'))
                                        <div class="text-danger">
                                            {{ $errors->first('employee') }}
                                        </div>
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-12 mt-3" id="current-position-container">
                                <label for="" class="form-label">Current Position</label>
                                <input type="text" name="current_position" id="current_position" class="form-control"
                                    value="" readonly />
                            </div>

                            <div class="col-md-12 mt-3" id="current-department-container">
                                <label for="" class="form-label">Department</label>
                                <input type="text" name="department" id="department" class="form-control" value=""
                                    readonly />
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="" class="form-label">Promote To:</label>
                                <select name="promoted_to" id="promoted_to" class="form-select" value="{{ old('promoted_to') }}" required>
                                    <option value="" selected>Select an option</option>
                                    @foreach ($jobPositions as $jobPosition)
                                        <option value="{{ $jobPosition->title }}">{{ $jobPosition->title }}</option>
                                    @endforeach

                                    @if ($errors->has('promoted_to'))
                                        <div class="text-danger">
                                            {{ $errors->first('promoted_to') }}
                                        </div>
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select" value="{{ old('status') }}" required>
                                    <option value="" selected>Select an option</option>
                                    @foreach ($statusEnums as $statusEnum)
                                        <option value="{{ $statusEnum }}">{{ $statusEnum }}</option>
                                    @endforeach

                                    @if ($errors->has('status'))
                                        <div class="text-danger">
                                            {{ $errors->first('status') }}
                                        </div>
                                    @endif
                                </select>
                            </div>

                            <div class="mt-5">
                                <button type="button" onclick="location.href = '{{ url('/succession-planning') }}'"
                                    class="btn btn-secondary">Back</button>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                    <div class="w-100 d-flex flex-column gap-3 p-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Employee Score</h5>
                                <p class="card-text">Score: <span id="score"></span></p>
                                <p class="card-text">Status: <span id="scoreStatus"></span></p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Skills: </h5>
                                <p class="card-text">Status: <span id="skills"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('select-employee').addEventListener('change', function() {
            let selectedOption = this.options[this.selectedIndex];
            let position = selectedOption.getAttribute('data-position') || '';
            let department = selectedOption.getAttribute('data-department') || '';
            let positionField = document.getElementById('current_position');
            let departmentField = document.getElementById('department');


            let score = selectedOption.getAttribute('data-score') || '';
            let status = selectedOption.getAttribute('data-status') || '';
            let scoreField = document.getElementById('score');
            let statusField = document.getElementById('scoreStatus');

            let skills = selectedOption.getAttribute('data-skills') || '';
            let skillsField = document.getElementById('skills');

            positionField.value = position;
            departmentField.value = department;
            scoreField.textContent = score;
            statusField.textContent = status;
            skillsField.textContent = skills;
        });
    </script>

@endsection
