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
                                <option value="{{ $competency->employee->id ?? old('employee') }}" selected>{{ $competency->employee->name }}</option>
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
                            <label for="" class="form-label">Competency</label>
                            <input type="text" name="competency" class="form-control" value="{{ $competency->competency ?? old('competency') }}"
                                required>
                            @if ($errors->has('competency'))
                                <div class="text-danger">
                                    {{ $errors->first('competency') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Skill Level</label>
                            <select name="skill_level" id="skill_level" class="form-select" required>
                                <option value="{{ $competency->skill_level ?? old('skill_level') }}" selected>{{ $competency->skill_level }}</option>
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
                            <label for="" class="form-label">Proficiency</label>
                            <input type="text" name="proficiency" id="proficiency" class="form-control" value="{{ $competency->proficiency ?? old('proficiency') }}" required>

                            @if ($errors->has('proficiency'))
                                <div class="text-danger">
                                    {{ $errors->first('proficiency') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Notes</label>
                            <textarea name="notes" id="notes" class="form-control" rows="10" required>{{ $competency->notes }}</textarea>

                            @if ($errors->has('notes'))
                                <div class="text-danger">
                                    {{ $errors->first('notes') }}
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
