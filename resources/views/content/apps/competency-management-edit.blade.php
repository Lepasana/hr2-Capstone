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
                            <select name="employee" id="employee" class="form-select" required>
                                <option value="{{ $competency->employee->id ?? old('employee') }}" selected>
                                    {{ $competency->employee->name }}
                                </option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach

                                @if ($errors->has('employee'))
                                    <div class="text-danger">
                                        {{ $errors->first('employee') }}
                                    </div>
                                @endif
                            </select>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-lab">Job Position</label>
                            <select name="job_request_id" id="job_request_id" class="form-select" required>
                                <option value="{{ $competency->job_request_id ?? old('job_request_id') }}" selected>
                                    {{ $competency->jobRequest->job_title }}
                                </option>
                                @foreach ($jobRequests as $jobRequest)
                                    <option value="{{ $jobRequest->id }}">{{ $jobRequest->job_title }}</option>
                                @endforeach

                                @if ($errors->has('job_request_id'))
                                    <div class="text-danger">
                                        {{ $errors->first('job_request_id') }}
                                    </div>
                                @endif
                            </select>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-lab">Department</label>
                            <select name="department" id="department" class="form-select" required>
                                <option value="{{ $competency->department ?? old('department') }}" selected>{{ $competency->department }}</option>
                                @foreach ($departmentEnums as $department)
                                    <option value="{{ $department }}">{{ $department }}</option>
                                @endforeach

                                @if ($errors->has('department'))
                                    <div class="text-danger">
                                        {{ $errors->first('department') }}
                                    </div>
                                @endif
                            </select>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Skill Level</label>
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
@endsection
