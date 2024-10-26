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
                <div class="p-5">
                    <form action="{{ url('/succession-planning/store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="col-md-12">
                            <label for="" class="form-lab">Employee</label>
                            <select name="employee" id="employee" class="form-select" value="{{ old('employee') }}"
                                required>
                                <option value="" selected>Select Employee</option>
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
                            <label for="" class="form-label">Current Position</label>
                            <input type="text" name="current_position" id="current_position" class="form-control"
                                value="{{ old('current_position') }}" required>

                            @if ($errors->has('current_position'))
                                <div class="text-danger">
                                    {{ $errors->first('current_position') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Potential Successor</label>
                            <input type="text" name="potential_successor" class="form-control"
                                value="{{ old('potential_successor') }}" required>
                            @if ($errors->has('potential_successor'))
                                <div class="text-danger">
                                    {{ $errors->first('potential_successor') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Development Needs</label>
                            <input type="text" name="development_needs" class="form-control"
                                value="{{ old('development_needs') }}" required>

                            @if ($errors->has('development_needs'))
                                <div class="text-danger">
                                    {{ $errors->first('development_needs') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="" class="form-label">Readiness Level</label>
                            <select name="readiness_level" id="readiness_level" class="form-select" required>
                                <option value="{{ '' ?? old('readiness_level') }}">Select</option>
                                @foreach ($readiness_levels as $key => $readiness_level)
                                    <option value="{{ $readiness_level }}">{{ $readiness_level }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('readiness_level'))
                                <div class="text-danger">
                                    {{ $errors->first('readiness_level') }}
                                </div>
                            @endif
                        </div>

                        <div class="mt-5">
                            <button type="button" onclick="location.href = '{{ url('/succession-planning') }}'"
                                class="btn btn-secondary">Back</button>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
