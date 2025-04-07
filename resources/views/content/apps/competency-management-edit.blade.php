@extends('layouts/layoutMaster')

@section('title', 'Competency Management - Apps')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Competency Management List</span>
    </h4>

    <div class="container mt-5">
        <div class="card">
            <div class="card-datatable table-responsive">
                <div class="p-5">
                    <form action="{{ route('competency-management.update', ['id' => $competency->id]) }}" method="POST">
                        @csrf
                        @method('PUT')


                        <div class="col-md-12">
                            <label for="" class="form-lab">Employee</label>
                            <select name="employee" id="select-employee" class="form-select" required>
                                <option value="{{ $competency->employee->id ?? old('employee') }}" selected>
                                    {{ $competency->employee->name }}
                                </option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}" data-position="{{ $employee->jobPosition->title }}"
                                        data-position-id="{{ $employee->jobPosition->id }}"
                                        data-department="{{ $employee->department }}">{{ $employee->name }}</option>
                                @endforeach

                                @if ($errors->has('employee'))
                                    <div class="text-danger">
                                        {{ $errors->first('employee') }}
                                    </div>
                                @endif
                            </select>
                        </div>

                        <div class="col-md-12 mt-3" id="job-position-container">
                            <label for="" class="form-lab">Job Position</label>
                            <select name="job_request_id" id="job_position" class="form-select" required>
                                <option value="{{ $competency->job_request_id ?? old('job_request_id') }}" selected>
                                    {{ $competency->jobPosition->title }}
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6 mt-3" id="current-department-container">
                            <label for="" class="form-label">Department</label>
                            <input type="text" name="department" id="department" class="form-control"
                                value="{{ $competency->department }}" readonly />
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Skill</label>
                            <select name="skill_level" id="skill_level" class="form-select" required>
                                <option value="{{ $competency->skill_level ?? old('skill_level') }}" selected>
                                    {{ $competency->skill_level }}
                                </option>
                                @foreach ($skill_levels as $skill_level)
                                    <option value="{{ $skill_level }}">{{ $skill_level }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('skill_level'))
                                <div class="text-danger">
                                    {{ $errors->first('skill_level') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="{{ $competency->status ?? old('status') }}" selected>
                                    {{ $competency->status }}
                                </option>
                                @foreach ($competencyStatusEnum as $status)
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('status'))
                                <div class="text-danger">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                        </div>

                        <div class="mt-5">
                            <button type="button" onclick="location.href = '{{ url('/competency-management') }}'"
                                class="btn btn-secondary">Back</button>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('select-employee').addEventListener('change', function() {
            let selectedOption = this.options[this.selectedIndex];
            let position = selectedOption.getAttribute('data-position') || '';
            let positionId = selectedOption.getAttribute('data-position-id') || '';
            let department = selectedOption.getAttribute('data-department') || '';
            let positionField = document.getElementById('job_position');
            let departmentField = document.getElementById('department');

            departmentField.value = department;
            positionField.innerHTML = '<option value="" selected>Select Position</option>';

            if (position) {
                let option = document.createElement('option');
                option.value = positionId;
                option.textContent = position;
                option.selected = true;
                positionField.appendChild(option);
            }
        });
    </script>
@endsection
