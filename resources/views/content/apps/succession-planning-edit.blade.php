@extends('layouts/layoutMaster')

@section('title', 'Edit - Invoice')

@section('vendor-style')
    @vite('resources/assets/vendor/libs/flatpickr/flatpickr.scss')
@endsection

@section('page-style')
    @vite('resources/assets/vendor/scss/pages/app-invoice.scss')
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/flatpickr/flatpickr.js', 'resources/assets/vendor/libs/cleavejs/cleave.js', 'resources/assets/vendor/libs/cleavejs/cleave-phone.js', 'resources/assets/vendor/libs/jquery-repeater/jquery-repeater.js'])
@endsection

@section('page-script')
    @vite(['resources/assets/js/offcanvas-add-payment.js', 'resources/assets/js/offcanvas-send-invoice.js', 'resources/assets/js/app-invoice-edit.js'])
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
                        <form action="{{ route('succession-planning.update', ['id' => $successor->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="" class="form-lab">Employee</label>
                                <select name="employee" id="select-employee" class="form-select" required>
                                    <option value="{{ $successor->employee->id }}"
                                        data-position="{{ $successor->employee->jobPosition->title }}"
                                        data-department="{{ $successor->employee->department }}"
                                        data-skills="{{ collect($successor->employee->skills)->map(fn($skill) => $skill['title'])->join(', ') }}"
                                        data-score="{{ $successor->employee->applicantScores->first()?->score }}"
                                        data-status="{{ $successor->employee->applicantScores->first()?->status }}">
                                        {{ $successor->employee->name }}
                                    </option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}"
                                            data-position="{{ $employee->jobPosition->title }}"
                                            data-department="{{ $employee->department }}"
                                            data-skills="{{ collect($employee->skills)->map(fn($skill) => $skill['title'])->join(', ') }}"
                                            data-score="{{ $employee->applicantScores->first()?->score }}"
                                            data-status="{{ $employee->applicantScores->first()?->status }}">
                                            {{ $employee->name }}</option>
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
                                    value="{{ $successor->current_position }}" readonly />
                            </div>


                            <div class="col-md-12 mt-3" id="current-department-container">
                                <label for="" class="form-label">Department</label>
                                <input type="text" name="department" id="department" class="form-control"
                                    value="{{ $successor->department }}" readonly />
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="" class="form-label">Promote To:</label>
                                <select name="promoted_to" id="promoted_to" class="form-select"
                                    value="{{ old('promoted_to') }}" required>
                                    <option value="{{ $successor->promoted_to }}" selected>{{ $successor->promoted_to }}
                                    </option>
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
                                <select name="status" id="status" class="form-select" value="{{ old('status') }}"
                                    required>
                                    <option value="{{ $successor->status }}" selected>
                                        {{ $successor->status ?? 'Select an option' }}
                                    </option>
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

                                <button type="submit" class="btn btn-primary">Update</button>
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
        function populateEmployeeDetails(selectedOption) {
            const position = selectedOption.getAttribute('data-position') || '';
            const department = selectedOption.getAttribute('data-department') || '';
            const score = selectedOption.getAttribute('data-score') || '';
            const status = selectedOption.getAttribute('data-status') || '';
            const skills = selectedOption.getAttribute('data-skills') || '';

            document.getElementById('current_position').value = position;
            document.getElementById('department').value = department;
            document.getElementById('score').textContent = score;
            document.getElementById('scoreStatus').textContent = status;
            document.getElementById('skills').textContent = skills;
        }

        document.addEventListener('DOMContentLoaded', function () {
            const select = document.getElementById('select-employee');

            // Populate on page load
            populateEmployeeDetails(select.options[select.selectedIndex]);

            // Also populate on change
            select.addEventListener('change', function () {
                populateEmployeeDetails(this.options[this.selectedIndex]);
            });
        });
    </script>
@endsection
